<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Filme</h3>
        </div>

        <form action="/lp3_projeto/filmes/editar?id=<?= $filme['id'] ?>" method="POST" class="card-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="filme">Nome do filme:</label>
                <input type="text" id="filme" name="filme" value="<?= htmlspecialchars($filme['filme']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="diretor">Diretor:</label>
                <input type="text" id="diretor" name="diretor" value="<?= htmlspecialchars($filme['diretor']) ?>" required class="form-control">
            </div>


            <div class="form-group">
                <label for="duracao">Duração:</label>
                <input type="number" id="duracao" name="duracao" value="<?= htmlspecialchars($filme['duracao']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="imagem">Capa do Filme:</label>
                <?php if (!empty($filme['imagem'])): ?>
                    <div class="mb-2">
                        <img src="/lp3_projeto/uploads/filmes/<?= htmlspecialchars($filme['imagem']) ?>"
                            alt="Capa atual"
                            style="width: 70px; height: 100px; object-fit: cover; border-radius: 4px; display: block; margin-bottom: 5px;">
                        <small class="text-muted">Capa atual (envie uma nova apenas se desejar substituir)</small>
                    </div>
                <?php endif; ?>
                <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>