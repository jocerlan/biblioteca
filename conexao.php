<?php
$servidor="172.17.0.4";
$usuario="root";
$senha="25106566@#Ja";
$banco="biblioteca";

$con= mysqli_connect($servidor,$usuario,$senha,$banco);

if (!$con) {
    echo "Falha na conexão!";
}else{
    // echo "Conexão realizada com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
    <link rel="stylesheet" href=".\estilos\estilo1.css">
</head>
<body>
    <div>
        <a class="conexao" href=".\tela_pesq.php">Pesquisar</a>
        <a class="conexao" href=".\listar.php">Listar</a>
        <a class="conexao" href=".\index.html">Cadastrar</a>
    </div>
</body>
</html>

