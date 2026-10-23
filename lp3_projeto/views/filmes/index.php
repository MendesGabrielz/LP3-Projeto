<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Filmes Cadastrados</h3>
            <a href="/lp3_projeto/filmes/adicionar" class="btn btn-success btn-sm">+ Novo Filme</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do filme</th>
                    <th>Diretor do filme</th>
                    <th>Duração</th>
                    <th>Imagem</th>

                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($filmes)): ?>
                    <?php foreach ($filmes as $film): ?>
                        <tr>
                            <td><?= $film['id'] ?></td>
                            <td><?= htmlspecialchars($film['filme']) ?></td>
                            <td><?= htmlspecialchars($film['diretor']) ?></td>
                            <td><?= htmlspecialchars($film['duracao']) ?></td>
                            <td><?= htmlspecialchars($film['imagem']) ?></td>

                            <td class="text-center">
                                <a href="/lp3_projeto/filmes/editar?id=<?= $film['id'] ?>" class="btn btn-warning btn-sm">Editar</a>

                                <a href="/lp3_projeto/filmes/excluir?id=<?= $film['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">Nenhum filme cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>