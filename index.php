<?php
    include "test.php" ;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display : flex ;
            flex-direction : column;
            padding: 20px;
            align-items : center ; 
            background-color: #669f5266;
            
        }

    </style>
</head>
<body>
  <section >
  <h1> Résultat de la requête :</h1><br>
 <?php
 // Requête SQL
 $sql = "SELECT * FROM identifiant , employés WHERE id= 2";
 $requete = $pdo->prepare($sql);
 
 // Exécuter la requête
 $requete->execute();
 
 // Récupérer les résultats sous forme d'un tableau associatif
 $utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
 
 // Vérifier si un résultat est retourné

 if (!empty($utilisateurs)) {
    
    
    foreach ($utilisateurs as $index => $utilisateur) {
        echo "<div class='container' >";
        echo "<h2>Utilisateur " . ($index + 1) . " :</h2>";
        foreach ($utilisateur as $cle => $valeur) {
            echo "<strong>$cle :</strong> $valeur <br>";
        }
        echo "</div>";
        echo "<br>"; // Ajoute un saut de ligne entre chaque utilisateur

    }
 } else {
     echo "<h1>Aucun résultat trouvé</h1>";
 }
 ?>
 
 
  </section>
</body>
</html>