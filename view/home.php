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
              <div class="col-4">
                <h3><?php echo $row["b_naam"]; ?></h3>
                <p><?php echo $row["omschrijving"]; ?></p>
              </div>
              <div class="col-8">
                <img src="<?php echo $row["image"]; ?>" alt="First slide" class="d-block img-fluid" style="width: 100%;">
              </div>

              

            </div>
            <?php
          }
          else
          {
            ?>
            <div class="carousel-item">
              <div class="col-4">
                <h3><?php echo $row["b_naam"]; ?></h3>
                <p><?php echo $row["omschrijving"]; ?></p>
              </div>
              <div class="col-8">
                <img src="<?php echo $row["image"]; ?>" alt="First slide" class="d-block img-fluid" style="width: 100%;">
              </div>

             

            </div>
            <?php
          }
        }
      ?>

<a name='' id='' class='btn btn-primary homebutton' href='#' role='button' >Bekijk</a>

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

<?php
include 'footer.php';
?>