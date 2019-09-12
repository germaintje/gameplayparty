<?php
include 'header.php';
?>

<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="view\assets\images\almere1.jpg" alt="Almere" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="view\assets\images\utrecht1.jpg" alt="Utrecht" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="view\assets\images\utrecht2.jpg" alt="Utrecht" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<?php
include 'view/old/footer.php';
?>
