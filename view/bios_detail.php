<?php
date_default_timezone_set('Europe/Amsterdam');
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

if($_SERVER['HTTP_HOST'] == "gameplayparty.ga") 
   {
      //tijdelijke oplossing party's
      $connection = mysqli_connect("localhost:3306","gameplay","gameplay");
      $db_select = mysqli_select_db($connection, "gameplayparty");
	
   }elseif($_SERVER['HTTP_HOST'] == "www.gameplayparty.ga"){
     //tijdelijke oplossing party's
      $connection = mysqli_connect("localhost:3306","gameplay","gameplay");
      $db_select = mysqli_select_db($connection, "gameplayparty");

   }else{
     //tijdelijke oplossing party's
      $connection = mysqli_connect("localhost","root","");
      $db_select = mysqli_select_db($connection, "gameplayparty");

   }


      $id = $_REQUEST['id'];
      $sqr = "SELECT * FROM party WHERE b_naam_int = " .  $id  ;
      $query=mysqli_query($connection, $sqr);

      $rowcount=mysqli_num_rows($query);

?>






<div class="container">
  <div class="row align-items-center">
    <div class="col-12 bios_detail_headers">
      <h1 class="title_bios"><?php echo $b_naam;?></h1>
    </div>
    <div class="col-12 col-md">
     <img src="<?php echo $image; ?>" height=200px; width=100%>
    </div>
      <div class="col-12 col-md">
        <p><?php echo $omschrijving; ?></p>
      </div>
  </div>



  <div class="row">
    <div class="col-12 col-xl-12 tijdentitle bios_detail_headers">
      <h2>Tijden en zalen</h2>
    </div>
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
  $begintijd_party = $row['begin_tijd'];
  $eindtijd_party = $row['eind_tijd'];
  $zaal_party = $row['zaal'];
  $dag_party = $row['dag'];

  $dag = date("l", strtotime($dag_party));

  if($dag == "Monday"){

    $dag = "Maandag";
    
    }elseif($dag == "Tuesday"){
    
    $dag = "Dinsdag";
    
    }elseif($dag == "Wednesday"){
    
    $dag = "Woensdag";
    
    }elseif($dag == "Thursday"){
    
    $dag = "Donderdag";
    
    }elseif($dag == "Friday"){
    
    $dag = "Vrijdag";
    
    }elseif($dag == "Saturday"){
    
    $dag = "Zaterdag";
    
    }elseif($dag == "Sunday"){
    
    $dag = "Zondag";
    
    }

    $maand = date("F", strtotime($dag_party));

    if($maand == "January"){

      $maand = "januari";
      
      }elseif($maand == "February"){
      
      $maand = "februari";
      
      }elseif($maand == "March"){
      
      $maand = "maart";
      
      }elseif($maand == "April"){
      
      $maand = "april";
      
      }elseif($maand == "May"){
      
      $maand = "mei";
      
      }elseif($maand == "June"){
      
      $maand = "juni";
      
      }elseif($maand == "July"){
      
      $maand = "juli";
      
      }elseif($maand == "August"){

        $maand = "augustus";

      }elseif($maand == "September"){
      
        $maand = "september";
        
      }elseif($maand == "October"){
      
        $maand = "oktober";
          
      }elseif($maand == "November"){
      
        $maand = "november";
            
      }elseif($maand == "December"){
      
        $maand = "december";
        
        }

?>
  <div class="col event">
      <p class="datum_party"><?php echo $dag. " " .date("d", strtotime($dag_party)). " " .$maand ?></p> 
     
      <h2 class="title_party"><?php echo $titelparty ?></h2>
      <p class="info_party"><?php echo $informatie_party ?></p>
      <p>Begin tijd:</p><h6 class="tijd_party"><?php echo date("G:i", strtotime($begintijd_party)) ?></h6>
      <p>Eind tijd:</p><h6 class="tijd_party"><?php echo date("G:i", strtotime($eindtijd_party)) ?></h6>
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