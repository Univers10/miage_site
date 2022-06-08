<?php

  $host = 'localhost';
  $dbname = 'db_site_ecole';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM students";
   
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
    <link rel="stylesheet" href="../../../assets/css/table_styles.css">
    <link rel="stylesheet" href="../../../assets/css/tableh1.css">

</head>
<body>
    <div class="main_div">
    <div class="table_div">

      <h1>Liste des Etudiants</h1>
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
            <th>Genre</th>
            <th>Niveau</th>
            <th>Classe</th>
            <th>Statut</th>
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
               <td><?php echo htmlspecialchars($row['gender']); ?></td>
               <td><?php echo htmlspecialchars($row['level']); ?></td>
               <td><?php echo htmlspecialchars($row['classe']); ?></td>
               <td><?php echo htmlspecialchars($row['roles']); ?></td>
               <td><a href="update_student_registration.php?id=<?= $row['id']; ?>" class="btn btn-warning">Modifier</a></td>
               <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn btn-warning">Supprimer</a></td>
             </form>
           </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      </div>
    </div>
</body>