<?php
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/database/Database.php';
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/models/Products.php';

$database = new Database();
$db = $database->connect();

foreach ($_GET as $key => $value) {
    Products::deleteProduct($db, $key);
}

// Redirect to front page
header("Location: http://178.79.181.140:8888/");
