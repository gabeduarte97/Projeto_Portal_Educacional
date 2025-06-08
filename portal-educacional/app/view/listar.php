<h2>Usuários</h2>
<a href="?pagina=usuario&acao=cadastro" class="btn">Novo Usuário</a>
<table border="1" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Data de Nascimento</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario['nome']) ?></td>
            <td><?= htmlspecialchars($usuario['email']) ?></td>
            <td><?= htmlspecialchars($usuario['cpf']) ?></td>
            <td><?= htmlspecialchars($usuario['data_nascimento']) ?></td>
            <td>
                <a href="?pagina=usuario&acao=editar&id=<?= $usuario['id'] ?>">Editar</a> |
               <a href="?pagina=usuario&acao=excluir&id=<?= $usuario['id'] ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
