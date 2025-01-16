DROP TABLE IF EXISTS Materiel_commande;
DROP TABLE IF EXISTS Favoris;
DROP TABLE IF EXISTS Panier;
DROP TABLE IF EXISTS Est_composee;
DROP TABLE IF EXISTS Associe_aux_tags;
DROP TABLE IF EXISTS Appartient_categorie_couleur;
DROP TABLE IF EXISTS Peinture;
DROP TABLE IF EXISTS Oeuvres;
DROP TABLE IF EXISTS Autres_materiaux;
DROP TABLE IF EXISTS Materiel;
DROP TABLE IF EXISTS Historique_commande;
DROP TABLE IF EXISTS Images;
DROP TABLE IF EXISTS Palette;
DROP TABLE IF EXISTS Tags;
DROP TABLE IF EXISTS Type_peinture;
DROP TABLE IF EXISTS Categorie_couleur;
DROP TABLE IF EXISTS Couleur;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Artiste;

CREATE TABLE Utilisateur(
   Id_Utilisateur SERIAL,
   Nom_utilisateur VARCHAR(100) ,
   Prenom_utilisateur VARCHAR(100) ,
   mail VARCHAR(100)  NOT NULL,
   Adresse VARCHAR(250) ,
   Telephone VARCHAR(50) ,
   PRIMARY KEY(Id_Utilisateur)
);

CREATE TABLE Couleur(
   Id_Couleur SERIAL,
   Coloris VARCHAR(50) ,
   Code_hexadecimal VARCHAR(50) ,
   PRIMARY KEY(Id_Couleur)
);

CREATE TABLE Categorie_couleur(
   Nom_categorie_couleur VARCHAR(50) ,
   PRIMARY KEY(Nom_categorie_couleur)
);

CREATE TABLE Type_peinture(
   id_type_peinture SERIAL,
   nom_type_peinture VARCHAR(30) ,
   PRIMARY KEY(id_type_peinture)
);

CREATE TABLE Tags(
   Nom_tag VARCHAR(250) ,
   PRIMARY KEY(Nom_tag)
);

CREATE TABLE Palette(
   Nom_palette VARCHAR(50) ,
   PRIMARY KEY(Nom_palette)
);

CREATE TABLE Images(
   id_image SERIAL,
   Lien_image VARCHAR(100) ,
   PRIMARY KEY(id_image)
);

CREATE TABLE Historique_commande(
   Id_Historique_commande SERIAL,
   Date_commande DATE NOT NULL,
   Id_Utilisateur INTEGER NOT NULL,
   PRIMARY KEY(Id_Historique_commande),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);

CREATE TABLE Artiste(
   Id_Artiste SERIAL,
   Nom_artiste VARCHAR(40) ,
   PRIMARY KEY(Id_Artiste)
);

CREATE TABLE Materiel(
   Id_Materiel SERIAL,
   Description_materiel VARCHAR(50) ,
   Prix_materiel NUMERIC(10,2)  ,
   Nom_materiel VARCHAR(250) ,
   id_image SERIAL NOT NULL,
   PRIMARY KEY(Id_Materiel),
   UNIQUE(id_image),
   FOREIGN KEY(id_image) REFERENCES Images(id_image)
);

CREATE TABLE Autres_materiaux(
   Id_Materiel INTEGER,
   type_materiel VARCHAR(30) ,
   PRIMARY KEY(Id_Materiel),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel)
);

CREATE TABLE Oeuvres(
   Id_Oeuvres SERIAL,
   Nom_oeuvre VARCHAR(50) ,
   Description VARCHAR(800) ,
   Id_Artiste INTEGER NOT NULL,
   id_image SERIAL NOT NULL,
   PRIMARY KEY(Id_Oeuvres),
   UNIQUE(id_image),
   FOREIGN KEY(Id_Artiste) REFERENCES Artiste(Id_Artiste),
   FOREIGN KEY(id_image) REFERENCES Images(id_image)
);

CREATE TABLE Peinture(
   Id_Materiel INTEGER,
   Quantite VARCHAR(50) ,
   id_type_peinture INTEGER NOT NULL,
   Id_Couleur INTEGER NOT NULL,
   PRIMARY KEY(Id_Materiel),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(id_type_peinture) REFERENCES Type_peinture(id_type_peinture),
   FOREIGN KEY(Id_Couleur) REFERENCES Couleur(Id_Couleur)
);

CREATE TABLE Appartient_categorie_couleur(
   Id_Couleur INTEGER,
   Nom_categorie_couleur VARCHAR(50) ,
   PRIMARY KEY(Id_Couleur, Nom_categorie_couleur),
   FOREIGN KEY(Id_Couleur) REFERENCES Couleur(Id_Couleur),
   FOREIGN KEY(Nom_categorie_couleur) REFERENCES Categorie_couleur(Nom_categorie_couleur)
);

CREATE TABLE Associe_aux_tags(
   Id_Materiel INTEGER,
   Nom_tag VARCHAR(250) ,
   Pertinence SMALLINT,
   PRIMARY KEY(Id_Materiel, Nom_tag),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(Nom_tag) REFERENCES Tags(Nom_tag)
);

CREATE TABLE Est_composee(
   Id_Couleur INTEGER,
   Nom_palette VARCHAR(50) ,
   PRIMARY KEY(Id_Couleur, Nom_palette),
   FOREIGN KEY(Id_Couleur) REFERENCES Couleur(Id_Couleur),
   FOREIGN KEY(Nom_palette) REFERENCES Palette(Nom_palette)
);

CREATE TABLE Panier(
   Id_Utilisateur INTEGER,
   Id_Materiel INTEGER,
   PRIMARY KEY(Id_Utilisateur, Id_Materiel),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel)
);

CREATE TABLE Favoris(
   Id_Utilisateur INTEGER,
   Id_Materiel INTEGER,
   PRIMARY KEY(Id_Utilisateur, Id_Materiel),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel)
);

CREATE TABLE Materiel_commande(
   Id_Materiel INTEGER,
   Id_Historique_commande INTEGER,
   PRIMARY KEY(Id_Materiel, Id_Historique_commande),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(Id_Historique_commande) REFERENCES Historique_commande(Id_Historique_commande)
);