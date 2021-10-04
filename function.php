<?PHP 
    function shortcode_calculadora_combustivel_front(){
      require_once(DIRETORIO_CALCULADORA_COMBUSTIVEL.'front/page-plugin.php');
   }
   function shortcode_calculadora_combustivel_register(){
     add_shortcode('calculadora_combustivel', 'shortcode_calculadora_combustivel_front');
   }

   
   
   function funcao_que_recebe_os_dados() {
   
    $mediaKm = $_POST['mediaKm'];
    $qtdCombustiveis = count($_POST['combustivel']);
    $combustiveis = $_POST['combustivel'];

    $resultado .= "
    <fieldset>
       <legend><b>Resultado</b></legend>
          <b>Por km:</b><br>";   
       for ($i = 0; $i < $qtdCombustiveis; $i++) {
 
            $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
            $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
            $valorPorKm = 
            $valorDiaKm = $precoPorLitro * ($mediaKm / $kmPorLitro);
            $valorDiaKm = $valorDiaKm / $mediaKm;
            $valorDiaKm = number_format($valorDiaKm, 2, ",",".");
            
            $resultado .= $combustiveis[$i]. ": R$ ".$valorDiaKm." reais por km.<br>";
       }
 
        $resultado .= "<b>Por dia:</b><br>";
       
       for ($i = 0; $i < $qtdCombustiveis; $i++) {
 
            $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
            $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
            $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
            $result2 = number_format($valorDia, 2, ",",".");

        $resultado .= $combustiveis[$i]. ": R$ ".$result2." reais por dia.<br>";
       }
 
       $resultado .= "<b>Por mês:</b><br>";

       for ($i = 0; $i < $qtdCombustiveis; $i++) {
        
            $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
            $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
            $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
            $result3 = number_format($valorDia*30, 2, ",",".");
        $resultado .= $combustiveis[$i]. ": R$ ".$result3." reais por mês.<br>";
       }
 
       $resultado .= "<b>Por ano:</b><br>";

       for ($i = 0; $i < $qtdCombustiveis; $i++) {
 
            $precoPorLitro = $_POST['precoPorLitro'.$combustiveis[$i]];
            $kmPorLitro = $_POST['kmPorLitro'.$combustiveis[$i]];
            $valorDia = $precoPorLitro * ($mediaKm / $kmPorLitro);
            $result2 = number_format($valorDia*365, 2, ",",".");
          $resultado .= $combustiveis[$i]. ": R$ ".$result2." reais por ano.<br>";
       } 
       
    $resultado .= "</fieldset><br>";
    $resultado .= '<div class="row"> Compartilhar:';
    $resultado .= '<a class="fa fa-whatsapp icon" title="WhatsApp" href="https://api.whatsapp.com/send?text='.get_site_url().'" target="_blank"></i></a>';
    $resultado .= '<a class="fa fa-facebook icon" href="https://www.facebook.com/sharer/sharer.php?u='.get_site_url().'&t=Calculo de Combustivel" title="Compartilhar no Facebook" target="_blank" onclick="window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(document.URL) + "&t=" + encodeURIComponent(document.URL)); return false;"></a>';
    $resultado .= '<a class="fa fa-twitter icon" href="https://twitter.com/intent/tweet?'.get_site_url().'" target="_blank" title="Tweet" onclick="window.open("https://twitter.com/intent/tweet?text=%20Gostei%20dessa%20publicação " + encodeURIComponent(document.title) + ":%20 " + encodeURIComponent(document.URL)); return false;"></a>';
    $resultado .= '<a class="fa fa-linkedin icon" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_site_url().'&title=Calculo&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open("http://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(document.URL) + "&title=" + encodeURIComponent(document.title)); return false;"></a>';
    $resultado .= '</div>';
       
    wp_send_json($resultado);
 
 }