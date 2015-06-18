<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SESSIONI</title>
    <?php session_start(); ?>
  </head>
  <body>
    <?php if(!$_SESSION['authenticated']): ?>
      <form action="authenticate.php" method="post">
        <input type="text" name="user">
        <input type="password" name="password">
        <input type="submit">
      </form>
    <?php else: ?>
      <p>SEI AUTENTICATO</p>
      <a href="logout.php">Logout</a>
    <?php endif; ?>
  </body>
</html>