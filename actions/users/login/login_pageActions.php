<?php
session_start();
 //Require est l'équivalant de include mais permet de planter la page en cas d'érreur de chargement 
 require("../../database.php");
//Validation du formulaire
if(isset($_POST['validate'])){
    //    Verifier si l'utilisateur a bien complété tous les champs
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        // Les données de l'utilisateur
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);
    
        //    Verifier si l'utilisateur existe déja sur le site
        $checkIfUserExists = $bdd->prepare("SELECT * FROM users /*or students or lamda_users*/ WHERE email = ?");
        $req =$checkIfUserExists->execute(array($user_email));

        if($checkIfUserExists->rowCount() > 0){
            echo " utilisateur existe";
            $usersInfos = $checkIfUserExists->fetch();
            if($usersInfos){ echo " info user recuperé dans un tableau ";}
            echo $user_password, $usersInfos['mdp'];
            if(/*password_verify($user_password, $usersInfos['mdp'])*/ $user_password == $usersInfos['mdp']){
             
                //Authentifier l'utilisateur sur le site et récuperer ses informations dans des variables globales SESSIONS
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $usersInfos['id'];
                $_SESSION["lastname"] = $usersInfos['lastname'];
                $_SESSION["roles"] = $usersInfos['roles'];
                //Rediriger l'utilisateur vers la page d'accueil 

                echo $_SESSION["roles"];


                if($_SESSION["roles"]== "Admin"){
                    header("Location: ../../../composent/admin.php");
                }
                if($_SESSION["roles"]== "Secretaire"){
                    header("Location: ../../../composent/users/school_member_users/dash_secretaire.php");
                }
                if($_SESSION["roles"]== "Comptable"){
                    header("Location: ../../../composent/paiement/dash_comptable.php");
                }

            }else{
                
                $errorMsg = "Mot de passe incorrect...";
                header("Location: ../../../composent/users/login/login_page.php");
            }

        }else{
            $errorMsg = "Pseudo incorrect...";
        }

    
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}else{
    echo "Erreur de chargement";
}