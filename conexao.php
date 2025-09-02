<?php
$servidor="172.17.0.4";
$usuario="root";
$senha="25106566@#Ja";
$banco="biblioteca";

$con = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$con) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Definir charset para UTF-8
mysqli_set_charset($con, "utf8");
?>

