<?php
include '../php/connection_pdo.php';

$article = $bdd->query("SELECT * FROM article ORDER BY post_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <ul>
   <?php while($a = $article->fetch()) { ?>
        <li><a href="article.php?id= <?= $a['id']?>"> <?= $a['title'] ?></a></li>
        <?php } ?>
   </ul>

</body>
</html>

<?php?>