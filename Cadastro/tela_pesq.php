
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href=".\estilos\estilo.css">
</head>
<body>
    <div>
        <a href=".\tela_pesq.php">Pesquisar</a>
        <a href=".\listar.php">Listar</a>
        <a href=".\index.html">Cadastrar</a>
    </div>
    <form action="pesquisar.php" method="POST">
        <table>
            <tr>
                <th>Tela de Pesquisa</th>
            </tr>
            <tr>
                <td><input class= "in" type="text" name="nome" placeholder="Digite o nome do livro"></td>
            </tr>
            <tr>
                <td><input class= "in" type="submit" value="Pesquisar"></td>
            </tr>
        </table>
    </form>
</body>

</html>
