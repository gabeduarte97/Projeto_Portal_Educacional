<h2>Recuperar Senha</h2>

<?php if (!empty($mensagem)) echo "<p style='color:green;'>" . htmlspecialchars($mensagem) . "</p>"; ?>
<?php if (!empty($erro)) echo "<p style='color:red;'>" . htmlspecialchars($erro) . "</p>"; ?>

<form method="post">
    <label>CPF:</label><br>
    <input type="text" name="cpf" required autocomplete="off"><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="data_nascimento" required><br>

    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <button type="submit">Enviar Link de Redefinição</button>
</form>
