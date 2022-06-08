<?php
    session_start();
    require('../../actions/database.php');
  
    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL  
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfStudent = $_GET['id'];

        //Vérifier si la question existe

        $checkIfPaiementExists = $bdd->prepare("SELECT * FROM students WHERE id = ?");
        $reqPaiement = $bdd->prepare("SELECT * FROM wallet WHERE id_student = ?");
        $checkIfPaiementExists->execute(array($idOfStudent));
        $req= $reqPaiement->execute(array($idOfStudent));
        if($checkIfPaiementExists->rowCount() > 0){
            
            $usersInfos = $checkIfPaiementExists->fetch();
            $versement = $reqPaiement->fetch();
            
                $user_matricule = $usersInfos['matricule'];
                $user_firstname = $usersInfos['firstname'];
                $user_lastname = $usersInfos['lastname'];
                $user_classe = $usersInfos['level']." ".$usersInfos['classe'];

                $versement1 = $versement['versement1'];
                $versement2 = $versement['versement2'];
                $versement3 = $versement['versement3'];
                $versement4 = $versement['versement4'];            
                $solde = $versement['solde'];
                $scolarite = $versement['scolarite'];
                




        }else{
            $errorMsg = "Aucun étudiant n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucun étudiant n'a été trouvée";
    }


if(isset($_POST['validate'])){
    echo $_SESSION["id"];
    echo $idOfStudent;
    var_dump($_POST);
    
    if(
        !empty($idOfStudent) 
        && !empty($_POST['solde'])
        ){
            $paiement_date = htmlspecialchars($_POST['date']);
        $paiement_solde = htmlspecialchars($_POST['solde']);
        $newSolde = $paiement_solde + $solde;

        if($solde==0){
            
            //    Verifier si l'utilisateur existe déja sur le site
            $updatePaiementOnWebsite = $bdd->prepare("UPDATE wallet SET id_comptable = ?, solde = ?, versement1 = ?, date_versement1 = ? WHERE id_student = ?");
            $req = $updatePaiementOnWebsite->execute(array($_SESSION["id"], $paiement_solde, $paiement_solde, $paiement_date, $idOfStudent));
        }else{            
           
            if($versement2==0){
                //    Verifier si l'utilisateur existe déja sur le site
                $updatePaiementOnWebsite = $bdd->prepare("UPDATE wallet SET solde=?, versement2= ? WHERE id_student = ?");
                $updatePaiementOnWebsite->execute(array($newSolde, $paiement_solde, $idOfStudent));
            
            }else{
                if($versement3==0){
                    //    Verifier si l'utilisateur existe déja sur le site
                    $updatePaiementOnWebsite = $bdd->prepare("UPDATE wallet SET solde=?, versement3= ? WHERE id_student = ?");
                    $updatePaiementOnWebsite->execute(array($newSolde, $paiement_solde,$idOfStudent));
                
                }else{
                    if($versement4==0){
                        //    Verifier si l'utilisateur existe déja sur le site
                        $updatePaiementOnWebsite = $bdd->prepare("UPDATE wallet SET solde=?, versement4= ? WHERE id_student = ?");
                        $updatePaiementOnWebsite->execute(array($newSolde, $paiement_solde,$idOfStudent));
                    }
                }
            }

        }
    }else{
        echo 'Erreur';
    }
    if($updatePaiementOnWebsite){
        echo "Paiement reussir";
        // header("Location: showAllStudent.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un etudiant</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    <div class="main_div">
        <?php 
            if(isset($user_matricule)){
        ?>
        

            <form id="name" action ="" method="POST">
                <div class="form_div">
                    <div class="name">
                        <h2 class="matricule">Matricule</h2>
                        <input type="text" class="matricule_input" name="matricule" value="<?=$user_matricule?>" readOnly>
                    </div>
        
                    <div class="name">
                        <h2 class="name">Nom</h2>
                        <input type="text" class="lastname" name="lastname" value="<?=$user_lastname?>" readOnly>

                    </div>
                    
                    <div class="name">
                        <h2 class="firstlabel">Prénoms</h2>
                        <input type="text" class="firstname" name="firstname" value="<?=$user_firstname?>" readOnly>
                    </div>
        
                    <div class="name">
                        <h2 class="class">Classe</h2>
                        <input type="text" class="class_input" name="classe" value="<?=$user_classe?>" readOnly>
                    </div>
                        <div class="birthday_div">
                            <h2 class="name">Date</h2>
                            <input class="birthday" type="text" name="date" value="<?= $DateAndTime?>" readOnly>
        
                            <h2 class="name">Agent comptable</h2>
                            <input class="agent_comptable" type="text" name="agent_comptable" value="Mr/Mme <?=$_SESSION["lastname"]?>" readOnly>
                        </div>
                    
                        <div>
                            
                            <?php 
                            if($versement3 !=0){
                                $solde = $scolarite - $solde ;                            
                            ?>
                                <h2 class="name">Solde</h2>
                                <input class="solde" type="text" name="solde" value="<?= $solde?>" readOnly>
                                <?php 
                            }else{
                            ?>
                            <h2 class="name">Solde</h2>
                            <input class="solde" type="text" name="solde" value="">
                            <?php
                                }
                            ?>
                        </div>
                        <button class="name" type="submit" name="validate">Valider</button>
                    </div>
                </form>
                <?php 
                }else{echo "Rien à afficher"; }
            ?>
    </div> 
</body>
</html>