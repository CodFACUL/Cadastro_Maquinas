<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Cliente;
require ('../Vendedor/App/Entity/cliente.class.php');


$clientes = Cliente:: getClientes();

$imprime='';

foreach ($clientes as $cliente){
    $imprime.= '<tr>
    <td>'.$cliente->cnpj_cli.'</td>
    <td>'.$cliente->nome.'</td>
    <td>'.$cliente->qtd_maq.'</td>
    <td>'.$cliente->cnpj_vend.'</td>
    <td><a href="Editarcliente.php?cliente='.$cliente->cnpj_cli.'" class="btn btn-primary">Editar</a ><a href="Deletarcliente.php?cliente='.$cliente->cnpj_cli.'"  class="btn btn-danger">Excluir</a></td>
</tr>';

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

require ('./Header.php')






?>
<?=$msg?>
<a class="btn btn-success mb-4 float-left" href="../index.php">Início</a>
<a class="btn btn-success mb-4 float-right" href="./CadastraCliente.php">Novo Cliente</a>

<table class="table  table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th>CNPJ</th>
            <th>Cliente</th>
            <th>Quantidade Maquinas</th>
            <th>Vendedor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-dark">
       <?php if ($imprime=='')
       {$imprime='<tr><td class="font-weight-bold text-center" colspan="5">Não há clientes cadastrados</td></tr>';} 
       echo $imprime;?>
    </tbody>
</table>

<?php 

require ('./Footer.php')

?>