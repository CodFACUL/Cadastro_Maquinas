<?php 
require ('./Header.php')





?>

<h3>Alterar Vendedor</h3>
<br>
<form method="POST">
    <div class="input-group mb-3">
         <label class="input-group-text"for="cnpj">CNPJ</label>
         <input type="text" class="form-control col-3" name="cnpj" value="">
    </div>
    <div class="input-group mb-3">
         <label class="input-group-text"for="Vendedor">Vendedor</label>
         <input type="text" class="form-control" name="Vendedor" value="">
    </div>
    <button class="btn btn-success mr-2">Salvar</button ><button class="btn btn-danger">Cancelar</button>

</form>









<?php 
require ('./Footer.php')

?>