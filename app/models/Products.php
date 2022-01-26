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

    public static function readAllProducts($db)
    {
        // $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC';

        $query = 'SELECT
        products.*,
        DVD.size,
        furniture.height,
        furniture.width,
        furniture.length,
        book.weight
        FROM products
        LEFT JOIN DVD on DVD.products_id = products.id
        LEFT JOIN furniture on furniture.products_id = products.id
        LEFT JOIN book on book.products_id = products.id 
        ORDER BY products.id ASC;';

        $stmt = $db->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    protected function sanitizeData(...$atributeArr)
    {
        foreach ($atributeArr as &$value) {
            // $this->$value = htmlspecialchars(strip_tags($this->$value));
            echo var_dump($value);
        }
    }
}

class DVD extends Products
{
    protected $tableType = 'DVD';
    protected $size;

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->size = $properties[0];

        foreach ($this as $key => $value) {
            print "$key => $value\n" . '<br>';
        }
    }

    public function create()
    {
        parent::sanitizeData([$this->tableType]);
        // $query = 'INSERT INTO ';
    }
}


class Furniture extends Products
{
    protected $tableType = 'furniture';
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

class Book extends Products
{
    protected $tableType = 'book';
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
