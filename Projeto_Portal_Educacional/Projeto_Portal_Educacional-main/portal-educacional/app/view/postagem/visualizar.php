<h2><?= htmlspecialchars($postagem['titulo']) ?></h2>

<?php if (!empty($postagem['imagem_url'])): ?>
    <img src="<?= htmlspecialchars($postagem['imagem_url']) ?>" alt="Imagem da postagem" style="max-width:100%; height:auto; margin-bottom: 20px;">
<?php endif; ?>

<p><strong>Publicado por:</strong> <?= htmlspecialchars($postagem['autor_nome'] ?? '') ?> | 
   <strong>Data:</strong> <?= date('d/m/Y', strtotime($postagem['data_publicacao'])) ?></p>

<div>
    <?= nl2br(htmlspecialchars($postagem['conteudo'])) ?>
</div>

<hr>

<h3>Comentários</h3>

<?php if (!empty($comentarios)): ?>
    <?php foreach ($comentarios as $comentario): ?>
        <div style="margin-bottom: 15px; padding: 10px; border-left: 3px solid #ccc;">
            <p><strong><?= htmlspecialchars($comentario['autor']) ?></strong> comentou em <?= date('d/m/Y H:i', strtotime($comentario['data_publicacao'])) ?>:</p>
            <p><?= nl2br(htmlspecialchars($comentario['conteudo'])) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Não há comentários ainda.</p>
<?php endif; ?>

<hr>

<?php if (isset($_SESSION['usuario'])): ?>
    <h3>Adicionar Comentário</h3>
    <form method="POST" action="?pagina=comentario&acao=criar">
        <input type="hidden" name="csrf_token" value="<?= $token ?>">
        <input type="hidden" name="postagem_id" value="<?= $postagem['id'] ?>">
        <textarea name="conteudo" rows="4" style="width: 100%;" placeholder="Digite seu comentário" required></textarea><br><br>
        <button type="submit">Comentar</button>
    </form>
<?php else: ?>
    <p><a href="?pagina=usuario&acao=login">Faça login</a> para comentar nesta postagem.</p>
<?php endif; ?>
