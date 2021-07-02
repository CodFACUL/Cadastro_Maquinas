<?php 

use App\Entity\Vendedor;
use App\Entity\Cliente;

require ('./App/Entity/Cliente.class.php');
require ('./App/Entity/Vendedor.class.php');


$vendedores = Vendedor:: getVendedores();
$clientes = Cliente:: getClientes();

$imprime='';
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
    <td><a href="EditarVendedor.php?vendedor='.$vendedor->cnpj_vend.'" class="btn btn-primary">Editar</a ><a href="DeletarVendedor.php?vendedor='.$vendedor->cnpj_vend.'"  class="btn btn-danger">Excluir</a></td>
</tr>';
$cont_cli=0;
$cont_maq=0;
}
$msg='';
if(isset($_GET['status'])){
    switch ($_GET['status']){
        case 'success':
            $msg='<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $msg='<div class="alert alert-danger">Falha ao executar a ação!</div>';
            break;
    }
}

require ('./Header.php');





?>
<?=$msg?>
<button class="btn btn-secondary text-light">Vendedores</button>
    <a href="../Clientes/ListaCliente.php" class="btn btn-warning">Clientes</a>
    <a href="../Maquinas/ListaMaquina.php" class="btn btn-warning">Máquinas</a>
    <a href="../Laminas/ListaLamina.php" class="btn btn-warning">Lâminas</a> 
    <a class="btn btn-success mb-4 float-right" href="./CadastraVendedor.php">Novo Vendedor</a>
    <a href="./RelatorioVendedor.php" target="_blank" class="btn btn-info float-right mr-1">Gerar Relatório</a>

<table class="table  table-striped table-bordered table-hover ">
    <thead class="bg-primary">
        <tr>
            <th>CNPJ</th>
            <th>Vendedor</th>
            <th>Clientes</th>
            <th>Maquinas vendidas</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-dark">
       <?php if ($imprime=='')
       {$imprime='<tr><td class="font-weight-bold text-center" colspan="5">Não há Vendedores cadastrados</td></tr>';} 
       echo $imprime;?>
    </tbody>
</table>

<?php 

require ('./Footer.php')

?>