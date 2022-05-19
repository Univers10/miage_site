<?php

    require('actions/database.php');
    
    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL

    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfUsers = $_GET['id'];
        //Vérifier si la question existe

        $checkIUusersExists = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $checkIUusersExists->execute(array($idOfUsers));

        if($checkIUusersExists->rowCount() > 0){

            //Récupérer les données de la question
            $usersInfos = $checkIUusersExists->fetch();
            if($usersInfos["matricule"] == $_SESSION['matricule']){

                $users_title = $usersInfos['title'];
                $user_matricule = $usersInfos['matricule'];
                $user_firstname = $usersInfos['firstname'];
                $user_lastname = $usersInfos['lastname'];
                $user_pseudo = $usersInfos['pseudo'];
                $user_email = $usersInfos['email'];
                $user_phone = $usersInfos['tel'];
                $user_birthday = $usersInfos['birthday'];
                $user_birth_at = $usersInfos['birth_at'];
                $user_gender = $usersInfos['id_gender'];
                $user_roles = $usersInfos['id_roles'];

            }else{
                $errorMsg = "Vous n'êtes pas l'auteur de cette question...";
            }


        }else{
            $errorMsg = "Acune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

?>