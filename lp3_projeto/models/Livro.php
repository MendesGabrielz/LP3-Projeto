<?php

require_once __DIR__ . '/../config/Database.php';

class Livro
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar(): array
    {
        $sql = "SELECT livros.*, generos.nome AS genero_nome
                FROM livros
                LEFT JOIN generos ON generos.id = livros.id_genero
                ORDER BY livros.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar(
        string $titulo,
        string $autor,
        ?string $isbn,
        ?int $ano_publicacao,
        ?string $sinopse,
        ?int $id_genero,
        ?string $capa
    ): bool {
        $sql = "INSERT INTO livros
                (titulo, autor, isbn, ano_publicacao,
                 sinopse, id_genero, capa)
                VALUES
                (:titulo, :autor, :isbn, :ano_publicacao,
                 :sinopse, :id_genero, :capa)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'titulo' => $titulo,
            'autor' => $autor,
            'isbn' => $isbn,
            'ano_publicacao' => $ano_publicacao,
            'sinopse' => $sinopse,
            'id_genero' => $id_genero,
            'capa' => $capa
        ]);
    }

    public function atualizar(
        int $id,
        string $titulo,
        string $autor,
        ?string $isbn,
        ?int $ano_publicacao,
        ?string $sinopse,
        ?int $id_genero,
        ?string $capa = null
    ): bool {
        if ($capa !== null) {
            $sql = "UPDATE livros SET
                    titulo = :titulo,
                    autor = :autor,
                    isbn = :isbn,
                    ano_publicacao = :ano_publicacao,
                    sinopse = :sinopse,
                    id_genero = :id_genero,
                    capa = :capa
                    WHERE id = :id";
        } else {
            // Mantém a capa existente quando nenhuma nova é enviada.
            $sql = "UPDATE livros SET
                    titulo = :titulo,
                    autor = :autor,
                    isbn = :isbn,
                    ano_publicacao = :ano_publicacao,
                    sinopse = :sinopse,
                    id_genero = :id_genero
                    WHERE id = :id";
        }

        $stmt = $this->db->prepare($sql);

        $dados = [
            'id' => $id,
            'titulo' => $titulo,
            'autor' => $autor,
            'isbn' => $isbn,
            'ano_publicacao' => $ano_publicacao,
            'sinopse' => $sinopse,
            'id_genero' => $id_genero
        ];

        if ($capa !== null) {
            $dados['capa'] = $capa;
        }

        return $stmt->execute($dados);
    }

    public function buscarPorId(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM livros WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluir(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM livros WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }
}
