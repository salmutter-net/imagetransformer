<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  System.imagetransformer
 *
 * @copyright   (C) 2025 DI Philipp Salmutter <https://www.salmutter.net>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;

return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   4.4.0
     */
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin     = new Joomla\Plugin\System\Imagetransformer\Extension\Imagetransformer(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('system', 'imagetransformer'),
                    Factory::getApplication()
                );

                return $plugin;
            }
        );
    }
};
