<?php

require_once __DIR__ . '/../config/Database.php';
class Produto
{

    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {

        $stnt = $this->db->query("select * from produtos order by id desc");

        return $stnt->fetchALL();
    }

    public function salvar(string $produto, float $valor, string $descricao, int $categoria_id)
    {

        $sql = "insert into produtos (produto, valor, descricao, categoria_id) values (:produto, :valor, :descricao, :categoria_id)";
        $stnt = $this->db->prepare($sql);
        $values = [

            "produto" => $produto,
            "valor" => $valor,
            "descricao" => $descricao,
            "categoria_id" => $categoria_id

        ];

        return $stnt->execute($values);
    }

    public function atualizar(string $produto, float $valor, string $descricao, int $id, int $categoria_id)
    {

        $sql = "UPDATE produtos SET produto = :produto, valor = :valor ,descricao = :descricao, categoria_id = :categoria_id WHERE id = :id";
        $stnt = $this->db->prepare($sql);
        $values = [

            "produto" => $produto,
            "valor" => $valor,
            "descricao" => $descricao,
            "id" => $id,
            "categoria_id" => $categoria_id

        ];

        return $stnt->execute($values);
    }

    public function buscarPorId(int $id)
    {

        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stnt = $this->db->prepare($sql);

        $values = ["id" => $id];

        $stnt->execute($values);
        return $stnt->fetch();
    }

    public function excluir(int $id)
    {

        $sql = "DELETE FROM produtos WHERE id = :id";
        $stnt = $this->db->prepare($sql);

        $values = ["id" => $id];

        return $stnt->execute($values);
    }
}
