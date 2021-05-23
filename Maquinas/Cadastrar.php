<?php

require ('./Includes/Header.php');


?>


<main>
<h3>Cadastrar Máquina</h3>
<br>
    <div class="container">
        <form class="form" method="POST">
            <div class="input-group mb-3">
                 <label for="maquina" class="input-group-text">Modelo Maquina</label>
                 <select name="seleciona maquinas" class="btn col-6 form-select">
                    <option selected>Escolha...</option>
                    <option>FTI-250</option>
                 </select>
            </div>
            <div class="input-group mb-3">
                <label for="cliente"class="input-group-text">Nome Cliente</label>
                <input type="text" class="form-control" name="cliente" value="">
            </div>
            <div class="input-group mb-3">
                 <label for="vendedor" class="input-group-text">Vendedor</label>
                 <select name="seleciona vendedores" class="btn col-6 form-select">
                    <option selected>Escolha...</option>
                    <option>Daniel</option>
                 </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text"for="regiao">Cidade</label>
                <input type="text" class="form-control" name="regiao" value="">
                <label for="Estado" class="input-group-text">Estado</label>
                 <select name="seleciona estado" class="btn col-1 form-select">
                    <option selected>...</option>
                    <option>SC</option>
                 </select>
            </div>
   <h5>Lâmina</h5>
                <div class="text-dark bg-light">

    <table class="table  table-striped">
                <thead class="bg-secondary">
                    <tr>
                        <th>Afiação</th>
                        <th>Diametro Interno</th>
                        <th>Diametro Externo</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody class="table-white text-dark">
                    <tr>
                        <td> <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="lamina" value="Lisa">
                                    <label for="lisa"class="form-check-label">Lisa</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="lamina" value="Serrilhada">
                                    <label for="lisa"class="form-check-label">Serrilhada</label>
                                </div></td>
                        <td> <div class="form-check">
                                    <input type="radio" id="57" class="form-check-input" name="interno" value="57">
                                    <label for="57"class="form-check-label">57mm</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="58"class="form-check-input" name="interno" value="58">
                                    <label for="58"class="form-check-label">58mm</label>
                                </div></td>
                                <td> <div class="form-check">
                                    <input type="radio" id="300" class="form-check-input" name="externo" value="300">
                                    <label for="300"class="form-check-label">300mm</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="350"class="form-check-input" name="externo" value="350">
                                    <label for="350"class="form-check-label">350mm</label>
                                </div></td>
                        <td><input type="text" value="1" name="qtdlamina" class="text-dark col-1"></td>
                    </tr>
                    
                </tbody>
</table>
</div>
<button class="btn btn-success mr-2">Salvar</button ><button class="btn btn-danger">Cancelar</button>
        
        
        
        
        </form>
    
    </div>






</main>













<?
require ('./Includes/Footer.php');
?>