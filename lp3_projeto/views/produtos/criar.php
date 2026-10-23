<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Produto</h3>
        </div>

        <form action="/lp3_projeto/produtos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="produto">Nome do Produto:</label>
                <input type="text" id="nome" name="produto" required class="form-control" placeholder="Ex: Teste">
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" step="0.01" min="0" required class="form-control" placeholder="Ex: 100.50">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="nome" name="descricao" required class="form-control" placeholder="Ex: Bla bla bla...">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria" required class="form-control">
                    <option value="">Selecione</option>

                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= $cat['categoria'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/produtos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>