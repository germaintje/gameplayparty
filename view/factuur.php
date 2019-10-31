<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>GPP</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <style>@charset "UTF-8";
  @import url('https://fonts.googleapis.com/css?family=Open+Sans');
  .keep-together {
    page-break-inside: avoid;
  }

  .break-before {
    page-break-before: always;
  }

  .break-after {
    page-break-after: always;
  }  
  body {
    font-family: 'Open Sans', sans-serif;
  }
  * {
    box-sizing: border-box;
  }
  .row::after {
    content: "";
    clear: both;
    display: table;

  }
[class*="col-"] {
  float: left;
  padding: 1em;
}
  html {
    font-family: "Open Sans", sans-serif;
    color: #2c3e50;
  }
  .header {
    color: #ffffff;
    padding: 2em;
  }
  .menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  .menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }
  .menu li:hover {
    background-color: #0099cc;
  }
  .aside {
    background-color: #33b5e5;
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }
  .footer {
    background-color: #0099cc;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
  }
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
  @media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-s-1 {width: 8.33%;}
    .col-s-2 {width: 16.66%;}
    .col-s-3 {width: 25%;}
    .col-s-4 {width: 33.33%;}
    .col-s-5 {width: 41.66%;}
    .col-s-6 {width: 50%;}
    .col-s-7 {width: 58.33%;}
    .col-s-8 {width: 66.66%;}
    .col-s-9 {width: 75%;}
    .col-s-10 {width: 83.33%;}
    .col-s-11 {width: 91.66%;}
    .col-s-12 {width: 100%;}
  }
  @media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
  }
  .container{
    background: center 0px / 960px no-repeat url(gpp.svg) #F5F5F5;
    width:960px;
    margin: 0 auto;
  }
  table{
    width: inherit;
  }
  .ral{
    text-align: right;
  }
  .hil{
    background-color: #C4E538;
  }
  .odd{
    background-color: #A3CB38;
  }
.menu > li {
  padding: 1em;
  margin-bottom: 1em;
   background-color: #FFF; 
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  display: inline;
  font: condensed 0.8em/46px 'Open Sans';
}
  .bob{
      border-bottom: 2px solid #FFC312;
  }
  .rot {
  transform: rotate(-15deg);
  font: bold 3em/5em 'Open Sans';
  margin-bottom: -3em;
  }
</style>
</head>


<body>
  <div class="container">
    <div class="header"></div>
    <article class="row">
      <div class="col-7 ral rot">Reservering</div>
      <div class="col-5 ral">
        <h4>Kinepolis Jaarbeurs</h4>
        Jaarbeursboulevard 300<br>
        3521 BC  UTRECHT<br>
        UTRECHT
      </div>
      <div class="col-7">
        <h4> 
          <?php
        echo $_POST['geslacht']. ". "; 
        echo $_POST['voornaam'];
        echo " ";
        echo $_POST['achternaam'];
       ?></h4>
        <?php echo $_POST['straat']; ?><br>
        <?php echo $_POST['provincie']; ?><br>
        Tel: <?php echo $_POST['telefoonnummer']; ?>    
      </div>
      <div class="col-5">
        <div class="row">
          <div class="col-6 odd">
            <strong>Reserverings ID:</strong><br>
            <strong>Datum:</strong><br>
            <strong>Reserveringsdatum:</strong><br>
            <strong>Reserveringstijd:</strong><br>
            <strong>Totaal EURO:</strong><br><br>
          </div>
          <div class="col-6 bob">
            <strong>GPP-08009</strong><br>
            28 september, 2018<br>
            14 oktober, 2018<br>
            12:15 - 13:45<br>
            €163,35<br><br>
          </div>
        </div>
      </div>
      <div class="col-4 odd"><strong>Dienst</strong></div>
      <div class="col-3 odd"><strong>Tarief</strong></div>
      <div class="col-5 odd"><strong>Bedrag</strong></div>
      <div class="col-4 bob"><strong>Kids GamePlayParty</strong><br>Vrijdag 14 oktober, 2018</div>
      <div class="col-3 bob"><strong>Kinderen t/m 11 jaar:</strong> 8 @ €20,00</div>
      <div class="col-5 bob">€160,00<br><br></div>
      <div class="col-4 bob"><strong>Laser ULTRA</strong><br>Vrijdag 14 oktober, 2018</div>
      <div class="col-3 bob"><strong>Toeslag:</strong> 8 @ €2,50<br><br></div>
      <div class="col-5 bob">€ 20,00<br><br></div>
      <div class="col-7 ral"><strong>Subtotaal:</strong></div>
      <div class="col-5">€180,00</div>
      <div class="col-7 ral"><strong>BTW 21%:</strong></div>
      <div class="col-5">€ 37,80</div>
      <div class="col-7 ral"><strong>Totaal:</strong></div>
      <div class="col-5">€217,80</div>
      <div class="col-7 ral bob"><strong>Reeds voldaan:</strong></div>
      <div class="col-5 bob">€ 54,45</div>
      <div class="col-7 ral"><strong>Nog te voldoen (75%):</strong></div>
      <div class="col-5 hil"><strong>€163,35</strong></div>
      <div class="col-12"><strong>Betalingen: </strong>14-10-2018 <strong>€ 54,45 </strong>(MasterCard 1243)</div>
      <div class="col-12 bob"><h2>Informatie over Kinepolis Jaarbeurs Utrecht</h2></div>
      <div class="col-6 bob">
        <p>Met Kinepolis Jaarbeurs (14 zalen, 3200 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland. Kinepolis Jaarbeurs biedt elke filmbezoeker ‘the ultimate cinema experience’: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau.</p>
      </div>

      <div class="col-6 bob">
        <p><strong>Openingstijden:</strong><br>
        Donderdag: 9:15 uur - 12:00 uur<br>
        Vrijdag: 13:15 uur - 15:15 uur<br></p>
        <br>
        <br>
        <br>
        <br>

      </div>
      <div class="col-4">
        <p><strong>Reguliere tarieven:</strong></p>
      </div>
      <div class="col-8">
        € 10,80 | Normaal<br>
        € 6,50 | Kinderen t/m 11 jaar<br>
        € 8,50 | Jeugd 12 t/m 17 jaar<br>
        € 9,00 | 65+<br>
        € 8,70 | Studenten, CJP & BankGiro Loterij VIP-KAART
      </div>
      <div class="col-4">
        <p><strong>Toeslagen:</strong></p>
      </div>
      <div class="col-8">
        € 0,50 | toeslag bij film van 135 minuten en langer<br>
        € 1,50 | 3D-toeslag excl. bril<br>
        € 2,60 | 3D-toeslag incl. bril<br>
        € 1,50 | Dolby Atmos<br>
        € 2,50 | Laser ULTRA<br>
        € 2,50 | COSY

      </div>
      <div class="col-4">
        <p><strong>Voorwaarden:</strong></p>
      </div>
      <div class="col-8">
        <ul>
          <li>Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.</li>
        </ul>
      </div>
      <div class="col-4">
        <p><strong>Bereikbaarheid auto:</strong></p>
      </div>
      <div class="col-8">
        <p>Met de auto bereikt u Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding 'Jaarbeurs' te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid. Parkeren op het Jaarbeursterrein is per 1 mei gratis voor alle automobilisten die een kaartje voor de film hebben gekocht.</p>
      </div>
      <div class="col-4">
        <p><strong>Bereikbaarheid OV:</strong></p>
      </div>
      <div class="col-8">
        <p>Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden ‘Jaarbeursplein’ en loop richting de Jaarbeurshallen. Binnen enkele minuten vindt u de bioscoop aan uw linkerhand.</p>
      </div>
      <div class="col-4">
        <p><strong>Bereikbaarheid Fiets:</strong></p>
      </div>
      <div class="col-8">
        <p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>
      </div>
      <div class="col-4">
        <p><strong>Rolstoeltoegankelijkheid:</strong></p>
      </div>
      <div class="col-8">
        <p>Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.</p>
      </div>        

      <div class="col-4">
        <p><strong>Voorwaarden:</strong></p>
      </div>
      <div class="col-8">
        <p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>
      </div>
      <div class="col-12">
        <table>
          <thead>
            <tr class="bob">
              <th>Zaal</th>
              <th>Aantal stoelen</th>
              <th>Rolstoelplaatsen</th>
              <th>Schermgrootte</th>
              <th>Faciliteiten</th>
              <th>Versies</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd"><td>1</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class="screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden" title="Toegankelijk voor andersvaliden">Toegankelijk voor andersvaliden</span></td><td><div class="screen-technology icon icon-screen-technology-laser" title="Laser"><span>Laser</span></div><div class="screen-technology icon icon-screen-technology-dolby-71" title="Dolby 7.1"><span>Dolby 7.1</span></div></td></tr>
            <tr class="even"><td>2</td><td>102</td><td>2</td><td>11.20m x 4.68m</td><td><span class="screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden" title="Toegankelijk voor andersvaliden">Toegankelijk voor andersvaliden</span></td><td><div class="screen-technology icon icon-screen-technology-laser" title="Laser"><span>Laser</span></div><div class="screen-technology icon icon-screen-technology-dolby-71" title="Dolby 7.1"><span>Dolby 7.1</span></div></td></tr>
          </table>
        </div>
        <div class="col-12">
          <ul class="menu">
            <li><a href="index.php?op=gebruiksvoorwaarden">Gebruiksvoorwaarden</a></li>
            <li><a href="index.php?op=privacy">Privacy beleid</a></li>
            <li><a href="index.php?op=cookie">Cookie beleid</a></li>
            <li><a href="/algemene-verkoopvoorwaarden">Algemene Verkoopvoorwaarden</a></li>
            <li><a href="/privacy-beleid-b2b">Privacy beleid B2B</a></li>
            <li><a href="/sitemap">Sitemap</a></li>
          </ul>
        </div>
      </article>
    </div>
  </body>
  </html>