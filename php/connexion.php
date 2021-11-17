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
    <header>
    <ul>
            <li><a href="../index.php">accueil</a></li>
            <li><a href="connexion.php">connexion</a></li>
            <li><a href="php/inscription.php">inscription</a></li>
            <li><a href="#">profil</a></li>
            <li><a href="#">admin</a></li>
        </ul>
    </header>
    <main>
        <form action="backconnexion.php" method="POST">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="mot de passe">
            <input type="submit">
        </form>
    </main>
    <footer>

    </footer>
    
</body>
</html>