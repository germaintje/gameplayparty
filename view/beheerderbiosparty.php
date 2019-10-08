<?php

include "header.php";



//tijdelijke oplossing party's
$connection = mysqli_connect("localhost","root","");
$db_select = mysqli_select_db($connection, "gameplayparty");

$id = $_REQUEST['id'];
$sqr = "SELECT * FROM party WHERE b_naam_int = " .  $id  ;
$query=mysqli_query($connection, $sqr);

$rowcount=mysqli_num_rows($query);


?>


<div class="row eventrow">
<button type="button" class="btn btn-info "><a href="index.php?op=createParty">voeg event toe</a></button>
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
      <button type="submit" name='update' class="btn btn-info " ><a href='index.php?op=updateParty&id=<?php echo $party_id;?>' >bewerk</a></button>
      <button type="submit" name='delete' class="btn btn-danger "  ><a href='index.php?op=deleteParty&id=<?php echo $party_id;?>' >delete</a></button>
    </div>
    
    
  <?php
}
?>
</div>







<?php

include "footer.php";

?>