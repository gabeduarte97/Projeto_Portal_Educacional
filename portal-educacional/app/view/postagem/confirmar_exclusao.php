<h2>Confirmar Exclusão</h2>

<p>Tem certeza que deseja excluir a postagem <strong><?= htmlspecialchars($postagem['titulo']) ?></strong>?</p>

<form method="POST" action="?pagina=postagem&acao=excluir">
    <input type="hidden" name="id" value="<?= htmlspecialchars($postagem['id']) ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <button type="submit">Sim, excluir</button>
    <a href="?pagina=postagem&acao=listar">Cancelar</a>
</form>

