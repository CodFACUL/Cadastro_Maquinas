
<br>

<form method="POST">

<div class="text-dark bg-light">

    <table class="table  table-striped">
                <thead class="bg-secondary">
                    <tr>
                        <th>Afiação</th>
                        <th>Diametro Interno</th>
                        <th>Diametro Externo</th>
                        <th>Código Lâmina</th>
                    </tr>
                </thead>
                <tbody class="table-white text-dark">
                    <tr>
                        <td> <div class="form-check">
                                    <input type="radio" class="form-check-input" name="afiacao" <?= $obLamina->afiacao=='Lisa'?'checked':'' ?> value="Lisa">
                                    <label for="lisa"class="form-check-label">Lisa</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="afiacao" <?= $obLamina->afiacao=='Serrilhada'?'checked':'' ?> value="Serrilhada">
                                    <label for="serrilhada"class="form-check-label">Serrilhada</label>
                                </div></td>
                        <td> <div class="form-check">
                                    <input type="radio" id="57" class="form-check-input" name="interno" <?= $obLamina->diam_interno=='57'?'checked':'' ?> value="57">
                                    <label for="57"class="form-check-label">57mm</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="58"class="form-check-input" name="interno" <?= $obLamina->diam_interno=='58'?'checked':'' ?> value="58">
                                    <label for="58"class="form-check-label">58mm</label>
                                </div></td>
                                <td> <div class="form-check">
                                    <input type="radio" id="300" class="form-check-input" name="externo" <?= $obLamina->diam_externo=='300'?'checked':'' ?> value="300">
                                    <label for="300"class="form-check-label">300mm</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="420"class="form-check-input" name="externo" <?= $obLamina->diam_externo=='420'?'checked':'' ?> value="420">
                                    <label for="420"class="form-check-label">420mm</label>
                                </div></td>
                        <td><input type="text" name="cod_lamina" value="<?php if(isset($obLamina->cod_lamina)){echo $obLamina->cod_lamina;}?>" class="form-control text-dark col-5"></td>
                    </tr>
                    
                </tbody>
                
</table>


</div>
<div class="input-group mb-3 text-dark bg-dark">
                 <label for="cod_maq" class="input-group-text">Código da Máquina</label>
                 <select name="cod_maq" class="btn col-6 form-select">
                    <option selected>Escolha...</option>
                    <?php $imprime==''?$imprime='<option>Não há máquinas cadastradas</option>':$imprime;
                    echo $imprime?>
                 </select>
            </div>
            <input type="submit" class="btn btn-success mr-2"name="salvar" value="Salvar"><a class="btn btn-danger" href="./ListaLamina.php">Cancelar</a>


</form>