<?php

// On s'assure d’activer la variable de session 
// sur toutes les pages nécessitant la connaissance 
// de l’état de la connexion en la plaçant au début de ces pages.

session_start();

// Ici on affiche un formulaire pré-rempli en affichant la ligne correspondante
// de la bdd. Ensuite on utilise le fichier insert_profil.php 
// pour traiter le formulaire.

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "Mon Profil" ?></title>
<link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <li><a href="index.php" target=_blank><b>Accueil</li></a>
        <li><a href="index.php"><?php if (isset($_POST['Logout'])) { include 'deconnexion.php'; } ?><b>Se déconnecter</b></a></li>
    </header>

    <main>
    <a href="livreor.php"><p>Cliquez ici pour accéder à votre livre d'or</p></a>
    <p>OU modifiez vos codes d'accès en dessous </p>

    <div class="formulaire">
        
        <form action="Inserts/insert_profil_login.php" method="post" autocomplete="off">
        
        <br>
        
        <li>Login : </li><br/><input type="text" name="Modifier_login" 
        value ="<?php  
            include('Inserts/connexion_db.php');
            
            $sql = "SELECT login FROM utilisateurs WHERE id = '$_SESSION[id]'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo ($row['login']);
            }
            }
            
            else {
            echo ("La requête a échoué. Etes-vous bien connecté ?");
            }
        
        ?>
        "/>

        <input type="submit" name="Modifier_login" value="Modifier login">

        </form>
        
        <br/>
        <br/>

        <form action="Inserts/insert_profil_password.php" method="post" autocomplete="off">
        
        <li>Mot de passe :</li><br/><input type="text" name="Modifier_password" 
        value="<?php  
            include('Inserts/connexion_db.php');
            
            $sql = "SELECT password FROM utilisateurs WHERE id = '$_SESSION[id]'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo ($row['password']);
            }
        }
        ?>
        "/> 
        
        <input type="submit" name="Modifier_password" value="Modifier password">
        <br/>
        <br>    
        </form>
    </div>

    </main>

    <footer>
        <li><a href="https://laplateforme.io/" target="_blank"><img src="Images/logo_laplateforme_bleu3.png" height=100px width=400px></a>
    </footer>
    
</body>