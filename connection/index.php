<?php
include "connection.php";
?>
<?php
if (isset($_POST["validation"])){
    
$nom = htmlspecialchars($_POST["identifiant"]);
trim($nom);

$motif = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/';
    
if (preg_match($motif, $_POST["mot_de_passe"]) and($_POST["mot_de_passe"] != '') ) {
    
    $mot_de_passe = $_POST["mot_de_passe"];
} else
{
    
}

if (isset($_POST["identifiant"])) {
    // Récupération de l'identifiant envoyé par le formulaire
    $nom = $_POST["identifiant"];
    $mot_de_passe = $_POST["mot_de_passe"]; 

    // Requête SQL pour rechercher un employé par son nom
    
    $requete = "SELECT PER.nom, PAS.password
    FROM passwords AS PAS
    JOIN personel AS PER ON PER.nom = :nom
    WHERE PAS.password = :pass";
    

    // Préparation de la requête
    $prep = $pdo->prepare($requete);

    // Exécution de la requête en liant le paramètre pour éviter les injections SQL
    // Exécution de la requête avec les paramètres sécurisés
$prep->execute([
    ':nom' => $nom,
    ':pass' => $mot_de_passe
]);

                    

    // Récupération des résultats
    $resultats = $prep->fetchAll(PDO::FETCH_ASSOC);

    // Vérification s'il y a des résultats
   
}
}else{
    echo"rien";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interraction avec la base de données</title>
    <link rel="stylesheet" href="css.css?var=2">
</head>

<body>
    <form id="formulaire" action="index.php" method = "post">

    Identifiant : 
<input type="text" name="identifiant" 
    <?php echo isset($_POST['identifiant']) && !empty($_POST['identifiant']) ? "class='green'" : "class='red'"; ?>>
<br>

    mot de passe : <input type="password" name ="mot_de_passe"
    <?php echo isset($_POST['mot_de_passe']) && !empty($_POST['identifiant']) ? "class='green'" : "class='red'"; ?>>

    <input type="submit" value="envoyer" name ="validation">
    </form>
<section id= "reponce_sql">
<?php
if (isset($_POST["validation"])){


if (isset($resultats) and ( !empty($resultats))) {
    echo"<section>";
    // Affichage des résultats
    foreach ($resultats as $ligne) {
        echo "Nom : " . $ligne['nom'] . " - mot de passe : " . $ligne['password'] . "<br>";
    }
    echo"</section>";
} else {
    echo "Aucun résultat trouvé pour cet identifiant.";
}


}
?>
</section>
</body>
</html>