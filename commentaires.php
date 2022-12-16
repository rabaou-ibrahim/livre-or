<!DOCTYPE html>
<html>
<head>
<title><?php echo "Commentaires" ?></title>
<link href="style.css" rel="stylesheet">
</head>

<body>
    
    <header>
        <li><a href="index.php" target=_blank><b>Accueil</li></a>
        <li><a href="deconnexion.php" target=_blank>Se déconnecter</li></a>
    </header>
    
    <main>

    <div class="formulaire">
        <form action="Inserts/insert_commentaires.php" method="post">
        <br>
        <li>Commentaire :</li><br><input type="text" name="commentaire" size=50px/>
        <br>
        <br>
        <input type="submit" name="Valider" value="Valider">
        <br>
        </form>
    </div>

    </main>

    <footer>
        <li><a href="https://laplateforme.io/" target="_blank"><img src="./Images/logo_laplateforme_bleu3.png" height=100px width=400px></a>
    </footer>

</body>