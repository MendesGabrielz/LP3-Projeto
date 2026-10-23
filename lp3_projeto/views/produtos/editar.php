<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Produto</h3>
        </div>

        <form action="/lp3_projeto/produtos/editar?id=<?= $produtos['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="produto">Nome do Produto:</label>
                <input type="text" id="nome" name="produto" value="<?= htmlspecialchars($produtos['produto']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" value="<?= htmlspecialchars($produtos['valor']) ?>" step="0.01" min="0" required class="form-control" placeholder="0.00">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="nome" name="descricao" value="<?= htmlspecialchars($produtos['descricao']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria" required class="form-control">
                    <option value="">Selecione</option>

                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['id'] ?>"
                            <?php
                            if ($produtos['categoria_id'] == $cat['id']) {
                                echo 'selected';
                            }
                            ?>>
                            <?= htmlspecialchars($cat['categoria']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/produtos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>