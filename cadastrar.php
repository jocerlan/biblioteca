<?php
ob_start(); // Inicia o buffer de saída
include ("conexao.php");

$nome=$_POST['nome'];
$autor=$_POST['autor'];
$resenha=$_POST['resenha'];

$sql= "INSERT INTO livro(nome,autor,resenha) VALUES ('$nome','$autor','$resenha')";

$executa = mysqli_query($con,$sql);
ob_end_clean(); // Limpa o buffer de saída
header("Location:./listar.php");
exit(); // Garante que o script pare após o redirecionamento
?>