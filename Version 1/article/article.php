<?php
include '../php/connection_pdo.php';

if(isset($_GET['id']) and !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $article = $bdd->prepare("select * from article where id = ?");
    $article->execute(array($get_id));

    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $titre = $article["title"];
        $contenu = $article["contenu"];
    }else {
        die("Cet article n'existe pas !");
    }
} else{
    die('Erreur');
}

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

    <h1><?= $titre ?></h1>
    <p><?= $contenu?></p>

</body>
</html>

<?php?>