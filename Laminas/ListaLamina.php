<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Lamina;
require ('../Vendedor/App/Entity/Lamina.class.php');


$laminas = Lamina:: getLaminas();

$imprime='';

foreach ($laminas as $lamina){
    $imprime.= '<tr>
    <td>'.$lamina->cod_lamina.'</td>
    <td>'.$lamina->afiacao.'</td>
    <td>'.$lamina->diam_interno.'</td>
    <td>'.$lamina->diam_externo.'</td>
    <td>'.$lamina->cod_maq.'</td>
    <td><a href="EditarLamina.php?lamina='.$lamina->cod_lamina.'" class="btn btn-primary">Editar</a ><a href="DeletarLamina.php?lamina='.$lamina->cod_lamina.'"  class="btn btn-danger">Excluir</a></td>
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
<a href="../Vendedor/ListaVendedor.php" class="btn btn-warning">Vendedores</a>
<a href="../Clientes/ListaCliente.php" class="btn btn-warning">Clientes</a>
<a href="../Maquinas/ListaMaquina.php" class="btn btn-warning">Máquinas</a>
<button class="btn btn-secondary text-light">Lâminas</button>
<a class="btn btn-success mb-4 float-right" href="./CadastraLamina.php">Nova Lâmina</a>
<a href="../Vendedor/RelatorioLamina.php" target="_blank" class="btn btn-info float-right mr-1">Gerar Relatório</a>

<table class="table  table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th>Código Lâmina</th>
            <th>Afiação</th>
            <th>Diâmetro Interno</th>
            <th>Diâmetro Externo</th>
            <th>Código Máquina</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-dark">
       <?php if ($imprime=='')
       {$imprime='<tr><td class="font-weight-bold text-center" colspan="6">Não há Lâminas cadastrados</td></tr>';} 
       echo $imprime;?>
    </tbody>
</table>

<?php 

require ('./Footer.php')

?>