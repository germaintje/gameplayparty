<?php include "header.php"; ?>

<div id="example"></div>
<script>
var editor = new FroalaEditor('#example')
</script>

<div class="fr-view">
  Here comes the HTML edited with the Froala rich text editor.
</div>

<div id="myEditor"></div>
<button id="saveButton">Save</button>

<script>
  var editor = new FroalaEditor('#myEditor', {
    // Set the save param.
    saveParam: 'content',

    // Set the save URL.
    saveURL: 'http://example.com/save',

    // HTTP request type.
    saveMethod: 'POST',

    // Additional save params.
    saveParams: {id: 'my_editor'},

    events: {
      'save.before': function () {
        // Before save request is made.
      },

      'save.after': function () {
        // After successfully save request.
      },

      'save.error': function () {
        // Do something here.
      }
    }
  })

  document.querySelector('#saveButton').addEventListener("click", function () {
    editor.save.save();
  })
</script>



<?php
/*
while ($content = $content->fetch(PDO::FETCH_ASSOC)) {
  $id = $content['about_id'];
  $bedrijfsnaam =  $content['bedrijfsnaam'];
  $email = $content['email'];
  $locatie = $content['locatie'];

  echo "<strong>Contact pagina</strong>";
  echo "<br>";
  echo "bedrijfsnaam" . $bedrijfsnaam;
  echo "<br>";
  echo "email" . $email;
  echo "<br>";
  echo "locatie" . $locatie;

}
*/
?>





<?php include 'footer.php'; ?>