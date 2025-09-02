<?php
include("conexao.php");

$id = mysqli_real_escape_string($con, $_GET['id']);
$sql = "SELECT nome, autor, resenha FROM livro WHERE id=$id";
$resultado = mysqli_query($con, $sql);

if(mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    $nome = $linha['nome'];
    $autor = $linha['autor'];
    $resenha = $linha['resenha'];
} else {
    header("Location: ./listar.php?erro=3");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital - Editar Livro</title>
    <link rel="stylesheet" href=".\estilos\main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-layout">
        <!-- Header -->
        <header class="header">
            <div class="container">
                <nav class="nav">
                    <a href=".\index.html" class="logo">Biblioteca Digital</a>
                    <ul class="nav-links">
                        <li><a href=".\index.html" class="nav-link">Cadastrar</a></li>
                        <li><a href=".\listar.php" class="nav-link">Listar Livros</a></li>
                        <li><a href=".\tela_pesq.php" class="nav-link">Pesquisar</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <div class="container">
                <div class="card fade-in">
                    <div class="card-header text-center">
                        <h1 class="card-title">✏️ Editar Livro</h1>
                        <p class="card-subtitle">Atualize as informações do seu livro</p>
                    </div>

                    <form action="editar.php?id=<?php echo $id; ?>" method="POST" class="form">
                        <div class="form-group">
                            <label for="nome" class="form-label">Título do Livro</label>
                            <input 
                                type="text" 
                                id="nome"
                                name="nome" 
                                class="form-input" 
                                value="<?php echo htmlspecialchars($nome); ?>"
                                required
                                autocomplete="off"
                            >
                        </div>

                        <div class="form-group">
                            <label for="autor" class="form-label">Autor</label>
                            <input 
                                type="text" 
                                id="autor"
                                name="autor" 
                                class="form-input" 
                                value="<?php echo htmlspecialchars($autor); ?>"
                                required
                                autocomplete="off"
                            >
                        </div>

                        <div class="form-group">
                            <label for="resenha" class="form-label">Sua Resenha</label>
                            <textarea 
                                id="resenha"
                                name="resenha" 
                                class="form-textarea" 
                                rows="6"
                                required
                            ><?php echo htmlspecialchars($resenha); ?></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                <span>💾</span>
                                Salvar Alterações
                            </button>
                            <a href="./listar.php" class="btn btn-outline">
                                ← Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container text-center">
                <p class="text-muted">© 2024 Biblioteca Digital - Organize seus livros favoritos</p>
            </div>
        </footer>
    </div>

    <script>
        // Adicionar animação de loading no submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="spinner"></span> Salvando...';
            submitBtn.disabled = true;
        });

        // Validação em tempo real
        const inputs = document.querySelectorAll('.form-input, .form-textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = 'var(--danger-color)';
                } else {
                    this.style.borderColor = 'var(--success-color)';
                }
            });

            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--primary-color)';
            });
        });

        // Auto-focus no primeiro campo
        document.getElementById('nome').focus();
    </script>
</body>
</html>