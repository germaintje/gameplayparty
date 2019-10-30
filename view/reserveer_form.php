<?php 

include "view/header.php";
?>

<style>
.geslacht{
   display: inline-block;
}
</style>

<div id="register">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin: 0 auto;">
               <form action="" method="POST">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h2 class="text-center">Contact gegevens invullen</h2>
                     </div>
                     <div class="panel-body">
                     <div class="form-check">
                           <input type="radio" name="geslacht" value="Mr" class="geslacht form-check-input" value="checkedValue">Mr<br>
                           <input type="radio" name="geslacht" value="Mvr" class="geslacht form-check-input" value="checkedValue">Mvr
                        </div>
                        <div class="form-group">
                           <label for="Name">Voornaam:</label>
                           <input type="text" name="voornaam">
                        </div>
                        <div class="form-group">
                           <label for="Name">Achternaam:</label>
                           <input type="text" name="achternaam">
                        </div>
                        <div class="form-group">
                           <label for="Name">Straat:</label>
                           <input type="text" name="straat">
                        </div>
                        <div class="form-group">
                           <label for="Name">Huisnummer:</label>
                           <input type="text" name="huisnummer">
                        </div>
                        <div class="form-group">
                           <label for="Name">Provincie:</label>
                           <input type="text" name="provincie">
                        </div>
                        <div class="form-group">
                           <label for="Name">Telefoonnummer:</label>
                           <input type="text" name="telefoonnummer">
                        </div>
                     </div>
                     <div class="panel-heading">
                        <h2 class="text-center">Reservering</h2>
                     </div>
                        <div class="form-group">
                           <label for="Name">Kinderen:</label>
                           <select>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="1">5</option>
                              <option value="2">6</option>
                              <option value="3">7</option>
                              <option value="4">8</option>
                              <option value="1">9</option>
                              <option value="2">10</option>
                              <option value="3">11</option>
                              <option value="4">12</option>
                              <option value="1">13</option>
                              <option value="2">14</option>
                              <option value="3">15</option>
                              <option value="4">16</option>
                              <option value="1">17</option>
                              <option value="2">18</option>
                              <option value="3">19</option>
                              <option value="4">20</option>
                           </select>  
                           <small>Kinderen zijn 10 t/m 16 jaar</small>                      
                        </div>
                                           
                        </div>

                     <div class="panel-footer">
                        <button type="submit" name="login" class="btn btn-primary pull-right">
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