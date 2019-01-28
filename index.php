<?php
    $bdd = new PDO('mysql:host=localhost;dbname=meilleur_vie','root','password');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Authentification</title>
    <link rel="stylesheet" href="css/authentification.css" />
</head>
<body>
    <a href="secure/creation.php" id="vers_creation">Créer un compte >>></a>
    <div id="main">
        <h1>Page de Connexion</h1>
        <p>Logiciel de gestion</p>
        <hr>
        <form action="index.php" method="POST" id="formulaire">
            <label><p class="champs-nom">Identifiant :</p><input type="text" name="identifiant" class="champs-texte"></label>
            <label><p class="champs-nom">Mot de passe :</p><input type="password" name="password" class="champs-texte"></label>
            <br />
        <?php
            $requete = $bdd->prepare("SELECT identifiant,motdepasse FROM auth WHERE identifiant = ?");
            $requete->execute(array($idconnect));
            $resultat = $requete->fetch();

            $mdpconnect = password_verify($_POST['motdepasse'],$resultat['motdepasse']);

            if(!$resultat){
                echo '<span id="error"> Mauvais identifiant ou mot de passe ! </span>';
            }else {
                if($mdpconnect){
                    session_start();
                    $_SESSION['identifiant'] = $resultat['identifiant'];
                    echo '<span id="succes"> Vous vous êtes connecté avec succes'. $_SESSION['identifiant'] .'</span>';
                }
            }
        ?>
            <input type="submit" value="Connexion" id="connexion">
        </form>
    </div>
</body>
</html>