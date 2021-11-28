<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/connexion.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header class="head">
        <div class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
            <li><a href="../index.php">accueil</a></li>
            <?php
            if (empty($login)) {
           echo "<li><a href=connexion.php>"."connexion"."</a></li>";
           echo "<li><a href=inscription.php>"."inscription"."</a></li>";
            }
            elseif(!empty($login)){
                    echo "<li><a href=profil.php>profil</a></li>";
                    
                    if ($login=="admin") {
                        echo  "<li><a href=admin.php>"."admin"."</a></li>";
                    }
                    echo "<li><a href=deconnexion.php>deconnexion</a></li>";
                }
            ?> 
            </div>
        </div>
    </header>
    <h1>CONNEXION</h1>
    <main class=connexion >
        <form action="backconnexion.php" method="POST">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="mot de passe">
            <input type="submit">
        </form>
    </main>
    <footer>
    <ul class="liste">
        <li><a href="https://open.spotify.com/artist/0Rq2hV3S3O4JMWbL2B510w">Spotify</a></li>
        <li><a href="https://www.erbofhistory.com/">Site officiel</a></li>
        <li><a href="https://twitter.com/erbofhistory">Twitter</a></li>
        <li><a href="https://www.facebook.com/erb">Facebook</a></li>
        <li><a href="https://github.com/damien-verschaere?tab=repositories">Github</a></li>
        </ul>
    </footer>
    
</body>
</html>