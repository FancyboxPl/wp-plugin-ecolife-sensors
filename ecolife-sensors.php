<?php
/**
* Plugin Name: Ecolife Sensors Map
* Plugin URI: https://www.fancybox.pl/
* Description: Plugin for map with Ecolife sensors
* Version: 1.0
* Author: Marcin Kosmala
* Author URI: https://www.fancybox.pl/.
**/

add_shortcode('ecolife-sensors-map', function () {
    ob_start();
    include(dirname(__FILE__).'/templates/map.template.php');
    $content = ob_get_clean();

    return $content;
});

add_action('wp_enqueue_scripts', function () {
    global $post;
    if (has_shortcode( $post->post_content, 'ecolife-sensors-map')) {
        wp_enqueue_style('ecolife-sensors-style', plugin_dir_url(__FILE__).'assets/css/ecolife-sensors.css');
    }
});

add_action('wp_footer', function () {
    global $post;
    if (has_shortcode( $post->post_content, 'ecolife-sensors-map')) {
        wp_enqueue_script('ecolife-sensors-script', plugin_dir_url(__FILE__).'assets/js/ecolife-sensors.js');
    }
});
