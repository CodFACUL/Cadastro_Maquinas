<?php
require ('./vendor/autoload.php');
use App\Entity\Vendedor;
use App\Entity\Cliente;
require_once ('./App/Entity/Cliente.class.php');
require_once ('./App/Entity/Vendedor.class.php');
require_once ('./relatorio.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data=strftime('%A, %d de %B de %Y ás ', strtotime('today'));
$data.=date('H:i');
$header='<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Relatório de Vendedores</title>
    <style>
    @page {
       margin: 50px;
       text-align: right;
       display: inline;
       
      }
    #header {
      position: fixed;
    }
    #data{
      float:left;
      display:inline;
    }
    #footer {
      position: fixed;
      bottom:80px;
      display:block
    }
    #footer .page:after{content:counter(page,my-sec-counter);}
    h1{
        text-align: center;
    }
table, td, th {
  border: 1px solid black;
}
body{
  padding-top:100px;
  padding-bottom:100px;
}
.page-break{
  page-break-before:always;
}
#tabela{
  display: inline-block;
}
table {
  
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: center;
}
</style>
  </head>
  <body >
        <div id="header">
            <h1>Relatório de Vendedores</h1>
            <hr>
 
        </div><div id="footer">
        <hr>
        <p id="data">Data: '.$data.'</p>
        <p class="page">Página </p>
        </div>';
           
$vendedores = Vendedor:: getVendedores();
$clientes = Cliente:: getClientes();
$imprime=$header;
$imprime.='<table>
            <thead class="bg-primary">
                <tr>
                    <th>CNPJ</th>
                    <th>Vendedor</th>
                    <th>Clientes</th>
                    <th>Maquinas vendidas</th>
                </tr>
            </thead>
            <tbody>';
        
 $cont_cli=0;
 $cont_maq=0;
 foreach ($vendedores as $vendedor){
     foreach ($clientes as $cliente){
        if ($cliente->cnpj_vend==$vendedor->cnpj_vend){
            $cont_cli=$cont_cli+1;
            $cont_maq=$cont_maq+$cliente->qtd_maq;
        }
     }
     $imprime.= '<tr>
     <td>'.$vendedor->cnpj_vend.'</td>
     <td>'.$vendedor->nome.'</td>
     <td>'.$cont_cli.'</td>
     <td>'.$cont_maq.'</td>
 </tr>';
 $cont_cli=0;
 $cont_maq=0;
 }
 $imprime.='</tbody></table></body></html>';

$pdf=new PDF();
$pdf->pdf($imprime);


?>