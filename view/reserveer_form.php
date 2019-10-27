<?php 

include "view/header.php";
?>

<div id="register">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin: 0 auto;">
               <form action="" method="POST">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h2 class="text-center">Log in je account</h2>
                     </div>
                     <div class="panel-body">
                        <div class="form-group">
                           <label for="email">E-mail</label>
                           <input type="text" name="email" class="form-control <?php echo ( !empty($general_err) ) ? 'error' : ''; ?>" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                           <label for="pwd">Password</label>
                           <input type="password" name="pwd" class="form-control <?php echo ( !empty($general_err) ) ? 'error' : ''; ?>" value="<?php echo $pwd; ?>">
                        </div>
                     </div>
                     <div class="panel-footer">
                        <button type="submit" name="login" class="btn btn-primary pull-right">
                           <span class="glyphicon glyphicon-user"></span> Login
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