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
} else{
    $mot_passe = FALSE;
}


if (isset($_POST["identifiant"])) {
    // Récupération de l'identifiant envoyé par le formulaire
    $nom = $_POST["identifiant"];

    // Requête SQL pour rechercher un employé par son nom
    $requete = "SELECT * FROM personel WHERE nom = :nom";

    // Préparation de la requête
    $prep = $pdo->prepare($requete);

    // Exécution de la requête en liant le paramètre pour éviter les injections SQL
    $prep->execute([':nom' => $nom]);

    // Récupération des résultats
    $resultats = $prep->fetchAll(PDO::FETCH_ASSOC);

    // Vérification s'il y a des résultats
   
}
}







?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interraction avec la base de données</title>
</head>
<body>
    <form id="formulaire" action="index.php" method = "post">

    Identifiant : <input type="text" name = "identifiant"> <br>

    mot de passe : <input type="password" name ="mot_de_passe">

    <input type="submit" value="envoyer" name ="validation">
    </form>

<?php
if (isset($_POST["validation"])){

    
if (isset($_POST["identifiant"])){
    echo "Id =" . $nom ."<br>";

}
if (isset($_POST["mot_de_passe"]) and ($mot_passe == TRUE)){
    echo "mot de passe :  = ".$_POST["mot_de_passe"];

}else{
echo"pas de mot de passe.";
}

if (isset($resultats)) {
    echo"<section>";
    // Affichage des résultats
    foreach ($resultats as $ligne) {
        echo "Nom : " . $ligne['nom'] . " - Prénom : " . $ligne['prenom'] . "<br>";
    }
    echo"</section>";
} else {
    echo "Aucun résultat trouvé pour cet identifiant.";
}


}
?>

</body>
</html>