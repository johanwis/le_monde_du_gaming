<?php
//connection à la basse de donnée

session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming', 'root', '');

//si cette variable exist
if(isset($_POST['formconnection']))
//alors on continue
{
//sécuriser la variable
$mailconnect = htmlspecialchars($_POST['mailconnect']);
//important de réutilliser la même méthode d'encddage
$mdpconnect = sha1($_POST['mdpconnect']);
//si les deux variable champs sont rempli
if(!empty($mailconnect) AND !empty($mdpconnect)) {
//verification de l'utilisateur
//prepartion de la requete
$requser = $bdd->prepare("SELECT * FROM membres WHERE mail=? AND motdepasse=?");
//exectution de la requete
$requser->execute(array($mailconnect, $mdpconnect));
//il va compter le nombre de ranger qu'il y a avec les information saisi
$userexist = $requser->rowCount();
//si les information sont bonne
if ($userexist == 1)
{
$userinfo = $requser->fetch();
$_SESSION['id'] = $userinfo['id'];
$_SESSION['pseudo']=$userinfo['pseudo'];
$_SESSION['mail']=$userinfo['mail'];
header("Location:profil.php?id=".$_SESSION['id']);
}

else
{
//si un des deux champ  sont mauvaise
$erreur ="Vous avez mis soit un mauvais mail du mot de passe!";
}
}
else
{
//si un des deux ou les deux champs sont vide alors message d'erreur
$erreur = "Tous les champs doivent être complétés!";
}
}
//si les deux addresse mail sont le même
//        if($mailconnect) {
//            //si l'utilisateur modifie le code html et qui rentre du text  au lieu d'une adresse mail alors un message d'erreur s'affichera
//
//            if(filter_var($mailconnect, FILTER_VALIDATE_EMAIL)) {
////vérifie si l'adresse mail est déjà utilisée ou non
//                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
//                $reqmail->execute(array($mailconnect));
//            }
//            else {
//                $erreur = "Votre adresse mail n'est pas valide !";
//            }
//   }
//               $mailexist = $reqmail->rowCount();
//               //si il y a pas le même mail déjà enregistrer
//               if($mailexist == 0) {
//               }
//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>le monde du gaming,connexion</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

require_once "menu.php";


?>

<div class="container">
        <div class="row">   
                <div class="col-0 col-sm-0 col-md-2 col-lg-3"></div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                        <img id="logo_site" src="logo/le_monde_du_gaming_v3.png" alt="le monde du gaming logo" style="width: 50%">
            <h3>Connexion</h3>
            <div>
                        <form id="form" method="post"  action="connexion.php">
                <label for="mailconnect">
                <input type="email" id="mailconnect" name="mailconnect" placeholder="Votre Mail"><br></label><br>
                <label for="mdpconnect">
                <input type="password" id="mdpconnect" name="mdpconnect" placeholder="Votre mot de passe"><br></label><br>
                <label for="submit"></label><button type="submit" id="submit" name="formconnection">Se connecter</button>
                <label for="reset"> </label><button type="reset" id="reset">Annuler</button>
                <p>Si tu n'as pas encore de compte qu'est que tu attends c'est gratuit <a href="inscription.php">Clique ici! </a></p>


            </form>
                <?php
                if(isset($erreur))
                {echo '<p id="erreur_inscription">'.$erreur."</p>";}
                ?>
                    </div>
            </div>
</div>﻿

    <?php
    require_once "footer.php";
    ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="konamicode.js"></script>
</body>

</html>


