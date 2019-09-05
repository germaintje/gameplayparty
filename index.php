<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Stardunks L2</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon"> -->
    <link rel="stylesheet" href="view/assets/style.css" type="text/css">
    <link rel="stylesheet" href="view/assets/grid-v1.2.css" type="text/css">
    <link rel="stylesheet" href="view/assets/fontAwesome-all.min.css" type="text/css">
</head>
<body>


<?php
require_once 'controller/ProductsController.php';
$productsController = new ProductsController("stardunks", "root", "");
$productsController->handleRequest();

?>
</body>
</html>
