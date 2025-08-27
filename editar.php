<?php
include("conexao.php");

$id= $_GET['id'];
$nome= $_POST['nome'];
$autor= $_POST['autor'];
$resenha= $_POST['resenha'];


$sql= "UPDATE livro SET nome= '$nome', autor='$autor', resenha='$resenha' WHERE id=$id";

$resultado= mysqli_query($con, $sql);

header("location:./listar.php");

?>