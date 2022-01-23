<?php

require_once '/var/www/html/scandiweb-junior-developer-test-task/app/libraries/Database.php';
require_once '/var/www/html/scandiweb-junior-developer-test-task/app/models/Products.php';



echo var_dump($_POST);
// Grabbing the data


$database = new Database();
$db = $database->connect();

// Instantiate Product *Type* class
$newProdruct = new $_POST['productType']($db, $_POST['weight']);

var_dump($newProdruct->readAllProducts()->fetch());
// Running error handlers and  sanitizing user input

// Redirect to front page
header("Location: http://178.79.181.140:8888/");
