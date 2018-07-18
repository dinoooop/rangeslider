<?php
/*
  Plugin Name: Rangeslider
  Plugin URI:
  Description: Plugin for range slider
  Author: Dinoop
  Version: 0.1
 */

define('DRS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('DRS_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once DRS_PLUGIN_PATH . 'inc/functions.php';

add_action('wp_enqueue_scripts', 'drs_scripts', 15);

function drs_scripts() {
    wp_enqueue_style('rs-rangeslider', DRS_PLUGIN_URL . 'css/ion.rangeSlider.css');
    wp_enqueue_style('rs-skinhtml5', DRS_PLUGIN_URL . 'css/ion.rangeSlider.skinHTML5.css');
    wp_enqueue_style('rs-styles', DRS_PLUGIN_URL . 'css/styles.css');
    wp_enqueue_script('rs-rangeslider', DRS_PLUGIN_URL . 'js/ion.rangeSlider.min.js', array('jquery'), null, true);
    wp_enqueue_script('rs-scripts', DRS_PLUGIN_URL . 'js/scripts.js', array('jquery'), null, true);
}


add_shortcode('rs-subscribers', 'drs_execute_rangeslider');
function drs_execute_rangeslider() {
  $options_general = get_option('drs_options_general', drs_default('drs_options_general'));
  $options_general['result'] = drs_format_texts($options_general['result']);

  ob_start();
  require 'templates/slider.php';
  return ob_get_clean();
}



add_action('admin_enqueue_scripts', 'drs_admin_style');
function drs_admin_style() {
    wp_enqueue_style('rs-admin-styles', DRS_PLUGIN_URL . 'css/admin-styles.css');
    wp_enqueue_script('rs-admin-scripts', DRS_PLUGIN_URL . 'js/admin-scripts.js', array('jquery'), null, true);
}



add_action( 'admin_menu', 'drs_range_settings_page_register' );
function drs_range_settings_page_register() {
    add_menu_page('Subscribers payment', 'Payment', 'manage_options', 'range-slider', 'drs_range_settings_page', 'dashicons-layout', 7);
}

function drs_range_settings_page() {

    $options_subscriber_price = get_option('drs_options_subscriber_price', drs_default('drs_options_subscriber_price'));
    $options_general = get_option('drs_options_general', drs_default('drs_options_general'));

    if (
      isset($_POST['drs_options_general_form']) && 
      wp_verify_nonce($_POST['drs_options_general_form'], 'drs_options_general_submit')
      ) {

      $input = [];
      $input['title'] = $_POST['title'];
      $input['result'] = sanitize_textarea_field($_POST['result']);
      $input['peak'] = sanitize_textarea_field($_POST['peak']);
      
      update_option('drs_options_general', $input);
      $options_general = get_option('drs_options_general', drs_default('drs_options_general'));
    }

    if (
      isset($_POST['drs_options_subscriber_price_form']) && 
      wp_verify_nonce($_POST['drs_options_subscriber_price_form'], 'drs_options_subscriber_price_submit')
      ) {

        $input = [];
        $input['subscription'] = $_POST['subscription'];
        $input['price'] = $_POST['price'];
        $input['urls'] = $_POST['urls'];
        
        update_option('drs_options_subscriber_price', $input);
        $options_subscriber_price = get_option('drs_options_subscriber_price', drs_default('drs_options_subscriber_price'));
    }

    // Display form
    
    require 'templates/admin-settings.php';
    
}


add_action('wp_head', 'drs_load_ajax_url');

function drs_load_ajax_url() {
  ?>
  <script>
      var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
  </script>
  <?php
}

function drs_get_rangeslider_settings() {

  $options = get_option('drs_options_subscriber_price', drs_default('drs_options_subscriber_price'));
  echo json_encode($options);
  die();
  
}

add_action('wp_ajax_drs_get_rangeslider_settings', 'drs_get_rangeslider_settings');
add_action('wp_ajax_nopriv_drs_get_rangeslider_settings', 'drs_get_rangeslider_settings');