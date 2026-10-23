<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Clientes Cadastrados</h3>
            <a href="/lp3_projeto/clientes/adicionar" class="btn btn-success btn-sm">+ Novo Cliente</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cpf</th>
                    <th>Salario</th>
                    <th>Sexo</th>
                    <th>Data</th>
                    <th>Obs</th>

                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cli): ?>
                        <tr>
                            <td><?= $cli['id'] ?></td>
                            <td><?= htmlspecialchars($cli['nome']) ?></td>
                            <td><?= htmlspecialchars($cli['email']) ?></td>
                            <td><?= htmlspecialchars($cli['cpf']) ?></td>
                            <td><?= htmlspecialchars($cli['salario']) ?></td>
                            <td><?= htmlspecialchars($cli['sexo']) ?></td>
                            <td><?= htmlspecialchars($cli['data']) ?></td>
                            <td><?= htmlspecialchars($cli['obs']) ?></td>

                            <td class="text-center">
                                <a href="/lp3_projeto/clientes/editar?id=<?= $cli['id'] ?>" class="btn btn-warning btn-sm">Editar</a>

                                <a href="/lp3_projeto/clientes/excluir?id=<?= $cli['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">Nenhum cliente cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>