<?php
require_once 'controller/ProductsController.php';



require_once 'utility/utility.php';
require_once 'router/r_contacts.php';



$controller = new ProductsController();
$controller->handleRequest();
$request = new ContactsRouter();
echo $request->handleRequest();