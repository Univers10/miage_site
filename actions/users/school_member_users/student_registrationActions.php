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
            !empty($_POST['pseudo']) 
            && !empty($_POST['firstname']) 
            && !empty($_POST['lastname']) 
            && !empty($_POST['matricule']) 
            && !empty($_POST['birthday'])
            && !empty($_POST['birth_at'])
            && !empty($_POST['email'])
            && !empty($_POST['phone'])
            && !empty($_POST['level'])
            && !empty($_POST['class'])
            && !empty($_POST['diploma'])
            && !empty($_POST['gender'])
            && !empty($_POST['password'])){
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
            $user_level = htmlspecialchars($_POST['level']);
            $user_class = htmlspecialchars($_POST['class']);
            $user_diploma = htmlspecialchars($_POST['diploma']);
            $user_gender = htmlspecialchars($_POST['gender']);
            $user_roles = htmlspecialchars('3');
            $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            echo "Toute les champs sont bien remplir";

            //    Verifier si l'utilisateur existe déja sur le site
            $checkIfUserAlreadyExists = $bdd->prepare("SELECT matricule FROM students WHERE matricule = ?");
            $checkIfUserAlreadyExists->execute(array($user_matricule));
            if($checkIfUserAlreadyExists){echo "checkIfUserAlreadyExists";}
            
            if($checkIfUserAlreadyExists->rowCount() == 0){
                //Isérer l'utilisateurdans la bdd
                $insertUserOnWebsite = $bdd->prepare("INSERT INTO students(matricule, firstname, lastname, pseudo, email, tel, birthday, birth_at, id_level, id_class, id_diploma, id_gender, id_roles, mdp)  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
                $req = $insertUserOnWebsite->execute(array($user_matricule, $user_firstname, $user_lastname, $user_pseudo, $user_email, $user_phone, $user_birthday, $user_birth_at, $user_level, $user_class, $user_diploma, $user_gender, $user_roles, $user_password));
                if($req){
                    echo "Enregistrement éffectué avec sudcces";
                }else{echo "Enregistrement non effectué";}
    
                //Récupérer les informations de l'utilisateur
                // $get_InfoOfThisUserReq = $bdd->prepare("SELECT id, matricule, email FROM students WHERE matricule = ?");
                // $get_InfoOfThisUserReq->execute(array($user_matricule));
                
                //La fonction fetch permet de recupperer les informations sur une ligne donnée
                // $usersInfos = $get_InfoOfThisUserReq->fetch();
    
                //Authentifier l'utilisateur sur le site et récuperer ses informations dans des variables globales SESSIONS
                // $_SESSION["auth"] = true;
                // $_SESSION["id"] = $usersInfos['id'];
                // $_SESSION["matricule"] = $usersInfos['matricule'];
                // $_SESSION["email"] = $usersInfos['email'];
        

                //Rediriger l'utilisateur vers la page d'accueil 
                // header("Location: index.php");
    
            }else{
                $errorMsg = "Cet Etudiant existe déjà sur le site";
            }
          
        }else{
            $errorMsg = "Veuillez compléter tous les champs...";
        }
   } 


?>





<?php?>