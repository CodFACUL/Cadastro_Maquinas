<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Cliente;
use App\Entity\Vendedor;
require_once ('../Vendedor/App/Entity/Vendedor.class.php');
require_once ('../Vendedor/App/Entity/Cliente.class.php');

$msg='';
if(!isset($_GET['cliente'])){
     header('location: ListaCliente.php?status=error');
     exit;
}

$obCliente= Cliente:: getCliente($_GET['cliente']);
$vendedores= Vendedor:: getVendedores();
$imprime='';
foreach ($vendedores as $vendedor){
     if($vendedor->cnpj_vend==$obCliente->cnpj_vend){
         $imprime.='<option  name="vendedor" selected >'.$vendedor->cnpj_vend.'</option>';
     }else{
     $imprime.='<option  name="vendedor" >'.$vendedor->cnpj_vend.'</option>';
     }
 }

if(!$obCliente instanceof Cliente){
     header('location: ListaCliente.php?status=error');
     exit;
}


if(!empty($_POST['cnpj']) && !empty($_POST['cliente']) && ($_POST['vendedor']!='Escolha...') && ($_POST['vendedor']!='Não há vendedores cadastrados')){
     $primaria=$obCliente->cnpj_cli;
     $obCliente-> cnpj = $_POST['cnpj'];
     $obCliente-> nome = $_POST['cliente'];
     $obCliente-> cnpj_vend = $_POST['vendedor'];
     $obCliente-> atualizar($primaria);
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