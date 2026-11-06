<?php

require_once __DIR__ . '/../config/Database.php';

class Filme
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {

        $stnt = $this->db->query("select * from filmes order by id desc");

        return $stnt->fetchALL();
    }

    public function salvar(string $filme, string $diretor, int $duracao, ?string $imagem)
        {

            $sql = "insert into filmes (filme, diretor, duracao, imagem) values (:filme, :diretor, :duracao, :imagem)";
            $stnt = $this->db->prepare($sql);
            $values = [

                "filme" => $filme,
                "diretor" => $diretor,
                "duracao" => $duracao,
                "imagem" => $imagem

            ];

            return $stnt->execute($values);
        }

        public function atualizar(string $filme, string $diretor, int $duracao, ?string $imagem, int $id)
        {

            $sql = "UPDATE filmes SET filme = :filme, diretor = :diretor, duracao = :duracao, imagem = :imagem WHERE id = :id";
            $stnt = $this->db->prepare($sql);
            $values = [

                "filme" => $filme,
                "diretor" => $diretor,
                "duracao" => $duracao,
                "imagem" => $imagem,
                "id" => $id

            ];

            return $stnt->execute($values);
        }

        public function buscarPorId(int $id)
        {

            $sql = "SELECT * FROM filmes WHERE id = :id";
            $stnt = $this->db->prepare($sql);

            $values = ["id" => $id];

            $stnt->execute($values);
            return $stnt->fetch();
        }

        public function excluir(int $id)
        {

            $sql = "DELETE FROM filmes WHERE id = :id";
            $stnt = $this->db->prepare($sql);

            $values = ["id" => $id];

            return $stnt->execute($values);
        }
    
}
