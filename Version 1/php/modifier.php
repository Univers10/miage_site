<?php
    include "connection.php";
    if(isset($_POST["id"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["birthday"]) && isset($_POST["email"]) && isset($_POST["class"]) && isset($_POST["area_code"]) && isset($_POST["phone"]) && isset($_POST["gender"])){
        $id = $_POST["id"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];
        $area_code = $_POST["area_code"];
        $phone = $_POST["phone"];
        $class = $_POST["class"];
        $gender = $_POST["gender"];

        $req = mysqli_query($link, "update user set name= '$first_name', surname ='$last_name', birthday = '$birthday', email ='$email', area_code ='$area_code', phone_number = '$phone', class = '$class', sexe = '$gender' where id='$id'");

        if($req){
            header("location:users_list.php");
        }else{echo "echec de mise à jour";
        }   
    }else{
        echo "champ manquant";
    }   
?>