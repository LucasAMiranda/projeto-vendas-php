<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

?>
