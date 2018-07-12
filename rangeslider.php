<?php
/*
  Plugin Name: rangeslider
  Plugin URI:
  Description: Plugin for range slider
  Author: Dinoop
  Version: 0.1
 */

define('RS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('RS_PLUGIN_URL', plugin_dir_url(__FILE__));

add_action('wp_enqueue_scripts', 'rs_scripts');

function rs_scripts() {
    wp_enqueue_style('rs-rangeslider', RS_PLUGIN_URL . 'css/ion.rangeSlider.css');
    wp_enqueue_style('rs-skinhtml5', RS_PLUGIN_URL . 'css/ion.rangeSlider.skinHTML5.css');
    wp_enqueue_style('rs-styles', RS_PLUGIN_URL . 'css/styles.css');
    wp_enqueue_script('rs-rangeslider', RS_PLUGIN_URL . 'js/ion.rangeSlider.min.js', array('jquery'), null, true);
    wp_enqueue_script('rs-scripts', RS_PLUGIN_URL . 'js/scripts.js', array('jquery'), null, true);
}

add_shortcode('rs-subscribers', 'rs_execute_rangeslider');

function rs_execute_rangeslider() {
  require 'templates/slider.php';
}