<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Maquina;
use App\Entity\Cliente;
require_once ('../Vendedor/App/Entity/Maquina.class.php');
require_once ('../Vendedor/App/Entity/Cliente.class.php');
$obMaquina= new Maquina;


$clientes= Cliente::getClientes();
$imprime='';
foreach ($clientes as $cliente){
     $imprime.='<option name="cliente">'.$cliente->cnpj_cli.'</option>';
}
$msg='';
if(!empty($_POST['cod_maq'])  && !empty($_POST['modelo']) 
                              && !empty($_POST['amperagem']) 
                              && !empty($_POST['voltagem']) 
                              && !empty($_POST['peso']) 
                              && !empty($_POST['maq']) 
                              && !empty($_POST['fases']) 
                              && ($_POST['cnpj_cli']!='Escolha...') 
                              && ($_POST['cnpj_cli']!='Não há clientes cadastrados')){

    $obMaquina-> cod_maq = $_POST['cod_maq'];
    $obMaquina-> modelo = $_POST['modelo'];
    $obMaquina-> amperagem = $_POST['amperagem'];
    $obMaquina-> voltagem = $_POST['voltagem'];
    $obMaquina-> peso = $_POST['peso'];
    $obMaquina-> maq = $_POST['maq'];
    $obMaquina-> fases = $_POST['fases'];
    $obMaquina-> cnpj_cli = $_POST['cnpj_cli'];
    $obCliente= Cliente:: getCliente($_POST['cnpj_cli']);
    $obCliente->qtd_maq= $obCliente->qtd_maq+1;
    $obCliente-> qtdMaq($_POST['cnpj_cli']);
     $obMaquina-> cadastrar();
     header('location: ListaMaquina.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){

     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';
}










require ('./Header.php');
echo $msg;
?>
<h3>Cadastrar Máquina</h3>
<?php
require ('./FormularioMaquina.php');
require ('./Footer.php');

?>