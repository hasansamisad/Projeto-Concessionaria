<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $data_venda = $_POST['data_venda'];
            $valor_venda = $_POST['valor_venda'];
            $cliente_id = $_POST['cliente_id_cliente'];
            $funcionario_id = $_POST['funcionario_id_funcionario'];
            $modelo_id = $_POST['modelo_id_modelo'];

            $sql = "INSERT INTO venda 
                    (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo) 
                    VALUES 
                    ('{$data_venda}', {$valor_venda}, {$cliente_id}, {$funcionario_id}, {$modelo_id})";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda registrada com sucesso!');</script>";
            }else{
                print "<script>alert('Não foi possível registrar a venda.');</script>";
            }
            print "<script>location.href='?page=listar-venda';</script>"; 
            break;
        
        case 'editar':
            $id_venda = $_POST['id_venda']; 
            $data_venda = $_POST['data_venda'];
            $valor_venda = $_POST['valor_venda'];
            $cliente_id = $_POST['cliente_id_cliente'];
            $funcionario_id = $_POST['funcionario_id_funcionario'];
            $modelo_id = $_POST['modelo_id_modelo'];
            $sql = "UPDATE venda SET 
                    data_venda='{$data_venda}', 
                    valor_venda={$valor_venda}, 
                    cliente_id_cliente={$cliente_id}, 
                    funcionario_id_funcionario={$funcionario_id}, 
                    modelo_id_modelo={$modelo_id} 
                    WHERE id_venda={$id_venda}";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda editada com sucesso!');</script>";
            }else{
                print "<script>alert('Não foi possível editar a venda.');</script>";
            }

            print "<script>location.href='?page=listar-venda';</script>";
            break;


        case 'excluir':
            $id_venda = $_REQUEST['id_venda'];
            $sql = "DELETE FROM venda WHERE id_venda={$id_venda}";
            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda excluída com sucesso!');</script>";
            }else{
                print "<script>alert('Não foi possível excluir a venda.');</script>";
            }
            print "<script>location.href='?page=listar-venda';</script>";
            break;
    }
?>