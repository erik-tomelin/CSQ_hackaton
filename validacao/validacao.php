<?php
    session_start();

    $email = $_POST['user'];
    $senha = $_POST['pass'];

    include '../connection.php';

    $cQuery = "SELECT * FROM usuarios WHERE userEmail = '$email' and userPass = '$senha'";
    $changeQuery = mysqli_query($connection, $cQuery);

    if(mysqli_num_rows ($changeQuery) > 0 ) {
        $reg_user = mysqli_fetch_array($changeQuery);
        
        $_SESSION['id']     = $reg_user["userID"];
        $_SESSION['user']   = $email; 
        $_SESSION['pass']   = $senha; 
        
        echo $_SESSION['user'];
        echo $_SESSION['pass'];

        header('Location:../telaUser.php');
    } else {
        echo "teste";
    }    
?>