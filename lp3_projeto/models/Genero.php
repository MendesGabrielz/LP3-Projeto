<?php

require_once __DIR__ . '/../config/Database.php';

class Genero
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        
        $stmt = $this->db->query("SELECT * FROM generos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function salvar(string $nome, ?string $descricao)
    {

        $sql = "INSERT INTO generos (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->db->prepare($sql);

        $values = [
            "nome" => $nome,
            "descricao" => $descricao
        ];

        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, ?string $descricao)
    {

        $sql = "UPDATE generos SET nome = :nome, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $values = [
            "id" => $id,
            "nome" => $nome,
            "descricao" => $descricao
        ];

        return $stmt->execute($values);

    }

    public function buscarPorId(int $id)
    {

        $sql = "SELECT * FROM generos WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $values = ["id" => $id];

        $stmt->execute($values);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function excluir(int $id)
    {

        $sql = "DELETE FROM generos WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $values = ["id" => $id];

        return $stmt->execute($values);

    }
}
