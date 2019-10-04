<?php

include "header.php";

?>
<div class="beheerform">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>beheer bios</legend>

<!-- Text input-->
<div class="form-group">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md"> 
</div>

<!-- Text input-->
<div class="form-group">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md"> 
</div>

<!-- Textarea -->
<div class="form-group">
                   
    <textarea class="form-control" id="textarea" name="textarea">default text</textarea>

</div>

<!-- Text input-->
<div class="form-group">

  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">

</div>

<!-- File Button --> 
<div class="form-group">

    <input id="filebutton" name="filebutton" class="input-file" type="file">

</div>

<!-- Button (Double) -->
<div class="form-group">
    <button id="button1id" name="button1id" class="btn btn-success">Good Button</button>
    <button id="button2id" name="button2id" class="btn btn-danger">Scary Button</button>
</div>

</div>
<?php 

include 'footer.php';
?>