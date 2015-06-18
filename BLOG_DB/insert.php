<?php require("config.php"); require("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BLOG</title>
  </head>
  <body>
    <!--
      $_SERVER['REQUEST_METHOD'] contiene il metodo con cui è stata 
      chiamata la pagina. Se POST eseguo l'azione se GET mostro form.
    -->
    <?php if($_SERVER["REQUEST_METHOD"] == "GET"){ ?>
      <h1>Invia un post</h1>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          Username: <input type="text" name="utente">
          Password: <input type="password" name="password">
          <br><br>
          Titolo: <input type="text" name="titolo">
          <br>
          Contenuto: <textarea name="contenuto" rows="8" cols="40"></textarea>
          <input type="submit" value="Pubblica">
      </form>
    <?php } else {
      if(!utenteValido($_POST['utente'], $_POST['password'])){ ?>
        <h2>ERRORE</h2>
        <p>Non sei autorizzato ad effettuare l'inserimento.</p>
    <?php
      } else {
        registra($_POST['titolo'], $_POST['contenuto']);
        echo "<p> POST PUBBLICATO CON SUCCESSO </p>";
      }
    } ?>
  </body>
</html>