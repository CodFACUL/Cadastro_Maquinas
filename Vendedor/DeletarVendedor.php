<?php 

require ('./vendor/autoload.php');
use App\Entity\Vendedor;
require ('./App/Entity/Vendedor.class.php');

if(!isset($_GET['vendedor'])){
    header('location: ListaVendedor.php?status=error');
    exit;
}

$obVendedor= Vendedor:: getVendedor($_GET['vendedor']);


if(!$obVendedor instanceof Vendedor){
    header('location: ListaVendedor.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){
    var_dump($obVendedor);
    print_r($obVendedor->cnpj);exit;
    $obVendedor-> excluir();
    header('location: ListaVendedor.php?status=success');
    exit;
}




require ('./Header.php');

?>



<h3>Excluir Vendedor</h3>
<br>
<form method="POST">
<div class="container"> 

    <div >
        <p>Deseja excluir <strong><?=$obVendedor->nome?></strong>?</p>
    </div>

    <button type="submit" name="excluir" class="btn btn-success mr-2">Excluir</button ><a href="ListaVendedor.php" class="btn btn-danger">Cancelar</a>
</div>
</form>
<?php 

require ('./Footer.php');

?>