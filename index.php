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
        body{
            display : flex;
            flex-direction :column;
            align-items:center;
            justify-content: center ;

        }
        section{
            display : flex;
            flex-direction :column;
            align-items:center;
            justify-content: center ;
            border-radius: 25px;
            border-color:#000;
        }
        .container{
            display : flex ;
            flex-direction : column;
            width: 60%;
            padding: 20px;
            align-items : center ;
            border-radius: 25px;
            background-color: #669f5266;
            margin : 20px;
            
        }

    </style>
</head>
<body>
  <section >
  <h1> Résultat de la requête :</h1><br>
 <?php
 // Requête SQL
 $sql = "SELECT * FROM `personel` JOIN poste ON personel.id_poste = poste.id_poste WHERE paye >650";
 $requete = $pdo->prepare($sql);
 
 // Exécuter la requête
 $requete->execute();
 
 // Récupérer les résultats sous forme d'un tableau associatif
 $utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
 $nombreUtilisateurs = count($utilisateurs);

 
 // Vérifier si un résultat est retourné

 if (!empty($utilisateurs)) {
    
    
     for ($i = 0; $i < $nombreUtilisateurs; $i++) {
        echo "<div class='container' >";
        foreach ($utilisateurs[$i] as $cle => $valeur) {
            echo "<strong>$cle :</strong> $valeur <br>";
            }
        echo "<br>"; // Ajoute un saut de ligne entre chaque utilisateur
        echo "</div>";
            
        }
    }
  else {
     echo "<h1>Aucun résultat trouvé</h1>";
 }
 ?>








 

 
  </section>
</body>
</html>