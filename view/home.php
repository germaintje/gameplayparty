<?php 
   /*
      $connection = mysqli_connect("localhost","root","");
      $db_select = mysqli_select_db($connection, "gameplayparty");

      $query=mysqli_query($connection, "SELECT * FROM bioscopen");
      $rowcount=mysqli_num_rows($query);
*/


if($_SERVER['HTTP_HOST'] != "www.gameplayparty.ga") 
   {
      $connection = mysqli_connect("localhost","root","");
      $db_select = mysqli_select_db($connection, "gameplayparty");

      $query=mysqli_query($connection, "SELECT * FROM bioscopen");
      $rowcount=mysqli_num_rows($query);
	   echo "lokale server";
   }
   else
   {
      $connection = mysqli_connect("localhost:3306","gameplay","gameplay");
      $db_select = mysqli_select_db($connection, "gameplayparty");

      $query=mysqli_query($connection, "SELECT * FROM bioscopen");
      $rowcount=mysqli_num_rows($query);
	   echo "online server";
   }

while ($content = $home->fetch(PDO::FETCH_ASSOC)) {
  $id = $content['page_id'];
  $inhoud = $content['content'];

  //echo $inhoud;

}
?>



<?php
include 'header.php';
?>
<div class="row" style="max-width: 100%;">
  <div class="col-12 col-xl-12" style="text-align: center; margin: 0 auto;">
      <?php echo $inhoud;?>
  </div>
<br><br>
  <div id='carouselId' class='carousel slide' data-ride='carousel' style="width: 100%">
              <ol class='carousel-indicators'>
                <li data-target='#carouselId' data-slide-to='0' class='active'></li>
                <li data-target='#carouselId' data-slide-to='1'></li>
                <li data-target='#carouselId' data-slide-to='2'></li>
              </ol>

              <div class='carousel-inner' role='listbox'>
        <?php
          for($i=1;$i<=$rowcount;$i++)
          {
            $row=mysqli_fetch_array($query);
          
          ?>

          <?php
          if($i==1)
          {
            ?>
            <div class="carousel-item active">
            <div class="col-12 col-xl-8 rechts">
                <img src="<?php echo $row["image"]; ?>" alt="tttFirst slide" class="d-block img-fluid" style="width: 100%; max-height:300px;">
              </div>
              <div class="col-12 col-xl-4">
                <h3><?php echo $row["b_naam"]; ?></h3>
                <?php echo substr($row["omschrijving"],0,300).".....";
 ?>
                <a name='' id='' class='btn btn-primary ' href='index.php?op=detail&id=<?php echo $row['b_naam_int']; ?>' role='button' >Bekijk</a>
              </div>


              

            </div>
            <?php
          }
          else
          {
            ?>
            <div class="carousel-item">
            <div class="col-12 col-xl-8 rechts">
                <img src="<?php echo $row["image"]; ?>" alt="First slide" class="d-block img-fluid" style="width: 100%;  max-height:300px;">
              </div>
              <div class="col-12 col-xl-4 ">
                <h3><?php echo $row["b_naam"]; ?></h3>
                <?php echo substr($row["omschrijving"],0,300).".....";
 ?>
                <a name='' id='' class='btn btn-primary ' href='index.php?op=detail&id=<?php echo $row['b_naam_int']; ?>' role='button' >Bekijk</a>
              </div>


             

            </div>
            <?php
          }
        }
      ?>

      </div>

          <a class='carousel-control-prev' href='#carouselId' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselId' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
      </div>
  </div>
</div>
<br>
<br>
<div class='row' style="max-width: 100%">

<div class="col-5 bioscopenHome">
        <img src='view/assets/images/kinepolis-about.png' style= "width: 100%;">
        <h3>Bioscopen</h3>
        <a href="index.php?op=catalogus"><small class='btn btn-primary'>Bekijk hier alle bioscopen.</small></a>
</div>
<div class="col-5 overonsHome">
<img src="view/assets/images/logo-bewerkt.png" class="">
        <h3>Over ons</h3>
        <a href="index.php?op=about"><small class='btn btn-primary '>Informatie over ons / contact.</small></a>
</div>

</div>
<?php
include 'footer.php';
?>