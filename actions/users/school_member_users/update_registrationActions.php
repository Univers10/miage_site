<?php
session_start();
    //Require est l'équivalant de include mais permet de planter la page en cas d'érreur de chargement 
    require("../../database.php");
   //Validation du formulaire
   if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfUser = $_GET["id"];

        //Vérifier si la question existe

        $checkIfUserExists = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $checkIfUserExists->execute(array($idOfUser));


        if($checkIfUserExists->rowCount() > 0){
            //Récupérer les données de la question
            $userInfos = $checkIfUserExists->fetch();
            if($userInfos["id"] == $_SESSION['id']){


                //Récupérer les données du user
                $user_matricule = $userInfos['matricule'];
                $user_firstname = $userInfos['firstname'];
                $user_lastname = $userInfos['lastname'];
                $user_pseudo = $userInfos['pseudo'];
                $user_email = $userInfos['email'];
                $user_phone = $userInfos['phone'];
                $user_birthday = $userInfos['birthday'];
                $user_birth_at = $userInfos['birth_at'];
                $user_gender = $userInfos['gender'];
                $user_roles = $userInfos['roles'];
            }else{
                $errorMsg = "Vous ne pouvez modifier que vos informations personneles";
            }
        }else{
            $errorMsg = "Utilisateur non trouvé";
        }
    }else{
        $errorMsg = "Utilisateur non trouvé";
    }
?>





<?php?>

