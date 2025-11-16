<h1>Editar Venda</h1>
<?php
    $sql_venda = "SELECT * FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
    $res_venda = $conn->query($sql_venda);
    $venda = $res_venda->fetch_object();
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $venda->id_venda; ?>">
    
    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control" required>
            <option value="">-= Escolha o Cliente =-</option>
            <?php
                $sql_cliente = "SELECT id_cliente, nome_cliente, cpf_cliente FROM cliente ORDER BY nome_cliente";
                $res_cliente = $conn->query($sql_cliente);
                
                if($res_cliente->num_rows > 0){
                    while($row_cliente = $res_cliente->fetch_object()){
                        $selected = ($venda->cliente_id_cliente == $row_cliente->id_cliente) ? 'selected' : '';
                        print "<option value='{$row_cliente->id_cliente}' {$selected}>{$row_cliente->nome_cliente} (CPF: {$row_cliente->cpf_cliente})</option>";
                    }
                } else {
                    print "<option>Não há clientes cadastrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Vendedor (Funcionário)</label>
        <select name="funcionario_id_funcionario" class="form-control" required>
            <option value="">-= Escolha o Vendedor =-</option>
            <?php
                $sql_func = "SELECT id_funcionario, nome_funcionario FROM funcionario ORDER BY nome_funcionario";
                $res_func = $conn->query($sql_func);
                
                if($res_func->num_rows > 0){
                    while($row_func = $res_func->fetch_object()){
                        $selected = ($venda->funcionario_id_funcionario == $row_func->id_funcionario) ? 'selected' : '';
                        print "<option value='{$row_func->id_funcionario}' {$selected}>{$row_func->nome_funcionario}</option>";
                    }
                } else {
                    print "<option>Não há funcionários cadastrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Modelo Vendido</label>
        <select name="modelo_id_modelo" class="form-control" required>
            <option value="">-= Escolha o Modelo =-</option>
            <?php
                $sql_mod = "SELECT mo.id_modelo, mo.nome_modelo, ma.nome_marca 
                            FROM modelo AS mo 
                            INNER JOIN marca AS ma ON mo.marca_id_marca = ma.id_marca 
                            ORDER BY ma.nome_marca, mo.nome_modelo";
                $res_mod = $conn->query($sql_mod);
                
                if($res_mod->num_rows > 0){
                    while($row_mod = $res_mod->fetch_object()){
                        $selected = ($venda->modelo_id_modelo == $row_mod->id_modelo) ? 'selected' : '';
                        print "<option value='{$row_mod->id_modelo}' {$selected}>{$row_mod->nome_marca} - {$row_mod->nome_modelo}</option>";
                    }
                } else {
                    print "<option>Não há modelos cadastrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Valor da Venda (R$)</label>
        <input type="number" step="0.01" name="valor_venda" class="form-control" value="<?php print $venda->valor_venda; ?>" required>
    </div>

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" class="form-control" value="<?php print $venda->data_venda; ?>" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>