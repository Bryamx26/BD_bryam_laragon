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
                
            justify-content : center ; 
            background-color : #ffff;
        }
    </style>
</head>
<body>
  <section >
  <h1> Résultat de la requête :</h1><br>
 <?php
 // Requête SQL
 $sql = "SELECT * FROM identifiant , employés WHERE id = id_user ";
 $requete = $pdo->prepare($sql);
 
 // Exécuter la requête
 $requete->execute();
 
 // Récupérer les résultats sous forme d'un tableau associatif
 $utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
 
 // Vérifier si un résultat est retourné
 echo "<div class='container' >";
 if (!empty($utilisateurs)) {
    
 
     // Afficher le contenu du premier utilisateur trouvé
     foreach ($utilisateurs[0] as $cle => $valeur) {
         echo "<strong>$cle :</strong> $valeur <br>";
     }
echo "</div>";
 } else {
     echo "<h1>Aucun résultat trouvé</h1>";
 }
 ?>
 
  </section>
</body>
</html>