<?php
class Database
{
    private $host = '';
    private $db_name = '';
    private $user = '';
    private $pass = '';
    private $conn;

    // DB Connect
    public function connect()
    {
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->user,
                $this->pass
            );
            foreach ($this->conn->query('SELECT * from products') as $row) {
                print_r($row);
            }
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->conn = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}

$test = new Database;

// echo $test->connect() . '<br>';
