<?php

    switch($_REQUEST["acao"]){
        case "cadastrar":
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $endereco = $_POST["endereco"];
            $data_nasc = $_POST["data_nasc"];

            $sql = "INSERT INTO funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario, endereco_funcionario, dt_nasc_funcionario) VALUES ('{$nome}', '{$cpf}', '{$email}', '{$telefone}', '{$endereco}', '{$data_nasc}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Funcionário cadastrado com sucesso');</script>";
                print "<script>location.href='index.php?page=listar-funcionario';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar o funcionário');</script>";
                print "<script>location.href='index.php?page=listar-funcionario';</script>";
            }
            break;

        case "editar":
            $id_funcionario = $_POST["id_funcionario"];
            $nome = $_POST["nome_funcionario"]; 
            $telefone = $_POST["telefone_funcionario"];
            $email = $_POST["email_funcionario"];
            $cpf = $_POST["cpf_funcionario"];
            $endereco = $_POST["endereco_funcionario"];
            $data_nasc = $_POST["data_nasc_funcionario"];
            
            $sql = "UPDATE funcionario SET nome_funcionario='{$nome}', telefone_funcionario='{$telefone}', email_funcionario='{$email}', cpf_funcionario='{$cpf}', endereco_funcionario='{$endereco}', dt_nasc_funcionario ='{$data_nasc}' WHERE id_funcionario=".$_REQUEST["id_funcionario"];

            $res = $conn->query($sql);
            if($res==true){
                print "<script>alert('Funcionário editado com sucesso');</script>";
                print "<script>location.href='index.php?page=listar-funcionario';</script>";
            }
            else{
                print "<script>alert('Não foi possível editar o funcionário');</script>";
            }
            break;
            
            case "excluir":
                $sql = "DELETE FROM funcionario WHERE id_funcionario=".$_REQUEST["id_funcionario"];
                $res = $conn->query($sql);
                if($res==true){
                    print "<script>alert('Funcionário excluído com sucesso');</script>";
                    print "<script>location.href='index.php?page=listar-funcionario';</script>";
                }else{
                    print "<script>alert('Não foi possível excluir o funcionário');</script>";
                    print "<script>location.href='index.php?page=listar-funcionario';</script>";
                }
                break;

}