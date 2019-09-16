<?php

include "header.php";

$content = $products->fetch(\PDO::FETCH_ASSOC);


$b_naam = $content['b_naam'];
$omschrijving = $content['omschrijving'];
$openingstijden = $content['openingstijden'];
$tarieven = $content['tarieven'];
$toeslagen =  $content['toeslagen'];
$voorwaarden =  $content['voorwaarden'];






?>

<div class="container">
  <div class="row align-items-center">
    <div class="col-12 bios_detail_headers">
      <h1 class="title_bios"><?php echo $b_naam;?></h1>
    </div>
    <div class="col-12 col-md">
     <img src="../view/assets/images/kinepolisDenhelder.jpg" width=100%>
    </div>
      <div class="col-12 col-md">
        <p><?php echo $omschrijving; ?></p>
      </div>
  </div>



  <div class="row">
    <div class="col-4"></div>
    <div class="col-4 tijdentitle bios_detail_headers">
      <h2>Tijden en zalen</h2>
    </div>
    <div class="col-4"></div>

    </div>
  </div>

  <div class="row eventrow">
  <div class="col-12 col-md event">
    <p class="datum_party">Maandag 9 oktober</p>
      <h2 class="title_party">Title</h2>
      <p class="info_party">Information</p>
      <h6 class="tijd_party">Tijd...</h6>
      <button type="button" class="btn btn-info">Info</button>
    </div>
    <div class="col-12 col-md event">
    <p class="datum_party">Maandag 9 oktober</p>
      <h2 class="title_party">Title</h2>
      <p class="info_party">Information</p>
      <h6 class="tijd_party">Tijd...</h6>
      <button type="button" class="btn btn-info">Info</button>
    </div>
    <div class="col-12 col-md event">
    <p class="datum_party">Maandag 9 oktober</p>
      <h2 class="title_party">Title</h2>
      <p class="info_party">Information</p>
      <h6 class="tijd_party">Tijd...</h6>
      <button type="button" class="btn btn-info">Info</button>
    </div>
    <div class="col-12 col-md event">
    <p class="datum_party">Maandag 9 oktober</p>
      <h2 class="title_party">Title</h2>
      <p class="info_party">Information</p>
      <h6 class="tijd_party">Tijd...</h6>
      <button type="button" class="btn btn-info">Info</button>
    </div>
    <div class="col-12 col-md event">
    <p class="datum_party">Maandag 9 oktober</p>
      <h2 class="title_party">Title</h2>
      <p class="info_party">Information</p>
      <h6 class="tijd_party">Tijd...</h6>
      <button type="button" class="btn btn-info">Info</button>
    </div>
  </div>
  </div>







  </div>



<?php

include "footer.php";
?>