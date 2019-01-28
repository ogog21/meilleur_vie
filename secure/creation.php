<?php
$bdd = new PDO('mysql:host=localhost;dbname=meilleur_vie','root','password');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Création compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/creation.css" />
</head>
<body>
    <a href="../index.php" id="vers_index"><<< Retour</a>
    <div id="main">
        <h1>Creation de compte</h1>
        <p>Module de creation</p>
        <hr>
        <?php
            $error;
            $message;
            if(!empty($_POST['identifiant']) && !empty($_POST['motdepasse'])){
                $identifiant = $_POST['identifiant'];
                $motdepasse = password_hash($_POST['motdepasse'],PASSWORD_DEFAULT);
                $requete = $bdd->prepare('INSERT INTO auth(identifiant,motdepasse) VALUES(?,?)');
                if($requete){
                    $requete->execute(array($identifiant,$motdepasse));
                    $message = 'Succes';
                }else {
                    $error = "Probleme pour execution de la requete";
                }
            }else {
                $error = "Remplissez les champs !";
            }
        ?>
        <form action="creation.php" method="POST" id="creation" onsubmit="return confirm('Etes-vous sur de votre choix ?');">
            <p class="champs-nom">Identifiant à créer:</p><input type="text" name="identifiant" class="champs-texte">
            <p class="champs-nom">Mot de passe à créer:</p><input type="password" name="motdepasse" class="champs-texte">
            <br />
            <br />
            <div id="info">
                <?php
                    if(empty($error)){
                        echo '<span id="message">' .$message. '</span>';
                    }elseif(empty($message)) {
                        echo '<span id="error">' .$error. '</span>';
                    }
                ?>
            </div>
                <input type="submit" value="Créer un compte" id="connexion">
        </form>
    </div>
</body>
</html>