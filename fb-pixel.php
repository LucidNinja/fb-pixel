<?php if ( ! defined( 'ABSPATH' ) ) exit;
/*
Plugin Name:  Facebook Pixel
Plugin URI:   https://wakeupdreamer.com.au
Description:  Adds the Facebook Pixel to the site's head.
Version:      1.0.1
Author:       Wake Up, Dreamer
Author URI:   https://wakeupdreamer.com.au
License:      MIT License
*/



/*
|--------------------------------------------------------------------------
| Define Facebook Pixel Id Here
|--------------------------------------------------------------------------
|
| Add your custom Facebook Pixel ID between the quotes below.
| Find more about Facebook Pixels here: https://www.facebook.com/business/learn/facebook-ads-pixel
|
*/

$fbpix = 'your-pixel-id-goes-here';


/*
|--------------------------------------------------------------------------
| Define Facebook Pixel Constant
|--------------------------------------------------------------------------
|
| If the FB_PIXEL is not already defined, define it here based on user
| input above. We define this as a constant so that it is available inside
| our anonymous function below.
|
*/

if ( ! defined( 'FB_PIXEL' ) ) {
  define('FB_PIXEL', $fbpix);
}


/*
|--------------------------------------------------------------------------
| Anonymous Function
|--------------------------------------------------------------------------
|
| An anonymous function is called by Wordpress' wp_head hook, which gets
| the required html markup from includes/markup.php. This file contains
| the pixelMarkup() function, which consists solely of markup inside of 
| <script> tags and <noscript> tags, as per FB's specifications.
|
*/


add_action('wp_head', function () {
    require_once( __DIR__ . '/includes/markup.php' );
    $markup = pixelMarkup(FB_PIXEL);
    echo $markup;
});