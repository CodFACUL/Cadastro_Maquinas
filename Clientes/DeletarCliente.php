<?php 

require ('../Vendedor/vendor/autoload.php');
use App\Entity\Cliente;
require ('../Vendedor/App/Entity/Cliente.class.php');

if(!isset($_GET['cliente'])){
    header('location: ListaCliente.php?status=error');
    exit;
}

$obCliente= Cliente:: getCliente($_GET['cliente']);


if(!$obCliente instanceof Cliente){
    header('location: ListaCliente.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){

    $obCliente-> excluir();
    header('location: ListaCliente.php?status=success');
    exit;
}




require ('./Header.php');

?>



<h3>Excluir Cliente</h3>
<br>
<form method="POST">
<div class="container"> 

    <div >
        <p>Deseja excluir <strong><?=$obCliente->nome?></strong>?</p>
    </div>

    <button type="submit" name="excluir" class="btn btn-success mr-2">Excluir</button ><a href="ListaCliente.php" class="btn btn-danger">Cancelar</a>
</div>
</form>
<?php 

require ('./Footer.php');

?>