<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "Commentaires" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php

if (!isset($_SESSION) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id'])) {
  header('location:warning.php'); // Si on n'a pas de variables sessions la personne n'est pas connectée, on la redirige vers la page warning.php
}
 
else {

  if (empty($_POST['commentaire'])) {
    echo ("<main> 
    <p> Champ vide. Veuillez ajouter un commentaire svp.</p> ");
    echo ('<a href="../commentaires.php"><input type="submit" name="Retour" value="Retour"/></a>');
    echo ('<br>');
    echo("</main>");
  }

  else {


    include('connexion_db.php');

  date_default_timezone_set('Europe/Paris'); // On prend par défaut l'horaire de Paris
  $date = date('Y-m-d h:i:s');
  $commentaire = $_POST['commentaire'];
  $id_utilisateur = $_SESSION['login'];


    if (isset($_POST['Valider'])) {
        $sql = "INSERT INTO `commentaires`(`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '$commentaire', '$id_utilisateur', '$date')";
        $result = mysqli_query($conn,$sql);
        // $result = $conn->query($sql);

        echo ("<main> 
        <p> Votre commentaire a bien été ajouté. </p> ");
        echo ('<a href="../livreor.php"><input type="submit" name="Retour" value="Retour"/></a>');
        echo ("</main>");
    }

    elseif ($conn->query($sql) === FALSE) {
      echo ("<main> 
      <p> ERREUR </p> ");
      echo ("Echec de l'exécution de la requête.");
      echo ("<br>");
      echo ("Tapez une requête valide svp.");
      echo ("<br>");
      echo ("<br>");
      echo("</main>");
    }
    $conn->close();  
}

}

?>

</body>