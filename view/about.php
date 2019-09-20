<?php

include "header.php";

?>




<div class='container'>
    <div class='row'>

        <div class='col-6'>
        <h4>Contactgegevens</h4>
            <p><b>Bedrijfsnaam:</b> GamePlayParty</p>
            <p><b>Locatie:</b> Ons bedrijf heeft geen vaste locatie. <br>omdat wij doomiddel van bioscopen onze service faciliteren is er geen hoofdkantoor nodig</p>
            <p><b>Email:</b> GamePlayParty@info.nl</p>
            <p><b>Telefoon:</b> Mocht u ons willen contacteren over een reservering kunt u met de desbetreffende bioscoop contact opnemen </p>
            

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

        <div class='col-6'>
        <h4> Over ons </h4>
        <p>GamePlan Party is een startup bedrijf en de enige in zijn branche.<br> Dit komt omdat het concept voor het verhuren van bioscoopzalen met console installaties een compleet origineel idee is.
<br><br>Wij staan in contact met diverse bioscopen in verband met bereikbaarheid en de mogelijk is er dat filialen zich ook nog kunnen aanmelden 
</p>
        <div class="center" style="max-width: 50%; margin: 0 auto; margin-top: 3pc;">
            <img src="view/assets/images/kinepolis-about.png" class="" alt="" style="width: 100%;">
        </div>

        </div>
    </div>
</div>



<?php

include "footer.php";

?>