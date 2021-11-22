<?php
$login=$_POST["login"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$password=$_POST["password"];
$MESSAGE_ERREUR="veuillez remplir tous les champs"


function inscription(){
$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
if (empty($login && $nom && $prenom && $password)) {
   echo $MESSAGE_ERREUR;
}
else {
$requete=mysqli_query($bdd,"INSERT INTO `etudiants` (`id`, `login`, `prenom`, `nom`, `password`) VALUES (NULL, '$login', '$prenom', '$nom', '$password')");
header('location:' . 'connexion.php');
}

}
?>