<!-- app/view/usuario/confirmar_exclusao.php -->
<h2>Confirmar Exclusão</h2>

<p>Tem certeza que deseja excluir o usuário <strong><?= htmlspecialchars($usuario['nome']) ?></strong>?</p>

<form method="POST">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
    <button type="submit">Sim, excluir</button>
    <a href="?pagina=usuario&acao=listar">Cancelar</a>
</form>
