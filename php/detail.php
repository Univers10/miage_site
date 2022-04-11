<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de modification</title>
    <link rel="stylesheet" href="../css/style-registration.css">
</head>
<body>
    <div class="regform"><h1>Inscription</h1></div>
    <?php
        include "connection.php";

        if(isset($_POST["id"])){
            $id=$_POST["id"];
            $req = mysqli_query($link, "select * from user where id='$id'");
            $res= mysqli_fetch_array($req);
        }else{
            echo 'champs manquant';
        }
    ?>
    <div class="main">
        <form id="name" action="../php/modifier.php" method="POST">
            <div class="name">
                <h2 class="name">Name</h2>
                <input type="hidden" name="id" value="<?php echo $res["id"]?>">
                <input type="text" value="<?php echo $res["name"]?>" class="firstname" name="first_name">
                <label for="" class="firstlabel">first name</label>
                <input type="text" value="<?php echo $res["surname"]?>" class="lastname" name="last_name">
                <label class="lastlabel"> last name</label>
            </div>
            
            <h2 class="name">Date de naissance</h2>
            <input class="company" value="<?php echo $res["birthday"]?>" type="date" name="birthday">
            
            <h2 class="name">Email</h2>
            <input class="company" value="<?php echo $res["email"]?>" type="email" name="email">
            
            <h2 class="name">Phone</h2>
            <input class="code" value="<?php echo $res["area_code"]?>" type="text" name="area_code">
            <label class="area_code">Area Code</label>
            <input class="number" value="<?php echo $res["phone_number"]?>" type="text" name="phone">
            <label class="phone-number">Numero de téléphone</label>
            
            <h2 class="name">Classe</h2>
            <select name="class"  class="option">
                <option  selected="selected"><?php echo $res["class"]?></option>
                <option>Licence 1</option>
                <option>Licence 2</option>
                <option>Licence 3</option>
                <option>Master 1</option>
                <option>Master 2</option>                
            </select>
            
            <h2 class="student">Sexe</h2>
            <label class="radio">
                <?php if($res["sexe"]=="homme"){                
                ?>
                    <input type="radio" class="radio-one" checked="true" name="gender" value="homme">
                    <span class="checkmark"></span>
                    Homme
                    <label class="radio">
                        <input type="radio" class="radio-two" name="gender" value="femme">
                        <span class="checkmark"></span>
                        Femme
                    </label>
                <?php } else{?>
                    <input type="radio" class="radio-one" name="gender" value="homme">
                    <span class="checkmark"></span>
                    Homme
                    <label class="radio">
                        <input type="radio" class="radio-two" checked="true" name="gender" value="femme">
                        <span class="checkmark"></span>
                        Femme
                    </label>
                <?php }?>
                <input type="submit" value="Modifier">
                <!-- <button class="submit">Register</button> -->
            </label>
        </form>
    </div> 
</body>
</html>