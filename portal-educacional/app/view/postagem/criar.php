<?php
if (!isset($_SESSION['usuario'])) {
    header('Location: ?pagina=usuario&acao=login');
    exit;
}
?>

<h2>Nova Postagem</h2>

<?php if (isset($erro)): ?>
    <p style="color:red"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="?pagina=postagem&acao=criar">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">

    <label>Título:</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>URL da Imagem (opcional):</label><br>
    <input type="text" name="imagem_url"><br><br>

    <label>Conteúdo:</label><br>
    <textarea name="conteudo" rows="6" cols="50" required></textarea><br><br>

    <input type="submit" value="Salvar">
</form>

<p><a href="?pagina=postagem&acao=listar">Voltar à lista</a></p>
