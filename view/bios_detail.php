<?php

include "header.php";

$content = $products->fetch(\PDO::FETCH_ASSOC);


$b_naam = $content['b_naam'];
$openingstijden = $content['openingstijden'];
$tarieven = $content['tarieven'];
$toeslagen =  $content['toeslagen'];
$voorwaarden =  $content['voorwaarden'];






?>

<div class="container">
  <div class="row align-items-center">
    <div class="col-12 bios_detail_headers">
      <h1 class="title_bios">Kinepolis Almere</h1>
    </div>
    <div class="col-12 col-md">
     <img src="../view/assets/images/kinepolisDenhelder.jpg" width=100%>
    </div>
      <div class="col-12 col-md">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum fringilla malesuada. Cras sodales quam quam, 
          sollicitudin mattis ipsum auctor a. Morbi porta est non libero euismod scelerisque at vitae mauris. Maecenas erat tortor, 
          ornare pretium sem eget, egestas venenatis mauris. Sed facilisis libero efficitur porta venenatis. Fusce lobortis gravida augue
          , a tincidunt magna tempor in. Pellentesque rhoncus risus nec mattis congue.
          Duis orci velit, vestibulum varius euismod eget, rutrum a lorem. Mauris hendrerit risus lacus, id 
          vehicula augue laoreet sit amet. Duis hendrerit aliquet accumsan. Aenean nec facilisis felis, ut iaculis nibh. C
          urabitur accumsan sit amet sapien in tempor. Ut placerat in neque a pulvinar. Quisque id pulvinar tortor. Nunc mi diam, moll
          is sit amet nibh sit amet, accumsan commodo enim. Integer fringilla orci urna, sagittis venenatis mauris volutpat a.
        </p>
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