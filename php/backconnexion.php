<?php
$login=$_POST['login'];
$password=$_POST['password'];
$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
$requete=mysqli_query($bdd,"SELECT * FROM `etudiants` WHERE `login`= '$login'");
$resultat=mysqli_fetch_assoc($requete);
if (password_verify($password,$resultat['password'])) {  
    session_start();
    // on ouvre la session avec $_SESSION:
    $_SESSION['login'] = $login; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
    header('location:' .'../index.php');
}

else{
    echo "login ou mdp incorect";
}


?>