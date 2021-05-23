<?php 

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
        <tr>
            <td>XX. XXX. XXX/0001-XX</td>
            <td>Daniel</td>
            <td>1</td>
            <td>3</td>
            <td><button class="btn btn-primary">Editar</button ><button class="btn btn-danger">Excluir</button></td>
        </tr>
    </tbody>
</table>

<?php 

require ('./Footer.php')

?>