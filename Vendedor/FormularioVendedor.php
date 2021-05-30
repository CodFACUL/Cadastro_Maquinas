
<br>

<form method="POST">
    <div class="input-group mb-3">
         <label class="input-group-text"for="cnpj">CNPJ</label>
         <input type="text" class="form-control col-3" name="cnpj" value="<?php if(isset($obVendedor->cnpj_vend)){echo $obVendedor->cnpj_vend;}  ?>">
    </div>
    <div class="input-group mb-3">
         <label class="input-group-text"for="vendedor">Vendedor</label>
         <input type="text" class="form-control" name="vendedor" value="<?php if(isset($obVendedor->nome)){echo $obVendedor->nome;}?>">
    </div>
    <input type="submit" class="btn btn-success mr-2"name="salvar" value="Salvar"><a class="btn btn-danger" href="./ListaVendedor.php">Cancelar</a>

</form>