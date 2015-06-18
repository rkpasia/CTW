<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IMMAGINE - Inserimento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  </head>
  <body>
    <?php 
      require_once("config.php");
      require_once("functions.php");
      if(!isset($_FILES['file'])) die("FILE NON RICEVUTO");
      $tmp_name = $_FILES['file']["tmp_name"];
      $tipo = $_FILES['file']['type'];
      $name = $_FILES['file']['name'];
      echo $name;
      
      if(!checkType($tipo)) die("FILE DI TIPO SCONOSCIUTO");
      if(move_uploaded_file($tmp_name, DIR_IMMAGINI ."/" . $name)) echo "<p>Inserimento effettuato</p>";
      else echo "<p>Non hai permessi corretti</p>";
    ?>
  </body>
</html>