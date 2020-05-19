<?php
// Déclaration d'une nouvelle classe
class connexionDB {
    private $host    = '127.0.0.1';  // nom de l'host
    private $name    = 'le_monde_du_gaming';    // nom de la base de donnée
    private $user    = 'root';       // utilisateur
    private $pass    = '';       // mot de passe
    private $connexion;

    function __construct($host = null, $name = null, $user = null, $pass = null){
        if($host != null){
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
        }
        try{
            $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
               //PDO::MYSQL_ATTR_INIT_COMMAND (entier)
                //Commande à exécuter lors de la connexion au serveur MySQL. Sera automatiquement ré-exécuté lors d'une reconnexion.

            //ATTR_ERRMODE ERRMODE_WARNING SERT A SIGNALER DES ERREUR
                $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            //PDOException: Représente une erreur émise par PDO.
        }catch (PDOException $e){
            echo 'Erreur : Impossible de se connecter  à la BDD !';
            die();
        }
    }
// query va me permettre de gagner un gain de vitesse lorsque je fait écrire une requête SQL afin d'interroger mon serveur.
//j'utilise cette requette avec la requête select
       public function query($sql,$data = array())
       {
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
        return $req;
    }
//insert va me permettre d'insérer, de modifier ou de supprimer des données sur mon serveur.donc j'utilise  avec les requêtes INSERT, UPDATE et DELETE.
    public function insert($sql, $data = array())
{
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
}
}

// Faire une connexion à votre fonction
$DB = new connexionDB();
?>