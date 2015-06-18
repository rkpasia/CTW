<?php require("config.php"); require("functions.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $BLOG_TITLE; ?></title>
  </head>
  <body>
    <?php 
      $countPosts = numeroPost();
      $pages = ceil($countPosts/$POSTPERPAGINA);
      if(!isset($_GET['page']))
        $page = 1;
      else
        $page = $_GET['page'];
      $posts = leggi((($page - 1) * $POSTPERPAGINA) + 1, $POSTPERPAGINA);
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
    <p>
      Pagine: 
      <?php 
        for ($i=1; $i <= $pages; $i++) { 
          if($i != $page) {?>
            <a href="<?php echo $_SERVER['self'] . "?page=$i"; ?>"><?php echo $i; ?></a>
          <?php } else { ?>
            <?php echo $i; ?>
          <?php } ?>
      <?php
        }
      ?>
    </p>
  </body>
</html>