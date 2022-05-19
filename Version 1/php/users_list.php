<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/user_list.css">
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Email</th>
                <th>Area-code</th>
                <th>Numéro de téléphone</th>
                <th>Niveau</th>
                <th>Sexe</th>
                <th>Infos</th>
            </tr>
        </thead>
        <?php
            include "connection.php";
            $req =mysqli_query($link, "select * from user");
            while($res=mysqli_fetch_array($req)){
        ?>
            <tbody>
                <tr>
                    <td><?php echo $res["name"]?> </td>
                    <td><?php echo $res["surname"]?> </td>
                    <td><?php echo $res["birthday"]?> </td>
                    <td><?php echo $res["email"]?> </td>
                    <td><?php echo $res["area_code"]?> </td>
                    <td><?php echo $res["phone_number"]?> </td>
                    <td><?php echo $res["class"]?> </td>
                    <td><?php echo $res["sexe"]?> </td>
                    <td>
                        <form action="detail.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $res["id"]?>">
                            <input type="submit" value="Detail">
                        </form>
                    
                        <form action="delete.php" method="POST">
                            <input type="hidden" name= "id" value="<?php echo $res["id"]?>">
                            <input type="submit" value="Supprimer">
                        </form>


                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</body>
</html>