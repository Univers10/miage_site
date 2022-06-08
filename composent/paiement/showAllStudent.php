<?php
  session_start();
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
    <link rel="stylesheet" href="../../assets/css/table_styles.css">
    <link rel="stylesheet" href="../../assets/css/tableh1.css">


    <style>
	</style>

</head>
<body>
  <div class="main_div">
    <div class="table_div">

      <h1>Liste des Etudiants</h1>
      <table>
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Classe</th>
            <th>Genre</th>
            <th>Versement 1</th>
            <th>Versement 2</th>
            <th>Versement 3</th>
            <th>Versement 4</th>
            <th>Solde</th>
            <th>Versement</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              
              while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) :
                $val= $row['id'];
                $stmt2 = $pdo->prepare("SELECT * FROM wallet WHERE id_student = $val");
                $stmt2-> execute();
                
                $resultat = $stmt2->fetch(PDO::FETCH_ASSOC);
                ?>
          <tr>
            <form action="" mothod="get">
              <td><?php echo htmlspecialchars($row['matricule']); ?></td>
              <td><?php echo htmlspecialchars($row['lastname']); ?></td>
              <td><?php echo htmlspecialchars($row['firstname']); ?></td>
              <td><?php echo htmlspecialchars($row['email']); ?></td>
              <td><?php echo htmlspecialchars($row['tel']); ?></td>
              <td><?php echo htmlspecialchars($row['level']." ".$row['classe']); ?></td>
              <td><?php echo htmlspecialchars($row['gender']); ?></td>
              <td><?php echo htmlspecialchars($resultat['versement1']); ?></td>
              <td><?php echo htmlspecialchars($resultat['versement2']); ?></td>
              <td><?php echo htmlspecialchars($resultat['versement3']); ?></td>
              <td><?php echo htmlspecialchars($resultat['versement4']); ?></td>
                <td><?php echo htmlspecialchars($resultat['solde']); ?></td>

                <?php
                
                if( 
                  $_SESSION["roles"] != "Admin"
                ){

                
                if($resultat['versement4'] ==0){                            
                  ?>
                    <td><a href="student_registration.php?id=<?= $row['id']; ?>" class="btn btn-warning">Versement</a></td>
                  <?php 
                }else{
                  ?>
                  <td>Soldé</td>
                <?php
                    }}else{
                      
                      if($resultat['versement4'] ==0){                            
                  ?>
                    <td>Non Soldé</td>
                    <?php 
                }else{
                  ?>
                  <td>Soldé</td>
                <?php
                    }}
                        
                    ?>
              </form>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

  </div>
</body>
</html>