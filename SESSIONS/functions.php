<?php 
  
  require("config.php");
  
  function dbConnect(){
    $conn = mysqli_connect($GLOBALS['DB_HOST'],$GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD'])
            or die("ERROR ".mysqli_connect_error());
            
    mysqli_select_db($conn,$GLOBALS['DB_NAME']) or die("ERROR CONNECT".mysqli_error());
    return $conn;
  }
  
  function authenticate($user, $password){
    $db = dbConnect();
    $sql = "SELECT password FROM users WHERE name='" . addslashes($user) . "'";
    
    $resp = mysqli_query($db, $sql) or die("ERROR FETCH ".mysqli_error());
    if(count($resp) == 0) return FALSE;
    $row = mysqli_fetch_row($resp);
    return ($row[0] == md5($password));
  }


?>