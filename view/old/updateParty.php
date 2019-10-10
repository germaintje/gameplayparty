<?php include 'header.php'; ?>
<?php

//tijdelijke oplossing party's
$connection = mysqli_connect("localhost:3306","gameplay","gameplay");
$db_select = mysqli_select_db($connection, "gameplayparty");

$id = $_REQUEST['id'];
$sqr = "SELECT * FROM party WHERE reserveerbeschikbaar_id =". $id  ;
$query=mysqli_query($connection, $sqr);

$rowcount=mysqli_num_rows($query);

    $row=mysqli_fetch_array($query);

    $titelparty = $row["titel"];
    $party_id = $row['reserveerbeschikbaar_id'];
    $informatie_party = $row['informatie'];
    $begintijd_party = $row['begin_tijd'];
    $eindtijd_party = $row['eind_tijd'];
    $zaal_party = $row['zaal'];
    $dag_party = $row['dag'];
    $b_naam_int = $row['b_naam_int'];
  
    ?>
<form action="index.php?op=updatePostParty&id=<?php echo $id ?>" class="form" style=" padding: 15px 17px 10px 65px;" method="POST">
    <legend>update uw PARTY</legend>
    <label>Id: </label><input type="text" value="<?php echo $party_id?>" name="reserveerbeschikbaar_id">
    <label>titel: </label><input type="text" value="<?php echo $titelparty?>" name="titel">
    <label>informatie: </label><input type="text" value="<?php echo $informatie_party?>" name="informatie">
    <label>begin tijd: </label><input type="time" value="<?php echo $begintijd_party?>" id="appt" name="begin_tijd"
       min="09:00" max="18:00" name="begin_tijd">
    <label>eind tijd: </label><input type="time" value="<?php echo $eindtijd_party?>" id="appt" name="eind_tijd"
       min="09:00" max="18:00" name="eind_tijd">
    <label>zaal: </label><input type="text" name="zaal" value="<?php echo $zaal_party?>">
    <label>dag: </label><input type="date" name="dag" value="<?php echo $dag_party?>">
    <input type="hidden" name="b_naam_int" value="<?php echo $b_naam_int?>">
    <button type="submit" name="submit">submit</button>
</form>

<?php include 'footer.php'; ?>