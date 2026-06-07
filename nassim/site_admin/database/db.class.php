<?php

// Classe de acesso genérico ao banco para CRUD em uma tabela específica
class db
{

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $port = '3306';
    private $dbname = 'nassim_db';

    private $table_name;
    private $conn;

    // Recebe o nome da tabela e inicializa a conexão PDO
    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect();
    }

    // Abre a conexão com o banco todas as vezes que a classe é instanciada
    private function connect()
    {
        try {

            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {

            die('Erro na conexão: ' . $e->getMessage());
        }
    }

    // Retorna todos os registros da tabela
    public function all()
    {
        $sql = "SELECT * FROM $this->table_name";

        $st = $this->conn->prepare($sql);

        $st->execute();

        return $st->fetchAll(PDO::FETCH_OBJ);
    }

    // Retorna um registro pelo campo ID
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table_name WHERE id = ?";

        $st = $this->conn->prepare($sql);

        $st->execute([$id]);

        return $st->fetchObject();
    }


    // Retorna um registro usando qualquer campo e valor especificados
    public function findBy($campo, $valor)
    {
        $sql = "SELECT * FROM $this->table_name WHERE $campo = ?";

        $st = $this->conn->prepare($sql);

        $st->execute([$valor]);

        return $st->fetchObject();
    }


    // Remove um registro pelo ID
    public function destroy($id)
    {
        $sql = "DELETE FROM $this->table_name WHERE id = ?";

        $st = $this->conn->prepare($sql);

        $st->execute([$id]);
    }

    // Pesquisa registros com filtro LIKE em uma coluna
    public function search($dados)
    {
        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";

        $st = $this->conn->prepare($sql);

        $st->execute(["%$valor%"]);

        return $st->fetchAll(PDO::FETCH_OBJ);
    }

    // Insere um novo registro na tabela usando os dados fornecidos
    public function store($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];

        $sep = "";

        foreach ($dados as $campo => $valor) {

            $campos .= $sep . $campo;
            $marcadores .= $sep . "?";

            $vetorData[] = $valor;

            $sep = ",";
        }

        $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores)";

        $st = $this->conn->prepare($sql);

        $st->execute($vetorData);
    }

    public function update($dados)
    {
        $campos = "";
        $vetorData = [];

        $sep = "";

        foreach ($dados as $campo => $valor) {

            if ($campo != 'id') {

                $campos .= $sep . "$campo = ?";

                $vetorData[] = $valor;

                $sep = ",";
            }
        }

        $vetorData[] = $dados['id'];

        $sql = "UPDATE $this->table_name SET $campos WHERE id = ?";

        $st = $this->conn->prepare($sql);

        $st->execute($vetorData);
    }
}

// Classe simples para criar conexão PDO diretamente, se alguém usar new Database()
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $port = '3306';
    private $dbname = 'nassim_db';

    // Retorna uma conexão PDO pronta para uso
    public function conectar()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }
}
