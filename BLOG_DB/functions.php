<?php 
  
  function registra($title, $text){
    $conn = dbConnect();
    
    $title = nl2br(htmlentities($title, ENT_QUOTES, 'UTF-8'));
    $text = nl2br(htmlentities($text, ENT_QUOTES, 'UTF-8'));
    $data = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO posts(data, title, text) VALUES('"
           . $data . "','" . $title . "','" . $text ."')";
    mysqli_query($conn,$sql) 
    or die("Errore nella query" . mysqli_error($conn));
    
    mysqli_close($conn);
  }
    
  function leggi($from, $count = NULL){
    
    $conn = dbConnect();
    $risultato = array();
    $from -= 1;
    
    $sql = "SELECT * FROM posts ORDER BY data DESC LIMIT "
           . $from . "," . $count;
           
    $response = mysqli_query($conn, $sql) 
                or die("ERRORE" . mysqli_error($conn));

    while( $row = mysqli_fetch_row($response)){
      $risultato[] = $row;
    }
    
    mysqli_close($conn);
    return $risultato;
  }
  
  function numeroPost(){
    $conn = dbConnect();
    $sql = "SELECT MAX(id) as numero FROM posts";
    $response = mysqli_query($conn,$sql)
                or die("ERRORE" . mysqli_error($conn));
    $num = mysqli_fetch_row($response);
    mysqli_close($conn);
    return $num[0];
  }
  
  function utenteValido($utente, $password){
    $conn = dbConnect();
    $sql= "SELECT password FROM users WHERE name='" . addslashes($utente) . "'";
    
    $response = mysqli_query($conn,$sql)
                or die("ERRORE". mysqli_error($conn));
    
    if(mysqli_num_rows($response) == 0) return FALSE;
    $row = mysqli_fetch_row($response);
    mysqli_close($conn);
    return (md5($password) == $row[0]);
  }
  
  function dbConnect(){
    $conn = mysqli_connect("localhost","root","root")
            or die("ERROR" . mysqli_connect_error());
    
    mysqli_select_db($conn, "CTW") or die("ERROR". mysqli_error($conn));
    return $conn;
  }
  
?>