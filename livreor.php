<?php
session_start();
    // Chaque commentaire est ajouté à la bdd. Donc pour les afficher en les triant
    // du plus récent au plus ancien il suffit de faire une requête SQL pour récuperer
    // les résultats. On fera ça dans un fichier insert_livreor.php
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo "LivreOr" ?></title>
<link href="style.css" rel="stylesheet">
</head>

<body>

    <?php
     
        if (!isset($_SESSION) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['id'])) {
            header('location:warning.php'); // Si on n'a pas de variables sessions la personne n'est pas connectée, on la redirige vers la page warning.php
        }
           
        elseif ($_SESSION['loggedin'] = true) { // Si cette session existe alors l'utilisateur est connecté,
        echo '  <header>
                <li><a href="index.php" target=_blank><b>Accueil</a>
                <li><a href="profil.php">Profil</a>
                <li><a href="livreor.php">Livre or</a>
                <li><a href="deconnexion.php">Se déconnecter</b></li></a>
                </header>
                <main> 

                <form action="Inserts/insert_livreor.php" method="post">
                       
                 <br>
                <a href="commentaires.php" autocomplete="off">Ajouter un commentaire</a>            
                </br>
                <br>
                <u>Commentaires</u> : 
                <br> 
                <br> ';
            echo("</main>");

        echo '<div class="commentaires">';

            include('Inserts/connexion_db.php');

            $sql = "SELECT * FROM `commentaires`";

            $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {

                while ($row = $result->fetch_assoc()) {
                        echo("Posté le ");
                        echo ($row['date']);
                        echo (" par ");
                        echo ($row['id_utilisateur']);
                        echo (" : ");
                        echo($row['commentaire']);
                        echo ("<br>");
                        echo ("<br>");
                }
            }
        '</div>';
    } 
             
        elseif ($conn->query($sql) === FALSE) {
            echo ("Fausse requête");
        } 
        
    ?>

    </main>

</body>