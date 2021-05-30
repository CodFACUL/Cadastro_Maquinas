<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Lamina;
use App\Entity\Vendedor;
require_once ('../Vendedor/App/Entity/Lamina.class.php');
require_once ('../Vendedor/App/Entity/Vendedor.class.php');
$obLamina= new Lamina;


$vendedores= Vendedor::getVendedores();

$imprime='';
foreach ($vendedores as $vendedor){
     $imprime.='<option name="vendedor">'.$vendedor->nome.'</option>';
}
$msg='';
if(!empty($_POST['cod_lamina']) && !empty($_POST['afiacao'])){

     $obLamina-> cod_lamina = $_POST['cod_lamina'];
     $obLamina-> afiacao = $_POST['afiacao'];
     $obLamina-> diam_externo = $_POST['externo'];
     $obLamina-> diam_interno = $_POST['interno'];
     $obLamina-> cod_maq='50';//$_POST['cod_maq'];
     $obLamina-> cadastrar();
     header('location: ListaLamina.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){

     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';
}










require ('./Header.php');
echo $msg;
?>
<h3>Cadastrar Lâmina</h3>
<?php
require ('./FormularioLamina.php');
require ('./Footer.php');

?>