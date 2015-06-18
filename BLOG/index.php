<?php require("config.php"); require("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $BLOG_TITLE; ?></title>
  </head>
  <body>
    <a href="insert.php">Inserisci nuovo post</a>
    <ul>
      <?php 
        $posts = leggi(1,$POSTPERPAGINA);
        if(count($posts)>0){
          foreach ($posts as $post ) { ?>
              <li>
                <h3><?php echo $post[2]; ?></h3>
                <span>pubblicato da: <?php echo $UTENTE; ?> il
                <?php echo $post[1]; ?></span>
                <p><?php echo $post[3]; ?></p>
              </li>
      <?php
          }
        }
      ?>
    </ul>
  </body>
</html>