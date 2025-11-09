<h1>Cadastrar Cliente</h1>

<form action = "?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome">
    </div>
     <div class="mb-3">
        <label>CPF</label>
        <input type="text" class="form-control" name="cpf">
    </div>
     <div class="mb-3">
        <label>Telefone</label>
        <input type="text" class="form-control" name="telefone">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" class="form-control" name="email">
    </div>
     <div class="mb-3">
        <label>Endereco</label>
        <input type="text" class="form-control" name="endereco">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" class="form-control" name="senha" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="data_nasc">
    </div>
    <div class="mb-3">
        <button type ="submit" class = "btn-btn-primary">Enviar</button>
    </div>
</form>