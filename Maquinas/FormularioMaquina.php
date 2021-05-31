<main>
<br>
    <div class="container">
        <form class="form" method="POST">
        <div class="input-group mb-3">
                <label for="cod_maq"class="input-group-text">Código Máquina</label>
                <input type="text" class="form-control col-3" name="cod_maq" value="<?php if(isset($obMaquina->cod_maq)){echo $obMaquina->cod_maq;}?>">
            </div>
            <div class="input-group mb-3">
                 <label for="maquina" class="input-group-text">Modelo Máquina</label>
                 <select name="modelo" class="btn col-3 form-select">
                    <option selected>Escolha...</option>
                    <option <?= $obMaquina->modelo=='FT-250'?'selected':'' ?>>FT-250</option>
                    <option <?= $obMaquina->modelo=='FTI-250'?'selected':'' ?>>FTI-250</option>
                    <option <?= $obMaquina->modelo=='FT-600'?'selected':'' ?>>FT-600</option>
                    <option <?= $obMaquina->modelo=='FTI-600'?'selected':'' ?>>FTI-600</option>
                 </select>
            </div>
            <div class="input-group mb-3">
                 <label for="cliente" class="input-group-text">CNPJ Cliente</label>
                 <select name="cnpj_cli" class="btn col-3 form-select">
                    <option selected>Escolha...</option>
                    <?php $imprime==''?$imprime='<option>Não há máquinas cadastradas</option>':$imprime;
                    echo $imprime?>
                 </select>
            </div>

<div class="text-dark bg-light">

    <table class="table  table-striped">
                <thead class="bg-secondary">
                    <tr>
                        <th>Fases</th>
                        <th>Voltagem</th>
                        <th>Amperagem</th>
                        <th>Peso</th>
                        <th>Conexão Remota</th>
                    </tr>
                </thead>
                <tbody class="table-white text-dark">
                    <tr>
                        <td> <div class="form-check">
                                    <input type="radio" class="form-check-input" name="fases" value="1" <?= $obMaquina->fases=='1'?'checked':'' ?>>
                                    <label for="mono"class="form-check-label">Monofásico</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="fases" value="3" <?= $obMaquina->fases=='3'?'checked':'' ?>>
                                    <label for="tri"class="form-check-label">Trifásico</label>
                                </div></td>
                        <td> <div class="form-check">
                                    <input type="radio" id="220" class="form-check-input" name="voltagem" value="220" <?= $obMaquina->voltagem=='220'?'checked':'' ?>>
                                    <label for="mono"class="form-check-label">220V</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="380"class="form-check-input" name="voltagem" value="380" <?= $obMaquina->voltagem=='380'?'checked':'' ?>>
                                    <label for="tri"class="form-check-label">380V</label>
                                </div></td>
                        <td><div class="input-group mb-3">
                                <input type="text" value="<?php if(isset($obMaquina->amperagem)){echo $obMaquina->amperagem;}?>" name="amperagem" class="text-dark form-control col-3">
                                <div class="input-group-append"><span for="a"class="form-check-label input-group-text">A</span></div>
                            </div>
                        </td>
                        <td><div class="input-group mb-3">
                                <input type="text" value="<?php if(isset($obMaquina->peso)){echo $obMaquina->peso;}?>" name="peso" class="text-dark form-control col-3">
                                <label for="kg"class="input-group-text form-check-label">Kg</label>
                            </div>
                        </td>
                        <td>
                        <div class="input-group mb-3">
                                <input type="text" value="<?php if(isset($obMaquina->maq)){echo $obMaquina->maq;}?>" name="maq" class="text-dark form-control col-4">
                                <label for="maq"class="input-group-text form-check-label">MAQ</label>
                        </div>
                        </td>
                    </tr>
                    
                </tbody>
</table>
</div>
<input type="submit" class="btn btn-success mr-2" name="salvar" value="Salvar"><a href="ListaMaquina.php" class="btn btn-danger">Cancelar</a>

        
        
        </form>
    
    </div>






</main>
