<?php
#
  
   require '../controller/login.controller.php';
   session_start();
   if ( isset($_SESSION['user']['id']) )
   {
      if ( $_SESSION['user']['id'] )
      {
         header('location: ../index.php?op=beheerderhan');
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
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="../index.php?op=catalogus">Bioscopen</a>
                <a class="nav-link" href="../index.php?op=about">Over Ons / contact</a>
                <!--<a class="nav-link" href="../index.php?op=contact">Contact</a>-->
            </li>
        </ul>
    </div>
</nav>

</div>

   <div id="register">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin: 0 auto;">
               <form action="<?php echo validate( $_SERVER["PHP_SELF"] ); ?>" method="POST">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h2 class="text-center">Log in je account</h2>
                     </div>
                     <div class="panel-body">
                        <?php echo $general_err; ?>
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
<?php include_once 'footer.php'; ?>