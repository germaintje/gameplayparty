<!DOCTYPE>
<html lang=nl>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Gameplayparty</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/header.css" type="text/css">
    <link rel="stylesheet" href="view/assets/style.css" type="text/css">
    <link rel="stylesheet" href="view/assets/includes.scss" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="header">
    <img src="view/assets/images/logo.svg" class="logo" style="max-width:100%;">
    
<nav class="navbar navbar-expand-sm navbar-light">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <style>   .nav-button {
        padding-right: 5pc !important;
        color: white !important;
        background: #34495e !important;
        border: transparent;
    }
    .nav-item {
        font-size: 20px;
            color: black;
    border: transparent;
    }
     .nav-button:active {
        padding-right: 5pc !important;
        color: white !important;
        background: #2f5479 !important;
    }
   </style>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-button" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=catalogus">Bioscopen</a></li>
            <li class="nav-item"><a class="nav-button" href="index.php?op=about">Over Ons / Contact</a></li>
            <li class="nav-item"><a class="nav-button login " href="view/logout.php" style="float: right;"><i class="fas fa-sign-out-alt"></i>Log uit</a></li>
                <!--<a class="nav-link" href="index.php?op=contact">Contact</a>-->
            </li>
        </ul>
    </div>
</nav>

</div>

<div class="row">
  <div class="col-12 col-xl-8" style="margin: 0 auto;">
<?php
// hierin moet de database info komen

while ($content = $content->fetch(PDO::FETCH_ASSOC)) {
  $id = $content['page_id'];
  $inhoud = $content['content'];
  $paginanaam = $content['Pagina'];

?>
<style>

form  .editor{
      color: #fff !important;
      background-color: #28a745 !important;
      border-color: #28a745 !important;
    }
</style>

<h1><?php echo $paginanaam; ?></h1>
    <!--formulier die als je op submit klikt het in database zet -->
    <form action="index.php?op=updateContact&id=<?php echo $id; ?>" method="post">
        
        
        <!-- textarea hoerdoor zie je de editor -->
        <textarea name="content" id="editor">
          <!-- zet hierin de variable die je daarboven hebt gemaakt om iets vanuit de database in de editor te showen -->
          <?= $inhoud ?>
        </textarea>
        <!-- submit button -->
      <p><input class="btn btn-success editor" type="submit" value="Submit" name="updateContact"></p>
    </form>
                <!-- script om de editor te laten zien -->
                <script>
                       // Remove a few plugins from the default setup.
                    ClassicEditor
                        .create( document.querySelector( '#editor' ), {
                          // verwijder bepaalde functies
                            removePlugins: [ 'link' ],
                            //voeg functies toe 
                            toolbar: [ 'Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'imageUpload']
                        } )
                        .catch( error => {
                            console.log( error );
                        } ); 
                </script>

<?php
}
?>
</div>






















</div>
<?php include 'footer.php'; ?>