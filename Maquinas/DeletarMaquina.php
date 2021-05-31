<?php 

require ('../Vendedor/vendor/autoload.php');
use App\Entity\Maquina;
require ('../Vendedor/App/Entity/Maquina.class.php');

if(!isset($_GET['maquina'])){
    header('location: ListaMaquina.php?status=error');
    exit;
}

$obMaquina= Maquina:: getMaquina($_GET['maquina']);


if(!$obMaquina instanceof Maquina){
    header('location: ListaMaquina.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){

    $obMaquina-> excluir();
    header('location: ListaMaquina.php?status=success');
    exit;
}




require ('./Header.php');

?>



<h3>Excluir Máquina</h3>
<br>
<form method="POST">
<div class="container"> 

    <div >
        <p>Deseja excluir máquina <strong><?=$obMaquina->cod_maq?></strong>?</p>
    </div>

    <button type="submit" name="excluir" class="btn btn-success mr-2">Excluir</button ><a href="ListaMaquina.php" class="btn btn-danger">Cancelar</a>
</div>
</form>
<?php 

require ('./Footer.php');

?>