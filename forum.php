<?php
session_start();
include('bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD

$req = $DB->query("SELECT *FROM forum ORDER BY ordre");

$req = $req->fetchAll();
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

require "menu.php";


?>

<div class="container">
        <div class="row">   
                <div class="col-0 col-sm-0 col-md-2 col-lg-3"></div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                        <img id="logo_site" src="logo/le_monde_du_gaming_v3.png" alt="le monde du gaming logo" style="width: 50%">
            <h3>Forum</h3>
               
            <div class="table-responsive">        
<table class="table table-striped">
      <tr>
           
            <th>Console</th>
          </tr>
      <?php foreach($req as $r){
?>  
            <tr>

                  <td><a href="sujet.php?id=<?= $r['id'] ?>"><?= $r['titre'] ?></a></td>
                </tr>   
            <?php
}
?>

</table>
            </div>
        </div>
    </div>
</div><?php
require_once "footer.php";
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
