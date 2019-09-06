<?php

require_once 'controller/ProductsController.php';

include 'view/old/header.php';

require_once 'utility/utility.php';


$controller = new ProductsController();
$controller->handleRequest();