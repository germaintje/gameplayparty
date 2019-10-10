<!DOCTYPE>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Gameplayparty</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/header.css" type="text/css">
    <link rel="stylesheet" href="view/assets/style.css" type="text/css">
    <link rel="stylesheet" href="view/assets/includes.scss" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="header">
    <img src="view/assets/images/logo.svg" class="logo" style="max-width:100%;">
    
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
   </style>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-button" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=catalogus">Bioscopen</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=about">Over Ons / Contact</a></li>
            <li class="nav-item"><a class="nav-button login " href="view/logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i>Log uit</a></li>
                <!--<a class="nav-link" href="index.php?op=contact">Contact</a>-->
            </li>
        </ul>
    </div>
</nav>

</div>
<?php
// Initialize the session
session_start();
 

?>

<style>
#iframe {
    zoom: 3.00;
}
button{
  margin: 0 auto;
}
</style>
<div class="row">
  <div class="col-12">
    <h3 style="text-align: center;"> Kies de pagina die u wilt wijzigen </h3>
  </div>
  <div class="col-12 col-xl-8" style="margin: 0 auto;">
      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Home</h4>
        <i class="fas fa-home" style="width: 100%; text-align: center; font-size: 10pc;"></i>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <a href="index.php?op=edithanneke&id=2"><button type="button" class="btn btn-primary" style="display: block;">Klik om deze pagina te editen</button></a>
        </div>
      </div>

      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Over ons / Contact</h4>
        <i class="fas fa-users" style="width: 100%; text-align: center; font-size: 10pc;"></i>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <a href="index.php?op=edithanneke&id=1"><button type="button" class="btn btn-primary" style="display: block;">Klik om deze pagina te editen</button></a>
        </div>
      </div>
  </div>
</div>
	
<div class="row">
  <div class="col-12">
  </div>
  <div class="col-12 col-xl-8" style="margin: 0 auto;">
      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Gebruiksvoorwaarden</h4>
        <i class="fas fa-file-alt" style="width: 100%; text-align: center; font-size: 10pc;"></i>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <a href="index.php?op=edithanneke&id=3"><button type="button" class="btn btn-primary" style="display: block;">Klik om deze pagina te editen</button></a>
        </div>
      </div>

      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Privacy beleid</h4>
        <i class="fas fa-user-lock" style="width: 100%; text-align: center; font-size: 10pc;"></i>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <a href="index.php?op=edithanneke&id=4"><button type="button" class="btn btn-primary" style="display: block;">Klik om deze pagina te editenn</button></a>
        </div>
      </div>
  </div>
</div>
	<div class="row">
  <div class="col-12">
  </div>
  <div class="col-12 col-xl-8" style="margin: 0 auto;">
      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Cookie beleid</h4>
        <i class="fas fa-cookie" style="width: 100%; text-align: center; font-size: 10pc;"></i>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <a href="index.php?op=edithanneke&id=5"><button type="button" class="btn btn-primary" style="display: block;">Klik om deze pagina te editen</button></a>
        </div>
      </div>

     
  </div>
</div>
<?php include 'footer.php'; ?>

<style>
.pagina {
  padding: 10px;
  background: white;
}
</style>