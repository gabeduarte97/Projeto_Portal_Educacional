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
    <input type="hidden" name="autor_id" value="<?= htmlspecialchars($_SESSION['usuario']['id']) ?>">

    <label for="titulo">Título:</label><br>
    <input type="text" name="titulo" id="titulo" required><br><br>

    <label for="imagem_url">URL da Imagem (opcional):</label><br>
    <input type="text" name="imagem_url" id="imagem_url"><br><br>

    <label for="conteudo">Conteúdo:</label><br>
    <textarea name="conteudo" id="conteudo" rows="6" cols="50" required></textarea><br><br>

    <input type="submit" value="Salvar">
</form>

<p><a href="?pagina=postagem&acao=listar">Voltar à lista</a></p>
