<?php

include "header.php";

//$partycontent = $party->fetch(\PDO::FETCH_ASSOC);
//echo $partycontent['titel'];

$content = $products->fetch(\PDO::FETCH_ASSOC);

$b_naam = $content['b_naam'];
$omschrijving = $content['omschrijving'];
$openingstijden = $content['openingstijden'];
$tarieven = $content['tarieven'];
$toeslagen =  $content['toeslagen'];
$voorwaarden =  $content['voorwaarden'];
$image = $content['image'];


//tijdelijke oplossing party's
$connection = mysqli_connect("localhost","root","");
$db_select = mysqli_select_db($connection, "gameplayparty");

$query=mysqli_query($connection, "SELECT * FROM party");
$rowcount=mysqli_num_rows($query);
?>






<div class="container">
  <div class="row align-items-center">
    <div class="col-12 bios_detail_headers">
      <h1 class="title_bios"><?php echo $b_naam;?></h1>
    </div>
    <div class="col-12 col-md">
     <img src="<?php echo $image; ?>" width=100%>
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

<!----------------------------------- hieronder -->
<div class="row eventrow">
<?php
for($i=1;$i<=$rowcount;$i++)
{
  $row=mysqli_fetch_array($query);

  $titelparty = $row["titel"];
  $party_id = $row['reserveerbeschikbaar_id'];
  $informatie_party = $row['informatie'];
  $tijd_party = $row['tijd'];
  $zaal_party = $row['zaal'];
  $dag_party = $row['dag'];

?>
  <div class="col event">
    <p class="datum_party"><?php echo $dag_party ?></p>
      <h2 class="title_party"><?php echo $titelparty ?></h2>
      <p class="info_party"><?php echo $informatie_party ?></p>
      <h6 class="tijd_party"><?php echo $tijd_party ?></h6>
      <button type="button" class="btn btn-info disabled">Reserveer binnenkort</button>
    </div>
  <?php
}
?>

</div>
  </div>
  </div>



<?php

include "footer.php";
?>