<?php include 'header.php'; ?>
<?php

//tijdelijke oplossing party's
$connection = mysqli_connect("localhost","root","");
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
<form class="form-horizontal" action="index.php?op=updatePostParty&id=<?php echo $id ?>" method="POST">
<fieldset>

<!-- Form Name -->
<legend>update feestje</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">id</label>  
  <div class="col-md-4">
  <input id="textinput"  name="reserveerbeschikbaar_id" type="text" placeholder="placeholder" class="form-control input-md" >  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">titel</label>  
  <div class="col-md-4">
  <input id="textinput"    name="titel" placeholder="placeholder" class="form-control input-md">
 
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">informatie</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="informatie">default text</textarea>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">begin tijd</label>  
  <div class="col-md-4">
  <input id="textinput" type="time" id="appt" name="begin_tijd"
       min="09:00" max="18:00">
 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">eind tijd</label>  
  <div class="col-md-4">
  <input id="textinput" type="time"  id="appt" name="eind_tijd"
       min="09:00" max="18:00">
 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">zaal</label>  
  <div class="col-md-4">
  <input id="textinput"   name="zaal" placeholder="placeholder" class="form-control input-md">
 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">datum</label>  
  <div class="col-md-4">
  <input id="textinput"   type="date" name="dag" placeholder="placeholder" class="form-control input-md">
  <br><br>
  <button id="button1id"type="submit" name="submit"class="btn btn-success">sla op</button>
  </div>
</div>
<div class="form-group">
<div class="col-md-4">
 <input type="hidden" name="b_naam_int" >

 </div>
</div>

</fieldset>
</form>
<?php include 'footer.php'; ?>