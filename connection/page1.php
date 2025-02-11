
<?php  include "connection.php"; 
session_start();?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrer-center</title>
</head>
<body>
    <section>
        <h1>Bonjour</h1>
        <?php
           
           if (isset($_SESSION["identifiant"])){
            $nom = $_SESSION["identifiant"];
                
            echo "heyy " , $nom;
           }
        ?>
    </section>
</body>
</html>