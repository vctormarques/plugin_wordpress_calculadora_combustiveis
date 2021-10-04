<?PHP 
   /*
      Plugin Name: Calculadora de Combustivel
      Description: Realiza o calculo de valores por dias e por KM
      Author: Victor Marques
      Version: 1.0
      Author URI: https://visualtech.com.br

   */

if ( ! defined ( 'ABSPATH')) {
   die( 'Invalide request');
}

define('DIRETORIO_CALCULADORA_COMBUSTIVEL', plugin_dir_path(__FILE__));

wp_enqueue_script('jquery');

add_action( 'wp_enqueue_scripts', 'registrar_e_chamar_scripts' );
add_action( 'wp_ajax_funcao_que_recebe_os_dados', 'funcao_que_recebe_os_dados' );
add_action( 'wp_ajax_nopriv_funcao_que_recebe_os_dados', 'funcao_que_recebe_os_dados' );

function add_estilos_e_scripts() {
   wp_enqueue_style( 'style',  plugin_dir_url(__FILE__ ) . '/front/css/style.css');
}
   add_action( 'wp_enqueue_scripts', 'add_estilos_e_scripts' );

function registrar_e_chamar_scripts() {
   wp_register_script( 'script',  plugin_dir_url(__FILE__ ) . '/front/js/script.js', array( 'jquery' ), false, true );
   wp_enqueue_script( 'script' );

   wp_localize_script( 'script', 'script',  array( 'ajax' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'recebe_dados' ),
) );
}

require_once(DIRETORIO_CALCULADORA_COMBUSTIVEL.'function.php');

add_action('init', 'shortcode_calculadora_combustivel_register');
?>