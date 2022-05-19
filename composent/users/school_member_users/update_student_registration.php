<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un etudiant</title>
</head>
<body>
    <div class="main">
        
        <form id="name" action="../../../actions/users/school_member_users/student_registrationActions.php" method="POST">
            <div class="name">
                <h2 class="name">Nom</h2>
                <input type="text" class="lastname" name="lastname">
                <label class="lastlabel">Nom</label>
                <input type="text" class="firstname" name="firstname">
                <label for="" class="firstlabel">Prénoms</label>
            </div>
            <div class="name">
                <h2 class="pseudo">Pseudo</h2>
                <input type="text" class="pseudo_input" name="pseudo">
            </div>
            <div class="name">
                <h2 class="matricule">Matricule</h2>
                <input type="text" class="matricule_input" name="matricule">
            </div>
            <div class="birthday_div">
                <h2 class="name">Date de naissance</h2>
                <input class="birthday" type="date" name="birthday">

                <h2 class="name">Lieu de naissance</h2>
            <input class="birth_at" type="text" name="birth_at">
            </div>
            <div>
                <h2 class="name">Email</h2>
                <input class="email" type="email" name="email">
            </div>
            
            <div>
                <h2 class="name">Phone</h2>
                <input class="number" type="text" name="phone">
                <label class="phone-number">Numero de téléphone</label>
            </div>

            <div>
                <h2 class="name">Mot de passe</h2>
                <input class="password" type="text" name="password">
            </div>

            <div>
                <h2 class="name">Niveau</h2>
                <select name="level" class="option">
                    <option disabled="disabled" selected="selected">--Choisir le niveau</option>
                    <option>1</option>
                    <option>Licence 2</option>
                    <option>Licence 3</option>
                    <option>Master 1</option>
                    <option>Master 2</option>                
                </select>
            </div>

            <div>
                <h2 class="name">Classe</h2>
                <select name="class" class="option">
                    <option disabled="disabled" selected="selected">--Choisir le niveau</option>
                    <option>1</option>
                    <option>Licence 2</option>
                    <option>Licence 3</option>
                    <option>Master 1</option>
                    <option>Master 2</option>
                </select>  
            </div>
            <div>
                <h2 class="name">Type de bac</h2>
                <select name="diploma" class="option">
                    <option disabled="disabled" selected="selected">--Choisir le type de BAC</option>
                    <option>1</option>
                    <option>BAC A</option>
                </select>
            </div>
       
            

            <h2 class="name">Sexe</h2>
            <label class="radio">
                <input type="radio" class="radio-one" checked="checked" name="gender" value="1">
                <span class="checkmark"></span>
                Homme
                <label class="radio">
                    <input type="radio" class="radio-two" checked="checked" name="gender" value="2">
                    <span class="checkmark"></span>
                    Femme
                </label>
                <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
            </label>
        </form>
    </div> 
</body>
</html>







<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'inscription</title>
    <link rel="stylesheet" href="../css/style-registration.css">
</head>
<body>
    <div class="regform"><h1>Inscription</h1></div>
    <div class="main">
        
        <form id="name" action="../php/insert.php" method="POST">
            <div class="name">
                <h2 class="name">Name</h2>
                <input type="text" class="firstname" name="first_name">
                <label for="" class="firstlabel">first name</label>
                <input type="text" class="lastname" name="last_name">
                <label class="lastlabel"> last name</label>
            </div>
            
            <h2 class="name">Date de naissance</h2>
            <input class="company" type="date" name="birthday">
            
            <h2 class="name">Email</h2>
            <input class="company" type="email" name="email">
            
            <h2 class="name">Phone</h2>
            <input class="code" type="text" name="area_code">
            <label class="area_code">Area Code</label>
            <input class="number" type="text" name="phone">
            <label class="phone-number">Numero de téléphone</label>
            
            <h2 class="name">Classe</h2>
            <select name="class" class="option">
                <option disabled="disabled" selected="selected">--Choose your class</option>
                <option>Licence 1</option>
                <option>Licence 2</option>
                <option>Licence 3</option>
                <option>Master 1</option>
                <option>Master 2</option>                
            </select>
            
            <h2 class="student">Sexe</h2>
            <label class="radio">
                <input type="radio" class="radio-one" checked="checked" name="gender" value="homme">
                <span class="checkmark"></span>
                Homme
                <label class="radio">
                    <input type="radio" class="radio-two" checked="checked" name="gender" value="femme">
                    <span class="checkmark"></span>
                    Femme
                </label>
                <input type="submit" value="Valider">
                <!-- <button class="submit">Register</button>
            </label>
        </form>
    </div> 
</body>
</html> -->