<?php 
require ('./vendor/autoload.php');
use App\Entity\Vendedor;
require ('./App/Entity/Vendedor.class.php');

$msg='';
if(!isset($_GET['vendedor'])){
     header('location: ListaVendedor.php?status=error');
     exit;
}

$obVendedor= Vendedor:: getVendedor($_GET['vendedor']);


if(!$obVendedor instanceof Vendedor){
     header('location: ListaVendedor.php?status=error');
     exit;
}

if($_POST['cnpj']!='' && $_POST['vendedor']!=''){

     $obVendedor-> cnpj = $_POST['cnpj'];
     $obVendedor-> vendedor = $_POST['vendedor'];
     $obVendedor-> atualizar();
     header('location: ListaVendedor.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){
     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';

}











require ('./Header.php');
echo $msg;
?>
<h3>Editar Vendedor</h3>
<?php
require ('./FormularioVendedor.php');
require ('./Footer.php');

?>