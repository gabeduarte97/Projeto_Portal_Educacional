<h2>Editar Postagem</h2>

<?php if (isset($erro)): ?>
    <p style="color:red"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="?pagina=postagem&acao=editar&id=<?= htmlspecialchars($postagem['id']) ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($postagem['titulo']) ?>" required><br><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="6" cols="50" required><?= htmlspecialchars($postagem['conteudo']) ?></textarea><br><br>

    <input type="submit" value="Atualizar">
</form>

<p><a href="?pagina=postagem&acao=listar">Voltar à lista</a></p>
