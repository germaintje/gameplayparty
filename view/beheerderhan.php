<?php

include "header.php";



while ($content = $content->fetch(PDO::FETCH_ASSOC)) {
  $id = $content['about_id'];
  $bedrijfsnaam =  $content['bedrijfsnaam'];
  $email = $content['email'];
  $locatie = $content['locatie'];

  echo "<strong>Contact pagina</strong>";
  echo "<br>";
  echo "bedrijfsnaam" . $bedrijfsnaam;
  echo "<br>";
  echo "email" . $email;
  echo "<br>";
  echo "locatie" . $locatie;

}
  




include 'footer.php';

?>