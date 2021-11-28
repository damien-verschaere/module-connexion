<?php
session_start();
$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
$requete=mysqli_query($bdd,"SELECT * from `etudiants`");
$profil=mysqli_fetch_all($requete,MYSQLI_ASSOC);
if (isset($_SESSION['login'])) {
    $login=$_SESSION['login'];
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>ADMIN</title>
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
    <main>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>PRENOM</td>
                    <td>NOM</td>
                    <td>PASSWORD</td>
                </tr>
            </thead>
            <tbody>
        <?php
        if ($_SESSION['login']==$profil[0]['login']) {
            foreach ($profil as $key) {
                echo "<tr scope=row>";
                echo "<td>". $key['id'] ."</td>";
                echo "<td >". $key['prenom']."</td>";
                echo "<td >".$key['nom']."</td>";
                echo "<td >".$key['password']."</td></tr>";
            };
        }
        else{
            header('location:' . '../index.php');
            }
        ?>
            </tbody>
        </table>
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