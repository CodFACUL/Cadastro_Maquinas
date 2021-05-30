<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Cliente;
require ('../Vendedor/App/Entity/Cliente.class.php');

$msg='';
if(!isset($_GET['cliente'])){
     header('location: ListaCliente.php?status=error');
     exit;
}

$obCliente= Cliente:: getCliente($_GET['cliente']);


if(!$obCliente instanceof Cliente){
     header('location: ListaCliente.php?status=error');
     exit;
}


if($_POST['cnpj']!='' && $_POST['cliente']!=''){
     $obCliente-> cnpj = $_POST['cnpj'];
     $obCliente-> nome = $_POST['cliente'];
     $obCliente-> qtd_maq = $_POST['qtd_maq'];
     $obCliente-> atualizar();
     header('location: ListaCliente.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){
     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';

}











require ('./Header.php');
echo $msg;
?>
<h3>Editar Cliente</h3>
<?php
require ('./FormularioCliente.php');
require ('./Footer.php');

?>