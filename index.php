<?php
session_start();
echo "bonjour". $_SESSION['login'];


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/accueil.css" rel="stylesheet">
    <title>ERBH</title>
</head>
<body>
    <header class="head">
        <ul>
            <li><a href="#">accueil</a></li>
            <li><a href="php/connexion.php">connexion</a></li>
            <li><a href="php/inscription.php">inscription</a></li>
            <li><a href="#">profil</a></li>
            <li><a href="#">admin</a></li>
        </ul>
    </header>
        <h1>EPIC RAP BATTLE OF HISTORY</h1>
        <main>
        <iframe class="video" width="853" height="480" src="https://www.youtube.com/embed/njos57IJf-0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </main>
<footer class="foot">
    <ul>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</footer>    
</body>
</html>