<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Lamina;
use App\Entity\Maquina;
require_once ('../Vendedor/App/Entity/Lamina.class.php');
require_once ('../Vendedor/App/Entity/Maquina.class.php');
$obLamina= new Lamina;


$maquinas= Maquina::getMaquinas();

$imprime='';
foreach ($maquinas as $maquina){

     $imprime.='<option  name="cod_maq" >'.$maquina->cod_maq.'</option>';
     
 }

$msg='';
if(!empty($_POST['cod_lamina']) && !empty($_POST['afiacao']) && !empty($_POST['externo']) && !empty($_POST['interno']) && ($_POST['cod_maq']!='Escolha...') && ($_POST['cod_maq']!='Não há máquinas cadastradas')){

     $obLamina-> cod_lamina = $_POST['cod_lamina'];
     $obLamina-> afiacao = $_POST['afiacao'];
     $obLamina-> diam_externo = $_POST['externo'];
     $obLamina-> diam_interno = $_POST['interno'];
     $obLamina-> cod_maq= $_POST['cod_maq'];
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