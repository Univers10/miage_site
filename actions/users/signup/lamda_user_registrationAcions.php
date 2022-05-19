<?php
    //Creations du systeme d'inscription des utilisateurs de l'administration
    session_start();
    //Require est l'équivalant de include mais permet de planter la page en cas d'érreur de chargement 
    require("../../database.php");
    // if($bdd){echo "Connection établir";}
   //Validation du formulaire
    if(isset($_POST['validate'])){
      echo "La vallidation marche";
        //    Verifier si l'utilisateur a bien complété tous les champs
       if(
           !empty($_POST['pseudo']) 
           && !empty($_POST['firstname']) 
           && !empty($_POST['lastname']) 
           && !empty($_POST['email'])
           && !empty($_POST['phone'])
           && !empty($_POST['gender'])
           && !empty($_POST['password'])
           && !empty($_POST['confirm_password'])){
           echo "Les champs requis ne sont pas vide";
           // Les données de l'utilisateur
           $user_firstname = htmlspecialchars($_POST['firstname']);
           $user_lastname = htmlspecialchars($_POST['lastname']);
           $user_pseudo = htmlspecialchars($_POST['pseudo']);
           $user_email = htmlspecialchars($_POST['email']);
           $user_phone = htmlspecialchars($_POST['phone']);
           $user_gender = htmlspecialchars($_POST['gender']);
           $user_roles = htmlspecialchars('4');
           $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
           $user_confirm_password = htmlspecialchars($_POST['confirm_password']);
            echo "Les données sont bien enregistrées dans les variable";
           //Vérifier le mot de passe est conforme
            if(password_verify($user_confirm_password, $user_password)){
                echo "Les mot de passe de confirmation est bien valide";
                //    Verifier si l'utilisateur existe déja sur le site
                $checkIfUserAlreadyExists = $bdd->prepare("SELECT email FROM lamda_users WHERE email = ?");
                $checkIfUserAlreadyExists->execute(array($user_email));
                
                if($checkIfUserAlreadyExists->rowCount() == 0){
                    //Isérer l'utilisateurdans la bdd
                    $insertUserOnWebsite = $bdd->prepare("INSERT INTO lamda_users(firstname, lastname, pseudo, email, tel, id_gender, id_roles, mdp)  VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                    $req = $insertUserOnWebsite->execute(array($user_firstname, $user_lastname, $user_pseudo, $user_email, $user_phone, $user_gender, $user_roles, $user_password));
                    if($req){
                        echo "Enregistrement éffectué avec sudcces";
                    }else{echo "Enregistrement non effectué";}
        
                    //Récupérer les informations de l'utilisateur
                    $get_InfoOfThisUserReq = $bdd->prepare("SELECT id, email, id_roles FROM lamda_users WHERE email = ?");
                    $get_InfoOfThisUserReq->execute(array($user_email));
                    if($get_InfoOfThisUserReq){
                        echo "get_InfoOfThisUserReq";
                    }
                    //La fonction fetch permet de recupperer les informations sur une ligne donnée
                    $usersInfos = $get_InfoOfThisUserReq->fetch();
                    if($usersInfos){
                        echo "usersinfos recupper";
                    }else{echo "probleme";}
                    //Authentifier l'utilisateur sur le site et récuperer ses informations dans des variables globales SESSIONS
                    $_SESSION["auth"] = true;
                    $_SESSION["id"] = $usersInfos['id'];
                    $_SESSION["email"] = $usersInfos['email'];
                    $_SESSION["roles"] = $usersInfos['id_roles'];
            

                    //Rediriger l'utilisateur vers la page d'accueil 
                    // header("Location: index.php");
        
                }else{
                    $errorMsg = "L'utilisateur existe déjà sur le site...";
                }
            }else{
                $errorMsg = "Mot de passe non conforme...";
            }   
   
       
        }else{
           $errorMsg = "Veuillez compléter tous les champs...";
        }
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }


?>




<?php?>