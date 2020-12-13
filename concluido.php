<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="styles/bembonito.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
   <title>MEU QPass</title>
</head>

<body>
   <?php
      session_start();

      include 'connection.php';

      $cNewQuery = "SELECT * FROM usuarios";
      $changeQuery = mysqli_query($connection, $cNewQuery);
      $reg_user = mysqli_fetch_array($changeQuery);

      $_SESSION['passe']    = $reg_user["joinvillePasse"];
      $passe    = $_SESSION['passe'];

      $_SESSION['dinheiro'] = $reg_user["userDinheiro"];
      $dinheiro = $_SESSION['dinheiro'];

      $dinheiro = $dinheiro - $passe;

      $cUpdateQuery = "UPDATE usuarios SET userDinheiro = '$dinheiro'";
      $update = mysqli_query($connection, $cUpdateQuery);
   ?>
   <div class="container-fluid mt-4">
      <div class=" card text-center">
         <div class="card-body">
            <h2 class="card-title">Tudo Certo!</h2>
            <br><br>
            <h4>Transação feita</h4>
            <br>
            <br>
            <br>
            <br>
            <a class="myButton3" href="1_camera.php">voltar</a>
         </div>
      </div>
      <!--fim do card-->

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>