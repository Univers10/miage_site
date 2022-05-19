<?php
include '../php/connection_pdo.php';

 if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
    if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])){
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);
 
        $ins = $bdd->prepare("INSERT INTO article (title, contenu, post_date) 
            VALUES (?, ?, NOW())");
        $ins->execute(array($article_titre, $article_contenu));
        
        $message = 'Article poster avec success';
    }else{
     $message= 'Veuillez remplir tous les champs !';
 }
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
    <form method="POST">
        <input type="text" name="article_titre" placeholder="Titre"><br>
        <textarea name="article_contenu" placeholder="Contenu de l'article"></textarea><br>
        <input type="submit" value="Envoyer l'article">
    </form>
    <?php if(isset($message)) {echo "$message";} ?>
</body>
</html>

<?php?>