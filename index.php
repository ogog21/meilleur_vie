<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Authentification</title>
    <link rel="stylesheet" href="css/auth.css" />
</head>
<body>
    <div id="main">
        <h1>Page de Connexion</h1>
        <p>Logiciel de gestion</p>
        <hr>
        <form action="interface.php" method="POST" id="formulaire">
            <p class="champs-nom">Identifiant :</p><input type="text" name="identifiant" class="champs-texte">
            <p class="champs-nom">Mot de passe :</p><input type="password" name="password" class="champs-texte">
            <br />
            <input type="submit" value="Connexion" id="connexion">
        </form>
    </div>
</body>
</html>