<?php
$bdhost = "localhost";
$bdusername = "root";
$bdpassword = "";
$bdname = "bdsitefael";

$conexao = mysqli_connect($bdhost, $bdusername, $bdpassword, $bdname);

if (!$conexao) {
    die("A conexão não foi bem-sucedida: " . mysqli_connect_error());
}
?>