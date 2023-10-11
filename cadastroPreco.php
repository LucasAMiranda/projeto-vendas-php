<?php
include("cadastroProduto.php");

// Verifica se o formulário de inserção de produtos foi enviado
if (isset($_POST['submit'])) {
    $nomeproduto = $_POST['nomeproduto'];
    $marca = $_POST['marca'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO produtos (nomeproduto, marca, quantidade, valor) 
            VALUES ('$nomeproduto', '$marca', '$quantidade', '$valor')";

    if (mysqli_query($conexao, $sql)) {
        echo "Produto cadastrado com sucesso.";
    } else {
        echo "ERRO: " . mysqli_error($conexao);
    }
}

// Consulta SQL para obter a lista atualizada de produtos
$query = "SELECT id, nomeproduto FROM produtos";
$result = mysqli_query($conexao, $query);
$productOptions = '';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productOptions .= "<option value='" . $row['id'] . "'>" . $row['nomeproduto'] . "</option>";
    }
} else {
    echo "Erro ao consultar o banco de dados: " . mysqli_error($conexao);
}

include("cadastroEstabelecimento.php");

$query = "SELECT nomefantasia FROM cadastro";
$result = mysqli_query($conexao, $query);
$estabelecimentoOptions = '';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $estabelecimentoOptions .= "<option value='" . "'>" . $row['nomefantasia'] . "</option>";
    }
} else {
    echo "Erro na consulta ao banco de dados: " . mysqli_error($conexao);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Cadastro de Preços</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>CADASTRE O PREÇO DE UM PRODUTO EM UM ESTABELECIMENTO</h1>

    <form action="produtosPromocionais.php" method="POST">
        <label for="produto">Escolha o Produto:</label>
        <select name="produto">
            <?php echo $productOptions; ?>
        </select>
    
        <label for="estabelecimento">Escolha o estabelecimento:</label>
        <select name="estabelecimento">
          <?php echo $estabelecimentoOptions; ?>
        </select>

        <label for="preco">Preço R$</label>
        <input type="number" name="preco" id="preco">

        <button id="botaoform" type="submit" name="submit">
            ENVIAR
        </button>

        <a href="Homepromocao.php"><button class="sair">Sair</button></a>

    </form>
</body>
</html>
