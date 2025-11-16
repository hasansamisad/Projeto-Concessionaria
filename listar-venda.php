<h1>Listar Venda</h1>
<?php
    // SQL com múltiplos JOINs para buscar os nomes em vez dos IDs
    $sql = "SELECT 
                v.id_venda, 
                v.data_venda, 
                v.valor_venda,
                c.nome_cliente,
                f.nome_funcionario AS nome_vendedor,
                mo.nome_modelo,
                ma.nome_marca
            FROM 
                venda AS v
            INNER JOIN 
                cliente AS c ON v.cliente_id_cliente = c.id_cliente
            INNER JOIN 
                funcionario AS f ON v.funcionario_id_funcionario = f.id_funcionario
            INNER JOIN 
                modelo AS mo ON v.modelo_id_modelo = mo.id_modelo
            INNER JOIN 
                marca AS ma ON mo.marca_id_marca = ma.id_marca
            ORDER BY 
                v.data_venda DESC"; // Ordena da venda mais recente para a mais antiga

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Data</th>";
        print "<th>Cliente</th>";
        print "<th>Vendedor</th>";
        print "<th>Modelo (Marca)</th>";
        print "<th>Valor (R$)</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>{$row->id_venda}</td>";
            print "<td>{$row->data_venda}</td>";
            print "<td>{$row->nome_cliente}</td>";
            print "<td>{$row->nome_vendedor}</td>";
            // Combina Marca e Modelo para exibição
            print "<td>{$row->nome_marca} - {$row->nome_modelo}</td>"; 
            // Formata o valor como moeda
            print "<td>R$ " . number_format($row->valor_venda, 2, ',', '.') . "</td>";
            print "<td> 
                    <button class='btn btn-success' onclick=\"location.href='?page=editar-venda&id_venda={$row->id_venda}';\">Editar</button>

                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir esta venda?')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}else{false;}\">Excluir</button>
                    </td>";
            print "</tr>";
        }   
        print "</table>";
    }else{
        print "<p class='alert alert-info'>Nenhuma venda registrada.</p>";
    }
?>