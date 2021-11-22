<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/inscription.css" rel="stylesheet">
    <title>INSCRIPTION</title>
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
      
            </div>
        </div>
    </header>
    <h1>INSCRIPTION</h1>
    <main class="inscription">
        <div class="cadre">
        <form action="inscription.php" method="POST">
            <input type="text" name="login" placeholder="pseudo">
            <input type="text" name="nom" placeholder="nom">
            <input type="prenom" name="prenom" placeholder="prenom">
            <input type="password" name="password" placeholder="mot de passe">
            <input type="password"  name= "password2" placeholder="verifcation mot de passe">
            <input type="submit" name="inscription" >
        </form>
        </div>
        
        <?php
            $bdd=mysqli_connect('localhost','root','','moduleconnexion');
            mysqli_set_charset($bdd,'utf8');
            if (isset($_POST['inscription'])){
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
                elseif (!empty($login)) {
                    $veriflogin=mysqli_query($bdd,"SELECT `login` FROM `etudiants` WHERE `login`= '$login'");
                    var_dump(mysqli_num_rows($veriflogin) );
                    if(mysqli_num_rows($veriflogin) == 1) {
                        echo "Le LOGIN existe deja . ";    
                    }
                elseif ($password != $password2) {
                    echo "les mdp ne coresponde pas";
                }
                else {
                        $cryptage=password_hash($password,PASSWORD_DEFAULT);
                        $requete=mysqli_query($bdd,"INSERT INTO `etudiants` (`id`, `login`, `prenom`, `nom`, `password`) VALUES (NULL, '$login', '$prenom', '$nom', '$cryptage')");
                        header('location:' . 'connexion.php');
                    }
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
    </ul>
    </footer>
</body>
</html>