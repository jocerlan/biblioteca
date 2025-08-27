<?php
include("conexao.php");

$id= $_GET['id'];
$sql= "SELECT nome, autor, resenha FROM livro WHERE id=$id";

$resultado= mysqli_query($con,$sql);

foreach($resultado as $linha){
    $nome=$linha['nome'];
    $autor=$linha['autor'];
    $resenha=$linha['resenha'];
}

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href=".\estilos\edita.css">
</head>
<body>
    <form action="editar.php?id=<?php echo $id;?>" method="POST">
        <table>
            <tr>
                <th>Tela de Edição</th>
            </tr>
            <tr>
                <td><input class= "in" type="text" name="nome" value="<?php echo $nome;?>"></td>
            </tr>
            <tr>
                <td><input class= "in" type="text" name="autor" value="<?php echo $autor;?>"></td>
            </tr>
            <tr>
                <td><input class= "in" type="text" name="resenha" value="<?php echo $resenha;?>"></td>
            </tr>
            <tr>
                <td><input class= "in" type="submit" value="Salvar"></td>
            </tr>
        </table>
    </form>
</body>
</html>