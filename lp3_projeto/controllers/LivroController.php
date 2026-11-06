<?php

class LivroController
{
    private $model;
    private $generoModel;

    public function __construct()
    {
        $this->model = new Livro();
        $this->generoModel = new Genero(); 
    }

    public function index()
    {
        $livros = $this->model->listar();
        require_once __DIR__ . '/../views/livros/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
            $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_SPECIAL_CHARS);
            $ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao', FILTER_VALIDATE_INT);
            $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_SPECIAL_CHARS);
    
            $id_genero = filter_input(INPUT_POST, 'id_genero', FILTER_VALIDATE_INT);
            $id_genero = !empty($id_genero) ? $id_genero : null;
            $ano_publicacao = !empty($ano_publicacao) ? $ano_publicacao : null;

            $capa = $this->processarImagem($_FILES['capa'] ?? null);

            if ($titulo && $autor) {
                $this->model->salvar($titulo, $autor, $isbn, $ano_publicacao, $sinopse, $id_genero, $capa);

                header('Location: /lp3_projeto/livros');
                exit;
            }
        }

        $generos = $this->generoModel->listar();
        require_once __DIR__ . '/../views/livros/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /lp3_projeto/livros');
            exit;
        }

        $livro = $this->model->buscarPorId($id);

        if (!$livro) {
            header('Location: /lp3_projeto/livros');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
            $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_SPECIAL_CHARS);
            $ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao', FILTER_VALIDATE_INT);
            $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_genero = filter_input(INPUT_POST, 'id_genero', FILTER_VALIDATE_INT);
            $id_genero = !empty($id_genero) ? $id_genero : null;
            $ano_publicacao = !empty($ano_publicacao) ? $ano_publicacao : null;

            $capa = $this->processarImagem($_FILES['capa'] ?? null, $livro['capa'] ?? null);

            if ($titulo && $autor) {
                $this->model->atualizar($id, $titulo, $autor, $isbn, $ano_publicacao, $sinopse, $id_genero, $capa);

                header('Location: /lp3_projeto/livros');
                exit;
            }
        }

        $generos = $this->generoModel->listar();
        require_once __DIR__ . '/../views/livros/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $livro = $this->model->buscarPorId($id);
            
            if ($livro && !empty($livro['capa'])) {
                $diretorio = __DIR__ . '/../uploads/livros';
                $caminhoCapa = $diretorio . '/' . $livro['capa'];
                if (file_exists($caminhoCapa)) {
                    unlink($caminhoCapa);
                }
            }

            $this->model->excluir($id);
        }

        header('Location: /lp3_projeto/livros');
        exit;
    }

    private function processarImagem($arquivo, ?string $imagemAtual = null): ?string 
    {
        if (!isset($arquivo) || empty($arquivo['name'])) {
            return $imagemAtual;
        }

        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            return $imagemAtual;
        }

        $permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($arquivo['type'], $permitidos, true)) {
            return $imagemAtual;
        }

        $diretorio = __DIR__ . '/../uploads/livros';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = time() . '_' . uniqid() . '.' . strtolower($extensao);
        $destino = $diretorio . '/' . $nomeArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            if ($imagemAtual && file_exists($diretorio . '/' . $imagemAtual)) {
                unlink($diretorio . '/' . $imagemAtual);
            }
            return $nomeArquivo;
        }

        return $imagemAtual;
    }
}