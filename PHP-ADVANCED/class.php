<?php

class Libro {
  var $isbn, $titolo, $autore, $editore, $pagine;

  function __contruct($i, $t, $a, $e, $p){
    $this->isbn = $i;
    $this->titolo = $t;
    $this->autore = $a;
    $this->editore = $e;
    $this->pagine = $p;
  }

  function visualizza(){
    return $this->autore.". <em>".$this->titolo."</em>.".$this->editore;
  }
}

$book = new Libro('123514123', 'Il signore degli anelli','Jh','Bompiani',123);
echo $book->titolo;

echo $book->visualizza();

?>