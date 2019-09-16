<?php

include "header.php";

?>



<div class='container'>
<div class='row'>

<div class='col-6'></div>

<div class='col-6'>
<?php 
//begin mail functie


if(isset($_REQUEST['email'])){


    $admin_email = "anasskadouri.ak@gmail.com";
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $comment = $_REQUEST['comment'];

    mail($admin_email, "$subject", $comment, "From:" . $email);

    echo "Thanks for contacting us!";
    }

    else{
?>
        <link rel="stylesheet" href="mail_sturen.css" type="text/css">
<form method="post">
    <h4>Neem contact op met ons!</h4>
<label>Email adres:</label><input name="email" type="text">
<label>Onderwerp:</label><input name="subject" type="text">
<label>Bericht: </label>

    <textarea name="comment" rows="15" cols="40"></textarea>

<input type="submit" value="Submit">


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