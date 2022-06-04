<?php
try{
    $user  ="root";
    $mdp="";
    $db="db_site_ecole";
    $_SERVER="localhost";

    $bdd = new PDO("mysql:host=$_SERVER;dbname=$db;charset=utf8", "$user", "$mdp");
    echo "Connexion établie ... ";

    // Initialisation du temps
    date_default_timezone_set("Africa/Abidjan");  
    $DateAndTime = date('d/m/Y h:i:s a', time());

}catch(Exception $e){
    die('Une erreur a été trouvée : ' .$e->getMessage());
}