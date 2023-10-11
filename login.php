<?php
$db = new PDO('mysql:host=localhost;dbname=bdsitefael', 'root', '');

session_start(); // Inicie a sessão no início do script

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); // Use FILTER_SANITIZE_STRING para limpar o valor
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); // Use FILTER_SANITIZE_STRING para limpar o valor

    $sql = 'SELECT * FROM usuarios WHERE nome = ? AND senha = ?';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $senha);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        // Salve o nome do usuário na sessão
        $_SESSION['usuarios'] = $user['nome'];

        header('Location: homepromocao.php');
        exit(); // Importante: encerre o script após redirecionar
    } else {
        echo 'Nome de usuário e/ou senha incorretos. <a href="login.html">Clique aqui para voltar</a>';
    }
} else {
    echo 'Preencha todos os campos. <a href="login.html">Clique aqui para voltar</a>';
}
?>
