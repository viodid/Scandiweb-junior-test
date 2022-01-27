<?php

abstract class Products
{
    // DB stuff
    protected $conn;
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
        $this->price = (int)$price;
    }

    public static function readAllProducts($db)
    {
        $query = 'SELECT
        p.id,
        p.SKU,
        p.name,
        p.price,
        d.size,
        f.height,
        f.width,
        f.length,
        b.weight
        FROM products p
        LEFT JOIN DVD d ON d.products_id = p.id
        LEFT JOIN furniture f ON f.products_id = p.id
        LEFT JOIN book b ON b.products_id = p.id 
        ORDER BY p.id ASC;';

        $stmt = $db->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    protected function insertProductTable()
    {
        $query = 'INSERT INTO ' . $this->table . ' 
            SET
            SKU = :sku,
            name = :name,
            price = :price
            ';

        $stmt = $this->conn->prepare($query);
        $this->bindParams($stmt, 'sku', 'name', 'price');
        $stmt->execute();

        return $this->getLastID();
    }

    public static function deleteProduct($db, $id)
    {
        $query = 'DELETE FROM products 
        WHERE id=:id;';

        $stmt = $db->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    protected function bindParams($stmt, ...$attributeArr)
    {
        foreach ($attributeArr as $value) {
            $stmt->bindParam(':' . $value, $this->$value);
        }
    }

    protected function sanitizeData(...$attributeArr)
    {
        foreach ($attributeArr as $value) {
            $this->$value = htmlspecialchars(strip_tags($this->$value));
        }
    }

    protected function getLastID()
    {
        $stmt = $this->conn->prepare('SELECT id FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');

        $stmt->execute();
        return $stmt->fetch()->id;
    }
}

class DVD extends Products
{
    protected $tableType = 'DVD';
    protected $size;

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->size = (int)$properties[0];
    }

    public function createProduct()
    {
        parent::insertProductTable();
        $query = 'INSERT INTO ' . $this->tableType .
            ' SET
            products_id = ' . $this->getLastID() . ',
            size = :size
            ';

        $stmt = $this->conn->prepare($query);
        $this->sanitizeData('sku', 'name', 'price', 'size');
        $this->bindParams($stmt, 'size');
        $stmt->execute();
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
        $this->height = (int)$properties[2];
        $this->width = (int)$properties[1];
        $this->length = (int)$properties[0];
    }

    public function createProduct()
    {
        parent::insertProductTable();
        $query = 'INSERT INTO ' . $this->tableType .
            ' SET
            products_id = ' . $this->getLastID() . ',
            height = :height,
            width = :width,
            length = :length
            ';

        $stmt = $this->conn->prepare($query);
        $this->sanitizeData('sku', 'name', 'price', 'height', 'width', 'length');
        $this->bindParams($stmt, 'height', 'width', 'length');
        $stmt->execute();
    }
}

class Book extends Products
{
    protected $tableType = 'book';
    protected $weight;

    public function __construct($db, $sku, $name, $price, ...$properties)
    {
        parent::__construct($db, $sku, $name, $price);
        $this->weight = (int)$properties[0];
    }

    public function createProduct()
    {
        parent::insertProductTable();
        $query = 'INSERT INTO ' . $this->tableType .
            ' SET
            products_id = ' . $this->getLastID() . ',
            weight = :weight
            ';

        $stmt = $this->conn->prepare($query);
        $this->sanitizeData('sku', 'name', 'price', 'weight');
        $this->bindParams($stmt, 'weight');
        $stmt->execute();
    }
}
