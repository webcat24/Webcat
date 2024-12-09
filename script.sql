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
DROP TABLE IF EXISTS Type_autre_materiel;
DROP TABLE IF EXISTS Tags;
DROP TABLE IF EXISTS Type_peinture;
DROP TABLE IF EXISTS Categorie_couleur;
DROP TABLE IF EXISTS Couleur;
DROP TABLE IF EXISTS Utilisateur;

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
   Nom_type_peinture VARCHAR(50) ,
   PRIMARY KEY(Nom_type_peinture)
);

CREATE TABLE Tags(
   Nom_tag VARCHAR(250) ,
   PRIMARY KEY(Nom_tag)
);

CREATE TABLE Type_autre_materiel(
   Type_materiel VARCHAR(50) ,
   PRIMARY KEY(Type_materiel)
);

CREATE TABLE Palette(
   Nom_palette VARCHAR(50) ,
   PRIMARY KEY(Nom_palette)
);

CREATE TABLE Images(
   Lien_image VARCHAR(250) ,
   PRIMARY KEY(Lien_image)
);

CREATE TABLE Historique_commande(
   Id_Historique_commande SERIAL,
   Date_commande DATE NOT NULL,
   Id_Utilisateur INTEGER NOT NULL,
   PRIMARY KEY(Id_Historique_commande),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);

CREATE TABLE Materiel(
   Id_Materiel SERIAL,
   Description_materiel VARCHAR(50) ,
   Prix_materiel NUMERIC(10,2)  ,
   Nom_materiel VARCHAR(250) ,
   Lien_image VARCHAR(250)  NOT NULL,
   PRIMARY KEY(Id_Materiel),
   UNIQUE(Lien_image),
   FOREIGN KEY(Lien_image) REFERENCES Images(Lien_image)
);

CREATE TABLE Autres_materiaux(
   Id_Materiel INTEGER,
   Type_materiel VARCHAR(50)  NOT NULL,
   PRIMARY KEY(Id_Materiel),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(Type_materiel) REFERENCES Type_autre_materiel(Type_materiel)
);

CREATE TABLE Oeuvres(
   Id_Oeuvres SERIAL,
   Nom_oeuvre VARCHAR(50) ,
   Lien_image VARCHAR(250)  NOT NULL,
   PRIMARY KEY(Id_Oeuvres),
   UNIQUE(Lien_image),
   FOREIGN KEY(Lien_image) REFERENCES Images(Lien_image)
);

CREATE TABLE Peinture(
   Id_Materiel INTEGER,
   Quantité VARCHAR(50) ,
   Nom_type_peinture VARCHAR(50)  NOT NULL,
   Id_Couleur INTEGER NOT NULL,
   PRIMARY KEY(Id_Materiel),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(Nom_type_peinture) REFERENCES Type_peinture(Nom_type_peinture),
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

INSERT INTO Utilisateur (Nom_utilisateur, Prenom_utilisateur, mail, Adresse, Telephone) VALUES 
('Antoine', 'Camélia', 'camelia@gmail.com', 'Cergy', '0601020304'),
('Dong', 'Sophie', 'sophie@gmail.com', 'Sarcelles', '0601020305');

INSERT INTO Images (Lien_image) VALUES
('image1.jpg'),
('image2.jpg'),
('image3.jpg'),
('image4.jpg'),
('image5.jpg'),
('image6.jpg');

INSERT INTO Materiel (Description_materiel, Prix_materiel, Nom_materiel, Lien_image) VALUES
('Pinceau rond', 12.50, 'Pinceau n°5', 'image1.jpg'),
('Toile en lin', 25.00, 'Toile 40x50 cm', 'image2.jpg'),
('Chevalet bois', 45.00, 'Chevalet studio', 'image3.jpg'),
('Palette plastique', 5.00, 'Palette ovale', 'image4.jpg'),
('Coffret peinture', 60.00, 'Coffret aquarelle', 'image5.jpg'),
('Lot de pinceaux', 15.99, 'Pinceaux aquarelle', 'image6.jpg');

-- Exemples de commandes passées
INSERT INTO Historique_commande (Date_commande, Id_Utilisateur) VALUES
('2024-11-01', 1),  -- Commande pour l'utilisateur avec Id_Utilisateur = 1
('2024-11-15', 2);  -- Commande pour l'utilisateur avec Id_Utilisateur = 2

-- Ajout d'articles favoris pour des utilisateurs
INSERT INTO Favoris (Id_Utilisateur, Id_Materiel) VALUES
(1, 2),  -- L'utilisateur 1 aime le matériel 2
(1, 3),  -- L'utilisateur 1 aime aussi le matériel 3
(2, 4),  -- L'utilisateur 2 aime le matériel 4
(2, 5);  -- L'utilisateur 2 aime aussi le matériel 5

-- Ajout d'articles au panier
INSERT INTO Panier (Id_Utilisateur, Id_Materiel) VALUES
(1, 4),  -- L'utilisateur 1 a ajouté le matériel 4 dans son panier
(1, 6),  -- L'utilisateur 1 a également ajouté le matériel 6
(2, 2),  -- L'utilisateur 2 a ajouté le matériel 2
(2, 3);  -- L'utilisateur 2 a ajouté également le matériel 3

-- Lier des articles à des commandes
INSERT INTO Materiel_commande (Id_Materiel, Id_Historique_commande) VALUES
(2, 1),  -- Matériel 2 commandé dans la commande 1
(3, 1),  -- Matériel 3 commandé dans la commande 1
(5, 2),  -- Matériel 5 commandé dans la commande 2
(6, 2);  -- Matériel 6 commandé dans la commande 2
