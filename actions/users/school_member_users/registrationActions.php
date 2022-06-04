<?php
    //Creations du systeme d'inscription des utilisateurs de l'administration
    session_start();
    //Require est l'équivalant de include mais permet de planter la page en cas d'érreur de chargement 
    require("../../database.php");
    if($bdd){echo "Connection établir";}
   //Validation du formulaire
    if(isset($_POST ['validate'])){
      echo "Bouton Valider est bien activé";
   //    Verifier si l'utilisateur a bien complété tous les champs
       if(
            !empty($_POST['firstname']) 
            && !empty($_POST['lastname']) 
            && !empty($_POST['matricule']) 
            && !empty($_POST['birthday'])
            && !empty($_POST['birth_at'])
            && !empty($_POST['email'])
            && !empty($_POST['phone'])
            && !empty($_POST['gender'])
            && !empty($_POST['roles'])
            && !empty($_POST['password'])){
            echo "Tout les champs sont bien remplir";
            // Les données de l'utilisateur
            $user_matricule = htmlspecialchars($_POST['matricule']);
            $user_firstname = htmlspecialchars($_POST['firstname']);
            $user_lastname = htmlspecialchars($_POST['lastname']);
            $user_email = htmlspecialchars($_POST['email']);
            $user_phone = htmlspecialchars($_POST['phone']);
            $user_birthday = htmlspecialchars($_POST['birthday']);
            $user_birth_at = htmlspecialchars($_POST['birth_at']);
            $user_gender = htmlspecialchars($_POST['gender']);
            $user_roles = htmlspecialchars('roles');
            $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            echo "Toute les champs sont bien remplir";

            //    Verifier si l'utilisateur existe déja sur le site
            $checkIfUserAlreadyExists = $bdd->prepare("SELECT matricule FROM users WHERE matricule = ?");
            $checkIfUserAlreadyExists->execute(array($user_matricule));
            if($checkIfUserAlreadyExists){echo "checkIfUserAlreadyExists";}
            
            if($checkIfUserAlreadyExists->rowCount() == 0){
                //Isérer l'utilisateurdans la bdd
                $insertUserOnWebsite = $bdd->prepare("INSERT INTO users(matricule, firstname, lastname,  email, tel, birthday, birth_at, gender, roles, mdp)  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $req = $insertUserOnWebsite->execute(array($user_matricule, $user_firstname, $user_lastname, $user_email, $user_phone, $user_birthday, $user_birth_at, $user_gender, $user_roles, $user_password));
                if($req){
                    echo "Enregistrement éffectué avec sudcces";
                    header("Location: ../../composent/users/school_member_users/showAllUsers.php");
                }else{echo "Enregistrement non effectué";}
    
    
            }else{
                $errorMsg = "Cet Etudiant existe déjà sur le site";
            }
          
        }else{
            $errorMsg = "Veuillez compléter tous les champs...";
        }
   } 

?>





<?php?>