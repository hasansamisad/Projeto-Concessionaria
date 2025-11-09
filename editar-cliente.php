<h1>Editar Cliente</h1>

<?php
   $sql = "SELECT * FROM cliente WHERE id_cliente=".$_REQUEST["id_cliente"];
   $res = $conn->query($sql);
   $row = $res->fetch_object();

?>

<form action="?page=salvar-cliente" method = "POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print $row->id_cliente; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome_cliente" value="<?php print $row->nome_cliente; ?>">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email_cliente" value="<?php print $row->email_cliente; ?>">
    </div>
     <div class="mb-3">
        <label>CPF</label>
        <input type="text" class="form-control" name="cpf_cliente" value="<?php print $row->cpf_cliente; ?>">
    </div>
     <div class="mb-3">
        <label>Telefone</label>
        <input type="text" class="form-control" name="telefone_cliente" value="<?php print $row->telefone_cliente; ?>">
    </div>
     <div class="mb-3">
        <label>Endereço</label>
        <input type="text" class="form-control" name="endereco_cliente" value="<?php print $row->endereco_cliente; ?>">
    </div>
     <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="data_nasc_cliente" value="<?php print $row->dt_nasc_cliente; ?>">
    </div>
    <div class="mb-3">
        <button type ="submit" class = "btn-btn-primary">Enviar</button>
    </div>
</form>