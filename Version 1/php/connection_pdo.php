<?php
    $user  ="root";
    $mdp="";
    $db="projet de classe";
    $_SERVER="localhost";

    $bdd = new PDO("mysql:host=$_SERVER;dbname=$db;charset=utf8", "$user", "$mdp");
    if($bdd){
        // echo "Connextion établie";
    }else{
        die("Erreur de connexion");
    }
?>
