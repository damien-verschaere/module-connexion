<?php
session_start();
if (isset($_SESSION['login'])) {
    $login=$_SESSION['login'];
}
$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
$requete=mysqli_query($bdd,"SELECT `id`,`login`,`prenom`,`nom`,`password` FROM `etudiants` WHERE `login`='$login' ");
$profil=mysqli_fetch_all($requete,MYSQLI_ASSOC);

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
    <?php
    $error="";
    if (isset($_POST['modifprofil'])){
        $id=$_POST['id'];
        if (!empty($_POST['login'] && $_POST['prenom'] && $_POST['nom'])) {
            $requete_log = mysqli_query($bdd , " SELECT * FROM etudiants WHERE id = '$id'");    
            $result_log = mysqli_fetch_assoc($requete_log);
            $requete_log_2 = mysqli_query($bdd, "SELECT COUNT(*) FROM etudiants WHERE login = '$_POST[login]' ");
            $result_log_2 = mysqli_fetch_array($requete_log_2);
        }
        if ( $result_log_2['COUNT(*)'] == 0){
            if (empty($_POST['password2'])) {
                $login = htmlspecialchars($_POST['login']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $requete = mysqli_query($bdd, "UPDATE etudiants SET login='$login',prenom= '$prenom',nom= '$nom' WHERE login = '$result_log[login]'");
                $_SESSION['login'] = $login;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                header('location: ' . '../index.php');
            }
            
            if ($_POST['password'] == $_POST['password2']){
               
                $login = htmlspecialchars($_POST['login']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $requete = mysqli_query($bdd, "UPDATE etudiants SET login='$login',prenom= '$prenom',nom= '$nom',password= '$password' WHERE login = '$result_log[login]'");
                $_SESSION['login'] = $login;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['password'] = $password;
                $echo = "vos informations ont été modifier avec succés";
                header('location: ' . '../index.php');
            }
            else {
                $error = "Veuillez insérer deux password indentiques";
            }
        }
        elseif ($_POST['login']==$_SESSION['login']) {
            
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $updte1=mysqli_query($bdd, "UPDATE etudiants SET prenom= '$prenom',nom= '$nom',password= '$password' WHERE login = '$result_log[login]'");
            header('location: ' . '../index.php');
        }
        else {
            $error ="Login indisponible";
        }
    } 
    else {
        $error = "Veuillez renseigner les champs vides";
    }   

    ?>
    </div>

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
