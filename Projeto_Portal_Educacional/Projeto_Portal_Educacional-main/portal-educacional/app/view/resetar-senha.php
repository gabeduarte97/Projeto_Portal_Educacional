<h2>Redefinir Senha</h2>

<?php if (!empty($mensagem)) echo "<p style='color:green;'>" . htmlspecialchars($mensagem) . "</p>"; ?>
<?php if (!empty($erro)) echo "<p style='color:red;'>" . htmlspecialchars($erro) . "</p>"; ?>

<form method="post">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token ?? '') ?>">

    <label>Nova Senha:</label>
    <input type="password" name="nova_senha" required><br>

    <label>Confirmar Nova Senha:</label>
    <input type="password" name="confirmar_senha" required><br><br>

    <button type="submit">Redefinir Senha</button>
</form>
