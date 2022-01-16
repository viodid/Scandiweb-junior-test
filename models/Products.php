<?php
class Products
{
    // DB stuff
    private $conn;
    private $table = 'products';
    // products Properties
    public $id;
    public $sku;
    public $name;
    public $price;
    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }
}
