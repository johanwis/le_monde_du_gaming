<?php
  session_start();
include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD
  $get_id = (int) trim(htmlentities($_GET['id'])); // On récupère l'id de la catégorie

  if(empty($get_id)){ // On vérifie qu'on a bien un id sinon on redirige vers la page forum
    header('Location:forum.php');
    exit;
  }
  // On va récupérer toutes les informations des sujets, mettre les dates au format 'Le 24/04/2018 à 21h32'
//et ajouter les prénoms des personnes qui ont créé leur sujet
  $req = $DB->query("SELECT t.*, DATE_FORMAT(t.date_creation, 'Le %d/%m/%Y à %H\h%i') as date_c, U.pseudo
    FROM topic t
    LEFT JOIN membres U ON U.id = t.id_user
    WHERE t.id_forum = ?
    ORDER BY t.date_creation DESC",
    array($get_id));
  $req = $req->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Sujet</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="styles.css"/>
  </head>
  <body>
  <?php
  require_once ('menu.php')
  ?>
  <div class="container">
    <div class="row">   
      <div class="col-sm-0 col-md-0 col-lg-0"></div>
      <div class="col-sm-12 col-md-12 col-lg-12">
          <img id="logo_site" src="logo/le_monde_du_gaming_v3.png" alt="le monde du gaming logo" style="width: 35%; margin-left: 25%">
                     
        <h3>sujet</h3>
        <div class="table-responsive">
          <table class="table table-striped">


              <th class="titreprincipal">Titre: </th>
              <th class="titreprincipal">Crée le: </th>
              <th class="titreprincipal">Écrit Par: </th>

            <?php
              foreach($req as $r){// Ici on va afficher tous nos enregistrements trouvés
              ?>  
              <tr>
                <!-- On met un lien pour afficher le topic en entier -->
                  <td><a href="topic.php?id_forum=<?= $get_id?>&id_topic=<?= $r['id']?>"><?= $r['titre'] ?></a></td>
                  <td class="titre"><?= $r['date_creation'] ?></td>
                  <td class="titre"><?= $r['pseudo'] ?></td>
              </tr>   
                  <?php
              }
            ?>
          </table>                    
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once "footer.php";
  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="konamicode.js"></script>

  </body>
</html>