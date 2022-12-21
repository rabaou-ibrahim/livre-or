<!DOCTYPE html>
<html>
<head>
<title><?php echo "Modifier mon login" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php
// Ce fichier php s'éxécute dès que l'on clique sur un boutton pour modifier le login ou mdp
// Il affiche un formulaire où on doit taper le nouveau login ou mdp
// Une fois le ou les nouveaux codes confirmés il renvoie avec 'form action' à un autre fichier php "insert_profil_edit.php"
// Cet autre fichier modifie la ligne dans la bdd

session_start();

if (!isset($_SESSION) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id'])) {
    header('location:warning.php'); // Si on n'a pas de variables sessions la personne n'est pas connectée, on la redirige vers la page warning.php
} 
  
else {

    if (isset($_POST['Modifier_login'])) {
        echo ('<form action="insert_profil_edit_login.php" method="post">');
        echo ('<li>Nouveau login : </li><br><input type="text" name="Nouveau_login_confirm" autocomplete="off"/> <input type="submit" name="Nouveau_login_confirmer" value="Confirmer">');
        echo ('<br>');
        echo ('<br>');
        echo ('</form>');
    }

}
    
?>

</body>