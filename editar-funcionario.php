<h1>Editar Funcionário</h1>

<?php
   $sql = "SELECT * FROM funcionario WHERE id_funcionario =".$_REQUEST["id_funcionario"];
   $res = $conn->query($sql);
   $row = $res->fetch_object();

?>

<form action="?page=salvar-funcionario" method = "POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_funcionario" value="<?php print $row->id_funcionario; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome_funcionario" value="<?php print $row->nome_funcionario; ?>">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email_funcionario" value="<?php print $row->email_funcionario; ?>">
    </div>
     <div class="mb-3">
        <label>CPF</label>
        <input type="text" class="form-control" name="cpf_funcionario" value="<?php print $row->cpf_funcionario; ?>">
    </div>
     <div class="mb-3">
        <label>Telefone</label>
        <input type="text" class="form-control" name="telefone_funcionario" value="<?php print $row->telefone_funcionario; ?>">
    </div>
     <div class="mb-3">
        <label>Endereço</label>
        <input type="text" class="form-control" name="endereco_funcionario" value="<?php print $row->endereco_funcionario; ?>">
    </div>
     <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="data_nasc_funcionario" value="<?php print $row->dt_nasc_funcionario; ?>">
    </div>
    <div class="mb-3">
        <button type ="submit" class = "btn-btn-primary">Enviar</button>
    </div>
</form>