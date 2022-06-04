<?php
    session_start();
    require('../../../actions/database.php');
    
    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfUsers = $_GET['id'];
        //Vérifier si la question existe

        $checkIUusersExists = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $checkIUusersExists->execute(array($idOfUsers));

        if($checkIUusersExists->rowCount() > 0){

            //Récupérer les données de la question
            $usersInfos = $checkIUusersExists->fetch();
            // if($usersInfos["matricule"] == $_SESSION['matricule']){

                $user_matricule = $usersInfos['matricule'];
                $user_firstname = $usersInfos['firstname'];
                $user_lastname = $usersInfos['lastname'];
                $user_pseudo = $usersInfos['pseudo'];
                $user_email = $usersInfos['email'];
                $user_phone = $usersInfos['tel'];
                $user_birthday = $usersInfos['birthday'];
                $user_birth_at = $usersInfos['birth_at'];
                $user_gender = $usersInfos['gender'];
                $user_roles = $usersInfos['roles'];

            // }else{
            //     $errorMsg = "Vous n'êtes pas l'auteur de cette question...";
            // }


        }else{
            $errorMsg = "Acune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <div class="main">
        <?php 
            include '../../../actions/generators/passwordGeneratorActions.php';
            // require('../../../actions/users/school_member_users/getInfosOfregistrationActions.php'); 

            if(isset($user_roles)){
                // action="../../../actions/users/school_member_users/registrationActions.php"
        ?>
       
            <form id="name" action ="" method="POST">
                <div class="name">
                    <h2 class="name">Nom</h2>
                    <input type="text" class="lastname" name="lastname" value="<?=$user_lastname?>">
                    <label class="lastlabel">Nom</label>
                    <input type="text" class="firstname" name="firstname" value="<?=$user_firstname?>">
                    <label class="firstlabel">Prénoms</label>
                </div>
                <div class="name">
                    <h2 class="pseudo">Pseudo</h2>
                    <input type="text" class="pseudo_input" name="pseudo" value="<?=$user_pseudo?>">
                </div>
                <div class="name">
                    <h2 class="matricule">Matricule</h2>
                    <input type="text" class="matricule_input" name="matricule" value="<?=$user_matricule?>">
                </div>
                <div class="birthday_div">
                    <h2 class="name">Date de naissance</h2>
                    <input class="birthday" type="date" name="birthday" value="<?=$user_birthday?>">

                    <h2 class="name">Lieu de naissance</h2>
                <input class="birth_at" type="text" name="birth_at" value="<?=$user_birth_at?>">
                </div>
                <div>
                    <h2 class="name">Email</h2>
                    <input class="email" type="email" name="email" value="<?=$user_email?>">
                </div>
                
                <div>
                    <h2 class="name">Phone</h2>
                    <input class="number" type="text" name="phone" value="<?=$user_phone?>">
                    <label class="phone-number">Numero de téléphone</label>
                </div>


                <div>
                    <h2 class="name">Statut</h2>
                    <select name="roles" class="option">
                        <option selected="selected"><?=$user_roles?></option>
                        <option>Admin</option>
                        <option>Secretaire</option>
                        <option>Comptable</option>
                                       
                    </select>
                </div>
        
                

                <h2 class="name">Sexe</h2>
                <div>
                    <h2 class="name">Sexe</h2>
                    <select name="gender" class="option">
                        <option selected="selected"><?=$user_gender?></option>
                        <option>Homme</option>
                        <option>Femme</option>             
                    </select>
                </div>
                <button type="submit" name="validate">Modifier</button>
        
            </form>
        <?php }else{echo "Rien à afficher"; }
        ?>
    </div> 
</body>
</html>
<?php
if(isset($_POST['validate'])){
    var_dump($_POST);

    echo "Valider est bien passé";
    if(
        !empty($_POST['pseudo']) 
        && !empty($_POST['firstname']) 
        && !empty($_POST['lastname']) 
        && !empty($_POST['matricule']) 
        && !empty($_POST['birthday'])
        && !empty($_POST['birth_at'])
        && !empty($_POST['email'])
        && !empty($_POST['phone'])
        && !empty($_POST['gender'])
        ){
        echo "Tout les champs sont bien remplir";
        // Les données de l'utilisateur
        $user_matricule = htmlspecialchars($_POST['matricule']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_phone = htmlspecialchars($_POST['phone']);
        $user_birthday = htmlspecialchars($_POST['birthday']);
        $user_birth_at = htmlspecialchars($_POST['birth_at']);
        $user_gender = htmlspecialchars($_POST['gender']);
        $user_roles = htmlspecialchars($_POST['roles']);
        echo "Toute les champs sont bien remplir";

        //    Verifier si l'utilisateur existe déja sur le site
        $insertUserOnWebsite = $bdd->prepare('UPDATE users SET matricule = ?, firstname = ?, lastname = ?, pseudo = ?, email = ?, tel = ?, birthday = ?, birth_at = ?, gender = ?, roles = ? WHERE id = ?');
        $req = $insertUserOnWebsite->execute(array($user_matricule, $user_firstname, $user_lastname, $user_pseudo, $user_email, $user_phone, $user_birthday, $user_birth_at, $user_gender, $user_roles, $idOfUsers));
        header('Location: showAllUsers.php');       
    
    }else{
        echo 'Erreur';
    }
    if($insertUserOnWebsite){echo "Modification reussir";}

}
?>