<?php

  $dsn = "mysql:host=localhost;dbname=CTW;";

  $dbh = new PDO($dsn, "root", "root");
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try{
    $stmt = $dbh->prepare("SELECT name FROM users");
    $stmt->execute();

    while($record = $stmt->fetch()){
      echo $record['name']."<br>";
    }
  }catch(PDOException $e){ echo $e->getMessage(); }

  $dbh = NULL; //CHIUDO LA CONNESSIONE
?>