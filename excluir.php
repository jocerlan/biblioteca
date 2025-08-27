<?php

include('conexao.php');
$id=$_GET['id'];

$sql= "DELETE FROM livro WHERE id=$id";

$resultado= mysqli_query($con,$sql);

header("Location:./listar.php");
?>