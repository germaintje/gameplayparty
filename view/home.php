<?php 
      /*$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "gameplayparty";

      //create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      //check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM bioscopen";
      $result = $conn->query($sql);*/
      $connection = mysqli_connect("localhost","root","");
      $db_select = mysqli_select_db($connection, "gameplayparty");

      $query=mysqli_query($connection, "SELECT * FROM bioscopen");
      $rowcount=mysqli_num_rows($query);

?>

<?php
include 'header.php';
?>

<div class="row">
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
                <img src="<?php echo $row["image"]; ?>" alt="tttFirst slide" class="d-block img-fluid" style="width: 100%;">
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
                <img src="<?php echo $row["image"]; ?>" alt="First slide" class="d-block img-fluid" style="width: 100%;">
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
<div class='row'>

<div class="col-5 bioscopenHome">
        <img src='<?php echo $row["image"];?>' style= "width:100%;">
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