<?php include "header.php"; ?>
<!-- javascript van de WYSIWYG -->
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<?php
// hierin moet de database info komen
$data = "testt";
?>

<h1>Classic editor</h1>
    <!--formulier die als je op submit klikt het in database zet -->
    <form action="[URL]" method="post">
        <!-- textarea hoerdoor zie je de editor -->
        <textarea name="content" id="editor">
          <!-- zet hierin de variable die je daarboven hebt gemaakt om iets vanuit de database in de editor te showen -->
          <?= $data ?>
        </textarea>
        <!-- submit button -->
      <p><input type="submit" value="Submit"></p>
    </form>
                <!-- script om de editor te laten zien -->
                <script>
                       // Remove a few plugins from the default setup.
                    ClassicEditor
                        .create( document.querySelector( '#editor' ), {
                          // verwijder bepaalde functies
                            removePlugins: [ 'Heading', 'link' ],
                            //voeg functies toe 
                            toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote']
                        } )
                        .catch( error => {
                            console.log( error );
                        } ); 
                </script>

<?php
    //$editor_data = $_POST[ 'content' ];
?>















<!--
<div class="fr-view">
  Here comes the HTML edited with the Froala rich text editor.
</div>

<div id="myEditor">t</div>
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
-->


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