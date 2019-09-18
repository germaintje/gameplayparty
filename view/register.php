<?php
#
  
   require_once '../controller/register.controller.php';
   session_start();
   if ( isset($_SESSION['user']['id']) )
   {
      if ( $_SESSION['user']['id'] )
      {
         header('location: ../');
      }
   }
#
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Gameplayparty</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/header.css" type="text/css">
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <link rel="stylesheet" href="assets/includes.scss" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src=""></script>
    <noscript>Please turn on javascript in your browser settings</noscript>
</head>
<body>
<div class="header">
    <img src="assets/images/logo.svg" class="logo">
<nav class="navbar navbar-expand-sm navbar-light">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="index.php?op=catalogus">Bioscopen</a>
                <a class="nav-link" href="index.php?op=about">Over Ons</a>
                <a class="nav-link" href="index.php?op=contact">Contact</a>
            </li>
        </ul>
    </div>
    </nav>
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
<?php include_once 'footer.php'; ?>