<?php

class Database
{

    private $host = "localhost";
    private $dbname = "nassim_db";
    private $user = "root";
    private $pass = "";

    public function conectar()
    {

        try {

            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->pass
            );

            return $pdo;
        } catch (PDOException $e) {

            die("Erro: " . $e->getMessage());
        }
    }
}
