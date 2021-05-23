<?php 
require ('./vendor/autoload.php');
use App\Entity\Vendedor;
require ('./App/Entity/Vendedor.class.php');


if($_POST['cnpj']!='' && $_POST['vendedor']!=''){

     $obVendedor= new Vendedor;
     $obVendedor-> cnpj = $_POST['cnpj'];
     $obVendedor-> vendedor = $_POST['vendedor'];
     $obVendedor-> cadastrar();
     header('location: ListaVendedor.php?status=success');
     exit;
}










require ('./Header.php');
require ('./FormularioVendedor.php');
require ('./Footer.php');

?>