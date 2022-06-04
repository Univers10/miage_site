<?php
    session_start();
    require('../../../actions/database.php');
    
    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfUsers = $_GET['id'];
        //Vérifier si la question existe

        $checkIUusersExists = $bdd->prepare("SELECT id FROM users WHERE id = ?");
        $checkIUusersExists->execute(array($idOfUsers));

        if($checkIUusersExists->rowCount() > 0){

            //Récupérer les données de la question
            $usersInfos = $checkIUusersExists->fetch();

            $deleteThisQuestion = $bdd->prepare('DELETE FROM users WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfUsers));

            //Rediriger l'utilisateur vers ses questions
            header('Location: showAllUsers.php');

        }else{
            $errorMsg = "Acune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

?>