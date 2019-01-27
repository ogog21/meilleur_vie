<?php
$bdd = new PDO('mysql:host=localhost;dbname=meilleur_vie','root','password');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Création compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/creation.css" />
    <script type="text/javascript">
        function confirmation(){
            let mot_de_passe = "oui";
            let saisie = prompt("Mot de passe de confirmation");
            if(saisie === mot_de_passe){
                return true;
            }else {
                return false;
            }
        }
    </script>
</head>
<body>
    <p><a href="index.php" id="vers_index"><<< Retour</a></p>
    <div id="main">
        <h1>Creation de compte</h1>
        <p>Module de creation</p>
        <hr>
        <form action="creation.php" method="POST" id="formulaire" onSubmit="return confirmation()">
            <p class="champs-nom">Identifiant à créer:</p><input type="text" name="identifiant" class="champs-texte">
            <p class="champs-nom">Mot de passe à créer:</p><input type="password" name="motdepasse" class="champs-texte">
            <br />
            <br />
            <div id="info">
                <?php
                    if(empty($error)){
                        echo '<span id="message">' .$message. '</span>';
                    }else {
                        echo '<span id="error">' .$error. '</span>';
                    }
                ?>
            </div>
            <input type="submit" value="Créer un compte" id="connexion">
    <?php
        $message = "";
        $error = "";
        if(!empty($_POST['identifiant']) && !empty($_POST['motdepasse'])){

            $requete = $bdd->prepare('INSERT INTO auth(identifiant,motdepasse) VALUES(:identifiant,:motdepasse)');
            if($requete){
                $requete->execute(array(
                    'identifiant' => $_POST['identifiant'],
                    'motdepasse' => password_hash($_POST['motdepasse'], PASSWORD_DEFAULT)
                ));
                $message = 'Succes';
            }else {
                $error = "Probleme pour execution de la requete";
            }
        }else {
            $error = "Un des deux champs n'est pas rempli";
        }
    ?>
        </form>
    </div>
</body>
</html>