<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO usuarios (nome, sobrenome, telefone, email, senha) 
                VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$senha')";

        if (mysqli_query($conexao, $sql)) {
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "ERRO " . mysqli_error($conexao);
        }
    }
}
?>