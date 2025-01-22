<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "Models/credentials.php";
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getFav($offset = 0, $limit = 20)
    {
        $requete = $this->bd->prepare("SELECT Nom_materiel AS nom, Prix_Materiel AS prix, Lien_Image AS img_link FROM Favoris JOIN Materiel USING (id_materiel) WHERE id_utilisateur = :id LIMIT :limit OFFSET :offset");
        $requete->bindValue(":id", $_SESSION["id"]);
        $requete->bindValue(":offset", $offset);
        $requete->bindValue(":limit", $limit);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPanier($offset = 0, $limit = 20)
    {
        $requete = $this->bd->prepare("SELECT Nom_materiel AS nom, Prix_Materiel AS prix, Lien_Image AS img_link FROM Panier JOIN Materiel USING (id_materiel) WHERE id_utilisateur = :id LIMIT :limit OFFSET :offset");
        $requete->bindValue(":id", $_SESSION["id"]);
        $requete->bindValue(":offset", $offset);
        $requete->bindValue(":limit", $limit);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistorique($offset = 0, $limit = 20)
    {
        $requete = $this->bd->prepare("SELECT Nom_materiel AS nom, Prix_Materiel AS prix, Lien_Image AS img_link FROM Historique_commande JOIN materiel_commande USING (id_historique_commande) JOIN Materiel USING (id_materiel) WHERE id_utilisateur = :id LIMIT :limit OFFSET :offset");
        $requete->bindValue(":id", $_SESSION["id"]);
        $requete->bindValue(":offset", $offset);
        $requete->bindValue(":limit", $limit);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUserInDB($infos)
    {
        $requete = $this->bd->prepare("INSERT INTO Utilisateur (mail) VALUES (:email)");
        $requete->bindValue(":email", $infos["email"]);
        $requete->execute();
    }

    public function isUserInDB($email)
    {
        $requete = $this->bd->prepare("SELECT mail FROM Utilisateur WHERE mail = :email");
        $requete->bindValue(":email", $email);
        $requete->execute();
        if ($requete->fetch(PDO::FETCH_ASSOC) != false) {
            return true;
        }
        return false;
    }

    public function getUserID($mail)
    {
        $requete = $this->bd->prepare("SELECT id_utilisateur FROM Utilisateur WHERE mail = :email");
        $requete->bindValue(":email", $mail);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC)["id_utilisateur"];
    }

    public function addProducts(){
        $requete = $this->bd->prepare("INSERT INTO Materiel (Nom_materiel, Prix_materiel, Description_materiel, Lien_image) VALUES (:name, :price, :description, :image)");
        $requete->execute([
            ':Nom_materiel' => $name,
            ':Prix_materiel' => $price,
            ':Description_materiel' => $description,
            ':Lien_ image' => $image 
        ]);
    }

    public function ajouterMateriel($description, $prix, $nom) {
        // Préparer la requête SQL
        $requete = $this->bd->prepare("INSERT INTO Materiel (Description_materiel, Prix_materiel, Nom_materiel) 
                                       VALUES (:description, :prix, :nom)");
        
        // Lier les paramètres
        $requete->bindValue(':description', $description);
        $requete->bindValue(':prix', $prix);
        $requete->bindValue(':nom', $nom);
        
        // Exécuter la requête
        return $requete->execute();
    }

    public function getListCouleurs(){
        $requete = $this->bd->prepare("SELECT * FROM couleur");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTypePeinture(){
        $requete = $this->bd->prepare("SELECT nom_type_peinture FROM type_peinture");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuantity(){
        $requete = $this->bd->prepare("SELECT DISTINCT quantite FROM peinture");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
}
