<?php
//permet de savoir s'il y a une session.
//c'est-à-dire si un utilisateur s'est connecté au site

session_start();
//fichier php contenant la connexion à la base de donnée
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming', 'root', '');

?>
<!DOCTYPE html>
<html lang="fr">
<head>

    ﻿<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Accueil</title>
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
                       
                        <div>
                                <?php
                if(isset($_SESSION['id'])){
                    echo '<br>'. ' Bonjour  : ' . $_SESSION['pseudo'].'<br>'.'Bienvenue sur le monde du gaming se site est un forum pour les joueurs que ce soit sur PC, NINTENDO, PLAYSTATION ou XBOX'.'<br>'.'Le site est encore en construction veuillez nous excusez si des pages sont innacessible ' ;}
                else
                    {
                 echo '<br><br>'.'Bonjour cher visiteur et bienvenue sur le monde du gaming se site est un forum pour les joueurs que ce soit sur PC, NINTENDO, PLAYSTATION ou XBOX'.'<br>'.'Le site est encore en construction veuillez nous excusez si des pages sont innacessible ';
                }

                    ?>

                            </div>
                    </div>
            </div>
</div>﻿

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="konamicode.js"></script>
</body>
</html>