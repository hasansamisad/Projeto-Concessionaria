<h1>Listar Funcionário</h1>

<?php
   require_once 'config.php';

    $sql = "SELECT * FROM funcionario";
    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Data de Nascimento</th>
                </tr>";
        while($row = $res->fetch_object()){
            print "<tr>
                    <td>".$row->id_funcionario."</td>
                    <td>".$row->nome_funcionario."</td>
                    <td>".$row->cpf_funcionario."</td>
                    <td>".$row->telefone_funcionario."</td>
                    <td>".$row->email_funcionario."</td>
                    <td>".$row->endereco_funcionario."</td>
                    <td>".$row->dt_nasc_funcionario."</td>
                    <td>
                        <button class='btn btn-primary' onclick=\"location.href='index.php?page=editar-funcionario&id_funcionario=".$row->id_funcionario."';\">Editar</button> 
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='index.php?page=salvar-funcionario&acao=excluir&id_funcionario=".$row->id_funcionario."';}else{false;}\">Excluir</button>
                    </td>
                  </tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Nenhum funcionário cadastrado!</p>";
    }

    $conn->close();