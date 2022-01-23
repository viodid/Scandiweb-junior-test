<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '/var/www/html/scandiweb-junior-developer-test-task/config/Database.php';
include_once '/var/www/html/scandiweb-junior-developer-test-task/models/Products.php';

// Instantiate database and connect
$database = new Database();
$db = $database->connect();

// Instantiate products object
$products = new Products($db);

// Execute read query
$result = $products->readAllProducts();
// Get row count
$num = $result->rowCount();


if ($num > 0) {
    while ($row = $result->fetch()) {
        var_dump($row) . '<br>';

        // echo $row->price . '$' . '<br>';
    }
}
