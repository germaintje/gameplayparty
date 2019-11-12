<?php 

include "view/header.php";
?>

<style>
.geslacht{
   display: inline-block;
}
</style>
<?php

$date = $_GET['date'];
$vandaag = $_GET['vandaag'];

?>
<div id="register">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin: 0 auto;">
               <form action="index.php?op=reservering&date=<?php echo $date; ?>&vandaag=<?php echo $vandaag; ?>" method="POST">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h2 class="text-center">Contact gegevens invullen</h2>
                     </div>
                  <div class="panel-body">
                     <div class="form-check radio">
                           <label class="radio-inline">
                              <input type="radio" name="geslacht" value="Mr" class="geslacht form-check-input" >Mr<br>
                           </div>
                           <label class="radio-inline">
                              <input type="radio" name="geslacht" value="Mvr" class="geslacht form-check-input" >Mvr<br>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="Name">Voornaam:</label>
                           <input class="form-control" type="text" name="voornaam">
                        </div>
                        <div class="form-group">
                           <label for="Name">Achternaam:</label>
                           <input class="form-control" type="text" name="achternaam">
                        </div>
                        <div class="form-group">
                           <label for="Name">Straat:</label>
                           <input class="form-control" type="text" name="straat">
                        </div>
                        <div class="form-group">
                           <label for="Name">Huisnummer:</label>
                           <input class="form-control" type="text" name="huisnummer">
                        </div>
                        <div class="form-group">
                           <label for="Name">Provincie:</label>
                           <input class="form-control" type="text" name="provincie">
                        </div>
                        <div class="form-group">
                           <label for="Name">Telefoonnummer:</label>
                           <input class="form-control" type="text" name="telefoonnummer">
                        </div>
                    
                     <div class="panel-heading">
                        <h2 class="text-center">Reservering</h2>
                     </div>
                        <div class="form-group">
                           <label for="Name">Kinderen:</label>
                           <select class="form-control" name='kinderen'>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                           </select>  
                           <small>Kinderen t/m 11 jaar</small>                      
                        </div>
                                           
                      
                     <div class="panel-footer">
                        <button type="submit" name="submit" class="btn btn-primary pull-right" style="width: 100%">
                           <span class="glyphicon glyphicon-user"></span> Reserveer
                        </button>
                 


                        <div class="clearfix"></div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <?php
    include "view/footer.php";
   ?>