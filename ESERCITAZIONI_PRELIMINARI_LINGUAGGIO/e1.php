<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Esercitazioni 1</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
  <?php 
    // VARIABILI
    $a = 10;
    $b = "Ciao a tutit";
    $c = $a + 10;
    echo "<p>Questa è una $b</p>";
    echo "<p>Valore di $c</p>";
  ?>
  
  <?php
    //ARRAY
    //Creazione esplitita
    $array1 = array(7,1,"stringa",12);
    //Creazione associativo
    $array2 = array(
      'nome'=>"Toni buzziol"
    );
  ?>
  
  <h3>Esercizio 2</h3>
  <?php
    //ESERCIZIO 2
    $psw = array(
      'Stefano'=>"bela",
      'Riccardo'=>"belissima"
    );
    
    $user = "Riccardo";
    
    echo "Password di $user è $psw[$user]";
    
  ?>
  
  <h3>Esercizio 3</h3>
  <?php
    //ESERCIZIO 3
    $psw = array(
      'Stefano'=>"bela",
      'Riccardo'=>"belissima",
      'Luca' => ""
    );
    
    $user = $_GET['user'];
    
    echo "Password di $user è $psw[$user]";
    
  ?>
  <form class="" action="e1.php" method="get">
    <input type="text" name="user">
    <input type="submit">
  </form>
  
  <h3>Esercizio 4</h3>
  <?php
    //ESERCIZIO 4
    
    echo "<h4>Parametri GET</h4>";
    echo "User = ".$_GET['user'];
    echo "<h4>Parametri POST</h4>";
    echo "User = ".$_POST['user'];
  ?>
  
  <h3>Esercizio 5</h3>
  <h4>Utenti in memoria</h4>
  <?php 
    $users = array('Riccardo','Stefano','Luca');
    for($i=0; $i<sizeof($users); $i++){
      echo $users[$i];
      if($_GET['user'] == $users[$i]) echo " IDENTIFICATO";
      echo "<br />";
    }
  ?>
  
  <h3>Esercizio 6</h3>
  <?php
    if(isset($_GET['user'])){
      echo "La password: User=" . $_GET['user'] . " password=" . $psw[$_GET['user']];
    }
    echo $_SERVER['PHP_SELF']; //CONTIENE IL NOME DELLO SCRIPT
  ?>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>