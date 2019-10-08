<?php include "header.php"; ?>
<style>
#iframe {
    zoom: 3.00;
}
button{
  margin: 0 auto;
}
</style>
<div class="row">
  <div class="col-12">
    <h3 style="text-align: center;"> Kies de pagina die u wilt wijzigen </h3>
  </div>
  <div class="col-12 col-xl-12" style="margin: 0 auto;">
      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Home</h4>
        <iframe id="iframe" src="index.php?op=home" width="100%"></iframe>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <button type="button" class="btn btn-primary">Klik om te editen</button>
        </div>
      </div>

      <div class="col-12 col-xl-6">
      <div class="pagina">
        <h4 style="text-align: center;">Contact</h4>
        <iframe id="iframe" src="index.php?op=about" width="100%"></iframe>
        <!--<img src="view/assets/images/editabout.png" style="width: 100%;">-->

        <button type="button" class="btn btn-primary">Klik om te editen</button>
        </div>
      </div>
  </div>


</div>
<?php include 'footer.php'; ?>

<style>
.pagina {
  padding: 10px;
  background: white;
}
</style>