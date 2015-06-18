<?php 
    include_once("config.php");
    include_once("functions.php");
    if(!isset($_GET['immagine']))
      die("ERRORE ACCESSO IN MODO SCORRETTO");
    $immagine = $_GET['immagine'];
    $lista_file = loadDirectory(DIR_IMMAGINI);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IMMAGINE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  </head>
  <body>
    <?php echo "<img class=\"col-sm-5 image-responsive\" src=\"" . DIR_IMMAGINI . "/" . $lista_file[$immagine] . "\"/>" ?>
    <?php echo linkToText($immagine-1, "Precedente"); ?>
    <?php echo linkToText($immagine+1, "Successivo"); ?>
    <a href="inserimento.html">Inserisci</a>
  </body>
</html>