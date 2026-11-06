<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/adicionar" method="POST" class="card-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required class="form-control" placeholder="Ex: Dom Casmurro">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required class="form-control" placeholder="Ex: Machado de Assis">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" class="form-control" placeholder="Ex: 978-85-359-0277-2">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" id="ano_publicacao" name="ano_publicacao" class="form-control" placeholder="Ex: 1899">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" class="form-control">
                    <option value="">Selecione o Gênero</option>
                    <?php

                    foreach ($generos as $genero):

                    ?>
                        <option value="<?= $genero['id'] ?>"><?= $genero['nome'] ?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <textarea id="sinopse" name="sinopse" class="form-control" placeholder="Escreva uma breve sinopse..." rows="4" style="resize: none;"></textarea>
            </div>


            <div class="form-group">
                <label for="capa">Capa do livro:</label>
                <input type="file" id="capa"
                    name="capa"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp">

            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>