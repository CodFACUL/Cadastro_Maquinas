<?php 
require ('../Vendedor/vendor/autoload.php');
use App\Entity\Maquina;
require ('../Vendedor/App/Entity/Maquina.class.php');


$maquinas = Maquina:: getMaquinas();

$imprime='';

foreach ($maquinas as $maquina){
    $imprime.= '<tr>
    <td>'.$maquina->cod_maq.'</td>
    <td>'.$maquina->cnpj_cli.'</td>
    <td>'.$maquina->modelo.'</td>
    <td>'.$maquina->fases.'</td>
    <td>'.$maquina->voltagem.'</td>
    <td>'.$maquina->amperagem.'</td>
    <td>'.$maquina->peso.'</td>
    <td>'.$maquina->maq.'</td>
    <td><a href="EditarMaquina.php?maquina='.$maquina->cod_maq.'" class="btn btn-primary">Editar</a ><a href="DeletarMaquina.php?maquina='.$maquina->cod_maq.'"  class="btn btn-danger">Excluir</a></td>
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
<a class="btn btn-success mb-4 float-right" href="./CadastraMaquina.php">Nova Máquina</a>

<table class="table  table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th>Código Máquina</th>
            <th>CNPJ Cliente</th>
            <th>Modelo</th>
            <th>Fases</th>
            <th>Voltagem</th>
            <th>Amperagem</th>
            <th>Peso</th>
            <th>Conexão Remota</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-dark">
       <?php if ($imprime=='')
       {$imprime='<tr><td class="font-weight-bold text-center" colspan="5">Não há Máquinas cadastradas</td></tr>';} 
       echo $imprime;?>
    </tbody>
</table>

<?php 

require ('./Footer.php')

?>