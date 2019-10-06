<?php

include "header.php";

while ($data = $about->fetch(PDO::FETCH_ASSOC)) {
  $bedrijfsnaam = $data['bedrijfsnaam'];
  $locatie =  $data['locatie'];
  $email = $data['email'];
  $telefoon = $data['telefoon'];
  $over = $data['about'];

}

?>




<div class='container'>
    <div class='row'>
   

        <div class='col-12 col-xl-6'>
            <!--<p><b>Bedrijfsnaam:</b> <?php echo $bedrijfsnaam; ?></p>
            <p><b>Locatie:</b><?php echo $locatie; ?>
                     <p><b>Email:</b> <?php echo $email; ?></p>
            <p><b>Telefoon:</b><?php echo $telefoon; ?> </p>
            -->
            <?php echo $locatie; ?>



        </div>

        <div class='col-12 col-xl-6'>
                        <!-- Contact form -->
                        <?php 
                //begin mail functie
                if(isset($_REQUEST['email'])){


                    $admin_email = "anasskadouri.ak@gmail.com";
                    $email = $_REQUEST['email'];
                    $subject = $_REQUEST['subject'];
                    $comment = $_REQUEST['comment'];

                    mail($admin_email, "$subject", $comment, "From:" . $email);

                    echo "Bedankt voor uw bericht wij proberen zo snel mogelijk contact met uw op te nemen!";
                    }

                    else{
                ?>
                    <link rel="stylesheet" href="mail_sturen.css" type="text/css">
                    <form method="post" class="form">
                        <h4>Contact opnemen met ons</h4>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Emailadres:</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Wij zullen nooit uw email delen met anderen.</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Onderwerp:</label>
                            <input name="subject" class="form-control" type="text" placeholder="Onderwerp">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Bericht:</label>
                            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Verstuur</button>
                    </form>
                <?php
                    }
                    //einde mail functie
                 ?>
        </div>
    </div>
</div>



<?php

include "footer.php";

?>
