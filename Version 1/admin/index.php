<?php
    if(!$_SESSION['mdp']){
        header('Location: connexion.php');
    }
?>