<?php
    session_start();
    require('../../actions/database.php');
    echo $_SESSION["id"];
  
    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL  
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfStudent = $_GET['id'];
        //Vérifier si la question existe

        $checkIfPaiementExists = $bdd->prepare("SELECT * FROM students WHERE id = ?");
        $checkIfPaiementExists->execute(array($idOfStudent));

        if($checkIfPaiementExists->rowCount() > 0){

            //Récupérer les données de la question+
            $usersInfos = $checkIfPaiementExists->fetch();
            // if($usersInfos["matricule"] == $_SESSION['matricule']){

                $user_matricule = $usersInfos['matricule'];
                $user_firstname = $usersInfos['firstname'];
                $user_lastname = $usersInfos['lastname'];
                $user_classe = $usersInfos['level']." ".$usersInfos['classe'];



            // }else{
            //     $errorMsg = "Vous n'êtes pas l'auteur de cette question...";
            // }


        }else{
            $errorMsg = "Acune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }


if(isset($_POST['validate'])){
    var_dump($_POST);

    echo "Valider est bien passé";
    if(
        !empty($idOfStudent) 
        && !empty($_POST['solde'])

        ){
        echo "Tout les champs sont bien remplir";
        // Les données de l'utilisateur

        // $paiement_matricule = htmlspecialchars($_POST['matricule']);
        // $paiement_firstname = htmlspecialchars($_POST['firstname']);
        // $paiement_lastname = htmlspecialchars($_POST['lastname']);
        // $paiement_classe = htmlspecialchars($_POST['classe']);
        // $paiement_agent_comptable = htmlspecialchars($_POST['agent_comptable']);
        $paiement_date = htmlspecialchars($_POST['date']);
        $paiement_solde = htmlspecialchars($_POST['solde']);
        echo "Toute les champs sont bien remplir";

        //    Verifier si l'utilisateur existe déja sur le site
        $insertpaiementOnWebsite = $bdd->prepare("INSERT INTO wallet(id_student, id_comptable, solde, versement1, date_versement1)VALUES(?,?,?,?,?)");
        $req = $insertpaiementOnWebsite->execute(array($idOfStudent, $_SESSION["id"], $paiement_solde, $paiement_solde, $paiement_date));
              
    
    }else{
        echo 'Erreur';
    }
    if($insertpaiementOnWebsite){echo "Paiement reussir";}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un etudiant</title>
</head>
<body>
    <div class="main">
    <?php 
            // if(isset($paiement_roles)){
            ?>

    <form id="name" action ="" method="POST">
        <div class="name">
            <h2 class="matricule">Matricule</h2>
            <input type="text" class="matricule_input" name="matricule" value="<?=$user_matricule?>" readOnly>
        </div>

        <div class="name">
            <h2 class="name">Nom</h2>
            <input type="text" class="lastname" name="lastname" value="<?=$user_lastname?>" readOnly>
            <label class="lastlabel">Nom</label>
            <input type="text" class="firstname" name="firstname" value="<?=$user_firstname?>" readOnly>
            <label class="firstlabel">Prénoms</label>
        </div>

        <div class="name">
            <h2 class="class">Classe</h2>
            <input type="text" class="class_input" name="classe" value="<?=$user_classe?>" readOnly>
        </div>
            <div class="birthday_div">
                <h2 class="name">Date</h2>
                <input class="birthday" type="text" name="date" value="<?= $DateAndTime?>" readOnly>

                <h2 class="name">Agent comptable</h2>
                <input class="agent_comptable" type="text" name="agent_comptable" value="Mr/Mme <?=$_SESSION["lastname"]?>">
            </div>
           
            <div>
                <h2 class="name">Solde</h2>
                <input class="solde" type="text" name="solde" value="">
            </div>


            <button type="submit" name="validate">Modifier</button>
            </form>
            <?php 
            // }else{echo "Rien à afficher"; }
        ?>
    </div> 
</body>
</html>