    <?php
    include("conexao.php");

    if (isset($_POST['submit'])) {
        $produtoID = $_POST['produto'];
        $estabelecimentoID = $_POST['estabelecimento'];
        $preco = $_POST['preco'];

        // Insira o preço na tabela precos
        $sql = "INSERT INTO precos (id_produto, id_estabelecimento, preco) 
                VALUES ('$produtoID', '$estabelecimentoID', '$preco')";

        if (mysqli_query($conexao, $sql)) {
            echo "Preço cadastrado com sucesso.";
        } else {
            echo "ERRO: " . mysqli_error($conexao);
        }
    }

    // Consulta SQL para obter a lista de produtos com os preços mais baixos
    $query = "SELECT produtos.nomeproduto, MIN(precos.preco) AS menor_preco
            FROM produtos
            INNER JOIN precos ON produtos.id = precos.id_produto
            GROUP BY produtos.nomeproduto
            ORDER BY menor_preco";

    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['nomeproduto']} - R$ {$row['menor_preco']}</li>";
        }
        echo "</ul>";
    } else {
        echo "Erro ao consultar ao banco de dados: " . mysqli_error($conexao);
    }
    ?>
