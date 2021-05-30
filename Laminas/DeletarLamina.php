<?php 

require ('../Vendedor/vendor/autoload.php');
use App\Entity\Lamina;
require ('../Vendedor/App/Entity/Lamina.class.php');

if(!isset($_GET['lamina'])){
    header('location: ListaLamina.php?status=error');
    exit;
}

$obLamina= Lamina:: getLamina($_GET['lamina']);


if(!$obLamina instanceof Lamina){
    header('location: ListaLamina.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){

    $obLamina-> excluir();
    header('location: ListaLamina.php?status=success');
    exit;
}




require ('./Header.php');

?>



<h3>Excluir Lâmina</h3>
<br>
<form method="POST">
<div class="container"> 

    <div >
        <p>Deseja excluir <strong><?=$obLamina->cod_lamina?></strong>?</p>
    </div>

    <button type="submit" name="excluir" class="btn btn-success mr-2">Excluir</button ><a href="ListaLamina.php" class="btn btn-danger">Cancelar</a>
</div>
</form>
<?php 

require ('./Footer.php');

?>