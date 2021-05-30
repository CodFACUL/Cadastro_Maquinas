
<br>

<form method="POST">
    <div class="input-group mb-3">
         <label class="input-group-text"for="cnpj">CNPJ</label>
         <input type="text" class="form-control col-3" name="cnpj" value="<?php if(isset($obCliente->cnpj_cli)){echo $obCliente->cnpj_cli;}  ?>">
    </div>
    <div class="input-group mb-3">
         <label class="input-group-text"for="cliente">Cliente</label>
         <input type="text" class="form-control" name="cliente" value="<?php if(isset($obCliente->nome)){echo $obCliente->nome;}?>">
    </div>
    <div class="input-group mb-3">
         <label class="input-group-text"for="qtd_maq">Quantidade de Maquinas</label>
         <input type="text" class="form-control col-1" name="qtd_maq" value="<?php if(isset($obCliente->qtd_maq)){echo $obCliente->qtd_maq;}?>">
    </div>
    <div class="input-group mb-3">
                 <label for="vendedor" class="input-group-text">Vendedor</label>
                 <select name="vendedor" class="btn col-6 form-select">
                    <option selected>Escolha...</option>
                    <?php $imprime==''?$imprime='<option>Não há vendedores cadastrados</option>':$imprime;
                    echo $imprime?>
                 </select>
            </div>
    <input type="submit" class="btn btn-success mr-2"name="salvar" value="Salvar"><a class="btn btn-danger" href="./ListaCliente.php">Cancelar</a>

</form>