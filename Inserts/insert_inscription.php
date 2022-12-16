<!DOCTYPE html>
<html>
<head>
<title><?php echo "Inscription" ?></title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<?php 
// Cette page "insert_inscription.php" se relie à la base de données, 
// et recherche ce qui a été renseigné dans le formulaire avec les variables $_POST.
// Puis, on exécute l'insertion dans le code php, et un nouvel enregistrement si l'on ne trouve pas d'erreur 
// sera ajouté à la table "utilisateurs".
?>

<?php

// Ici on va taper plusieurs conditions //

// 1ère condition : Les champs ne sont pas remplis

if (empty($_POST['login']) or empty($_POST['password']) or empty($_POST['confirmed_password'])) {
  echo ("<main>
			<p> ERREUR </p>
            <p> Les champs ne sont pas entièrement remplis. </p> 
            Retournez à la page d'inscription ou à l'index :
            <br>
            <br>
            <a href='../inscription.php'<li> M'inscrire </li></a>
            <br>
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
        </main>
        ");
}

// 2ème condition : Les mots de passe ne sont pas identiques

elseif (($_POST['password']) != ($_POST['confirmed_password'])) {
  echo ("<main>
			<p> ERREUR </p>
            <p> Les mots de passes ne sont pas identiques. </p> 
            Retournez à la page d'inscription ou à l'index :
            <br>
            <br>
            <a href='../inscription.php'<li> M'inscrire </li></a>
            <br>
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
        </main>
        ");
} 

// Si tous les champs sont remplis alors :
elseif (isset($_POST['login']) && isset($_POST['password']) && ($_POST['confirmed_password'])) {

  include('connexion_db.php'); // Connexion à la bdd

  $login = $_POST['login']; // On attribue des variables aux login et mot de passe renseignées 
  $password = $_POST['password'];
	
  // On vérifie si le login et mot de passe sont pas déjà pris
	$req = mysqli_query($conn, "SELECT password, login FROM utilisateurs WHERE password = '$password' AND login = '$login'"); // requête pour    verifier si le mot de passe et login renseignés n'existent pas déjà
  $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
  if ($num_rows > 0) { // Si une ligne est concernée par la requête c'est que le mot de passe est déjà pris           
    // donc on affiche un message d'erreur
    echo ("<main>
			<p> ERREUR </p>
            <p> Mot de passe et login déjà pris. </p> 
            Retournez à la page d'inscription ou à l'index :
            <br>
            <br>
            <a href='../inscription.php'<li> M'inscrire </li></a>
            <br>
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
        </main>
        ");
  } 
	
  // Si un utilisateur possède déjà le login tapé par la personne qui s'inscrit un message s'affiche
  $req = mysqli_query($conn, "SELECT login FROM utilisateurs WHERE login = '$login'"); // requête pour verifier si le login renseigné n'existe pas déjà
  $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
  if ($num_rows > 0) { // Si une ligne est concernée par la requête c'est que le login est déjà pris           
    // donc on affiche un message d'erreur
    echo ("<main>
			<p> ERREUR </p>
            <p> Login déjà pris. </p> 
            Retournez à la page d'inscription ou à l'index :
            <br>
            <br>
            <a href='../inscription.php'<li> M'inscrire </li></a>
            <br>
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
        </main>
        ");
  }
  $req = mysqli_query($conn, "SELECT password FROM utilisateurs WHERE password = '$password'"); // requête pour verifier si le mot de passe renseigné n'existe pas déjà
  $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
  if ($num_rows > 0) { // Si une ligne est concernée par la requête c'est que le mot de passe est déjà pris           
    // donc on affiche un message d'erreur
    echo ("<main>
			<p> ERREUR </p>
            <p> Mot de passe déjà pris. </p> 
            Retournez à la page d'inscription ou à l'index :
            <br>
            <br>
            <a href='../inscription.php'<li> M'inscrire </li></a>
            <br>
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
        </main>
        ");
  } 
  
  else {

    include('connexion_db.php');

    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $sql = "INSERT INTO utilisateurs
  VALUES (0, '$login', '$prenom', '$nom', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo ("<main>
            <p> Inscription réussie ! </p> 
            Vous pouvez désormais vous connecter :
            <br>
            <br>
            <a href='../connexion.php'<li> Me connecter</li></a>
            <br>
            <br>
            OU retourner à l'index
            <br>
            <a href='../index.php'<li> Page d'accueil </li></a>
            <br>
            <br>
      </main>
      ");   }
    $conn->close();
  }
}
?>