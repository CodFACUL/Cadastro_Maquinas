<?php 
require ('./vendor/autoload.php');
use App\Entity\Vendedor;
require ('./App/Entity/Vendedor.class.php');
$obVendedor= new Vendedor;
$msg='';
if(!empty($_POST['cnpj']) && (!empty($_POST['vendedor']))){

     $obVendedor-> cnpj = $_POST['cnpj'];
     $obVendedor-> vendedor = $_POST['vendedor'];
     $obVendedor-> cadastrar();
     header('location: ListaVendedor.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){
     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';
}










require ('./Header.php');
echo $msg;
?>
<h3>Cadastrar Vendedor</h3>
<?php
require ('./FormularioVendedor.php');
require ('./Footer.php');

?>