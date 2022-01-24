<?php

abstract class Products
{
    // DB stuff
    private $conn;
    private $table = 'products';
    // products general properties
    protected $sku;
    protected $name;
    protected $price;

    protected function __construct($db, $sku, $name, $price)
    {
        $this->conn = $db;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

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

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->height = $properties[2];
        $this->width = $properties[1];
        $this->length = $properties[0];

        foreach ($this as $key => $value) {
            print "$key => $value\n" . '<br>';
        }
    }
}

class DVD extends Products
{
    protected $size;

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->size = $properties[0];

        foreach ($this as $key => $value) {
            print "$key => $value\n" . '<br>';
        }
    }
}

class Book extends Products
{
    protected $weight;

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->weight = $properties[0];

        foreach ($this as $key => $value) {
            print "$key => $value\n" . '<br>';
        }
    }
}
