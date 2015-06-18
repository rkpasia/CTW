<?php
  if(isset($_COOKIE['benvenuto'])){
    $saluto = "Bentornato!";
  }else{
    setcookie("benvenuto","un valore",time()+60);
  }
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Esercitazioni 2</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
  <?php include("f_e2.php"); ?>
  <cite><?php echo "Creatore pagina: " . $creatore . " $saluto" ?></cite>
  <h1>Esercitazioni 2</h1>
  <?php
    $euroDollaro = 1.123705;
    
    function cambio($euro){
      global $euroDollaro;
      return ($euro)*$euroDollaro;
    }
    
    echo cambio(623);
  ?>
</body>
</html>