<?php
    include "connection.php";
    if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["birthday"]) && isset($_POST["email"]) && isset($_POST["area_code"]) && isset($_POST["phone"]) && isset($_POST["class"]) && isset($_POST["gender"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];
        $area_code = $_POST["area_code"];
        $phone = $_POST["phone"];
        $class = $_POST["class"];
        $gender = $_POST["gender"];

        $req = mysqli_query($link, "insert into user (name, surname, birthday, email, area_code, phone_number, class, sexe) values ('$first_name', '$last_name', '$birthday', '$email', '$area_code', '$phone', '$class', '$gender')");
    
        if($req){
            echo "Insertion effectuer";
        }else{
            echo "Erreur d'insertion";
        }
    }
?>