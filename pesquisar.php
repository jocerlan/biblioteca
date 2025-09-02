<?php
include("conexao.php");

$livro = mysqli_real_escape_string($con, $_POST['nome']);
$sql = "SELECT * FROM livro WHERE nome LIKE '%$livro%' OR autor LIKE '%$livro%' ORDER BY nome ASC";
$resultado = mysqli_query($con, $sql);
$total_resultados = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital - Resultados da Pesquisa</title>
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
                        <h1 class="card-title">🔍 Resultados da Pesquisa</h1>
                        <p class="card-subtitle">
                            <?php if($total_resultados > 0): ?>
                                Encontrados <?php echo $total_resultados; ?> resultado(s) para "<?php echo htmlspecialchars($livro); ?>"
                            <?php else: ?>
                                Nenhum resultado encontrado para "<?php echo htmlspecialchars($livro); ?>"
                            <?php endif; ?>
                        </p>
                    </div>

                    <?php if($total_resultados > 0): ?>
                        <div class="books-grid">
                            <?php foreach($resultado as $linha): ?>
                                <div class="book-card slide-in">
                                    <h3 class="book-title"><?php echo htmlspecialchars($linha['nome']); ?></h3>
                                    <p class="book-author">por <?php echo htmlspecialchars($linha['autor']); ?></p>
                                    <p class="book-review"><?php echo htmlspecialchars($linha['resenha']); ?></p>
                                    <div class="book-actions">
                                        <a href="./tela_editar.php?id=<?php echo $linha['id']; ?>" class="btn btn-outline">
                                            ✏️ Editar
                                        </a>
                                        <a href="./excluir.php?id=<?php echo $linha['id']; ?>" 
                                           class="btn btn-danger"
                                           onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                                            🗑️ Excluir
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">🔍</div>
                            <h2 class="empty-state-title">Nenhum livro encontrado</h2>
                            <p class="empty-state-description">
                                Não encontramos nenhum livro com o termo "<?php echo htmlspecialchars($livro); ?>". 
                                Tente pesquisar por outro termo ou verifique a ortografia.
                            </p>
                            <div class="mt-4">
                                <a href="./tela_pesq.php" class="btn btn-primary">
                                    🔍 Nova Pesquisa
                                </a>
                                <a href="./listar.php" class="btn btn-outline">
                                    📚 Ver Todos os Livros
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="text-center mt-4">
                        <a href="./tela_pesq.php" class="btn btn-outline">
                            ← Voltar à Pesquisa
                        </a>
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
        // Adicionar confirmação para exclusão
        document.querySelectorAll('a[href*="excluir.php"]').forEach(link => {
            link.addEventListener('click', function(e) {
                if (!confirm('Tem certeza que deseja excluir este livro? Esta ação não pode ser desfeita.')) {
                    e.preventDefault();
                }
            });
        });

        // Animação de entrada dos cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.book-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>