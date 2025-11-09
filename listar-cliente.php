<h1>Listar Cliente</h1>

<?php
   require_once 'config.php';

    $sql = "SELECT * FROM cliente";
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
                    <td>".$row->id_cliente."</td>
                    <td>".$row->nome_cliente."</td>
                    <td>".$row->cpf_cliente."</td>
                    <td>".$row->telefone_cliente."</td>
                    <td>".$row->email_cliente."</td>
                    <td>".$row->endereco_cliente."</td>
                    <td>".$row->dt_nasc_cliente."</td>
                    <td>
                        <button class='btn btn-primary' onclick=\"location.href='index.php?page=editar-cliente&id_cliente=".$row->id_cliente."';\">Editar</button> 
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='index.php?page=salvar-cliente&acao=excluir&id_cliente=".$row->id_cliente."';}else{false;}\">Excluir</button>
                    </td>
                  </tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Nenhum cliente cadastrado!</p>";
    }

    $conn->close();