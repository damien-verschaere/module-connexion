<?php
$login=$_POST["login"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$password=$_POST["password"];


$bdd=mysqli_connect('localhost','root','','moduleconnexion');
mysqli_set_charset($bdd,'utf8');
// if ($login || $nom || $prenom || $password isempty()) {
//     header('location: . inscription.php')
//     echo "remplissez tout les champs svp";
// }
$requete=mysqli_query($bdd,"INSERT INTO `etudiants` (`id`, `login`, `prenom`, `nom`, `password`) VALUES (NULL, '$login', '$prenom', '$nom', '$password')");
header('location:' . 'connexion.php');



?>