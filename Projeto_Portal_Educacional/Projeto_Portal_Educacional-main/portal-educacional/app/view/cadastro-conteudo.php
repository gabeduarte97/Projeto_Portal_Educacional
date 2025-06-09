<h2>Cadastro de Usuário</h2>
<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
<form method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Senha:</label><br>
    <input type="password" name="senha" required><br>
    <label>CPF:</label><br>
    <input type="text" name="cpf" required><br>
    <label>Data de Nascimento:</label><br>
    <input type="date" name="data_nascimento" required><br>
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <button type="submit">Cadastrar</button>
</form>
<p><a href="?pagina=usuario&acao=login">Já tem conta? Entrar</a></p>