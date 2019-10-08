<?php

include "header.php";

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
    <img src="<?php echo $image; ?>" style="width: 100%;">
     <h3><?php echo $b_naam; ?></h3>
     <p><?php echo $b_adres;?></p>
     <a href="index.php?op=beheerderbiosparty&id=<?php echo $b_naam_int;?>">
     <button type="button" class="btn btn-primary">Bekijk Bioscoop</button>
     </a>
    </div>





<?php
//sluit de while loop
}
?>
<!--
<h2>Recurring unavailable dates</h2>
      <div class="row">
        <div class="col-12">
          <div id="glob-data" data-toggle="calendar"></div>
        </div>
        </div>
        </div>
        -->

<?php 

include 'footer.php';
?><!--
<script type="text/javascript" src="view/scripts/components/jquery.min.js"></script>
    <script type="text/javascript" src="view/scripts/dateTimePicker.min.js"></script>
   
<script type="text/javascript">
$(document).ready(function()
{
      $('#basic').calendar({
        adapter: 'server/adapter.php'
        onSelectDate: function(date, month, year){
          alert([year, month, date].join('-') + ' is: ' + this.isAvailable(date, month, year));
        }
}); 
}

$(document).ready(function()
{
      $('#basic').calendar({
adapter: 'server/adapter.php'
}); 
}
</script>
-->