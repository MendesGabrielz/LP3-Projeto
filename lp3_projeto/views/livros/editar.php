<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/editar?id=<?= $livro['id'] ?>" method="POST" enctype="multipart/form-data" class="card-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($livro['titulo'] ?? '') ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($livro['autor'] ?? '') ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?= htmlspecialchars($livro['isbn'] ?? '') ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" value="<?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" class="form-control">
                    <option value="">Selecione o Gênero</option>
                    <?php foreach ($generos as $genero): ?>
                        <option value="<?= $genero['id'] ?>"
                            <?php
                            if ($livro['id_genero'] == $genero['id']) {
                                echo 'selected';
                            }
                            ?>>
                            <?= htmlspecialchars($genero['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <textarea id="sinopse" name="sinopse" class="form-control" rows="4" style="resize: none;"><?= htmlspecialchars($livro['sinopse'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="capa">Capa do Livro:</label>
                <?php if (!empty($livro['capa'])): ?>
                    <div class="mb-2">
                        <img src="/lp3_projeto/uploads/livros/<?= htmlspecialchars($livro['capa']) ?>"
                            alt="Capa atual"
                            style="width: 70px; height: 100px; object-fit: cover; border-radius: 4px; display: block; margin-bottom: 5px;">
                        <small class="text-muted">Capa atual (envie uma nova apenas se desejar substituir)</small>
                    </div>
                <?php endif; ?>
                <input type="file" id="capa" name="capa" class="form-control" accept="image/*">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>