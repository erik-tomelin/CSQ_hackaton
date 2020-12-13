<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="styles/bunito.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
   <title>MEU QPass CAM</title>
</head>

<body>
   <?php
   setlocale(LC_MONETARY, "pt_BR", "ptb");

   session_start();

   include 'connection.php';

   $cQuery = "SELECT * FROM usuarios";
   $changeQuery = mysqli_query($connection, $cQuery);
   $reg_user = mysqli_fetch_array($changeQuery);

   $_SESSION['passe']    = $reg_user["joinvillePasse"];
   $passe    = $_SESSION['passe'];

   $_SESSION['dinheiro'] = $reg_user["userDinheiro"];
   $dinheiro = $_SESSION['dinheiro'];

   $numPasse = $dinheiro / $passe;

   ?>
   <!--card para o token-->
   <div class="container-fluid mt-4">
      <div class=" card text-center">
         <div class="card-body">
            <h2 class="card-title">QPass</h2>
            <a id="emp" class="card-subtitle mb-2 text-muted">by: ctrl+shift+QUACK</a>
            <br>
            <br>
            <h4>seu saldo:</h4>
            <h2 id="calculo"><?php echo 'R$' . number_format($dinheiro, 2, ',', '.'); ?></h2>
            <h6 id="passes"><?php echo 'Você tem ', floor($numPasse), ' disponíveis'; ?></h6>
            <br>
            <input type="button" class="myButton" value="Câmera"></input>
            <a type="submit" class="myButton2" value="NFC" href="1_nfc.php">NFC</a>
            <br>
            <div class="qr_cod">
               <img class="logo mt-4 mb-4" src="https://imgur.com/c8mWhNV.png" width="50%">
               <div class="token mb-3">
                  <a id="numero">
                     <script>
                        function getRandom() {
                           document.getElementById("numero").innerHTML = (Math.floor(Math.random() * 88889) + 10000);
                        }
                     </script>
                  </a>
               </div>
            </div>
            <a id="dig mb-3">aproxime a câmera do código QR</a>
            <br>
            <br>

            <input type="button" class="gerar" onclick="getRandom()" value="Gerar um código"></input>
            <input type="button" class="gerar" onclick="window.location.href = 'concluido.php'" value="Concluído"></input>

         </div>
      </div>
   </div>
   <!--fim do card-->



   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>