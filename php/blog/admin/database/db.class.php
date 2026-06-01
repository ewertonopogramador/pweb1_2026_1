<<<<<<< HEAD:php/db.class.php
<?php




class db {




    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $port     = '3306';
    private $dbname   = 'db_pweb1_2026_1';
    private $table_name;
    private $conn; // conexão fica guardada para reutilizar




    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect(); // cria a conexão uma única vez
    }




    // Método privado: apenas a própria classe pode chamar
    private function connect()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }




//SELECT*FROM tabela


public function destroy($id) {


    try{
        $sql = "DELETE FROM $this->table_name WHERE id= ?;";
        $st  = $this->conn->prepare($sql);
        $st->execute([$id]);
    } catch (PDOException $e) {
        throw new Exception(("erro tudo " . $e->getMessage()));
    }
}


//select * from tabela where campo like '%valor% (independente de onde o texto estiver)'


public function search($dados){


    $campo = $dados ['tipo'];
    $valor = $dados ['valor'];
    $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";


    try{
    $st = $this ->conn->prepare($sql);
    $st->execute(["%$valor%"]);
    return $st ->fetchALL(PDO::FETCH_CLASS);
} catch (PDOException $e) {
        throw new Exception(("erro tudo " . $e->getMessage()));
    }
}


public function all(){
    $sql = "SELECT * FROM $this->table_name";
    $st = $this ->conn->prepare($sql);
    $st->execute();
    return $st ->fetchALL(PDO::FETCH_CLASS);
}




    //INSERT INTO tabela ('campo1', 'campo2') VALUES (?, ?);
    public function store($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];
        $sep = "";




        foreach($dados as $campo => $valor) {
            $campos .= $sep . $campo;
            $marcadores .= $sep . "?";
            $vetorData[]= $valor;
            $sep = ",";
        }




        $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores);";
        try{
            $st = $this->conn->prepare($sql);
            $st->execute($vetorData);
        } catch (PDOException $e) {
           throw new Exception("Erro ao inserir", $e->getMessage());
        }




    }
}
=======

<?php




class db {




    private $host     = 'localhost';
    private $user     = 'root';
    private $password = '';
    private $port     = '3306';
    private $dbname   = 'db_pweb1_2026_1';
    private $table_name;
    private $conn; // conexão fica guardada para reutilizar




    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $this->conn = $this->connect(); // cria a conexão uma única vez
    }




    // Método privado: apenas a própria classe pode chamar
    private function connect()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }




//SELECT*FROM tabela


public function destroy($id) {


    try{
        $sql = "DELETE FROM $this->table_name WHERE id= ?;";
        $st  = $this->conn->prepare($sql);
        $st->execute([$id]);
    } catch (PDOException $e) {
        throw new Exception(("erro tudo " . $e->getMessage()));
    }
}
//SELECT * FROM tabela WHERE campo LIKE '%valor%';
public function search($dados){
    $camp = $dados['tipo'];
    $valor = $dados['valor'];

    $sql = "SELECT * FROM $this->table_name WHERE $camp LIKE ?";
    $st = $this ->conn->prepare($sql);
    $st->execute(["%$valor%"]);

    return $st ->fetchALL(PDO::FETCH_CLASS);
}





public function all(){
    $sql = "SELECT * FROM $this->table_name";
    $st = $this ->conn->prepare($sql);
    $st->execute();
    return $st ->fetchALL(PDO::FETCH_CLASS);
}




    //INSERT INTO tabela ('campo1', 'campo2') VALUES (?, ?);
    public function store($dados)
    {
        $campos = "";
        $marcadores = "";
        $vetorData = [];
        $sep = "";




        foreach($dados as $campo => $valor) {
            $campos .= $sep . $campo;
            $marcadores .= $sep . "?";
            $vetorData[]= $valor;
            $sep = ",";
        }




        $sql = "INSERT INTO $this->table_name ($campos) VALUES ($marcadores);";
        try{
            $st = $this->conn->prepare($sql);
            $st->execute($vetorData);
        } catch (PDOException $e) {
           throw new Exception("Erro ao inserir", $e->getMessage());
        }




    }
}
>>>>>>> dd9a3701f4a86d81740564d40c133698d2cffe35:php/blog/admin/database/db.class.php
