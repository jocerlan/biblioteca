<?php
ob_start(); // Inicia o buffer de saída
include("conexao.php");

// Verifica se os dados necessários foram recebidos
if(isset($_GET['id']) && isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['resenha'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $autor = mysqli_real_escape_string($con, $_POST['autor']);
    $resenha = mysqli_real_escape_string($con, $_POST['resenha']);

    $sql = "UPDATE livro SET nome='$nome', autor='$autor', resenha='$resenha' WHERE id=$id";
    $resultado = mysqli_query($con, $sql);

    if($resultado) {
        ob_end_clean(); // Limpa o buffer de saída
        header("Location: ./listar.php");
        exit(); // Garante que o script pare após o redirecionamento
    } else {
        ob_end_clean();
        header("Location: ./listar.php?erro=1");
        exit();
    }
} else {
    ob_end_clean();
    header("Location: ./listar.php?erro=2");
    exit();
}
?>