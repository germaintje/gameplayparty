<?php include 'header.php'; ?>
<button type="button" class="btn btn-primary"><a href="index.php?op=beheerderbios" class="textcolor" style="color:white;">ga terug naar bioscopen</a></button>
<style>

</style>
<form class="form-horizontal" action="index.php?op=CreatePostParty" method="POST">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput"  name="reserveerbeschikbaar_id" type="hidden"
  value="hidden" placeholder="placeholder" class="form-control input-md" >  
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