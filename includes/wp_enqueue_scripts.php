<?php

$js_data_passed = array('ajax_url' => admin_url( 'admin-ajax.php' ));

// Incluir scripts y estilos del frontend
add_action( 'wp_enqueue_scripts', 'g_pt_enequeue_scripts_and_styles', 100 );
function g_pt_enequeue_scripts_and_styles() {
  global $js_data_passed;
 //wp_enqueue_script( 'g-pt-frontend', GPT_PLUGIN_URL . '/assets/js/script.js', array('jquery'), '1.0.0', true );
 // wp_localize_script( 'g-pt-frontend', 'gpt', $js_data_passed);
  wp_enqueue_style( 'g-pt-frontend-style', GPT_PLUGIN_URL . '/assets/css/style.css', array(), '1.0.2' );




}


  // Incluir scripts y estilos del administrador

add_action( 'admin_enqueue_scripts', 'g_pt_enqueue_admin_scripts_and_styles' );
function g_pt_enqueue_admin_scripts_and_styles(){

  global $js_data_passed;
  wp_enqueue_style( 'g-pt-settings-style', GPT_PLUGIN_URL . '/assets/css/style-admin.css', array(), '1.0.1' );
  wp_enqueue_script( 'g-pt-settings', GPT_PLUGIN_URL . '/assets/js/script.js', array('jquery'), '1.0.2', true );
  wp_localize_script( 'g-pt-settings', 'gpt', $js_data_passed);
}