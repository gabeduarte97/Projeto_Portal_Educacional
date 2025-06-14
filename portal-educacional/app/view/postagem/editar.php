<h2>Editar Postagem</h2>

<?php if (isset($erro)): ?>
    <p style="color:red"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="?pagina=postagem&acao=editar">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($postagem['id']) ?>">

    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($postagem['titulo']) ?>" required><br><br>

    <label>URL da Imagem:</label><br>
    <input type="text" name="imagem_url" value="<?= htmlspecialchars($postagem['imagem_url'] ?? '') ?>"><br><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="6" cols="50" required><?= htmlspecialchars($postagem['conteudo']) ?></textarea><br><br>

    <input type="submit" value="Atualizar">
</form>

<p><a href="?pagina=postagem&acao=listar">Voltar à lista</a></p>
