<?php
  $host = 'localhost';
  $dbname = 'db_site_ecole';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM users";
   
  try{
    $pdo = new PDO($dsn, $username, $password);
    $stmt = $pdo->query($sql);
    
    if($stmt === false){
      die("Erreur");
    }

  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un etudiant</title>
</head>
<body>
 <h1>Liste des utilisateurs</h1>
 <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Matricule</th>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Email</th>
       <th>Téléphone</th>
       <th>Date de naissance</th>
       <th>Né à</th>
       <th>Statut</th>
       <th>Genre</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
        <form action="" mothod="get">
          <td><?php echo htmlspecialchars($row['id']); ?></td>
          <td><?php echo htmlspecialchars($row['matricule']); ?></td>
          <td><?php echo htmlspecialchars($row['lastname']); ?></td>
          <td><?php echo htmlspecialchars($row['firstname']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['tel']); ?></td>
          <td><?php echo htmlspecialchars($row['birthday']); ?></td>
          <td><?php echo htmlspecialchars($row['birth_at']); ?></td>
          <td><?php echo htmlspecialchars($row['id_roles']); ?></td>
          <td><?php echo htmlspecialchars($row['id_gender']); ?></td>
          <td><button type="submit" class="btn btn-primary" name="modify<?=$row["id"]?>">Modifier</button></td>
          <td><button type="submit" class="btn btn-primary" name="delete">Supprimer</button></td>
        </form>
      </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>