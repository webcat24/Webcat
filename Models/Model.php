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
        include "credentials.php";
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
        $offset = intval($offset);
        $limit = intval($limit);

        $requete = $this->bd->prepare("
        SELECT 
            Materiel.Nom_materiel AS nom, 
            Materiel.Prix_Materiel AS prix, 
            Images.Lien_image AS lien_image
        FROM Favoris 
        JOIN Materiel ON Favoris.id_materiel = Materiel.id_materiel
        JOIN Images ON Materiel.id_image = Images.id_image
        WHERE Favoris.id_utilisateur = :id
        LIMIT :limit OFFSET :offset
    ");
        $requete->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
        $requete->bindValue(":offset", $offset, PDO::PARAM_INT);
        $requete->bindValue(":limit", $limit, PDO::PARAM_INT);
        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getPanier($offset = 0, $limit = 20)
    {
        $requete = $this->bd->prepare("
        SELECT 
            Materiel.Id_Materiel, 
            Materiel.Nom_materiel AS nom, 
            Materiel.Prix_materiel AS prix, 
            Images.Lien_image AS img_link
        FROM 
            Panier 
        JOIN 
            Materiel ON Panier.Id_Materiel = Materiel.Id_Materiel
        LEFT JOIN 
            Images ON Materiel.id_image = Images.id_image
        WHERE 
            Panier.Id_Utilisateur = :id
        LIMIT :limit OFFSET :offset
    ");
        $requete->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
        $requete->bindValue(":limit", $limit, PDO::PARAM_INT);
        $requete->bindValue(":offset", $offset, PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getHistorique($offset = 0, $limit = 20)
    {
        $offset = intval($offset);
        $limit = intval($limit);

        $requete = $this->bd->prepare("
        SELECT 
            Materiel.Nom_materiel AS nom, 
            Materiel.Prix_Materiel AS prix, 
            Images.Lien_image AS img_link
        FROM Historique_commande
        JOIN materiel_commande USING (id_historique_commande)
        JOIN Materiel USING (id_materiel)
        JOIN Images ON Materiel.id_image = Images.id_image
        WHERE Historique_commande.id_utilisateur = :id
        LIMIT :limit OFFSET :offset
    ");
        $requete->bindValue(":id", $_SESSION["id"], PDO::PARAM_INT);
        $requete->bindValue(":offset", $offset, PDO::PARAM_INT);
        $requete->bindValue(":limit", $limit, PDO::PARAM_INT);
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

    // palette
    public function getPalettes()
    {
        $requete = $this->bd->prepare("SELECT p.Nom_palette AS palette_name, c.Coloris AS color_name, c.Code_hexadecimal AS hex_code FROM Palette p LEFT JOIN Est_composee ec ON p.Nom_palette = ec.Nom_palette LEFT JOIN Couleur c ON ec.Id_Couleur = c.Id_Couleur ORDER BY p.Nom_palette, c.Id_Couleur");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProduits()
    {
        $requete = $this->bd->prepare("
       SELECT 
        m.Id_Materiel,
        m.Description_materiel,
        m.Prix_materiel,
        m.Nom_materiel AS categories,
        i.Lien_image AS image,
        c.Coloris AS colors,
        c.Code_hexadecimal AS code_hexadecimal, -- Ajouté ici
        cc.Nom_categorie_couleur AS shades
        FROM 
            Materiel m
        LEFT JOIN Images i ON m.id_image = i.id_image
        LEFT JOIN Peinture p ON m.Id_Materiel = p.Id_Materiel
        LEFT JOIN Couleur c ON p.Id_Couleur = c.Id_Couleur
        LEFT JOIN Appartient_categorie_couleur acc ON c.Id_Couleur = acc.Id_Couleur
        LEFT JOIN Categorie_couleur cc ON acc.Nom_categorie_couleur = cc.Nom_categorie_couleur;");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitsPaginés($debut, $fin)
    {
        $requete = $this->bd->prepare("
            SELECT 
                m.Id_Materiel,
                m.Description_materiel,
                m.Prix_materiel,
                m.Nom_materiel AS categories,
                i.Lien_image AS image,
                c.Coloris AS colors,
                c.Code_hexadecimal AS code_hexadecimal,
                cc.Nom_categorie_couleur AS shades
            FROM 
                Materiel m
            LEFT JOIN Images i ON m.id_image = i.id_image
            LEFT JOIN Peinture p ON m.Id_Materiel = p.Id_Materiel
            LEFT JOIN Couleur c ON p.Id_Couleur = c.Id_Couleur
            LEFT JOIN Appartient_categorie_couleur acc ON c.Id_Couleur = acc.Id_Couleur
            LEFT JOIN Categorie_couleur cc ON acc.Nom_categorie_couleur = cc.Nom_categorie_couleur
            LIMIT :limite OFFSET :decalage
        ");
        $requete->bindValue(':limite', $fin - $debut + 1, PDO::PARAM_INT);
        $requete->bindValue(':decalage', $debut - 1, PDO::PARAM_INT);
        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNombreTotalProduits()
    {
        $requete = $this->bd->prepare("SELECT count(*) AS quantite FROM Materiel");
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }




    public function getAllColors()
    {
        $requete = $this->bd->prepare("SELECT * FROM couleur");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOeuvres()
    {
        $requete = $this->bd->prepare("SELECT lien_image FROM oeuvres
                                                JOIN images ON oeuvres.id_image = images.id_image LIMIT 4");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOeuvresWithTheirArtisteAndImg($debut, $fin)
    {
        $requete = $this->bd->prepare("SELECT id_oeuvres, nom_oeuvre, oeuvres.id_artiste, nom_artiste, images.id_image, Lien_image FROM oeuvres
                                                    JOIN artiste ON oeuvres.id_artiste = artiste.id_artiste
                                                    JOIN images ON oeuvres.id_image = images.id_image
                                                        WHERE id_oeuvres BETWEEN :DEBUT AND :FIN 
                                                            ORDER BY id_oeuvres ASC;");
        $requete->bindValue(':DEBUT', $debut);
        $requete->bindValue(':FIN', $fin);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNombreTotalOeuvres()
    {
        $requete = $this->bd->prepare("SELECT count(*) AS quantite FROM oeuvres");
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserInfoBy($field, $value)
    {
        $allowedFields = ['Id_Utilisateur', 'mail']; // Champs autorisés pour éviter les injections SQL

        if (!in_array($field, $allowedFields)) {
            throw new InvalidArgumentException("Le champ spécifié n'est pas valide.");
        }

        $requete = $this->bd->prepare("SELECT * FROM Utilisateur WHERE $field = :value");
        $requete->bindValue(':value', $value, $field === 'Id_Utilisateur' ? PDO::PARAM_INT : PDO::PARAM_STR);
        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterImage($lien)
    {
        try {
            $requete = $this->bd->prepare("INSERT INTO public.images(lien_image) VALUES (:lien);");
            $requete->bindValue(':lien', $lien);
            $requete->execute();

            // Retourner l'ID généré
            return $this->bd->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout dans Image : " . $e->getMessage();
            return null;
        }
    }

    public function ajouterMateriel($description, $prix, $nom, $idImage)
    {
        try {
            $requete = $this->bd->prepare("
                INSERT INTO Materiel (Description_materiel, Prix_materiel, Nom_materiel, id_image) 
                VALUES (:description, :prix, :nom, :id_image)
                RETURNING Id_Materiel
            ");

            $requete->bindValue(':description', $description);
            $requete->bindValue(':prix', $prix);
            $requete->bindValue(':nom', $nom);
            $requete->bindValue(':id_image', $idImage);

            $requete->execute();

            // Retourner l'ID généré
            return $this->bd->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout dans Materiel : " . $e->getMessage();
            return null;
        }
    }

    public function recupererCouleurs()
    {
        try {
            $query = $this->bd->query("SELECT Id_Couleur, Coloris, Code_hexadecimal FROM Couleur WHERE Coloris !='---' ");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des couleurs : " . $e->getMessage();
            return [];
        }
    }
    public function recupererTypePeinture()
    {
        try {
            $query = $this->bd->query("SELECT id_type_peinture, nom_type_peinture FROM type_peinture");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des couleurs : " . $e->getMessage();
            return [];
        }
    }

    public function ajouterAutreMateriel($idMateriel, $typeMateriel)
    {
        try {
            $requete = $this->bd->prepare("
                INSERT INTO Autres_materiaux (Id_Materiel, type_materiel)
                VALUES (:idMateriel, :typeMateriel)
            ");

            $requete->bindValue(':idMateriel', $idMateriel, PDO::PARAM_INT);
            $requete->bindValue(':typeMateriel', $typeMateriel, PDO::PARAM_STR);

            $requete->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout dans Autres_materiaux : " . $e->getMessage();
        }
    }

    public function ajouterPeinture($idMateriel, $quantite, $id_type_peinture, $id_couleur)
    {
        try {
            // Préparer la requête SQL
            $requete = $this->bd->prepare("
                INSERT INTO Peinture (id_materiel, quantite, id_type_peinture, id_couleur)
                VALUES (:idMateriel, :quantite, :id_type_peinture, :id_couleur)
            ");

            // Liaison des valeurs aux paramètres
            $requete->bindValue(':idMateriel', $idMateriel, PDO::PARAM_INT);
            $requete->bindValue(':quantite', $quantite, is_numeric($quantite) ? PDO::PARAM_INT : PDO::PARAM_STR);
            $requete->bindValue(':id_type_peinture', $id_type_peinture, PDO::PARAM_INT);
            $requete->bindValue(':id_couleur', $id_couleur, PDO::PARAM_INT);

            // Exécuter la requête
            $requete->execute();
            echo "Peinture ajoutée avec succès !";
        } catch (PDOException $e) {
            // Logger l'erreur pour déboguer
            error_log("Erreur lors de l'ajout dans Peinture : " . $e->getMessage());
            echo "Une erreur est survenue lors de l'ajout.";
        }
    }

    public function isUserAdmin($userId)
    {
        $requete = $this->bd->prepare("SELECT id_utilisateur FROM admin WHERE id_utilisateur = :user_id");
        $requete->bindValue(":user_id", $userId);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }


    public function getTypePeinture()
    {
        $requete = $this->bd->prepare("SELECT nom_type_peinture FROM type_peinture");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuantity()
    {
        $requete = $this->bd->prepare("SELECT DISTINCT quantite FROM peinture");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListProduit($sql)
    {
        $requete = $this->bd->prepare($sql);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListMateriaux()
    {
        $requete = $this->bd->prepare("SELECT DISTINCT type_materiel FROM autres_materiaux");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addToPanier($idUtilisateur, $idMateriel)
    {
        try {
            $requete = $this->bd->prepare("
                INSERT INTO Panier (Id_Utilisateur, Id_Materiel)
                VALUES (:idUtilisateur, :idMateriel)
                ON CONFLICT (Id_Utilisateur, Id_Materiel) DO NOTHING
            ");
            $requete->bindValue(":idUtilisateur", $idUtilisateur, PDO::PARAM_INT);
            $requete->bindValue(":idMateriel", $idMateriel, PDO::PARAM_INT);
            $result = $requete->execute();
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function removeFromPanier($idUtilisateur, $idMateriel)
    {
        $requete = $this->bd->prepare("
        DELETE FROM Panier 
        WHERE Id_Utilisateur = :idUtilisateur 
          AND Id_Materiel = :idMateriel
    ");
        $requete->bindValue(":idUtilisateur", $idUtilisateur, PDO::PARAM_INT);
        $requete->bindValue(":idMateriel", $idMateriel, PDO::PARAM_INT);

        return $requete->execute();
    }
    public function getCartCount($idUtilisateur)
    {
        $requete = $this->bd->prepare("SELECT COUNT(*) AS count FROM Panier WHERE Id_Utilisateur = :idUtilisateur");
        $requete->bindValue(":idUtilisateur", $idUtilisateur);
        $requete->execute();
        $result = $requete->fetch(PDO::FETCH_ASSOC);
        return $result["count"];
    }

    public function getProduitById($id)
    {
        $requete = $this->bd->prepare("SELECT * FROM Materiel WHERE Id_Materiel = :id");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }


}
