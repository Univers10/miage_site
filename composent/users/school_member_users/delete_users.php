<?php
    session_start();
    require('../../../actions/database.php');
    
    //Vérifier si l'id de  est bien passé en paramètre dans l'URL
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfUsers = $_GET['id'];
        //Vérifier si  existe

        $checkIUusersExists = $bdd->prepare("SELECT id FROM students WHERE id = ?");
        $checkIUusersExists->execute(array($idOfUsers));

        if($checkIUusersExists->rowCount() > 0){
            //Récupérer les données 
            $usersInfos = $checkIUusersExists->fetch();

            $deleteThisQuestion = $bdd->prepare('DELETE FROM students WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfUsers));

            //Rediriger l'utilisateur 
            header('Location: showAllStudent.php');

        }else{
            $errorMsg = "Acune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

?>