<?php

/** 
 * Plugin Name: ContactPoint
 * Description: A plugin to manage custom functionality.
 * Version: 1.00
 * Author: Vishavjeet
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action('wp_enqueue_scripts', function () {
    if (!is_page('contact-us')) {
        wp_dequeue_script('contact-form-7');
        wp_dequeue_style('contact-form-7');
    }
}, 99);

add_filter('script_loader_tag', function ($tag, $handle) {
    if (in_array($handle, ['custom-global-js', 'elementor-frontend'])) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 2);
