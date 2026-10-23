<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Cliente</h3>
        </div>

        <form action="/lp3_projeto/clientes/editar?id=<?= $cliente['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" step="0.01" value="<?= htmlspecialchars($cliente['salario']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value="M" <?= $cliente['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $cliente['sexo'] == 'F' ? 'selected' : '' ?>>Feminino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" value="<?= htmlspecialchars($cliente['data']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="obs">Observação:</label>
                <input type="text" id="obs" name="obs" value="<?= htmlspecialchars($cliente['obs']) ?>" required class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>