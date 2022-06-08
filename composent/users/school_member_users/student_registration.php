<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un etudiant</title>
    <link rel="stylesheet" href="../../../assets/css/form.css">
    <link rel="stylesheet" href="../../../assets/css/table.css">

</head>
<body>
    <div class="main_div">
        
        <form id="name" action="../../../actions/users/school_member_users/student_registrationActions.php" method="POST">
            <div class="form_div">

            <div class="name">
                <h2 class="name">Nom</h2>
                <input type="text" class="lastname" name="lastname">
                <label class="lastlabel">Nom</label>
                <input type="text" class="firstname" name="firstname">
                <label for="" class="firstlabel">Prénoms</label>
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
                    <option>Licence 1</option>
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
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                </select>  
            </div>
        <?php?>

            <h2 class="name">Sexe</h2>
            <label class="radio">
                <input type="radio" class="radio-one" checked="checked" name="gender">
                <span class="checkmark"></span>
                Homme
                <label class="radio">
                    <input type="radio" class="radio-two" checked="checked" name="gender">
                    <span class="checkmark"></span>
                    Femme
                </label>
                <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
            </label>
            </div>
        </form>
    </div> 
    </div>
</body>
</html>

