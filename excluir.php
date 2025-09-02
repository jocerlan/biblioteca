<?php
ob_start(); // Inicia o buffer de saída
include('conexao.php');

// Verifica se o ID foi fornecido
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql = "DELETE FROM livro WHERE id = ?";
    
    // Usa prepared statement para maior segurança
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $resultado = mysqli_stmt_execute($stmt);
    
    if($resultado) {
        ob_end_clean();
        header("Location: ./listar.php");
        exit();
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