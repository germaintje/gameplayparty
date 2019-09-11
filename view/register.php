<?php
#
   include_once 'header.html';
   require_once '../controller/register.controller.php';
   session_start();
   if ( isset($_SESSION['user']['id']) )
   {
      if ( $_SESSION['user']['id'] )
      {
         header('location: home.php');
      }
   }
#
?>

   <div id="register">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <form action="<?php validate( $_SERVER["PHP_SELF"] ); ?>" method="POST">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h2 class="text-center">Create an Account</h2>
                     </div>
                     <div class="panel-body">
                        <?php echo $general_err; ?>
                        <div class="form-group">
                           <label for="lname">Last Name</label>
                           <input type="text" name="lname" class="form-control <?php echo ( !empty($lname_err) ) ? 'error' : ''; ?>" value="<?php echo $lname; ?>">
                           <?php echo $lname_err; ?>
                        </div>
                        <div class="form-group">
                           <label for="fname">First Name</label>
                           <input type="text" name="fname" class="form-control <?php echo ( !empty($fname_err) ) ? 'error' : ''; ?>" value="<?php echo $fname; ?>">
                           <?php echo $fname_err; ?>
                        </div>
                        <div class="form-group">
                           <label for="uid">Username</label>
                           <input type="text" name="uid" class="form-control <?php echo ( !empty($uid_err) ) ? 'error' : ''; ?>" value="<?php echo $uid; ?>">
                           <?php echo $uid_err; ?>
                        </div>
                        <div class="form-group">
                           <label for="email">E-mail</label>
                           <input type="text" name="email" class="form-control <?php echo ( !empty($email_err) ) ? 'error' : ''; ?>" value="<?php echo $email; ?>">
                           <?php echo $email_err; ?>
                        </div>
                        <div class="form-group">
                           <label for="pwd">Password</label>
                           <input type="password" name="pwd" class="form-control <?php echo ( !empty($pwd_err) ) ? 'error' : ''; ?>" value="<?php echo $pwd; ?>">
                           <?php echo $pwd_err; ?>
                        </div>
                        <div class="form-group">
                           <label for="cpwd">Confirm Password</label>
                           <input type="password" name="cpwd" class="form-control <?php echo ( !empty($cpwd_err) ) ? 'error' : ''; ?>" value="<?php echo $cpwd; ?>">
                           <?php echo $cpwd_err; ?>
                        </div>
                     </div>
                     <div class="panel-footer">
                        <a href="login.php" name="login" class="btn btn-primary">Login</a>
                        <button type="submit" name="register" class="btn btn-danger pull-right">Register</button>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
<?php include_once 'footer.html'; ?>