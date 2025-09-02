# 📚 Biblioteca Digital

Uma aplicação web moderna para gerenciar sua biblioteca pessoal de livros com resenhas.

## ✨ Características

- **Interface Moderna**: Design responsivo e intuitivo com CSS Grid/Flexbox
- **Sistema de Design**: Paleta de cores consistente e tipografia moderna
- **Responsividade**: Funciona perfeitamente em desktop, tablet e mobile
- **Animações Suaves**: Transições e efeitos visuais elegantes
- **Validação em Tempo Real**: Feedback visual imediato nos formulários
- **Notificações**: Alertas de sucesso e erro para melhor UX
- **Segurança**: Sanitização de dados e prepared statements

## 🚀 Tecnologias Utilizadas

### Frontend
- **HTML5**: Estrutura semântica moderna
- **CSS3**: 
  - CSS Grid e Flexbox para layout
  - CSS Custom Properties (variáveis)
  - Animações e transições
  - Design responsivo com media queries
- **JavaScript**: 
  - Validação de formulários
  - Animações interativas
  - Intersection Observer API
  - Manipulação do DOM

### Backend
- **PHP**: Lógica de servidor
- **MySQL**: Banco de dados
- **MySQLi**: Conexão segura com o banco

### Design System
- **Fonte**: Inter (Google Fonts)
- **Cores**: Paleta moderna com azul como cor primária
- **Componentes**: Botões, cards, formulários, alertas
- **Ícones**: Emojis para melhor identificação visual

## 📱 Funcionalidades

### 1. Cadastrar Livros
- Formulário intuitivo com validação em tempo real
- Campos: Título, Autor, Resenha
- Feedback visual de loading durante o salvamento
- Notificações de sucesso/erro

### 2. Listar Livros
- Grid responsivo de cards
- Animações de entrada escalonadas
- Contador de livros cadastrados
- Ações de editar e excluir
- Estado vazio com call-to-action

### 3. Pesquisar Livros
- Busca por título ou autor
- Resultados em tempo real
- Estado vazio quando não há resultados
- Navegação fácil entre páginas

### 4. Editar Livros
- Formulário pré-preenchido
- Validação em tempo real
- Botões de salvar e cancelar
- Feedback visual de loading

### 5. Excluir Livros
- Confirmação antes da exclusão
- Feedback visual
- Redirecionamento automático

## 🎨 Design System

### Cores
```css
--primary-color: #2563eb    /* Azul principal */
--secondary-color: #64748b  /* Cinza secundário */
--success-color: #10b981    /* Verde sucesso */
--danger-color: #ef4444     /* Vermelho erro */
--warning-color: #f59e0b    /* Amarelo aviso */
```

### Tipografia
- **Fonte Principal**: Inter (300, 400, 500, 600, 700)
- **Tamanhos**: xs, sm, base, lg, xl, 2xl, 3xl, 4xl
- **Hierarquia**: Títulos, subtítulos, corpo, legendas

### Componentes
- **Botões**: Primary, Secondary, Outline, Success, Danger
- **Cards**: Com sombras e hover effects
- **Formulários**: Inputs e textareas com validação visual
- **Alertas**: Success, Danger, Warning, Info
- **Navegação**: Header fixo com logo e menu

## 📐 Responsividade

### Breakpoints
- **Mobile**: < 480px
- **Tablet**: 480px - 768px
- **Desktop**: > 768px

### Adaptações
- **Mobile**: 
  - Menu em coluna
  - Cards em coluna única
  - Botões em coluna
  - Padding reduzido
- **Tablet**: 
  - Grid de 2 colunas
  - Menu horizontal
- **Desktop**: 
  - Grid de 3+ colunas
  - Layout completo

## 🔧 Instalação

1. **Clone o repositório**
```bash
git clone [url-do-repositorio]
cd biblioteca
```

2. **Configure o banco de dados**
- Crie um banco MySQL chamado `biblioteca`
- Execute o script SQL para criar a tabela `livro`:
```sql
CREATE TABLE livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    resenha TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. **Configure a conexão**
- Edite o arquivo `conexao.php` com suas credenciais do banco

4. **Acesse a aplicação**
- Abra `index.html` no navegador
- Ou configure um servidor web local

## 🛡️ Segurança

- **Sanitização**: Todos os inputs são sanitizados com `mysqli_real_escape_string`
- **Prepared Statements**: Usado na exclusão de livros
- **Validação**: Verificação de dados no frontend e backend
- **XSS Protection**: Uso de `htmlspecialchars` na exibição

## 🎯 Melhorias Implementadas

### UX/UI
- ✅ Design moderno e profissional
- ✅ Responsividade completa
- ✅ Animações suaves
- ✅ Feedback visual em tempo real
- ✅ Notificações de sucesso/erro
- ✅ Estados vazios informativos
- ✅ Loading states
- ✅ Confirmações de ações destrutivas

### Performance
- ✅ CSS otimizado com variáveis
- ✅ JavaScript eficiente
- ✅ Imagens otimizadas (emojis)
- ✅ Carregamento de fontes otimizado

### Acessibilidade
- ✅ Semântica HTML correta
- ✅ Labels associados aos inputs
- ✅ Focus visible
- ✅ Contraste adequado
- ✅ Suporte a reduced motion

### Código
- ✅ Estrutura organizada
- ✅ Comentários explicativos
- ✅ Separação de responsabilidades
- ✅ Reutilização de componentes

## 📄 Estrutura de Arquivos

```
biblioteca/
├── index.html              # Página principal (cadastro)
├── listar.php              # Lista de livros
├── tela_pesq.php           # Página de pesquisa
├── pesquisar.php           # Resultados da pesquisa
├── tela_editar.php         # Página de edição
├── cadastrar.php           # Processamento do cadastro
├── editar.php              # Processamento da edição
├── excluir.php             # Processamento da exclusão
├── conexao.php             # Conexão com banco de dados
├── estilos/
│   └── main.css            # CSS principal com design system
└── README.md               # Documentação
```

## 🚀 Próximos Passos

- [ ] Implementar autenticação de usuários
- [ ] Adicionar sistema de categorias
- [ ] Implementar busca avançada
- [ ] Adicionar sistema de avaliações
- [ ] Implementar exportação de dados
- [ ] Adicionar modo escuro
- [ ] Implementar PWA (Progressive Web App)

## 📞 Suporte

Para dúvidas ou sugestões, entre em contato através dos issues do repositório.

---

**Desenvolvido com ❤️ para organizar sua biblioteca pessoal**
