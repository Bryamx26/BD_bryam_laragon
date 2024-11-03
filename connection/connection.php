<?php
// Informations de connexion
$host = 'localhost';  // Adresse de la base de données (localhost pour une base locale)
$dbname = 'horaire';  // Nom de ta base de données
$username = 'root';  // Nom d'utilisateur de la base
$password = '';  // Mot de passe de l'utilisateur

try {
    // Création de la connexion avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Définir le mode d'erreur de PDO sur Exception pour gérer les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo " <p>Connexion réussie à la base de données.</p>";
} catch (PDOException $e) {
    // Afficher un message d'erreur en cas d'échec
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

