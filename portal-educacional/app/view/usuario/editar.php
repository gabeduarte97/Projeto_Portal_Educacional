<!-- app/view/usuario/editar.php -->

<h2>Editar Usuário</h2>

<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

<form method="post">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" required><br><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="data_nascimento" value="<?= htmlspecialchars($usuario['data_nascimento']) ?>" required><br><br>

    <button type="submit">Salvar</button>
</form>

<p><a href="?pagina=usuario&acao=listar">Voltar</a></p>
