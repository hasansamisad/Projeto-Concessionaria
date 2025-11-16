<?php
    // Assume-se que a variável $conn (conexão com o MySQL) já está disponível/incluída.

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // 1. Coleta o nome da marca do formulário
            $nome = $_POST['nome_marca'];

            // 2. Monta e executa o SQL de inserção
            // Tabela: marca (apenas nome_marca)
            $sql = "INSERT INTO marca (nome_marca) VALUES ('{$nome}')";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Marca cadastrada com sucesso!');</script>";
                // Redireciona para a lista de Marcas
                print "<script>location.href='?page=listar-marca';</script>"; 
            }else{
                print "<script>alert('Não foi possível cadastrar a marca.');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;
        
        case 'editar':
            // 1. Coleta o ID e o novo nome da marca do formulário
            $id_marca = $_POST['id_marca']; // Vem do campo hidden em editar-marca.php
            $nome = $_POST['nome_marca'];

            // 2. Monta e executa o SQL de atualização
            $sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca={$id_marca}";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Marca editada com sucesso!');</script>";
                // Redireciona para a lista de Marcas
                print "<script>location.href='?page=listar-marca';</script>";
            }else{
                print "<script>alert('Não foi possível editar a marca.');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;

        case 'excluir':
            // 1. Coleta o ID da marca via URL
            $id_marca = $_REQUEST['id_marca'];

            // 2. Monta e executa o SQL de exclusão
            $sql = "DELETE FROM marca WHERE id_marca={$id_marca}";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Marca excluída com sucesso!');</script>";
                // Redireciona para a lista de Marcas
                print "<script>location.href='?page=listar-marca';</script>";
            }else{
                // Se a exclusão falhar, provavelmente é devido a modelos ainda vinculados (Foreign Key Constraint)
                print "<script>alert('Não foi possível excluir. Verifique se existem Modelos cadastrados para esta marca.');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;
    }
?>