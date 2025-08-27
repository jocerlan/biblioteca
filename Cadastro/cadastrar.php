<?php
include ("conexao.php");

$nome=$_POST['nome'];
$autor=$_POST['autor'];
$resenha=$_POST['resenha'];

$sql= "INSERT INTO livro(nome,autor,resenha) VALUES ('$nome','$autor','$resenha')";

$executa = mysqli_query($con,$sql);
header("Location:./listar.php");
?>