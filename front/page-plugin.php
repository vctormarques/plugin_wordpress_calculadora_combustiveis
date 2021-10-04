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
            <input type="checkbox" id="Diesel" class="combustivel" name="combustivel" value="Diesel">
            <label for="Diesel">Diesel</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="Energia-Eletrica" class="combustivel" name="combustivel" value="EnergiaEletrica">
            <label for="Energia-Eletrica">Energia Elétrica</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="gnv" class="combustivel" name="combustivel" value="GNV">
            <label for="gnv">GNV</label>
         </div>
         <div class="col-30">
            <input type="checkbox" id="Hidrogenio" class="combustivel" name="combustivel" value="Hidrogenio">
            <label for="Hidrogenio">Hidrogênio</label>
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

<div class="alertaResult"></div>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>