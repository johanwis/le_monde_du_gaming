<?php
//include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD

session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming', 'root', '');

if(isset($_POST['forminscription'])) {

    //"sécurisée mes variable htmlspecialchars = fonction qui permet d'enlever les caractères html pour eviter des injection de code

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);

    //"si un hacker arrive a rentrer dans la basse de donner il n'arivera pas à récupére le mot de passe le md5 étant ancien j'utilise le sha1

    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    //si le formulaire est remplis

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {

        //si le pseudo est plus petit que 255 caractères
        $pseudolength = strlen($pseudo);

        if($pseudolength <= 255) {

            //si les deux addresse mail sont le même
            if($mail == $mail2) {
                //si l'utilisateur modifie le code html et qui rentre du text  au lieu d'une adresse mail alors un message d'erreur s'affichera

                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//vérifie si l'adresse mail est déjà utilisée ou non
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    //si il y a pas le même mail déjà enregistrer
                    if($mailexist == 0) {


                        //si les deux mot de passe sont le même
                        if($mdp == $mdp2) {

                            //insertion du compte dans la table membre
                            //preparation de l'insertion

                            $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp));
                            $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        }
                        //si les deux mot de passe ne sont pas les même
                        else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        //si l'adresse mail est déjà utilisée
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            } else {
                //si les deux addresse mail ne sont pas les même
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
    } else {
        //si le formulaire n'est pas remplis
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Inscription</title>
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
                       
            <h3>inscription</h3>
                           <?php
            if(isset($erreur))
            {echo '<p id="erreur_inscription">'.$erreur."</p>";}
            ?>
                        <div>
                            <form method="post">
                    <table id="inscription">
                        <tr class="align">
                            <td>
                                <label for="pseudo">Pseudo :</label>
                            </td>
                            <td>
                                <input type="text"  placeholder="Votre Pseudo" id="pseudo" value="<?php /* il vas conserver les informations si il y a une erreur dans le formulaire*/if (isset($pseudo)){ echo $pseudo;} ?>" name="pseudo">
                            </td>
                        </tr>
                        <tr class="align">
                            <td>
                                <label for="mail">Mail :</label>
                            </td>
                            <td>
                                <input type="email"  placeholder="Votre Mail" id="mail" value="<?php /* il vas conserver les informations si il y a une erreur dans le formulaire*/if (isset($mail)){ echo $mail;} ?>" name="mail">
                            </td>
                        </tr>
                        <tr>
                            <td class="align">
                                <label for="mail2">Confirmation du mail :</label>
                            </td>
                            <td>
                                <input type="email"  placeholder="Confirmer votre mail" id="mail2" value="<?php /* il vas conserver les informations si il y a une erreur dans le formulaire*/if (isset($mail2)){ echo $mail2;} ?>" name="mail2">
                            </td>
                        </tr>
                        <tr class="align">
                            <td>
                                <label for="mdp">Mot de passe :</label>
                            </td>
                            <td>
                                <input type="password"  placeholder="Votre mot de passe" id="mdp" name="mdp">
                            </td>
                        </tr>
                        <tr class="align">
                            <td>
                                <label for="mdp2">Confirmation du mot de passe :</label>
                            </td>
                            <td>
                                <input type="password"  placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2">
                            </td>
                        </tr>

                        <tr class="align">
                            <td> <label for="submit"></label><button type="submit" id="submit" name="forminscription">Valider</button></td>

                            <td><label for="reset"> </label><button type="reset" id="reset">Annuler</button></td>
                        </tr>

                    </table>

                </form>
                <!--il vas afficher comme quoi il manque des information-->

                        </div>
                </div>
    </div>﻿

    <?php
    require_once "footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

