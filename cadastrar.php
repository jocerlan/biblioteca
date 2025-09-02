<?php
ob_start(); // Inicia o buffer de saída
include ("conexao.php");

// Verificar se os dados foram enviados
if(isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['resenha'])) {
    // Sanitizar e validar os dados
    $nome = mysqli_real_escape_string($con, trim($_POST['nome']));
    $autor = mysqli_real_escape_string($con, trim($_POST['autor']));
    $resenha = mysqli_real_escape_string($con, trim($_POST['resenha']));
    
    // Verificar se os campos não estão vazios
    if(!empty($nome) && !empty($autor) && !empty($resenha)) {
        $sql = "INSERT INTO livro(nome, autor, resenha) VALUES ('$nome', '$autor', '$resenha')";
        $executa = mysqli_query($con, $sql);
        
        if($executa) {
            ob_end_clean(); // Limpa o buffer de saída
            header("Location: ./listar.php?sucesso=1");
            exit();
        } else {
            ob_end_clean();
            header("Location: ./index.html?erro=1");
            exit();
        }
    } else {
        ob_end_clean();
        header("Location: ./index.html?erro=2");
        exit();
    }
} else {
    ob_end_clean();
    header("Location: ./index.html?erro=3");
    exit();
}
?>