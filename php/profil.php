<?php
session_start();
$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
$requete=mysqli_query($bdd,"SELECT `id`,`login`,`prenom`,`nom`,`password` FROM `etudiants` WHERE `login`='$_SESSION[login]' ");
$profil=mysqli_fetch_all($requete,MYSQLI_ASSOC);
$login=$_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/profil.css" rel="stylesheet">
    <title>PROFIL</title>
</head>
<body>
<header>
    <ul>
            <div class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
            <li><a href="../index.php">accueil</a></li>
            <li><a href="connexion.php">connexion</a></li>
            <li><a href="inscription.php">inscription</a></li>
            <li><a href="profil.php">profil</a></li>
            <?php
            if (isset($login)) {
                if ($login=="admin") {
                    echo  "<li><a href=admin.php>admin</a></li>";
                } 
            }
            ?>   
            </div>
        </div>
    </header>
    <main>
        <div class="cadre">
    <form action="profil.php"method="POST">
        <?php 
        
            foreach ($profil as $key ) {
                echo "<input type=hidden name=id value =". $key['id'] .">";
                echo "<input type= text name=login value = ". $key['login'] .">"  ;
                echo "<input type= text name=prenom value = ". $key['prenom'].">"  ;
                echo "<input type= text name=nom value = ". $key['nom']. "> ";
                echo "<input type= password name=password placeholder=mdp >" ;
            }  
        ?> 
        <input type="password" name="password2" placeholder="verification mdp" >
        <input type="submit" name="modifprofil">
    </form>
    </div>
    <?php
    if (isset($_POST['modifprofil'])){
                $id=$_POST['id'];
                $login=$_POST['login'];
                $prenom=$_POST['prenom'];
                $nom=$_POST['nom'];
                $password=$_POST['password'];
                $password2=$_POST['password2'];
                
                if (empty($login)) {
                    echo "remplissez le champ login .";
                }
                elseif (empty($prenom)) {
                    echo "remplissez le champ prenom";
                }
                elseif (empty($nom)) {
                    echo "remplissez le champ nom . ";
                }
                elseif (empty($password)) {
                    echo "remplissez le champ mot de passe .";
                    
                }
                elseif ($password != $password2) {
                    echo "les mdp ne coresponde pas";
                }
                else{
                    $cryptage=password_hash($password,PASSWORD_DEFAULT);
                    $update=mysqli_query($bdd,"UPDATE `etudiants`  SET `login`='$login',`prenom`='$prenom',`nom`='$nom',`password`='$cryptage' WHERE `id`= '$id'");
                }
            }
    ?>
    </main>

    <footer>
    <ul class="liste">
        <li><a href="https://open.spotify.com/artist/0Rq2hV3S3O4JMWbL2B510w">Spotify</a></li>
        <li><a href="https://www.erbofhistory.com/">Site officiel</a></li>
        <li><a href="https://twitter.com/erbofhistory">Twitter</a></li>
        <li><a href="https://www.facebook.com/erb">Facebook</a></li>
        <li><a href="https://github.com/damien-verschaere?tab=repositories">Github</a></li>
    </footer>
    
</body>
</html>