<?php
    $user  ="root";
    $mdp="";
    $db="projet de classe";
    $_SERVER="localhost";

    $link=mysqli_connect($_SERVER, $user, $mdp, $db);
    if($link){
        // echo "Connextion établie";
    }else{
        die(pdo());
    }
?>