<?php
session_start();
$login=$_POST['login'];
$password=$_POST['password'];

$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
$requete=mysqli_query($bdd,"SELECT * FROM `etudiants` WHERE `login`= '$login' AND `password`= '$password'");
if(mysqli_num_rows($requete) == 0) {
    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
}
else{
    session_start();
    // on ouvre la session avec $_SESSION:
    $_SESSION['login'] = $login; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
    header('location:' .'../index.php');
    
}


?>