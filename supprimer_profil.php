<?php

session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=le_monde_du_gaming','root','');
//"autorisation de la page si il c'est connecter à ce compte"

//j'utilise pas de while car j'ai que une entrée
//requete prepare
$requser =$bdd->prepare("DELETE FROM membres WHERE id = ?")->execute(array($_SESSION['id']));
session_destroy();
header('location:deconnexion.php');
exit();

//execution de la requete;
