<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Cliente;
use App\Entity\Vendedor;
require_once ('../Vendedor/App/Entity/Cliente.class.php');
require_once ('../Vendedor/App/Entity/Vendedor.class.php');
$obCliente= new Cliente;


$vendedores= Vendedor::getVendedores();

$imprime='';
foreach ($vendedores as $vendedor){
     $imprime.='<option name="vendedor">'.$vendedor->cnpj_vend.'</option>';
}
$msg='';
if(!empty($_POST['cnpj']) && !empty($_POST['cliente']) 
                          && ($_POST['vendedor']!='Escolha...') 
                          && ($_POST['vendedor']!='Não há vendedores cadastrados')){

     $obCliente-> cnpj = $_POST['cnpj'];
     $obCliente-> nome = $_POST['cliente'];
     $obCliente-> qtd_maq = 0;
     $obCliente->cnpj_vend=$_POST['vendedor'];
     $obCliente-> cadastrar();
     header('location: ListaCliente.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){

     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';
}










require ('./Header.php');
echo $msg;
?>
<h3>Cadastrar Cliente</h3>
<?php
require ('./FormularioCliente.php');
require ('./Footer.php');

?>