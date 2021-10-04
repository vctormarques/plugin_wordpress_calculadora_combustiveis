function changemodel(val) {
  if (val == 'en') {
    jQuery('.eu').hide();
    jQuery('.en').show();

  } else {
    jQuery('.en').hide();
    jQuery('.eu').show();
  }

}
jQuery('input[type="text"]').keyup(function(e) {
  var val = jQuery(this).val().replace(',','.');
  jQuery(this).val(val);
});
jQuery('input[type="checkbox"]').on('click', function(){
  jQuery('.Gasolina, .Alcool, .Diesel, .EnergiaEletrica, .GNV, .Hidrogenio').hide();
  jQuery("input:checkbox[name=combustivel]:checked").each(function() {
    jQuery("."+jQuery(this).val()).show();
  });
});


jQuery(".alertaResult").hide();
  jQuery(document).ready(function () {



    jQuery('#botao').on('click', function(e){
    jQuery(".alertaResult").hide();
    var arr = [];
    jQuery("input:checkbox[name=combustivel]:checked").each(function() {
      arr.push(jQuery(this).val());
    });

    e.preventDefault();
    var arrayObjetos = [];

    jQuery('.combustivel').each(function(){
        var classe = jQuery(this).val();
        arrayObjetos.push({classe:classe});
    });
      jQuery.ajax({
        url: script.ajax,
        dataType: 'json',
        type: 'POST',
          data: {
            'action': 'funcao_que_recebe_os_dados',
            'mediaKm': jQuery('#mediaKm').val(),
            'precoPorLitroGasolina': jQuery('#precoPorLitroGasolina').val(),
            'kmPorLitroGasolina': jQuery('#kmPorLitroGasolina').val(),
            'precoPorLitroAlcool': jQuery('#precoPorLitroAlcool').val(),
            'kmPorLitroAlcool': jQuery('#kmPorLitroAlcool').val(),
            'precoPorLitroDiesel': jQuery('#precoPorLitroDiesel').val(),
            'kmPorLitroDiesel': jQuery('#kmPorLitroDiesel').val(),
            'precoPorLitroGNV': jQuery('#precoPorLitroGNV').val(),
            'kmPorLitroGNV': jQuery('#kmPorLitroGNV').val(),
            'precoPorLitroHidrogenio': jQuery('#precoPorLitroHidrogenio').val(),
            'kmPorLitroHidrogenio': jQuery('#kmPorLitroHidrogenio').val(),
            'precoPorLitroEnergiaEletrica': jQuery('#precoPorLitroEnergiaEletrica').val(),
            'kmPorLitroEnergiaEletrica': jQuery('#kmPorLitroEnergiaEletrica').val(),
            'combustivel': arr,
          },
        success: function(response){
          jQuery(".alertaResult").show();
          jQuery(".alertaResult").html(response);
        }
      });   
    });
});