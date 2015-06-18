<?php 
  
  require_once("config.php");
  
  /* Effettua il caricamento dei file presenti
   * nella directory $dir che soddisfano l'espressione
   * regolare $formati
   */
  function loadDirectory($dir){
    $dh = opendir($dir) or die("ERROE APERTURA DIRECTORY");
    $content = array();
    while(($file = readdir($dh)) != FALSE){
      if(!is_dir($file) && checkFormat($file)){
        $content[] = $file;
      }
    }
    closedir($dh);
    return $content;
  }
  
  function linkToImage($index, $file){
    return "<a href=\"visualizza.php?image="
           . $index ."\">"
           . "<img class=\"img-responsive\" src=\"" . DIR_IMMAGINI . "/"
           . $file . "\"/></a>";
  }
  
  function linkToText($index, $text = ""){
    return "<a href=\"visualizza.php?immagine="
           . $index . "\">"
           . $text
           . "</a>";
  }
  
  function checkFormat($fileName){
    global $formati_immagine;
    foreach ($formati_immagine as $formato) {
      if(strpos($fileName, $formato)){
        return TRUE;
      }
    }
    return FALSE;
  }
  
  function checkType($type){
    global $tipi_immagine;
    foreach ($tipi_immagine as $formato) {
      if(strpos($type, $formato) === 0)
        return TRUE;
    }
    return FALSE;
  }

?>