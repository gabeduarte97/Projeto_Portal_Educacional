<!-- app/view/postagem/listar.php -->

<h2>Postagens</h2>

<p style="text-align: right;">
    <a href="?pagina=postagem&acao=criar" style="padding: 10px 15px; background-color: #0066cc; color: white; text-decoration: none; border-radius: 4px;">+ Nova Postagem</a>
</p>

<?php if (!empty($postagens)): ?>
    <?php foreach ($postagens as $postagem): ?>
        <div class="postagem">
            <h3><?= htmlspecialchars($postagem['titulo']) ?></h3>

            <?php if (!empty($postagem['imagem_url'])): ?>
                <img src="<?= htmlspecialchars($postagem['imagem_url']) ?>" alt="Imagem da postagem" style="max-width: 100%; height: auto; margin: 10px 0;">
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars(substr($postagem['conteudo'], 0, 200))) ?>...</p>
            <p><small>Publicado por <strong><?= htmlspecialchars($postagem['autor_nome'] ?? '') ?></strong> em <?= date('d/m/Y', strtotime($postagem['data_publicacao'])) ?></small></p>

            <p>
                <a href="?pagina=postagem&acao=visualizar&id=<?= $postagem['id'] ?>">Ver</a> |
                <a href="?pagina=postagem&acao=editar&id=<?= $postagem['id'] ?>">Editar</a> |
                <a href="?pagina=postagem&acao=excluir&id=<?= $postagem['id'] ?>">Excluir</a>
            </p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma postagem cadastrada.</p>
<?php endif; ?>
