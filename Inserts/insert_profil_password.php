<!DOCTYPE html>
<html>
<head>
<title><?php echo "Modifier mon mot de passe" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php

// Ce fichier php s'éxécute dès que l'on clique sur un boutton pour modifier le login ou mdp
// Il affiche un formulaire où on doit taper le nouveau login ou mdp
// Une fois le ou les nouveaux codes confirmés il renvoie avec 'form action' à un autre fichier php "insert_profil_edit.php"
// Cet autre fichier modifie la ligne dans la bdd

session_start();

if (isset($_POST['Modifier_password'])) {
        echo ('<form action="insert_profil_edit_password.php" method="post">');
        echo ('<li>Nouveau mot de passe : </li><br><input type="text" name="Nouveau_password_confirm" autocomplete="off"/> <input type="submit" name="Nouveau_password_confirmer" value="Confirmer">');
        echo('<br>');
        echo ('<br>');
        echo ('</form>');
    }

?>

</body>