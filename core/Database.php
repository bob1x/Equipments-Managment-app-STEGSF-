<?php 
 namespace Core;
 use PDO;

    class Database {
    public  $connection;
    public $statement;

    public function __construct($config,$username ="root" ,$password= "")
    {
        $dsn = ('mysql:' . http_build_query($config,'',';')); //"mysql:host=localhost;port=3306;dbname=steggm;charset=utf8mb4"
        $this-> connection = new PDO($dsn, $username, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query,$params = [])
    {
        $this->statement = $this-> connection ->prepare($query);
        $this->statement->execute($params);
        return $this;

    }
    public function execute($params = []) {
        $this->statement->execute($params);
        return $this;
    }
    public function get(){
        return $this->statement->fetchAll();
    }
    public function find(){
        return $this->statement->fetch();
    }
    public function fetchColumn(){
        return $this->statement->fetchColumn();
    }
    public function count(){
        return $this->statement->rowCount();
    }
    public function lastInsertId(){
        return $this->connection->lastInsertId();
    }
    public function getColumn($table, $column) {
        $query = "SELECT $column FROM $table";
        $statement = $this->connection->query($query);
    
        return $statement->fetchColumn();
    }
    public function findOrFail(){
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
    public function getOrFail(){
        $result = $this->get();
        if (!$result) {
            abort();
        }
        return $result;
    }

}








