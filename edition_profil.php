<?php


session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming','root','');
//"autorisation de la page si il c'est connecter à ce compte"
if(isset($_SESSION['id']))
{
    //j'utilise pas de while car j'ai que une entrée
    //requete prepare
    $requser =$bdd->prepare("SELECT *FROM membres WHERE id = ?");
    //execution de la requete
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] !=$user['pseudo'])
    {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        //si je mets pas id =? il vas modifier tout la basse de donnée
        $insertpseudo=$bdd->prepare("UPDATE membres SET pseudo = ? WHERE id=?");
        $insertpseudo->execute(array($newpseudo,$_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] !=$user['mail'])
    {
        $newmail = htmlspecialchars($_POST['newmail']);
        //si je mets pas id =? il vas modifier tout la basse de donnée
        $insertmail=$bdd->prepare("UPDATE membres SET mail = ? WHERE id=?");
        $insertmail->execute(array($newmail,$_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND ($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
    {
        $mdp1=sha1($_POST['newmdp1']);
        $mdp2=sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2)
        {
            $insertmdp=$bdd->prepare("UPDATE membres SET motdepasse=? WHERE id=?");
            $insertmdp->execute(array($mdp1,$_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);

        }
        else
        {
            $msg="Vos deux mot de passes ne correspond pas";
        }
    }

    if(isset($_POST['newpseudo']) AND $_POST['newpseudo']==$user['pseudo'])
    {
        header('Location: profil.php?id='.$_SESSION['id']);
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>le monde du jeuxvideo,modification du profil</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php

    require_once "menu.php";


    ?><div class="container">
            <div class="row">   
                    <div class="col-0 col-sm-0 col-md-2 col-lg-3"></div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                            <img id="logo_site" src="logo/le_monde_du_gaming_v3.png" alt="le monde du gaming logo" style="width: 50%">
                <h3>Edition de mon profil.</h3><br>
        <!--enctype=type d'encodage pour upload de fichier  !-->
        <form method="post" action="" enctype="multipart/form-data">
            <label for="newpseudo">Votre nouveau pseudo:</label><br>
                <input type="text" id="newpseudo" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo'];?>"><br><br>
            <label for="newmail">Votre nouveau mail:</label><br>
                <input type="email" id="newmail" name="newmail" placeholder="Mail" value="<?php echo $user['mail'];?>"><br><br>
            <?php // je ne met pas de value avec le mot de passe car il va afficher le motdepasse haché?>
            <label for="newmdp1">Votre nouveau mot de passe:</label><br>
                <input type="password" id="newmdp1" name="newmdp1" placeholder="Mot de passe"><br><br>
            <label for="newmdpd2">Veuillez confirmer votre  nouveau mot de passe:</label><br>
                <input type="password" id="newmdpd2" name="newmdp2" placeholder="confirmation du mdp"><br><br>
            <button type="submit" value="Mettre à jour mon profil">Mettre à jour mon profil</button>

            <button type="reset" Value="Annulez">Annulez</button>

        </form>
        <?php
        if(isset($msg))
        {echo '<p id="erreur_inscription">'.$msg."</p>";}
        ?>
    </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
else
    //si l'utilisateur veut modifier son profil mais si il ne s'est pas connecter alors il vas revenir sur la page de connection
{
    header("Location: connection.php");
}


require_once "footer.php";

?>