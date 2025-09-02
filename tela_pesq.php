
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital - Pesquisar Livros</title>
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
                        <li><a href=".\tela_pesq.php" class="nav-link active">Pesquisar</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <div class="container">
                <div class="card fade-in">
                    <div class="card-header text-center">
                        <h1 class="card-title">🔍 Pesquisar Livros</h1>
                        <p class="card-subtitle">Encontre rapidamente um livro na sua biblioteca</p>
                    </div>

                    <form action="pesquisar.php" method="POST" class="form">
                        <div class="form-group">
                            <label for="nome" class="form-label">Título do Livro</label>
                            <input 
                                type="text" 
                                id="nome"
                                name="nome" 
                                class="form-input" 
                                placeholder="Digite o título do livro que deseja encontrar..."
                                required
                                autocomplete="off"
                                autofocus
                            >
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                <span>🔍</span>
                                Pesquisar
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted">Ou <a href="./listar.php" class="nav-link">veja todos os livros</a></p>
                    </div>
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
            submitBtn.innerHTML = '<span class="spinner"></span> Pesquisando...';
            submitBtn.disabled = true;
        });

        // Auto-focus no campo de pesquisa
        document.getElementById('nome').focus();

        // Sugestões de pesquisa em tempo real (opcional)
        const searchInput = document.getElementById('nome');
        searchInput.addEventListener('input', function() {
            if (this.value.length > 2) {
                this.style.borderColor = 'var(--success-color)';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });
    </script>
</body>
</html>