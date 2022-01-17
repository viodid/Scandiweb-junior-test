<?php
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
    public function __construct($db, $id, $sku, $name, $price)
    {
        $this->conn = $db;
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function read()
    {
        $query = 'SELECT * FROM products';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}

class Furniture extends Products
{
    protected $height;
    protected $width;
    protected $length;

    public function __construct($db, $id, $sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($db, $id, $sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
}

class DVD extends Products
{
    protected $size;

    public function __construct($db, $id, $sku, $name, $price, $size)
    {
        parent::__construct($db, $id, $sku, $name, $price);
        $this->size = $size;
    }
}

class Book extends Products
{
    protected $weight;

    public function __construct($db, $id, $sku, $name, $price, $weight)
    {
        parent::__construct($db, $id, $sku, $name, $weight);
        $this->weight = $weight;
    }
}
