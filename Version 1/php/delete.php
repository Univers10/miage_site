<?php
    include "connection.php";
    if(isset($_POST["id"])){
        $id= $_POST["id"];
        $req= mysqli_query($link, "DELETE from user where id='$id' ");
        if($req){
            header("location:users_list.php");
        }else{echo "erreur de suppression";
        }   
    }else{
        echo "champ manquant";
    }   
?>