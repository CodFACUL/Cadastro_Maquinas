<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Lamina;
require ('../Vendedor/App/Entity/Lamina.class.php');

$msg='';
if(!isset($_GET['lamina'])){
     header('location: ListaLamina.php?status=error');
     exit;
}

$obLamina= Lamina:: getLamina($_GET['lamina']);


if(!$obLamina instanceof Lamina){
     header('location: ListaLamina.php?status=error');
     exit;
}


if($_POST['cod_lamina']!='' && $_POST['afiacao']!=''){
     $obLamina-> cod_lamina = $_POST['cod_lamina'];
     $obLamina-> afiacao = $_POST['afiacao'];
     $obLamina-> diam_externo = $_POST['externo'];
     $obLamina-> diam_interno = $_POST['interno'];
     $obLamina-> cod_maq='50';//$_POST['cod_maq'];
     $obLamina-> atualizar();
     header('location: ListaLamina.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){
     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';

}











require ('./Header.php');
echo $msg;
?>
<h3>Editar Lâmina</h3>
<?php
require ('./FormularioLamina.php');
require ('./Footer.php');

?>