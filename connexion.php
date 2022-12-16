<!DOCTYPE html>
<html>
<head>
<title><?php echo "Connexion" ?></title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <li><a href="index.php" target=_blank><b>Accueil</li></a>
        <li><a href="connexion.php" target=_blank>Se connecter</li></a>
        <li><a href="inscription.php" target=_blank>S'inscrire</b></li></a>
    </header>

    <main>

    <form action="Inserts/insert_connexion.php" method="post">
        <div class="formulaire">
        <br>
        <li>Login :</li><br><input type="text" placeholder="Login" name="login" autocomplete="off"/>
        <br/>
        <br/>
        <li>Mot de passe :</li><br/><input type="password" placeholder="Mot de passe" name="password" autocomplete="off"/>
        <br>
        <br>
        <input type="submit" name="Envoyer" value="Confirmer">
        <br>
        <br>
        </div>
    </form>

    </main>

    <footer>
        <li><a href="https://laplateforme.io/"><img src="./Images/logo_laplateforme_bleu3.png" height=100px width=400px></a>
    </footer>
</body>