<?php 
require ('./vendor/autoload.php');
use App\Entity\Vendedor;
require ('./App/Entity/Vendedor.class.php');


$vendedores = Vendedor:: getVendedores();

$imprime='';

foreach ($vendedores as $vendedor){
    $imprime.= '<tr>
    <td>'.$vendedor->cnpj_vend.'</td>
    <td>'.$vendedor->nome.'</td>
    <td>Indefinido</td>
    <td>Indefinido</td>
    <td><a href="EditarVendedor.php?vendedor='.$vendedor->cnpj_vend.'" class="btn btn-primary">Editar</a ><a href="DeletarVendedor.php?vendedor='.$vendedor->cnpj_vend.'"  class="btn btn-danger">Excluir</a></td>
</tr>';

}



require ('./Header.php')






?>
<a class="btn btn-success mb-4 float-right" href="./CadastraVendedor.php">Novo Vendedor</a>

<table class="table  table-striped">
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