<?php 
  
  // Inserisce un nuovo post all'interno del file blog.txt
  function registra($title, $text){
    global $BLOGFILE;
    /* 
    * Legge il contenuto di un file e lo
    * restituisce in un array i cui elementi sono
    * le righe del file.
    */
    $content = file($BLOGFILE);
    /* 
    * Divide la stringa in porzioni dove è presente
    * la stringa di separazione e restituisce le parti
    * all'interno di un array.
    */ 
    $penultimo = explode("#", $content[0]);
    $ultimo = $penultimo[0] + 1;
    $fp = fopen($BLOGFILE, "w");
    $title = rendiConforme($title);
    $text = rendiConforme($text);
    
    // Formattazione post
    $post = $ultimo 
            . "#" . date("Y-m-d, G:i") 
            . "#" . $title 
            . "#" . $text . "\n";
            
    fwrite($fp, $post);
    // Se sono presenti post precedenti vengono riscritti
    if(count($content)>0){
      foreach ($content as $post) {
        fwrite($fp, $post);
      }
    }
    fclose($fp);
  }
  
  function rendiConforme($text){
    /*
    * nl2br: restituisce una stringa inserendo ad ogni "a capo" un tag <br>
    * htmlentities: return una stringa a partire da quella passata ove ogni 
    *               carattere non standard viene sostituito con equivalenti 
    *               entità HTML
    * stripslashes: rimuove dall'input ogni occorrenza del carattere \ per
                    effettuare il quoting
    */
    $text = nl2br(htmlentities(stripslashes($text)));
    $text = str_replace("\r\n","",$text);
    $text = str_replace("\n","",$text);
    $text = str_replace("\r","",$text);
    $text = str_replace("#","&hash",$text);
    return $text;
  }
  
  /*
  * Restituisce un array il numero di post indicati
  * all'interno di $count a partire dal post con indice $from.
  * Ogni elemento all'interno dell'array restituito è a sua volta
  * un array costituito da 4 elementi corrispondendi ai dati del post.
  */  
  function leggi($from, $count = NULL){
    global $BLOGFILE;
    $risultato = array();
    $contenuto = file($BLOGFILE);
    if(is_null($count)){
      $count = count($contenuto);
    }
    
    for ($i = $from; ($i - $from < $count) && ($i <= count($contenuto)) ; $i++) { 
      $post = explode("#", $contenuto[$i-1]);
      $risultato[] = $post;
    }
    
    return $risultato;
  }
  
  function numeroPost(){
    global $BLOGFILE;
    $blog = file($BLOGFILE);
    return count($blog);
  }
  
  function utenteValido($utente, $password){
    global $UTENTE, $PASSWORD;
    return ($utente == $UTENTE && $password == $PASSWORD);
  }
  
?>