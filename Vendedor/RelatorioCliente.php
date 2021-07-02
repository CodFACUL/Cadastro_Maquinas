<?php
require ('./vendor/autoload.php');
require_once ('./relatorio.php');
require_once ('./App/Entity/Cliente.class.php');
use App\Entity\Cliente;

$clientes = Cliente:: getClientes();
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
    
    <title>Relatório de Clientes</title>
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
            <h1>Relatório de Clientes</h1>
            <hr>
 
        </div><div id="footer">
        <hr>
        <p id="data">Data: '.$data.'</p>
        <p class="page">Página </p>
        </div>';

$imprime=$header;

$imprime.='<div id="tabela"><table>
<thead class="bg-primary">
    <tr>
        <th>CNPJ</th>
        <th>Cliente</th>
        <th>Quantidade Maquinas</th>
        <th>Vendedor</th>
    </tr>
</thead>
<tbody>';

foreach ($clientes as $cliente){
    $cd.= '<tr>
    <td>'.$cliente->cnpj_cli.'</td>
    <td>'.$cliente->nome.'</td>
    <td>'.$cliente->qtd_maq.'</td>
    <td>'.$cliente->cnpj_vend.'</td>
</tr>';
}
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.=$cd;
$imprime.='</div></tbody></table>

</body></html>';
$pdf=new PDF();
$pdf->pdf($imprime);

