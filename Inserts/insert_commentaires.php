<!DOCTYPE html>
<html>
<head>
<title><?php echo "Commentaires" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livreor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Echec de connexion " . $conn->connect_error);
}

date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d h:i:s');
$commentaire = $_POST['commentaire'];

$sql = "INSERT INTO commentaires(id, commentaire, id_utilisateur, date) 
VALUES ( '0', '$commentaire', '0', '$date')";

$result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo("Votre commentaire a bien été ajouté");
        echo("<br>");
        echo("<br>");
        echo ('<a href="../profil.php" target="_blank"><input type="submit" name="Retour" value="Retour"/></a>');
      }

    elseif ($conn->query($sql) === FALSE) {
        echo ('Tapez une bonne requête');
    }
    
    elseif (empty($_POST['commentaire'] or empty($_POST['id_utilisateur']))) {
        echo ("Champ vide. Veuillez ajouter un commentaire");
      }

else {
  echo "0 results";
}
$conn->close();

?>

</body>