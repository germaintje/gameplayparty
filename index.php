<?php
//required de controller waar alle public funties staan 
require_once 'controller/ProductsController.php';

$controller = new ProductsController();
$controller->handleRequest();