<?php 
//On demare la session sur sur cette page 
session_start() ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
     // Ensuite on affiche le contenu de la variable session
     echo "<main> 
                <p> Bonjour " .  $_SESSION['login'] . " ! </p> 
                Que souhaitez-vous faire ?
                <br>
                <br>
                <a href='profil.php'<li> Consulter mon profil </li></a>
                <br>
                <br>
                <a href='deconnexion.php'><li> Me déconnecter </li></a>
                <br>
                <br>
          </main>
          ";
    ?>
</body>
</html>