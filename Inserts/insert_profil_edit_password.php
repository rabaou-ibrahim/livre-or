<?php

// On démarre la session

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "Mon profil" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php

if (isset($_POST['Nouveau_password_confirm'])) {

  // Si l'utilisateur valide une modification de login sans rien taper on lui renvoie 
// le message d'erreur de la ligne 21 :

  if (isset($_POST['Nouveau_password_confirmer'])) {
    // Si l'utilisateur valide une modification de login sans rien taper on lui renvoie 
    // le message d'erreur de la ligne 29 :
    if (empty($_POST['Nouveau_password_confirm'])) {
      echo ("Veuillez tapez un nouveau mot de passe");
      echo ('<br>');
      echo ('<br>');
      echo ("<a href='../profil.php'><button>Retour</button></a>");
      exit();
    } 
    
    else {
      include('connexion_db.php');

      $sql = "UPDATE utilisateurs 
      SET password = '$_POST[Nouveau_password_confirm]'
      WHERE id = '$_SESSION[id]'";
      $result = $conn->query($sql);

      if ($conn->query($sql) === TRUE) {
        echo ("Modification réussie");
        echo ("<br>");
        echo ("<br>");
        echo ('<a href="../profil.php" target="_blank"><input type="submit" name="Retour" value="Retour"/></a>');
      }

      $conn->close();

    }
  }
}

?>

</body>