<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

require_once '/var/www/html/scandiweb-junior-developer-test-task/app/database/Database.php';
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/models/Products.php';

// Instantiate database and connect
$database = new Database();
$db = $database->connect();
$result = Products::readAllProducts($db);

class DummyClass
{
}
$dummy = new DummyClass();
