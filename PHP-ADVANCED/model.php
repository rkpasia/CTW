<?php

  class Computer {

    private $id, $descrizione;

    function __construct($n, $s){
      $this->id = $n;
      $this->descrizione = $s;
    }

    function getId(){
      return $this->id;
    }

    function getDesc(){
      return $this->descrizione;
    }

  }

  class ParcoMacchine {

    private $collezione, $dsn;

    function __construct(){
      $this->collezione = array();
      $this->$dsn = "mysql:host=localhost;dbname=CTW";
    }

    function leggi(){
      $dbh = new PDO($this->dsn, "root", "root");
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      try{
        $stmt = $dbh->prepare("SELECT computerID, computerDescription FROM computers");
        $stmt->execute();
        while($record = $stmt->fetch()){
          $this->collezione[] = new Computer($record['computerID'], $record['computerDescription']);
        }
      } catch(PDOException $e){ echo $e->getMessage(); die();}
    }

    $dbh = NULL;

  }

?>