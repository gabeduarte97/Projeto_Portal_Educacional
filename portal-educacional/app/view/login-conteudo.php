<h2>Login</h2>

<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

<form method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br>

    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="?pagina=usuario&acao=cadastro">Cadastre-se</a></p>
<p><a href="?pagina=usuario&acao=recuperarSenha">Esqueceu a senha?</a></p>
