<?php
include("conexao.php");

$livro=$_POST['nome'];

$sql= "SELECT * FROM livro WHERE nome LIKE '%$livro%' ";

$resultado= mysqli_query($con,$sql);

/*foreach($resultado as $linha){
    echo "<br> ID: ".$linha['id']."<br>";
    echo "<br> Nome: ".$linha['nome']."<br>";
    echo "<br> Autor: ".$linha['autor']."<br>";
    echo "<br> Resenha: ".$linha['resenha']."<br>";
    echo "<br> -------------------- <br>";
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" href=".\estilos\listar.css">
</head>
<body>
        <?php foreach($resultado as $linha){ ?>
            <section>
            <ul>
                <li class="conteiner"><?php echo $linha['nome'];?></li>
                <li><?php echo $linha['autor'];?></li>
                <li><?php echo $linha['resenha'];?></li>
                <li><?php echo "<a href=./excluir.php?id=".$linha['id'].">Excluir</a>"?></li>
                <li><?php echo "<a href=./tela_editar.php?id=".$linha['id'].">Editar</a>"?></li>
            </ul>
            </section>
        <?php }?>
</body>
</html>