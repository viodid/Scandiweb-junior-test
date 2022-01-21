<?php
header('Content-Type: application/json');

include_once '/var/www/html/scandiweb-junior-developer-test-task/config/Database.php';
include_once '/var/www/html/scandiweb-junior-developer-test-task/models/Products.php';


if (isset($_POST['submit'])) {
    echo var_dump($_POST);
    // Grabbing the data
    $sku = $_POST['sku'];
    $sku = $_POST['sku'];
    // Instantiate Product *Type* class

    // Running error handlers and  sanitizing user input

    // Redirect to front page
}
