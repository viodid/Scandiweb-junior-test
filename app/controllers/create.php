<?php
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/database/Database.php';
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/models/Products.php';


$database = new Database();
$db = $database->connect();

$typeProduct = $_POST['productType'];

$propertiesArr = [];

$key = 'dummy';
while ($key != 'productType') {
    array_push($propertiesArr, array_pop($_POST));
    $key = array_key_last($_POST);
}


// Instantiate object and create record in DB
$newProdruct = new $typeProduct(
    $db,
    $_POST['sku'],
    $_POST['name'],
    $_POST['price'],
    ...$propertiesArr
);

$newProdruct->createProduct();

// Redirect to front page
header("Location: http://178.79.181.140:8888/");
