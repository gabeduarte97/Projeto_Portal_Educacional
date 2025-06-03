<!-- DEBUG: layout.php ativo -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Portal Educacional</title>
  <link rel="stylesheet" href="/portal-educacional-final/public/css/estilo.css">
  <style>
    nav a {
      padding: 8px 12px;
      border-radius: 4px;
    }
    nav a.ativo {
      background-color: #003366;
      text-decoration: underline;
    }
    .painel-admin {
      background-color: #eef4ff;
      padding: 10px;
      margin: 20px 0;
      border-left: 5px solid #004080;
    }
    .painel-admin a {
      display: inline-block;
      margin-right: 15px;
      padding: 6px 10px;
      background-color: #004080;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }
    .painel-admin a:hover {
      background-color: #0066cc;
    }
  </style>
</head>
<body>
  <header>
    <h1>Portal Educacional</h1>
    <nav>
      <a href="?pagina=site&acao=home" class="<?= ($_GET['pagina'] ?? '') === 'site' && ($_GET['acao'] ?? '') === 'home' ? 'ativo' : '' ?>">Início</a>
      <a href="?pagina=site&acao=sobre" class="<?= ($_GET['pagina'] ?? '') === 'site' && ($_GET['acao'] ?? '') === 'sobre' ? 'ativo' : '' ?>">Sobre</a>
      <a href="?pagina=site&acao=contato" class="<?= ($_GET['pagina'] ?? '') === 'site' && ($_GET['acao'] ?? '') === 'contato' ? 'ativo' : '' ?>">Contato</a>

      <?php if (isset($_SESSION['usuario'])): ?>
        <span style="margin-left: 20px; color: #fff;">
          Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>!
        </span>
        <a href="?pagina=usuario&acao=logout" class="<?= ($_GET['pagina'] ?? '') === 'usuario' && ($_GET['acao'] ?? '') === 'logout' ? 'ativo' : '' ?>">Sair</a>
      <?php else: ?>
        <a href="?pagina=usuario&acao=login" class="<?= ($_GET['pagina'] ?? '') === 'usuario' && ($_GET['acao'] ?? '') === 'login' ? 'ativo' : '' ?>">Entrar</a>
      <?php endif; ?>
    </nav>
    <hr>
  </header>

  <main>
    <?php if (isset($_SESSION['usuario'])): ?>
      <div class="painel-admin">
        <strong>Painel Administrativo:</strong><br><br>
        <a href="?pagina=usuario&acao=listar">Gerenciar Usuários</a>
        <a href="?pagina=postagem&acao=listar">Gerenciar Postagens</a>
        <a href="?pagina=postagem&acao=criar">Nova Postagem</a>
      </div>
    <?php endif; ?>

    <?php include $conteudo; ?>
  </main>

  <footer>
    <hr>
    <p style="text-align:center;">&copy; 2025 - Todos os direitos reservados</p>
  </footer>
</body>
</html>
