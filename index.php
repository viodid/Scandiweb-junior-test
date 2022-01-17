<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '/var/www/html/scandiweb-junior-developer-test-task/config/Database.php';
include_once '/var/www/html/scandiweb-junior-developer-test-task/models/Products.php';


$database = new Database();
$db = $database->connect();


$silmarillion = new Products($db, 1, 'testing', 'whatever', 0.43);


$result = $silmarillion->read();
$num = $result->rowCount();

while ($row = $result->fetch()) {
    var_dump($row) . '<br>';
}
