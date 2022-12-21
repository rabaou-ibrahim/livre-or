<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "Commentaires" ?></title>
<link href="style.css" rel="stylesheet">
</head>

<body>

    <?php

    if (!isset($_SESSION) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id'])) {
            header('location:warning.php'); // Si on n'a pas de variables sessions la personne n'est pas connectée, on la redirige vers la page warning.php
    }
           
    elseif ($_SESSION['loggedin'] = true) { // Si cette session existe alors l'utilisateur est connecté,
            echo ' <header>
                <li><a href="index.php" target=_blank><b>Accueil</a>
                <li><a href="profil.php">Profil</a>
                <li><a href="livreor.php">Livre or</a>
                <li><a href="deconnexion.php">Se déconnecter</li></b></a>
                </header>
                <main> ';
            echo ("
            <div class='formulaire'>
                <form action='Inserts/insert_commentaires.php' method='post'>
                <br>
                <li>Commentaire :</li><br><input type='text' name='commentaire' size=50px autocomplete='off'/>
                <br>
                <br>
                <input type='submit' name='Valider' value='Valider'>
                <br>
            </div>
            ");
    
    } 
        
    ?>    

    </main>

    <footer>
        <li><a href="https://laplateforme.io/" target="_blank"><img src="./Images/logo_laplateforme_bleu3.png" height=100px width=400px></a>
    </footer>

</body>