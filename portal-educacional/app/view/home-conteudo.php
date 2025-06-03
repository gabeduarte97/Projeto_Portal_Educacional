<h2>Bem-vindo ao Portal Educacional</h2>
<p>Explore nossos cursos, postagens e recursos para sua aprendizagem.</p>

<h3>Últimas Postagens</h3>

<?php if (isset($_SESSION['usuario'])): ?>
    <p>
        <a href="?pagina=postagem&acao=criar" class="btn" style="background-color: #0066cc; color: white; padding: 8px 12px; border-radius: 4px; text-decoration: none;">
            Nova Postagem
        </a>
    </p>
<?php endif; ?>

<?php if (!empty($postagens)): ?>
    <?php foreach ($postagens as $postagem): ?>
        <div class="postagem">
            <strong><?= htmlspecialchars($postagem['titulo']) ?></strong>
            <p><?= nl2br(htmlspecialchars($postagem['conteudo'])) ?></p>

            <?php if (!empty($postagem['imagem_url'])): ?>
                <img src="<?= htmlspecialchars($postagem['imagem_url']) ?>" alt="Imagem da postagem" style="max-width:100%; margin-top:10px;">
            <?php endif; ?>

            <p>
                <a href="?pagina=postagem&acao=visualizar&id=<?= $postagem['id'] ?>">Ler mais</a>
            </p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma postagem encontrada.</p>
<?php endif; ?>
