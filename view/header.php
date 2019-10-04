<!DOCTYPE html>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Gameplayparty</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/header.css" type="text/css">
    <link rel="stylesheet" href="view/assets/style.css" type="text/css">
    <link rel="stylesheet" href="view/assets/includes.scss" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src=""></script>
    <noscript>Please turn on javascript in your browser settings</noscript>
</head>
<body>
<div class="header">
    <img src="view/assets/images/logo.svg" class="logo" style="max-width:100%;">
    <div class="animation"> <img src="view/assets/images/monkey.svg" class="imgani" style="width:100px; height:100px;  position:relative;     margin: 120px 0px 0px -2000px;    " ><style>
     @media screen and (min-width: 800px) {
         .animation {
        width: 100px;
        height: 100px;
        
        position: relative;
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        -webkit-animation-duration: 8s; /* Safari 4.0 - 8.0 */
        -webkit-animation-delay: 2s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        animation-duration: 4s;
        animation-delay: 2s;
       float: right;
      }
      
      /* Safari 4.0 - 8.0 */
      @-webkit-keyframes example {
        0%   { left:0px; top:0px;}
        25%  { left:1600px; top:0px;}
        50%  { left:1200px; top:0px;}
        75%  { left:200px; top:0px;}
        100% { left:200px; top:0px;}
      }
      
      /* Standard syntax */
      @keyframes example {
        0%   { left:300px; top:0px;}
        25%  { left:600px; top:0px;}
        50%  { left:1200px; top:0px;}
        75%  { left:1800px; top:0px;}
        100% {left:2200px; top:0px;}
      }
     }</style></div>
    
<nav class="navbar navbar-expand-sm navbar-light">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <style>   .nav-button {
        padding-right: 5pc !important;
        color: white !important;
        background: #34495e !important;
        border: transparent;
    }

  

    
    .nav-item {
        font-size: 20px;
            color: black;
    border: transparent;
    }
     .nav-button:active {
        padding-right: 5pc !important;
        color: white !important;
        background: #2f5479 !important;
    }

    .nav-button:hover {
        padding-right: 5pc !important;
        color: white !important;
        background: #2f5479 !important;
        box-shadow: 0 12px 16px 0 rgba(57, 62, 75, 0.24), 0 17px 50px 0 rgba(57, 62, 75, 0.24) !important;
    } </style>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-button" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=catalogus">Bioscopen</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=about">Over Ons / Contact</a></li>
                <!--<a class="nav-link" href="index.php?op=contact">Contact</a>-->
            </li>
        </ul>
    </div>
</nav>

</div>