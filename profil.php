<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming','root','');
//header("location:profil.php?id=" . $_SESSION['id']);
if(isset($_GET['id']) AND $_GET['id']>0) {
    //pour eviter que l'utilisateur rentre du text et sécurise la variable intval=transforme en chiffre
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id= ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>le monde du jeuxvideo,connexion</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<?php

require_once "menu.php"

?>

    <div class="container">
            <div class="row">   
                    <div class="col-0 col-sm-0 col-md-2 col-lg-3"></div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                           <img id="logo_site" src="logo/le_monde_du_gaming_v3.png" alt="le monde du gaming logo" style="width: 50%">

        <h3>Profil de <?php echo $userinfo['pseudo']; ?>.</h3>
        <br><br>
        <p>Pseudo: <?php echo $userinfo['pseudo']; ?>.</p>
        <p>Mail: <?php echo $userinfo['mail']; ?>.</p>
        <?php
        //si l'utilisateur est bien sur et le même que celui de sa session et permet à l'utilisateur qui n'est pas connecter de voir le profil
        if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
            ?>
            <a href="index.php">Accueil</a>&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="edition_profil.php">Modifier mon profil</a>&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="supprimer_profil.php">Supprimer mon profil</a>



            <?php

        }
        //else
        //{
        //    echo "tu as cru que tu pourrais modifier le profil de quelqu'un d'autre";
        //}
        ?>


    </div>

            <?php
            require_once "footer.php";
            ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </body>
    </html>
    <?php
}

?>