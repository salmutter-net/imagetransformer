<h1>Image Transformer</h1>

<p>Image Transformer uses Glide and provides all it&#39;s possibilities in templates for Joomla! ^4.x including 5.x</p>

<p>The plugin allows you to transform images and cache them. You can use this function <code>Imagetransformer::generateUrl()</code> to generate the image URLs in your template. The rest just works like magic.</p>
<p>The plugin is based on the <a href="https://glide.thephpleague.com/" target="_blank">Glide</a> Library and offers all of its features.</p>
<p>This is a short code example, where you can see the options:<br>
    <code>Imagetransformer::generateUrl($image, ['w' => 1728, 'h' => 972, 'fit' => 'crop', 'q' => 80,'fm' => 'webp']);</code>
</p>
<h2>All options of Glide</h2>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Function</th>
      <th>Description</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Orientation</td>
      <td><code class="language-plaintext highlighter-rouge">or</code></td>
      <td>Rotates the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/orientation/#orientation-or">info</a></td>
    </tr>
    <tr>
      <td>Flip</td>
      <td><code class="language-plaintext highlighter-rouge">flip</code></td>
      <td>Flip the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/flip/#flip-flip">info</a></td>
    </tr>
    <tr>
      <td>Crop</td>
      <td><code class="language-plaintext highlighter-rouge">crop</code></td>
      <td>Crops the image to specific dimensions.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/crop/#crop-crop">info</a></td>
    </tr>
    <tr>
      <td>Width</td>
      <td><code class="language-plaintext highlighter-rouge">w</code></td>
      <td>Sets the width of the image, in pixels.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/size/#width-w">info</a></td>
    </tr>
    <tr>
      <td>Height</td>
      <td><code class="language-plaintext highlighter-rouge">h</code></td>
      <td>Sets the height of the image, in pixels.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/size//#height-h">info</a></td>
    </tr>
    <tr>
      <td>Fit</td>
      <td><code class="language-plaintext highlighter-rouge">fit</code></td>
      <td>Sets how the image is fitted to its target dimensions.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/size//#fit-fit">info</a></td>
    </tr>
    <tr>
      <td>Device pixel ratio</td>
      <td><code class="language-plaintext highlighter-rouge">dpr</code></td>
      <td>Multiples the overall image size.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/pixel-density/#device-pixel-ratio-dpr">info</a></td>
    </tr>
    <tr>
      <td>Brightness</td>
      <td><code class="language-plaintext highlighter-rouge">bri</code></td>
      <td>Adjusts the image brightness.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/adjustments/#brightness-bri">info</a></td>
    </tr>
    <tr>
      <td>Contrast</td>
      <td><code class="language-plaintext highlighter-rouge">con</code></td>
      <td>Adjusts the image contrast.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/adjustments/#contrast-con">info</a></td>
    </tr>
    <tr>
      <td>Gamma</td>
      <td><code class="language-plaintext highlighter-rouge">gam</code></td>
      <td>Adjusts the image gamma.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/adjustments/#gamma-gam">info</a></td>
    </tr>
    <tr>
      <td>Sharpen</td>
      <td><code class="language-plaintext highlighter-rouge">sharp</code></td>
      <td>Sharpen the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/adjustments/#sharpen-sharp">info</a></td>
    </tr>
    <tr>
      <td>Blur</td>
      <td><code class="language-plaintext highlighter-rouge">blur</code></td>
      <td>Adds a blur effect to the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/effects/#blur-blur">info</a></td>
    </tr>
    <tr>
      <td>Pixelate</td>
      <td><code class="language-plaintext highlighter-rouge">pixel</code></td>
      <td>Applies a pixelation effect to the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/effects/#pixelate-pixel">info</a></td>
    </tr>
    <tr>
      <td>Filter</td>
      <td><code class="language-plaintext highlighter-rouge">filt</code></td>
      <td>Applies a filter effect to the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/effects/#filter-filt">info</a></td>
    </tr>
    <tr>
      <td>Watermark Path</td>
      <td><code class="language-plaintext highlighter-rouge">mark</code></td>
      <td>Adds a watermark to the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#path-mark">info</a></td>
    </tr>
    <tr>
      <td>Watermark Width</td>
      <td><code class="language-plaintext highlighter-rouge">markw</code></td>
      <td>Sets the width of the watermark.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#width-markw">info</a></td>
    </tr>
    <tr>
      <td>Watermark Height</td>
      <td><code class="language-plaintext highlighter-rouge">markh</code></td>
      <td>Sets the height of the watermark.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#height-markh">info</a></td>
    </tr>
    <tr>
      <td>Watermark X-offset</td>
      <td><code class="language-plaintext highlighter-rouge">markx</code></td>
      <td>Sets the watermark distance from left/right edges.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#x-offset-markx">info</a></td>
    </tr>
    <tr>
      <td>Watermark Y-offset</td>
      <td><code class="language-plaintext highlighter-rouge">marky</code></td>
      <td>Sets the watermark distance from top/bottom edges.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#y-offset-marky">info</a></td>
    </tr>
    <tr>
      <td>Watermark Padding</td>
      <td><code class="language-plaintext highlighter-rouge">markpad</code></td>
      <td>Sets the watermark distance from the edges.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#padding-markpad">info</a></td>
    </tr>
    <tr>
      <td>Watermark Position</td>
      <td><code class="language-plaintext highlighter-rouge">markpos</code></td>
      <td>Sets where the watermark is positioned.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#position-markpos">info</a></td>
    </tr>
    <tr>
      <td>Watermark Alpha</td>
      <td><code class="language-plaintext highlighter-rouge">markalpha</code></td>
      <td>Sets the watermark opacity.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/watermarks/#alpha-markalpha">info</a></td>
    </tr>
    <tr>
      <td>Background</td>
      <td><code class="language-plaintext highlighter-rouge">bg</code></td>
      <td>Sets the background color of the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/background/#background-bg">info</a></td>
    </tr>
    <tr>
      <td>Border</td>
      <td><code class="language-plaintext highlighter-rouge">border</code></td>
      <td>Add a border to the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/border/#border-border">info</a></td>
    </tr>
    <tr>
      <td>Quality</td>
      <td><code class="language-plaintext highlighter-rouge">q</code></td>
      <td>Defines the quality of the image.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/encode/#quality-q">info</a></td>
    </tr>
    <tr>
      <td>Format</td>
      <td><code class="language-plaintext highlighter-rouge">fm</code></td>
      <td>Encodes the image to a specific format.</td>
      <td><a target="_blank" href="https://glide.thephpleague.com/2.0/api/encode/#format-fm">info</a></td>
    </tr>
  </tbody>
</table>
