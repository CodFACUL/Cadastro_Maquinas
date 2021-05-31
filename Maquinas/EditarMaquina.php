<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Maquina;
use app\Entity\Cliente;
require ('../Vendedor/App/Entity/Maquina.class.php');
require ('../Vendedor/App/Entity/Cliente.class.php');

$msg='';
if(!isset($_GET['maquina'])){
     header('location: ListaMaquina.php?status=error');
     exit;
}

$clientes= Cliente::getClientes();

$imprime='';

$msg='';
$obMaquina= Maquina:: getMaquina($_GET['maquina']);

foreach ($clientes as $cliente){
    if($cliente->cnpj_cli==$obMaquina->cnpj_cli){
        $imprime.='<option  name="cliente" selected >'.$cliente->cnpj_cli.'</option>';
    }else{
    $imprime.='<option  name="cliente" >'.$cliente->cnpj_cli.'</option>';
    }
}
if(!$obMaquina instanceof Maquina){
     header('location: ListaMaquina.php?status=error');
     exit;
}


if(!empty($_POST['cod_maq']) && !empty($_POST['modelo']) && !empty($_POST['amperagem']) && !empty($_POST['voltagem']) && !empty($_POST['peso']) && !empty($_POST['maq']) && !empty($_POST['cod_maq']) && !empty($_POST['modelo']) && !empty($_POST['fases']) && !empty($_POST['cnpj_cli'])){
     $obMaquina-> cod_maq = $_POST['cod_maq'];
     $obMaquina-> modelo = $_POST['modelo'];
     $obMaquina-> amperagem = $_POST['amperagem'];
     $obMaquina-> voltagem = $_POST['voltagem'];
     $obMaquina-> peso = $_POST['peso'];
     $obMaquina-> maq = $_POST['maq'];
     $obMaquina-> fases = $_POST['fases'];
     $obMaquina-> cnpj_cli = $_POST['cnpj_cli'];
     $obMaquina-> atualizar();
     header('location: ListaMaquina.php?status=success');
     exit;
}else if($_POST['salvar']=='Salvar'){
     $msg='<div class="alert alert-danger">Preencha todos os campos corretamente</div>';

}











require ('./Header.php');
echo $msg;
?>
<h3>Editar Máquina</h3>
<?php
require ('./FormularioMaquina.php');
require ('./Footer.php');

?>