<?php

class ProdutoController
{

    private $model;
    private $categoriaModel;

    public function __construct()
    {
        $this->model = new Produto();
        $this->categoriaModel = new Categoria();
    }

    public function index()
    {

        $produtos = $this->model->listar();
        require_once __DIR__ . '/../views/produtos/index.php';
    }

    public function adicionar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
            $categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($produto && $valor && $descricao && $categoria_id) {

                $this->model->salvar($produto, $valor, $descricao, $categoria_id);

                header('Location: /lp3_projeto/produtos');
                exit;
            }
        }

        $categorias = $this->categoriaModel->listar();
        require_once __DIR__ . '/../views/produtos/criar.php';
    }

    public function editar()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {

            header('Location: /lp3_projeto/produtos');
            exit;
        }

        // Verifica se houve POST e faz a gravação dos dados no banco.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
            $categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($produto && $valor && $descricao && $categoria_id) {

                $this->model->atualizar($produto, $valor, $descricao, $id, $categoria_id);

                header('Location: /lp3_projeto/produtos');
                exit;
            }
        }

        // Busca dados do Produto selecionado e carrega tela com os dados.

        $produtos = $this->model->buscarPorId($id);

        if (!$produtos) {
            header('Location: /lp3_projeto/produtos');
            exit;
        }

        $categorias = $this->categoriaModel->listar();
        require_once __DIR__ . '/../views/produtos/editar.php';
    }

    public function excluir()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {

            $this->model->excluir($id);
        }

        header('Location: /lp3_projeto/produtos');
        exit;
    }
}
