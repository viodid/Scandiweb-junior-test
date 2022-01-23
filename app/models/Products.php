<?php



// REMEMBER ABSTRACT THE CLASS


class Products
{
    // DB stuff
    private $conn;
    private $table = 'products';
    // products Properties
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // make read function static 



    public function readAllProducts()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
}

class Furniture extends Products
{
    protected $height;
    protected $width;
    protected $length;

    public function __construct($db, $height, $width, $length)
    {
        parent::__construct($db);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
}

class DVD extends Products
{
    protected $size;

    public function __construct($db, $size)
    {
        parent::__construct($db);
        $this->size = $size;
    }
}

class Book extends Products
{
    protected $weight;

    public function __construct($db, $weight)
    {
        parent::__construct($db, $weight);
        $this->weight = $weight;
    }
}
