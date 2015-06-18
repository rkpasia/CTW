<?php 
  
  require("functions.php");
  session_start();
  
  if(authenticate($_POST['user'], $_POST['password'])) 
    $_SESSION['authenticated'] = TRUE;
  
  header('Location: index.php');

?>