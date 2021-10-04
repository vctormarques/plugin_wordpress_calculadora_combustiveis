<?PHP 
   /*
       Plugin Name: Calculadora de Combustivel
       Description: Realiza o calculo
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
   
   
   function funcao_que_recebe_os_dados() {
   
   
      //  if ( ! wp_verify_nonce( $request['nonce'], 'recebe_dados' ) ) {
      //      wp_send_json_error('Nonce inválido');
      //  }
   
    
      $mediaKm = $_POST['mediaKm'];
   
      $qtdCombustiveis = count($_POST['combustivel']);
      $combustiveis = $_POST['combustivel'];
   
   
      $resultado .= "
      <fieldset>
         <legend>Resultado</legend>
            <b>Por km:</b>";
         for ($i = 0; $i < $qtdCombustiveis; $i++) {
   
      $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
      $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
      $valorPorKm = 
      $valorDiaKm = $precoPorLitro * ($mediaKm / $kmPorLitro);
      $valorDiaKm = $valorDiaKm / $mediaKm;
      $valorDiaKm = number_format($valorDiaKm, 2, ",",".");
            $resultado .= $combustiveis[$i]. ": R$ ".$valorDiaKm." reais por km.<br>
            ";
         }
   
         $resultado .= "
               <b>Por dia:</b>";
         for ($i = 0; $i < $qtdCombustiveis; $i++) {
   
      $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
      $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
      $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
      $result2 = number_format($valorDia, 2, ",",".");
            $resultado .= $combustiveis[$i]. ": R$ ".$result2." reais por dia.<br>
            ";
         }
   
         $resultado .= "
               <b>Por mês:</b>";
         for ($i = 0; $i < $qtdCombustiveis; $i++) {
   
      $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
      $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
      $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
      $result3 = number_format($valorDia*30, 2, ",",".");
            $resultado .= $combustiveis[$i]. ": R$ ".$result3." reais por mês.<br>
            ";
         }
   
         $resultado .= "
               <b>Por ano:</b>";
         for ($i = 0; $i < $qtdCombustiveis; $i++) {
   
      $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
      $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
      $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
      $result2 = number_format($valorDia*365, 2, ",",".");
            $resultado .= $combustiveis[$i]. ": R$ ".$result2." reais por ano.<br>
            ";
         }
      $resultado .= "</fieldset><br>";
      $resultado .= '<div class="row"> Compartilhar:';
      $resultado .= '<a class="fa fa-whatsapp icon" title="WhatsApp" href="whatsapp://send?text=Seu site aqui" target="_blank"></i></a>';
      $resultado .= '<a class="fa fa-facebook icon" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(document.URL) + "&t=" + encodeURIComponent(document.URL)); return false;"></a>';
      $resultado .= '<a class="fa fa-twitter icon" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open("https://twitter.com/intent/tweet?text=%20Gostei%20dessa%20publicação " + encodeURIComponent(document.title) + ":%20 " + encodeURIComponent(document.URL)); return false;"></a>';
      $resultado .= '<a class="fa fa-linkedin icon" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open("http://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(document.URL) + "&title=" + encodeURIComponent(document.title)); return false;"></a>';
      $resultado .= '</div>';
         
      wp_send_json($resultado);
   
   }
   
   
   function shortcode_calculadora_combustivel_front(){
      // require_once(DIRETORIO_CALCULADORA_GESTANTE.'front/page-plugin.php');
   
      ?>
<style>
   
</style>
<form action="" id="formCalculadora">
   <div class="row">
      <div class="col-100">
         <label for="combustivel">Combustível:</label>
      </div>
      <div class="col-100">
         <div class="col-30">
            <input type="checkbox" id="gasolina" class="combustivel" name="combustivel" value="Gasolina">
            <label for="gasolina">Gasolina</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="alcool" class="combustivel" name="combustivel" value="Alcool">
            <label for="alcool">Álcool</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="combustivel" class="combustivel" name="combustivel" value="Diesel">
            <label for="gemeos">Diesel</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="combustivel" class="combustivel" name="combustivel" value="EnergiaEletrica">
            <label for="diesel">Energia Elétrica</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="combustivel" class="combustivel" name="combustivel" value="GNV">
            <label for="gnv">GNV</label>
         </div>
         <div class="col-30">
         <input type="checkbox" id="combustivel" class="combustivel" name="combustivel" value="Hidrogenio">
         <label for="hidrogenio">Hidrogênio</label>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-100">
         <label for="sistema-de-medidas">Sistema de medidas:</label>
      </div>
      <div class="col-100">
         <select name="sistema-de-medidas" id="sistema-de-medidas" onchange="changemodel(this.value);">
            <option value="eu">EEU</option>
            <option value="en">SI</option>
         </select>
      </div>
   </div>
   <div class="col-100">
      <label for=""><span class="eu">Km</span><span class="en">Mi</span> rodados em média por dia</label>
   </div>
   <div class="col-100">
      <input type="text" name="mediaKm" id="mediaKm">
   </div>
   <div class="Gasolina">
      <fieldset>
         <legend>Gasolina</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por <span class="eu">litro</span><span class="en">galão</span> de Gasolina</label>
               <input type="text" name="precoPorLitroGasolina" id="precoPorLitroGasolina">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por <span class="eu">litro</span><span class="en">galão</span> de Gasolina</label>
               <input type="text" name="kmPorLitroGasolina" id="kmPorLitroGasolina">
            </div>
         </div>
      </fieldset>
   </div>
   <div class="Alcool">
      <fieldset>
         <legend>Alcool</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por <span class="eu">litro</span><span class="en">galão</span> de Álcool</label>
               <input type="text" name="precoPorLitroAlcool" id="precoPorLitroAlcool">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por <span class="eu">litro</span><span class="en">galão</span> de Álcool</label>
               <input type="text" name="kmPorLitroAlcool" id="kmPorLitroAlcool">
            </div>
         </div>
      </fieldset>
   </div>
   <div class="Diesel">
      <fieldset>
         <legend>Diesel</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por <span class="eu">litro</span><span class="en">galão</span> do Diesel</label>
               <input type="text" name="precoPorLitroDiesel" id="precoPorLitroDiesel">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por <span class="eu">litro</span><span class="en">galão</span> do Diesel</label>
               <input type="text" name="kmPorLitroDiesel" id="kmPorLitroDiesel">
            </div>
         </div>
      </fieldset>
   </div>
   <div class="GNV">
      <fieldset>
         <legend>GNV</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por m3 de gás</label>
               <input type="text" name="precoPorLitroGNV" id="precoPorLitroGNV">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por m3 de gás</label>
               <input type="text" name="kmPorLitroGNV" id="kmPorLitroGNV">
            </div>
         </div>
      </fieldset>
   </div>
   <div class="EnergiaEletrica">
      <fieldset>
         <legend>Energia Eletrica</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por kWh</label>
               <input type="text" name="precoPorLitroEnergiaEletrica" id="precoPorLitroEnergiaEletrica">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por kWh</label>
               <input type="text" name="kmPorLitroEnergiaEletrica" id="kmPorLitroEnergiaEletrica">
            </div>
         </div>
      </fieldset>
   </div>
   <div class="Hidrogenio">
      <fieldset>
         <legend>Hidrogênio</legend>
         <div class="row">
            <div class="col-50">
               <label for="">Preço por kg de gás</label>
               <input type="text" name="precoPorLitroHidrogenio" id="precoPorLitroHidrogenio">
            </div>
            <div class="col-50 margin-left">
               <label for=""><span class="eu">Km</span><span class="en">Mi</span> por kg de gás</label>
               <input type="text" name="kmPorLitroHidrogenio" id="kmPorLitroHidrogenio">
            </div>
         </div>   
   </div>
   </fieldset>
   <button id="botao" name="botao" type="button" CLASS="button-submit" >Calcular</button>
</form>
<div class="alertaResult">
</div>


<script type="text/javascript" src="http://platform.twitter.com/widgets.js">
</script>
<?PHP
   }
   function shortcode_calculadora_combustivel_register(){
   
   add_shortcode('calculadora_combustivel', 'shortcode_calculadora_combustivel_front');
   }
   
   // function add_my_css_and_my_js_files(){
   //    wp_enqueue_style( 'script', plugins_url('/front/js/script.js', __FILE__), false, '1.0.0', 'all');
   //    wp_enqueue_style( 'style', plugins_url('/front/css/style.css', __FILE__), false, '1.0.0', 'all');
   // }
   // add_action('wp_enqueue_scripts', "add_my_css_and_my_js_files");
   
   
      
   
      //  require_once(DIRETORIO_CALCULADORA_GESTANTE.'function.php');
       
       add_action('init', 'shortcode_calculadora_combustivel_register');
   ?>