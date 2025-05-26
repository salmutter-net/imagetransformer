<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  System.imagetransformer
 *
 * @copyright   (C) 2025 DI Philipp Salmutter <https://www.salmutter.net>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Plugin\System\Imagetransformer\Extension;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Log\Log;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Uri\Uri;
use Joomla\Registry\Registry;
use League\Glide\Responses\PsrResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Urls\UrlBuilderFactory;
use Joomla\CMS\Plugin\PluginHelper;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Signatures\SignatureException;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

require_once __DIR__ . '/../../vendor/autoload.php';

final class Imagetransformer extends CMSPlugin
{

    public function onAfterInitialise()
    {
        $app = Factory::getApplication();

        // Only run in the site application
        if (!$app->isClient('site'))
        {
            return;
        }

        $uri = Uri::getInstance();
        $path = $uri->getPath();
        $query = $uri->getQuery();

        // Check if the path starts with /img/
        if (preg_match('#^/img/(.+)#', $path, $matches))
        {
            $path = '/img/' . $matches[1];
            $realPath = $matches[1];
            $elems = explode("&", $query);
            $params = [];
            foreach($elems as $elem){
                $items = explode("=", $elem);
                $params[$items[0]] = $items[1];
            }
            $this->imageResponse($path, $params, $realPath);
        }
    }
    public static function generateUrl($path, $params): string
    {

        // Clean imagepath
        $path = HTMLHelper::cleanImageURL( $path );
        if ( $path->url !== '' ) {
            $path = $path->url;
        }
        $path = urldecode($path);

        // Get plugin parameters
        $plugin = PluginHelper::getPlugin('system', 'imagetransformer');
        $pluginParams = new Registry($plugin->params);

        $imageFolder = $pluginParams->get('image-folder', 'images');

        // Remove "images/" from path, so it doesn't show up in URL
        $prefix = $imageFolder . '/';
        if ( str_starts_with( $path, $prefix ) ) {
            $path = substr($path, strlen($prefix));
        }

        // Set complicated sign key
        $signkey = $pluginParams->get('signkey');
        if ( empty( $signkey ) ) {
            Log::add('PlgSystemImageTransformer: Signkey is empty', Log::WARNING, 'error' );
        }

        // Generate a URL
        return UrlBuilderFactory::create( Uri::base() . 'img/', $signkey )->getUrl($path, $params);
    }

    private function imageResponse($path, $params, $realPath): Stream
    {
        // Get plugin parameters
        $plugin = PluginHelper::getPlugin('system', 'imagetransformer');
        $pluginParams = new Registry($plugin->params);

        $imageFolder = $pluginParams->get('image-folder', 'images');
        $imageCacheFolder = JPATH_ROOT . DIRECTORY_SEPARATOR . $pluginParams->get('image-cache-folder', 'images-cache');

        // Create cache directory, if not existent
        if ( !@mkdir( $concurrentDirectory = $imageCacheFolder, 664, true ) && !is_dir( $concurrentDirectory ) ) {
            throw new \RuntimeException( sprintf( 'Directory "%s" was not created', $concurrentDirectory ) );
        }

        // Verify HTTP signature
        try {
            // Set complicated sign key
            $signkey = (string)$pluginParams->get('signkey');

            // Validate HTTP signature
            $path = urldecode($path);
            SignatureFactory::create($signkey)->validateRequest($path, $params);

        } catch (SignatureException $e) {
            // Handle error
            throw new \RuntimeException($e->getMessage(), 404);
        }

        // Setup Glide server
        $imageTransformationServer = ServerFactory::create([
            'source' => JPATH_ROOT . DIRECTORY_SEPARATOR . $imageFolder,
            'cache' => $imageCacheFolder,
            'base_url' => Uri::base(false) . $imageFolder . '/',
            'response' => new PsrResponseFactory(new Response(), function ($stream) {
                return new Stream($stream);
            }),
        ]);
        $prefix = $imageFolder . DIRECTORY_SEPARATOR;
        if ( str_starts_with( $path, $prefix ) ) {
            $path = substr($path, strlen($prefix));
        }

        $imageTransformationServer->outputImage($realPath, $params);
        exit;
    }
}
