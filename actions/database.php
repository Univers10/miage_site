<?php
try{
    $user  ="root";
    $mdp="";
    $db="db_site_ecole";
    $_SERVER="localhost";

    $bdd = new PDO("mysql:host=$_SERVER;dbname=$db;charset=utf8", "$user", "$mdp");
    echo "Connexion établie ... ";

}catch(Exception $e){
    die('Une erreur a été trouvée : ' .$e->getMessage());
}