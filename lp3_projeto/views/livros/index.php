<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Livros Cadastrados</h3>
            <a href="/lp3_projeto/livros/adicionar" class="btn btn-success btn-sm">+ Novo Livro</a>
        </div>

        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Ano</th>
                    <th>Gênero</th>
                    <th>Sinopse</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($livros)): ?>
                    <?php foreach ($livros as $livro): ?>
                        <tr>
                            <td><?= $livro['id'] ?></td>
                            <td>
                                <?php if (!empty($livro['capa'])): ?>
                                    <img src="/lp3_projeto/uploads/livros/<?= htmlspecialchars($livro['capa']) ?>" 
                                         alt="Capa do livro" 
                                         style="width: 50px; height: 70px; object-fit: cover; border-radius: 4px;">
                                <?php else: ?>
                                    <span class="text-muted" style="font-size: 0.85rem;">Sem capa</span>
                                <?php endif; ?>
                            </td>

                            <td><?= htmlspecialchars($livro['titulo']) ?></td>
                            <td><?= htmlspecialchars($livro['autor']) ?></td>
                            <td><?= htmlspecialchars($livro['isbn'] ?? '') ?></td>
                            <td><?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?></td>
                            <td><?= htmlspecialchars($livro['genero_nome'] ?? '') ?></td>
                            <td><?= htmlspecialchars($livro['sinopse'] ?? '') ?></td>

                            <td class="text-center">
                                <a href="/lp3_projeto/livros/editar?id=<?= $livro['id'] ?>" class="btn btn-warning btn-sm">Editar</a>

                                <a href="/lp3_projeto/livros/excluir?id=<?= $livro['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">Nenhum livro cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>