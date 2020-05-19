<?php

?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                        <?php
            if(!isset($_SESSION['id'])){?>
                <li class="nav-item">

                                        <a class="nav-link" href="forum.php">Forum</a>
                                        </li>
                <?php
                }else{
                ?>      <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="nav-link" href="forum.php">forum</a>
                                        </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="profil.php">Mon profil</a>&emsp;&emsp;&emsp;&emsp;&emsp;
                                        </li>
                <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="nav-link" href="creer_topic.php">Crée un topic</a>
                </li>

                <?php
}
?>
                    </ul><?php
        if(!isset($_SESSION['id'])){
        ?>


                <ul class="navbar-nav ml-md-auto">
                       
                                    <li class="nav-item">
                                            <a class="nav-link" href="inscription.php">Inscription</a>
                                        </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="connexion.php">Connexion</a>
                                        </li>

                                <?php
}else{
?>
                                    <li class="nav-item">
                                            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                                        </li>

                                <?php
}
?>
                    </ul>
            </div>
</nav>
</header>