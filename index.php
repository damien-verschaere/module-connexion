<?php
session_start();
if (isset($_SESSION['login'])) {
    $login=$_SESSION['login'];
}

if (isset($_POST['deco'])) {
    $_SESSION=[];
session_destroy();
return var_dump($_SESSION['login']);
}

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
        <div class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
            <li><a href="index.php">accueil</a></li>
            <?php
            if (empty($login)) {
           echo "<li><a href=php/connexion.php>"."connexion"."</a></li>";
           echo "<li><a href=php/inscription.php>"."inscription"."</a></li>";
            }
            elseif(!empty($login)){
                    echo "<li><a href=php/profil.php>profil</a></li>";
                    
                    if ($login=="admin") {
                        echo  "<li><a href=php/admin.php>"."admin"."</a></li>";
                    }
                    echo "<li><form action=index.php ><input type=submit name=deco value=deconnexion></form></li>";
                }

            ?> 
?>
            </form>  
            </div>
        </div>
    </header>
        <h1>EPIC RAP BATTLE OF HISTORY</h1>
        <p class="bonjour">Bonjour 
            <?php if (isset($login)) {
            echo $login;
            } ?> 
            </p>
        <main class="accueil">
            <iframe class="video" width="853" height="480" src="https://www.youtube.com/embed/njos57IJf-0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </main>
        <p class="bonjour">Juste pour le plaisir d'un rap contenders EPIC </p>
        <article>
            <iframe width="900" height="506" src="https://www.youtube.com/embed/_wYtG7aQTHA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </article>
<footer class="foot">
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
