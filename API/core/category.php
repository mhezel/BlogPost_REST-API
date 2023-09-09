<?php 

class Category{
//db
    private $conn;
    private $table = 'categories';

    public $id;
    public $name;
    public $created_at;

    //constructor with db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read(){
    $query = 'SELECT
        *
        FROM '.$this->table; 

    //prepare statement
    $stmt = $this->conn->prepare($query);

    //execute query
    $stmt->execute();

    return $stmt;
    }
}
?>