<?php

include "header.php";

//$content = $products->fetch(\PDO::FETCH_ASSOC);



?>
<div class="container">
  <div class="row">


<?php
while ($content = $products->fetch(PDO::FETCH_ASSOC)) {
  $b_naam_int = $content['b_naam_int'];
  $b_naam =  $content['b_naam'];
  $b_adres = $content['b_adres'];
  $image = $content['image'];
  

?>


    <div class="col-12 col-xl-4 bioscoop">
    <img src="<?php echo $image; ?>" style="width: 100%; height: 233px;">
     <h3><?php echo $b_naam; ?></h3>
     <p><?php echo $b_adres;?></p>
     <a href="index.php?op=detail&id=<?php echo $b_naam_int;?>">
     <button type="button" class="btn btn-primary">Bekijk Bioscoop</button>
     </a>
    </div>





<?php
//sluit de while loop
}
?>

</div>
</div>

<?php

include "footer.php";
?>