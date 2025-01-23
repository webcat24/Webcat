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
   Nom_type_peinture VARCHAR(50) ,
   PRIMARY KEY(Nom_type_peinture)
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

INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bisque', '#FFE4C4');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose bonbon', '#F9429E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chair', '#FEC3AC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cherry', '#EC3B83');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Coquille d’œuf', '#FDE9E0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cuisse de nymphe', '#FEE7F0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cuisse de nymphe émue', '#F4A6C8');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose dragée', '#FEBFD2');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Framboise', '#E25098');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Fuchsia', '#FD3F92');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Hollywood', '#F400A1');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Incarnat', '#FF6F7D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Magenta', '#FF00FF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Misty Rose', '#FFE4E1');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose Mountbatten', '#997A8D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Nacarat', '#FC5D5D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Pelure d’oignon', '#D58490');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose persan', '#F77FBE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose razzle dazzle', '#EED5D2');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose', '#FD6C9E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose saumon', '#FF91A4');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose shocking', '#FC0FC0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rose vif', '#F682A6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Alizarine', '#D90115');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Amarante', '#91283B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge d''Andrinople', '#A91101');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge anglais', '#F7230C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bordeaux', '#800000');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Brique', '#842E1B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Capucine', '#FF5E4D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge cardinal', '#B82010');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Carmin', '#960018');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge Cerise', '#D20F45');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cinabre', '#DB1702');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge coquelicot', '#C60800');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cramoisi', '#DC143C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Écarlate', '#FF2400');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge de Falun', '#801818');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge feu', '#FE1B00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Fraise', '#BF3030');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Fraise écrasée', '#A42424');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Framboise', '#C72C48');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Garance', '#EE1010');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge grenadine', '#E9383F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge grenat', '#6E0B14');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge groseille', '#CF0A1D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Pourpre', '#9E0E40');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rosso Corsa', '#D40000');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge', '#E10343');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge sang', '#850606');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Sang de bœuf', '#730800');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge tomate', '#DE2916');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Rouge tomette', '#AE4A34');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vermeil', '#FF0921');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vermillon', '#E34234');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Abricot', '#E67E30');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Aurore', '#FFCB60');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Carotte', '#F4661B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Citrouille', '#DF6D14');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Corail', '#E73E01');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cuivre', '#B36700');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gomme-gutte', '#EF9B0F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Mandarine', '#FEA347');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Orange', '#ED7F10');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Orange brûlé', '#CC5500');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Roux', '#B7410E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Safran', '#F4C430');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Saumon', '#F88E55');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Tangerine', '#FF7F00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Ambre', '#F0C300');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Auréoline', '#EFD242');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune banane', '#D1B606');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Beurre', '#F0E36B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Beurre frais', '#FFF48D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blé', '#E8D630');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blond', '#E2BD74');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blond vénitien', '#E7A854');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bouton d''or', '#F6DC12');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Caca d''oie', '#CDCD0D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune canari', '#E7F00D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chartreuse', '#DFFF00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune de chrome', '#FFFF05');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune citron', '#F7FF3C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune de cobalt', '#FDEE00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Flave', '#E6E697');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune impérial', '#FFE436');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune indien', '#E89845');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune', '#FFFF00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Maïs', '#E29000');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune de Mars', '#EED153');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune miel', '#CB8E00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune mimosa', '#FEF86C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Moutarde', '#FFDB58');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Nankin', '#F7E269');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune de Naples', '#FADA5E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Ocre (jaune)', '#DFAF2C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Or', '#FFD700');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Orpiment', '#FCD21C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune paille', '#FEE347');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jaune poussin', '#F7E35F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Sable', '#E0CDA9');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Soufre', '#FFFF6B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Topaze', '#FAEA73');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert absinthe', '#7FDD4C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert Amande', '#82C46C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert Anglais', '#34A040');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Anis', '#9FE855');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Asperge', '#7BA05B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert avocat', '#568203');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert bouteille', '#096A09');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert céladon', '#83A697');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chartreuse', '#C2F732');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert de chrome', '#18391E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert citron', '#00FF00');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert d''eau', '#B0F2B6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert émeraude', '#01D758');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert épinard', '#175732');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert gazon', '#3A9D23');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Glauque', '#649B88');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert de Hooker', '#1B4F08');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert impérial', '#00561B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Jade', '#87E990');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert lichen', '#85C17E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert Lime', '#9EFD38');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert malachite', '#1FA055');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert Menthe', '#16B84E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert militaire', '#596643');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert mousse', '#679F5A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert olive', '#708D23');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert perroquet', '#3AF24B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert pin', '#01796F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert pistache', '#BEF574');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert poireau', '#4CA66B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert pomme', '#34C924');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert prairie', '#57D53B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert printemps', '#00FF7F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert sapin', '#095228');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert sauge', '#689D71');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert tilleul', '#A5D152');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert Véronèse', '#00A25D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert', '#00894D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert-de-gris', '#95A595');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Vert de vessie', '#22780F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Viride', '#40826D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu acier', '#1A2B3C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Aigue-marine', '#79F8F8');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Azur', '#007FFF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Azur clair', '#74D0F1');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Azuré', '#F0FFFF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Azurin', '#A9EAFE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Barbeau', '#5472AE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu', '#0040D0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu canard', '#048B9A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu de cæruleum', '#007BA7');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu céleste', '#26C4EC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu charrette', '#8EA2C6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu ciel', '#007CB0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu cobalt', '#22427C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cyan', '#00FFFF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu Denim', '#1560BD');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu dragée', '#DFF2FF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu égyptien', '#1034A6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu électrique', '#2C75FF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu de France', '#318CE7');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu fumée', '#BBD2E1');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu givré', '#80D0D0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu horizon', '#7F8FA6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Indigo', '#23446B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu Klein', '#002FA7');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu Majorelle', '#6050DC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu marine', '#000080');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu maya', '#73C2FB');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu des mers du sud', '#00CCCB');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu minéral', '#24445C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu minuit', '#003366');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu nuit', '#0F056B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu outremer', '#1B019B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu paon', '#067790');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu pastel', '#56739A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu persan', '#458E9D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu pétrole', '#1D4851');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu roi', '#002366');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu saphir', '#0131B4');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu sarcelle', '#008E8E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Smalt', '#003399');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu Tiffany', '#0ABAB5');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu turquin', '#425B8A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bleu turquoise', '#25FDE9');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Améthyste', '#884DA7');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Aubergine', '#370028');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Violet d''évêque', '#723E64');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Glycine', '#C9A0DC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris de lin', '#D2CAEC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Héliotrope', '#DF73FF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Lavande', '#9683EC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Lilas', '#B666D2');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Violet de manganèse', '#8A55A3');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Mauve', '#D473D4');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Orchidée', '#DA70D6');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Parme', '#CFA0E9');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Pervenche', '#CCCCFF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Prune', '#811453');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Violet', '#7F00FF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Violine', '#580688');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Zinzolin', '#6C0277');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Acajou', '#88421D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Alezan', '#A76726');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Auburn', '#9D3E0C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Ambre', '#AD390E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Basané', '#8B6C42');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Beige', '#C8AD7F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bismarck', '#4D2009');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bistre', '#3D2B1F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bitume', '#4E3D28');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bronze', '#614E1A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Brou de noix', '#3F2204');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Brun', '#5B3C11');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bureau', '#6B5731');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cacao', '#614B3A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cachou', '#2F1B0C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Café', '#462E01');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Café au lait', '#785E2F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cannelle', '#7E5835');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Caramel', '#7E3300');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chamois', '#D0C07A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Châtaigne', '#806D5A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chaudron', '#85530F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Chocolat', '#5A3A22');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Fauve', '#AD4F09');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Feuille-morte', '#99512B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Grège', '#BBAE98');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Lavallière', '#8F5922');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Marron', '#582900');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Mastic', '#B3B191');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Noisette', '#955628');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Ocre', '#DD985C');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Poil de chameau', '#B67823');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Puce', '#4E1609');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Sépia', '#702C14');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Tabac', '#9F551E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Terracotta', '#8C5230');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Terre d''ombre', '#684C2D');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Terre de Sienne', '#8E5434');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Albâtre', '#FEFEFE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Beige (clair)', '#F5F5DC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc', '#FFFFFF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc cassé', '#FEFEE2');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Crème', '#FFFDD0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Écru', '#FEFEE0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc d''Espagne', '#FEFDF0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Ivoire', '#FFFFF0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc de lait', '#FBFCFA');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc lunaire', '#F4FEFE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Blanc de zinc', '#F6FEFE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris acier', '#AFAFAF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Anthracite', '#303030');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris ardoise', '#5A5E6B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Argent', '#C0C0C0');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Argile', '#EFEFEF');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Bis', '#766F64');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Étain', '#EDEDED');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris fer', '#7F7F7F');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris', '#808080');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Lin', '#939681');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris de Payne', '#677179');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris perle', '#CECECE');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris plomb', '#798081');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris souris', '#9E9E9E');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Gris taupe', '#463F32');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Tourterelle', '#BBACAC');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Noir', '#000000');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Noir d''aniline', '#120D16');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Noir de carbone', '#130E0A');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Cassis', '#2C030B');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Dorian', '#0B1616');
INSERT INTO public.couleur(coloris, code_hexadecimal) VALUES ('Réglisse', '#2D241E');

INSERT INTO public.artiste(nom_artiste) VALUES ('Claude Monet');
INSERT INTO public.artiste(nom_artiste) VALUES ('Francisco de Goya');
INSERT INTO public.artiste(nom_artiste) VALUES ('Théodore Géricault');
INSERT INTO public.artiste(nom_artiste) VALUES ('Hans Holbein le Jeune');
INSERT INTO public.artiste(nom_artiste) VALUES ('Pierre-Auguste Renoir');
INSERT INTO public.artiste(nom_artiste) VALUES ('Edgar Degas');
INSERT INTO public.artiste(nom_artiste) VALUES ('Hieronymus Bosch');
INSERT INTO public.artiste(nom_artiste) VALUES ('Léonard de Vinci');
INSERT INTO public.artiste(nom_artiste) VALUES ('Vincent van Gogh');
INSERT INTO public.artiste(nom_artiste) VALUES ('Sandro Botticelli');
INSERT INTO public.artiste(nom_artiste) VALUES ('Gustav Klimt');
INSERT INTO public.artiste(nom_artiste) VALUES ('Georges Seurat');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jan van Eyck');
INSERT INTO public.artiste(nom_artiste) VALUES ('Raphaël');
INSERT INTO public.artiste(nom_artiste) VALUES ('Édouard Manet');
INSERT INTO public.artiste(nom_artiste) VALUES ('Eugène Delacroix');
INSERT INTO public.artiste(nom_artiste) VALUES ('Rembrandt van Rijn');
INSERT INTO public.artiste(nom_artiste) VALUES ('Grant Wood');
INSERT INTO public.artiste(nom_artiste) VALUES ('James Whistler');
INSERT INTO public.artiste(nom_artiste) VALUES ('Diego Velázquez');
INSERT INTO public.artiste(nom_artiste) VALUES ('Johannes Vermeer');
INSERT INTO public.artiste(nom_artiste) VALUES ('Pablo Picasso');
INSERT INTO public.artiste(nom_artiste) VALUES ('Salvador Dalí');
INSERT INTO public.artiste(nom_artiste) VALUES ('Edward Hopper');
INSERT INTO public.artiste(nom_artiste) VALUES ('René Magritte');
INSERT INTO public.artiste(nom_artiste) VALUES ('Andrew Wyeth');
INSERT INTO public.artiste(nom_artiste) VALUES ('Andy Warhol');
INSERT INTO public.artiste(nom_artiste) VALUES ('d’Henri Rousseau');
INSERT INTO public.artiste(nom_artiste) VALUES ('Paolo Veronese');
INSERT INTO public.artiste(nom_artiste) VALUES ('Frederic Leighton');
INSERT INTO public.artiste(nom_artiste) VALUES ('Edvard Munch');
INSERT INTO public.artiste(nom_artiste) VALUES ('John Collier');
INSERT INTO public.artiste(nom_artiste) VALUES ('Paul Delaroche');
INSERT INTO public.artiste(nom_artiste) VALUES ('Pierre-Auguste Cot');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jean-Léon Gérôme');
INSERT INTO public.artiste(nom_artiste) VALUES ('Caravage');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jean-Honoré Fragonard');
INSERT INTO public.artiste(nom_artiste) VALUES ('Caspar David Friedrich');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jean-Auguste-Dominique Ingres');
INSERT INTO public.artiste(nom_artiste) VALUES ('Pieter Bruegel l’Ancien');
INSERT INTO public.artiste(nom_artiste) VALUES ('Henri Matisse');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jean-François Millet');
INSERT INTO public.artiste(nom_artiste) VALUES ('Jacques-Louis David');
INSERT INTO public.artiste(nom_artiste) VALUES ('Katsushika Hokusai');
INSERT INTO public.artiste(nom_artiste) VALUES ('Paul Cézanne');
INSERT INTO public.artiste(nom_artiste) VALUES ('William-Adolphe Bouguereau');
INSERT INTO public.artiste(nom_artiste) VALUES ('John William Waterhouse');
INSERT INTO public.artiste(nom_artiste) VALUES ('Emanuel Leutze');
INSERT INTO public.artiste(nom_artiste) VALUES ('John Singer Sargent');
INSERT INTO public.artiste(nom_artiste) VALUES ('Paul Gauguin');
INSERT INTO public.artiste(nom_artiste) VALUES ('Gustave Caillebotte');
INSERT INTO public.artiste(nom_artiste) VALUES ('Gustave Courbet');
INSERT INTO public.artiste(nom_artiste) VALUES ('Michel-Ange');
INSERT INTO public.artiste(nom_artiste) VALUES ('Frida Kahlo');
INSERT INTO public.artiste(nom_artiste) VALUES ('Thomas Cole');
INSERT INTO public.artiste(nom_artiste) VALUES ('Vassily Kandinsky');
INSERT INTO public.artiste(nom_artiste) VALUES ('Peter Paul Rubens');
INSERT INTO public.artiste(nom_artiste) VALUES ('Franz Marc');
INSERT INTO public.artiste(nom_artiste) VALUES ('Canaletto');
INSERT INTO public.artiste(nom_artiste) VALUES ('Albert Bierstadt');

INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_1.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_2.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_3.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_4.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_5.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_6.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_7.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_8.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_9.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_10.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_11.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_12.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_13.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_14.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_15.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_16.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_17.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_18.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_19.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_20.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_21.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_22.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_23.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_24.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_25.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_26.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_27.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_28.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_29.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_30.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_31.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_32.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_33.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_34.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_35.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_36.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_37.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_38.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_39.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_40.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_41.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_42.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_43.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_44.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_45.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_46.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_47.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_48.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_49.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_50.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_51.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_52.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_53.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_54.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_55.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_56.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_57.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_58.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_59.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_60.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_61.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_62.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_63.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_64.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_65.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_66.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_67.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_68.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_69.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_70.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_71.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_72.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_73.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_74.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_75.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_76.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_77.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_78.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_79.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_80.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_81.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_82.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_83.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_84.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_85.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_86.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_87.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_88.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_89.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_90.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_91.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_92.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_93.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_94.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_95.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_96.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_97.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_98.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_99.png');
INSERT INTO public.images(lien_image) VALUES ('Content/img/oeuvresArts/oeuvre_100.png');

INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Joconde (Mona Lisa)', 'La Joconde (ou Mona Lisa) est l’un des tableaux les plus célèbres au monde, réalisé par Léonard de Vinci entre 1503 et 1506. Cette œuvre de la Renaissance italienne se distingue par son portrait d’une femme mystérieuse, souvent identifiée comme Lisa Gherardini.', 8, 96);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Nuit étoilée', 'La Nuit étoilée est une peinture emblématique de Vincent van Gogh, réalisée en 1889, pendant son séjour à l’asile de Saint-Rémy-de-Provence. Ce chef-d’œuvre postimpressionniste représente une vue nocturne idéalisée, pleine de mouvement et d’énergie, du ciel au-dessus du village.', 9, 97);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Impression, soleil levant', 'Impression, soleil levant est une œuvre emblématique de Claude Monet, peinte en 1872. Ce tableau est souvent crédité comme étant le point de départ du mouvement impressionniste, qui a révolutionné l’art au XIXe siècle.', 1, 98);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Parmi la Sierra Nevada, Californie', 'Parmi la Sierra Nevada, Californie est une peinture d’Albert Bierstadt, réalisée en 1868. Cette œuvre est un exemple remarquable du style de Bierstadt, qui est connu pour ses paysages majestueux et ses représentations grandioses de l’ouest américain.', 60, 99);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L''Embouchure du Grand Canal,Venise', 'L''Embouchure du Grand Canal, Venise est une peinture réalisée par Giovanni Antonio Canal, connu sous le nom de Canaletto, au XVIIIe siècle. Cette œuvre est un exemple classique du style de Canaletto et de son expertise dans la peinture de vues urbaines et de paysages architecturaux.', 59, 100);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Classe de danse', 'La Classe de danse est une œuvre emblématique d’Edgar Degas, peinte en 1874. Cette œuvre impressionnante capture un moment de la formation des danseuses dans un studio de ballet. Degas, connu pour son intérêt pour le monde du ballet et ses représentations de danseuses, nous offre ici un regard intime sur la préparation et l’enseignement dans cet univers artistique.', 6, 95);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Jardin de l’artiste à Giverny (iris)', 'Le Jardin de l’artiste à Giverny (iris) est une œuvre emblématique de Claude Monet, peinte en 1900. Ce tableau fait partie de la série des jardins que Monet a immortalisés dans sa résidence de Giverny, où il a créé un véritable paradis de fleurs et de végétation.', 1, 1);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Saturne dévorant un de ses fils', 'Saturne dévorant un de ses fils est l’une des peintures les plus sombres et puissantes de Francisco de Goya, réalisée entre 1819 et 1823. Cette œuvre fait partie des Peintures noires, une série de fresques que Goya a peintes directement sur les murs de sa maison, appelée la « Quinta del Sordo », près de Madrid.', 2, 2);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Radeau de la Méduse', 'Le Radeau de la Méduse est une œuvre monumentale de Théodore Géricault, réalisée entre 1818 et 1819. Ce tableau, de dimensions imposantes (491 cm × 716 cm), représente un épisode tragique de l’histoire contemporaine de l’artiste : le naufrage de la frégate française Méduse en 1816, qui a conduit à la dérive de 147 personnes sur un radeau de fortune. Après 13 jours en mer, seuls 15 survivants ont été secourus, ayant enduré la faim, la soif et même le cannibalisme.', 3, 3);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Ambassadeurs', 'Les Ambassadeurs est une peinture complexe et fascinante réalisée par Hans Holbein le Jeune en 1533. Ce double portrait représente deux hommes d’influence : Jean de Dinteville, un diplomate français, et Georges de Selve, évêque et ambassadeur. L’œuvre est célèbre pour son riche symbolisme, ses détails minutieux et son utilisation remarquable de l’anamorphose.', 4, 4);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Déjeuner des canotiers', 'Le Déjeuner des canotiers est une peinture lumineuse et vibrante de Pierre-Auguste Renoir, réalisée entre 1880 et 1881. Ce chef-d’œuvre impressionniste capture une scène joyeuse et conviviale, représentant un groupe d’amis de l’artiste profitant d’un déjeuner en plein air sur la terrasse du restaurant de la Maison Fournaise, au bord de la Seine, à Chatou.', 5, 5);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Christ dans la tempête sur la mer de Galilée', 'Le Christ dans la tempête sur la mer de Galilée est une œuvre dramatique et saisissante réalisée par Rembrandt en 1633. Ce tableau illustre un épisode du Nouveau Testament où Jésus calme une tempête sur le lac de Galilée, comme raconté dans les Évangiles.', 17, 6);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Jardin des délices', 'Le Jardin des délices est un triptyque célèbre du peintre néerlandais Hieronymus Bosch, réalisé entre 1490 et 1510. Cette œuvre complexe et énigmatique est l’un des chefs-d’œuvre les plus connus de Bosch et est souvent interprétée comme une vision allégorique du paradis, de la terre et de l’enfer.', 7, 7);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Salvator Mundi', 'Salvator Mundi est une peinture attribuée à Léonard de Vinci, réalisée vers 1500. Ce portrait représente Jésus-Christ en tant que Sauveur du monde, une figure centrale dans l’art chrétien.', 8, 8);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Iris', 'Les Iris est une peinture vibrante et colorée réalisée par Vincent van Gogh en 1889, pendant son séjour à l’asile de Saint-Rémy-de-Provence. Ce tableau fait partie de la série des œuvres où Van Gogh a représenté le jardin de l’asile et ses environs.', 9, 9);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Printemps', 'Le Printemps est une peinture emblématique de Sandro Botticelli, réalisée vers 1480. Cette œuvre est l’une des plus célèbres de la Renaissance italienne et est souvent admirée pour sa beauté et sa complexité symbolique.', 10, 10);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Fusillades du 3 mai 1808', 'Les Fusillades du 3 mai 1808 est une œuvre puissante et poignante de Francisco de Goya, peinte en 1814. Ce tableau illustre les exécutions sommaires des insurgés espagnols par les troupes françaises pendant l’occupation napoléonienne de l’Espagne, un événement tragique connu sous le nom de Massacre du 3 mai.', 2, 11);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Portrait d’Adele Bloch-Bauer I', 'Portrait d’Adele Bloch-Bauer I est une œuvre emblématique de Gustav Klimt, peinte en 1907. Ce portrait est l’une des œuvres les plus célèbres du style Art nouveau de Klimt et est souvent reconnu pour sa somptueuse utilisation de la dorure et son approche distinctive du portrait.', 11, 12);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Terrasse du café le soir', 'La Terrasse du café le soir est une œuvre vibrante réalisée par Vincent van Gogh en 1888. Ce tableau, également connu sous le titre « Café de nuit », est l’une des œuvres les plus célèbres de Van Gogh et est remarquable pour son utilisation audacieuse de la couleur et de la lumière.', 9, 13);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Bal du Moulin de la Galette', 'Le Bal du Moulin de la Galette est une œuvre emblématique de Pierre-Auguste Renoir, peinte en 1876. Ce tableau capture une scène animée et joyeuse d’un bal en plein air au Moulin de la Galette, un célèbre lieu de divertissement situé dans le quartier de Montmartre à Paris.', 5, 14);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Un dimanche après-midi à l’île de la Grande Jatte', 'Un dimanche après-midi à l’île de la Grande Jatte est une œuvre magistrale de Georges Seurat, peinte entre 1884 et 1886. Ce tableau est un exemple emblématique du pointillisme, une technique que Seurat a développée, utilisant des touches de couleur distinctes pour créer une image cohérente.', 12, 15);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Portrait de l’Arnolfini', 'Le Portrait de l’Arnolfini, souvent intitulé « Le Mariage Arnolfini », est une œuvre maîtresse de Jan van Eyck, réalisée en 1434. Ce tableau est l’un des exemples les plus célèbres de la peinture flamande du XVe siècle et est particulièrement remarquable pour son réalisme et ses détails minutieux.', 13, 16);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Dame à l’hermine', 'La Dame à l’hermine est un portrait emblématique réalisé par Léonard de Vinci vers 1489-1490. Le tableau représente Cecilia Gallerani, une jeune femme de la haute société milanaise, qui était la maîtresse de Ludovico Sforza, duc de Milan.', 8, 17);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’École d’Athènes', 'L’École d’Athènes est une fresque magistrale peinte par Raphaël entre 1509 et 1511, située dans la Chambre de la Signature du Palais du Vatican. Cette œuvre est l’un des chefs-d’œuvre de la Renaissance italienne et est souvent célébrée pour sa représentation de la philosophie et de la culture classique.', 14, 18);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Déjeuner sur l’herbe', 'Le Déjeuner sur l’herbe est une œuvre provocatrice réalisée par Édouard Manet en 1863. Ce tableau est souvent considéré comme une œuvre emblématique du réalisme et du début de l’impressionnisme, et il a suscité une grande controverse à sa première exposition.', 15, 19);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Liberté guidant le peuple', 'La Liberté guidant le peuple est une œuvre emblématique d’Eugène Delacroix, peinte en 1830. Ce tableau est un exemple célèbre du romantisme et est souvent considéré comme une célébration de la liberté et de la révolution.', 16, 20);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Ronde de nuit', 'La Ronde de nuit est une œuvre monumentale de Rembrandt van Rijn, peinte en 1642. Ce tableau est l’un des chefs-d’œuvre les plus célèbres du peintre néerlandais et est considéré comme un exemple emblématique du style baroque et du réalisme.', 17, 21);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Baiser', 'Le Baiser est une œuvre emblématique de Gustav Klimt, réalisée entre 1907 et 1908. Cette peinture est l’un des exemples les plus célèbres du style Art nouveau et est souvent célébrée pour son opulence, son sensualité et son utilisation innovante de la dorure.', 11, 22);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('American Gothic', 'American Gothic est une peinture emblématique réalisée par Grant Wood en 1930. Cette œuvre est l’un des exemples les plus célèbres de l’art américain du XXe siècle et est souvent interprétée comme une représentation de la vie rurale américaine pendant la Grande Dépression.', 18, 23);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Naissance de Vénus', 'La Naissance de Vénus est une œuvre célèbre de Sandro Botticelli, réalisée vers 1485. Ce tableau est l’un des chefs-d’œuvre de la Renaissance italienne et est souvent admiré pour sa beauté esthétique et son influence sur l’art occidental.', 10, 24);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Arrangement en gris et noir n°1', 'Arrangement en gris et noir n°1, également connu sous le nom de « Portrait de la mère de l’artiste », est une œuvre notable de James Whistler, peinte en 1871. Ce tableau est un exemple important du style de Whistler et illustre son approche distinctive du portrait et de la couleur.', 19, 25);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Ménines', 'Les Ménines est une œuvre magistrale de Diego Velázquez, peinte en 1656. Ce tableau est souvent considéré comme l’un des chefs-d’œuvre de l’art baroque espagnol et est célèbre pour sa complexité, son innovation et sa profondeur narrative.', 20, 26);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Jeune Fille à la perle', 'La Jeune Fille à la perle, souvent appelée « La Mona Lisa du Nord », est une œuvre célèbre de Johannes Vermeer, réalisée vers 1665. Ce tableau est l’un des portraits les plus reconnaissables de l’art néerlandais du XVIIe siècle et est admiré pour sa beauté et son mystère.', 21, 27);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Cène', 'La Cène est une fresque monumentale réalisée par Léonard de Vinci entre 1495 et 1498. Ce chef-d’œuvre est situé dans le réfectoire du monastère dominicain de Santa Maria delle Grazie à Milan, en Italie. L’œuvre est l’une des représentations les plus célèbres du dernier repas de Jésus avec ses disciples, avant sa crucifixion.', 8, 28);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Guernica', 'Guernica est une œuvre monumentale de Pablo Picasso, peinte en 1937. Ce tableau est l’un des chefs-d’œuvre les plus puissants de l’art moderne et un puissant commentaire politique et social sur les horreurs de la guerre.', 22, 29);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Persistance de la mémoire', 'La Persistance de la mémoire, peinte par Salvador Dalí en 1931, est l’une des œuvres les plus emblématiques du surréalisme. Ce tableau est célèbre pour son exploration unique du temps et de la mémoire à travers des images oniriques et déconcertantes.', 23, 30);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Nighthawks', 'Nighthawks est une peinture emblématique d’Edward Hopper, réalisée en 1942. Ce tableau est l’un des exemples les plus célèbres de l’art américain du XXe siècle et est reconnu pour sa représentation poignante de la solitude et de l’isolement urbain.', 24, 31);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Fils de l’homme', 'Le Fils de l’homme est une peinture célèbre de René Magritte, réalisée en 1964. Cette œuvre est l’une des pièces les plus reconnaissables du mouvement surréaliste et est souvent interprétée comme une exploration du thème de l’identité et de la perception.', 25, 32);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Vieux Guitariste Aveugle', 'Le Vieux Guitariste Aveugle est une œuvre poignante de Pablo Picasso, peinte entre 1903 et 1904, pendant sa période bleue. Ce tableau est emblématique de cette période de Picasso, caractérisée par l’utilisation de tonalités bleues et une représentation mélancolique de la condition humaine.', 22, 33);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Christina’s World', 'Christina’s World est une peinture emblématique d’Andrew Wyeth, réalisée en 1948. Cette œuvre est l’une des plus célèbres de l’artiste et est largement admirée pour son réalisme saisissant et sa représentation poignante de la condition humaine.', 26, 34);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Boîtes de soupe Campbell', 'Boîtes de soupe Campbell est une série de peintures emblématiques réalisées par Andy Warhol en 1962. Cette œuvre est l’un des exemples les plus célèbres de l’art pop américain et est représentative de la manière dont Warhol a exploré la culture de consommation et les icônes de la vie quotidienne.', 27, 35);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Bohémienne endormie', 'La Bohémienne endormie, peinte par Henri Rousseau en 1897, est une œuvre emblématique de l’art naïf qui fascine par son ambiance mystérieuse et onirique. La scène représente une femme bohémienne vêtue de vêtements colorés, endormie dans un désert sous un ciel nocturne étoilé. À ses côtés, un lion à l’allure paisible semble veiller sur elle, dans une juxtaposition étrange et improbable. Le paysage désertique, avec ses dunes aux courbes douces, contraste avec la profondeur du ciel et l’étrangeté de la situation. Rousseau, autodidacte, déploie ici un style marqué par des contours nets, une perspective simplifiée et une atmosphère empreinte d’une poésie silencieuse, qui évoque un rêve suspendu entre réalité et imaginaire.', 28, 36);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Noces de Cana ', 'Les Noces de Cana est une œuvre magistrale du peintre italien Paolo Veronese, réalisée en 1563. Cette immense toile, l’une des plus célèbres de la Renaissance, dépeint la scène biblique des noces de Cana, où Jésus aurait accompli son premier miracle en transformant l’eau en vin.', 29, 37);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Champs de coquelicots près d’Argenteuil ', 'Champs de coquelicots près d’Argenteuil est une peinture emblématique de Claude Monet, réalisée en 1873. Cette œuvre est un parfait exemple du style impressionniste de Monet, mettant en valeur sa maîtrise de la lumière et de la couleur.', 1, 38);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Art de la peinture ', 'L’Art de la peinture, peint par Johannes Vermeer vers 1666-1668, est une œuvre majeure du maître néerlandais, souvent considérée comme une réflexion sur le métier de peintre et sur l’art lui-même. Cette toile est également connue sous le nom de L’Artiste dans son Atelier.', 21, 39);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('June flamboyante ', 'June flamboyante est une œuvre remarquable du peintre britannique Frederic Leighton, créée en 1890. Ce tableau est une célébration de la beauté et de la couleur, caractéristique du style de Leighton, qui mêle l’élégance classique à un sens vibrant de la couleur.', 30, 40);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Olympia ', 'Olympia est une peinture audacieuse d’Édouard Manet, réalisée en 1863. Cette œuvre est l’une des pièces maîtresses du mouvement impressionniste et a suscité une grande controverse lors de sa première exposition au Salon de Paris en 1865.', 15, 41);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Madonna ', 'Madonna est une œuvre emblématique du peintre norvégien Edvard Munch, réalisée en 1894-1895. Ce tableau est l’une des pièces les plus célèbres de Munch et fait partie de sa série sur les thèmes de la vie, de la mort et de l’amour.', 31, 42);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Annonciation ', 'L’Annonciation est une peinture célèbre de Léonard de Vinci, réalisée vers 1472-1475. Cette œuvre est un exemple remarquable de l’habileté de Léonard à représenter des scènes religieuses avec une grande finesse et une profondeur émotionnelle.', 8, 43);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Retour du fils prodigue ', 'Le Retour du fils prodigue est une peinture célèbre de Rembrandt van Rijn, réalisée vers 1668-1669. Cette œuvre est considérée comme l’un des sommets de la production artistique de Rembrandt et un chef-d’œuvre de la peinture baroque.', 17, 44);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Lady Godiva ', 'Lady Godiva est une peinture de John Collier, réalisée en 1898. Cette œuvre est une représentation dramatique et romantique de la légende médiévale de Lady Godiva, une noble anglo-saxonne qui, selon la tradition, fit une promenade nue à travers Coventry pour soulager son peuple de l’oppression fiscale.', 32, 45);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Jeune Martyres chrétienne ', 'La Jeune Martyres chrétienne est une œuvre poignante de Paul Delaroche, réalisée en 1855. Ce tableau est un exemple emblématique du style académique de Delaroche, connu pour sa capacité à capturer des scènes historiques et religieuses avec une grande intensité émotionnelle et une précision détaillée.', 33, 46);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Philosophe en méditation ', 'Philosophe en méditation est une peinture de Rembrandt van Rijn, réalisée vers 1632. Cette œuvre, souvent considérée comme un exemple du talent de Rembrandt pour la représentation psychologique et introspective, montre un homme pensif plongé dans une profonde réflexion.', 17, 47);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Tempête ', 'La Tempête est une œuvre romantique de Pierre-Auguste Cot, peinte en 1872. Ce tableau est célèbre pour sa représentation dramatique et poétique d’un couple en pleine nature, pris dans une tempête.', 34, 48);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Black Bashi-Bazouk ', 'Black Bashi-Bazouk est une peinture de Jean-Léon Gérôme, réalisée en 1869. Cette œuvre est un exemple emblématique du style orientalisme de Gérôme, qui se caractérise par une fascination pour les sujets exotiques et orientaux.', 35, 49);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Judith et Holopherne ', 'Judith et Holopherne est une peinture de Michel-Ange Merisi da Caravage, réalisée en 1598-1599. Cette œuvre est l’une des plus célèbres du maître du baroque, connue pour sa représentation audacieuse et dramatique d’une scène biblique.', 36, 50);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Liseuse ', 'La Liseuse est une peinture délicate et charmante de Jean-Honoré Fragonard, réalisée vers 1770. Cette œuvre est un exemple typique du style rococo de Fragonard, caractérisé par son élégance légère, sa sensualité et son attention aux détails raffinés.', 37, 51);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Vénus à son miroir ', 'Vénus à son miroir est une peinture magistrale de Diego Velázquez, réalisée entre 1647 et 1651. Cette œuvre est l’une des pièces les plus célèbres de l’artiste espagnol et est considérée comme un chef-d’œuvre du baroque.', 20, 52);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Danse à Bougival ', 'La Danse à Bougival est une peinture vibrante de Pierre-Auguste Renoir, réalisée en 1883. Cette œuvre est emblématique du style impressionniste de Renoir, caractérisé par son utilisation dynamique de la couleur et de la lumière pour capturer des scènes de la vie quotidienne avec une grande vivacité.', 5, 53);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Mer de Glace ', 'La Mer de Glace est une peinture spectaculaire de Caspar David Friedrich, réalisée en 1824. Cette œuvre est l’une des pièces maîtresses du romantisme allemand et illustre le talent de Friedrich pour capturer la majesté et la sublime grandeur de la nature.', 38, 54);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Grande Odalisque ', 'La Grande Odalisque est une peinture emblématique de Jean-Auguste-Dominique Ingres, réalisée en 1814. Cette œuvre est l’un des exemples les plus célèbres du néoclassicisme tardif et illustre le talent d’Ingres pour la représentation du nu féminin avec une grande finesse technique.', 39, 55);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Voyageur contemplant une mer de nuages ', 'Le Voyageur contemplant une mer de nuages est une peinture emblématique de Caspar David Friedrich, réalisée en 1818. Cette œuvre est souvent considérée comme l’un des sommets du romantisme allemand et illustre parfaitement le style et les thèmes caractéristiques de Friedrich.', 38, 56);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Triomphe de Galatée ', 'Le Triomphe de Galatée est une fresque peinte par Raphaël entre 1512 et 1514, située dans la Villa Farnesina à Rome. Cette œuvre est un chef-d’œuvre de la Renaissance italienne et illustre l’habileté de Raphaël à combiner la mythologie classique avec une composition élégante et dynamique.', 14, 57);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Tour de Babel ', 'La Tour de Babel est une peinture emblématique de Pieter Bruegel l’Ancien, réalisée en 1563. Cette œuvre est l’une des représentations les plus célèbres de la légende biblique de la Tour de Babel, un récit qui explique l’origine des langues diverses et la dispersion des peuples.', 40, 58);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Danse de Mérion ', 'La Danse de Mérion est une œuvre vibrante d’Henri Matisse, peinte en 1909-1910. Cette peinture est l’une des réalisations majeures du Fauvisme, un mouvement artistique dont Matisse était l’un des principaux représentants.', 41, 59);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Hasards heureux de l’escarpolette ', 'Les Hasards heureux de l’escarpolette, souvent simplement appelé L’Escarpolette, est une œuvre emblématique de Jean-Honoré Fragonard, peinte vers 1767. Ce tableau est l’un des exemples les plus célèbres du style rococo, connu pour sa légèreté, son élégance et son charme.', 37, 60);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Glaneuses ', 'Les Glaneuses est une peinture significative de Jean-François Millet, réalisée en 1857. Cette œuvre est l’une des pièces maîtresses du réalisme et illustre le talent de Millet pour capturer la vie rurale avec une grande honnêteté sociale et une sensibilité émotionnelle.', 42, 61);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Bonaparte franchit le col du Grand Saint-Bernard ', 'Bonaparte franchit le col du Grand Saint-Bernard est une peinture emblématique de Jacques-Louis David, réalisée en 1800. Cette œuvre est un exemple célèbre du néoclassicisme et commémore un moment crucial de la campagne d’Italie de Napoléon Bonaparte.', 43, 62);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Grande Vague de Kanagawa ', 'La Grande Vague de Kanagawa est une estampe emblématique réalisée par Katsushika Hokusai en 1831. Cette œuvre est l’une des pièces les plus célèbres de la série Trente-six vues du mont Fuji et est considérée comme un chef-d’œuvre de l’art japonais ukiyo-e.', 44, 63);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Joueurs de cartes ', 'Les Joueurs de cartes est une série de peintures réalisée par Paul Cézanne entre 1890 et 1892, avec plusieurs versions existantes. Ces œuvres sont parmi les plus célèbres de Cézanne et illustrent son approche unique du cubisme précoce et du post-impressionnisme.', 45, 64);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Naissance de Vénus ', 'La Naissance de Vénus est une peinture réalisée par William-Adolphe Bouguereau en 1879. Cette œuvre est un exemple brillant du style académique et réaliste de Bouguereau, mettant en avant son talent pour le rendu des détails et la sensualité des formes humaines.', 46, 65);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Bar aux Folies-Bergère ', 'Bar aux Folies-Bergère est une peinture emblématique d’Édouard Manet, réalisée en 1882. Cette œuvre est souvent considérée comme l’un des chefs-d’œuvre de la période impressionniste et illustre l’habileté de Manet à capturer la modernité de la vie urbaine à Paris.', 15, 66);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Dame de Shalott ', 'La Dame de Shalott est une peinture captivante de John William Waterhouse, réalisée en 1888. Cette œuvre est inspirée par le poème éponyme d’Alfred, Lord Tennyson, qui raconte l’histoire tragique de la Dame de Shalott, une figure mythique liée au cycle arthurien.', 47, 67);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Washington traversant le Delaware ', 'Washington traversant le Delaware est une peinture emblématique réalisée par Emanuel Leutze en 1851. Cette œuvre est l’une des représentations les plus célèbres de l’histoire américaine et capture un moment crucial de la Révolution américaine.', 48, 68);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Portrait de Madame X ', 'Portrait de Madame X, réalisé par John Singer Sargent en 1884, est l’un des portraits les plus célèbres et controversés du XIXe siècle. Le tableau représente la société parisienne et est particulièrement notable pour sa maîtrise technique et son audacieuse composition.', 49, 69);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Grandes Baigneuses ', 'Les Grandes Baigneuses est une œuvre majeure de Paul Cézanne, peinte entre 1894 et 1905. Ce tableau est l’une des compositions les plus célèbres de Cézanne et illustre son style unique, caractérisé par une approche innovante du cubisme précoce et du post-impressionnisme.', 45, 70);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Quand te maries-tu ? ', 'Quand te maries-tu ? est une œuvre notable de Paul Gauguin, peinte en 1892 pendant son séjour à Tahiti. Cette peinture est un exemple significatif de son style post-impressionniste et de son engagement avec les thèmes exotiques et les cultures non européennes.', 50, 71);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Rue de Paris', 'Rue de Paris, temps de pluie est une œuvre remarquable de Gustave Caillebotte, peinte en 1877. Cette peinture est souvent citée comme un exemple emblématique du réalisme et de l’impressionnisme, illustrant la capacité de Caillebotte à capturer des scènes de la vie urbaine avec une grande précision et une sensibilité unique.', 51, 72);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Astronome ', 'L’Astronome est une peinture de Johannes Vermeer, réalisée vers 1668-1669. Cette œuvre est un exemple notable du génie de Vermeer dans la représentation des intérieurs et des activités quotidiennes avec une précision lumineuse et une composition élégante.', 21, 73);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Musiciens ', 'Les Musiciens est une œuvre peinte par Caravage en 1595-1596. Cette peinture est un exemple frappant du style réaliste et dramatique du Caravage, connu pour son utilisation audacieuse du clair-obscur et sa capacité à capturer la vie quotidienne avec une intensité émotionnelle.', 36, 74);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Arbre de Vie de la Villa Stoclet ', 'L’Arbre de Vie est une fresque réalisée par Gustav Klimt pour la villa Stoclet à Bruxelles, commandée par le mécène belge Adolphe Stoclet. Peinte entre 1905 et 1911, cette œuvre est l’une des créations majeures de Klimt et est emblématique de son style distinctif.', 11, 75);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Arrestation du Christ ', 'L’Arrestation du Christ, également connue sous le titre La Capture du Christ, est une peinture de Caravage réalisée en 1602. Cette œuvre est un exemple emblématique du style dramatique et réaliste du Caravage, connu pour son utilisation intense du clair-obscur et son approche naturaliste des sujets religieux.', 36, 76);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Origine du monde ', 'L’Origine du monde est une peinture audacieuse et provocante réalisée par Gustave Courbet en 1866. Cette œuvre est l’une des pièces les plus controversées et influentes du réalisme, illustrant la capacité de Courbet à explorer des thèmes audacieux avec un style direct et sans compromis.', 52, 77);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Nuit étoilée sur le Rhône ', 'La Nuit étoilée sur le Rhône est une peinture de Vincent van Gogh réalisée en septembre 1888. Cette œuvre est l’une des nombreuses créations de Van Gogh inspirées par la ville d’Arles, où il a vécu pendant une période créative et prolifique de sa vie.', 9, 78);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Création d’Adam ', 'La Création d’Adam est une fresque emblématique peinte par Michel-Ange entre 1512 et 1513. Elle fait partie du célèbre plafond de la Chapelle Sixtine au Vatican, un chef-d’œuvre de la Renaissance italienne.', 53, 79);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Cri ', 'Le Cri est une peinture emblématique d’Edvard Munch, créée en 1893. Cette œuvre est l’une des plus célèbres du mouvement expressionniste et est reconnue pour son expression intense de l’angoisse et de l’aliénation.', 31, 80);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Nymphéas ', 'Les Nymphéas (ou Nympheas) est une série de peintures réalisée par Claude Monet, l’un des maîtres de l’impressionnisme. Ces œuvres, créées entre 1899 et 1926, représentent des nénuphars flottant sur l’étang de son jardin à Giverny. Elles sont parmi les pièces les plus célèbres de Monet et témoignent de son intérêt pour la lumière, la couleur et la réflexion dans la nature.', 1, 81);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('La Maja nue ', 'La Maja nue est une œuvre de Francisco de Goya, peinte à la fin du XVIIIe siècle, probablement entre 1797 et 1800. Cette peinture est célèbre pour son audace et sa place unique dans l’histoire de l’art espagnol.', 2, 82);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Désespéré ', 'Le Désespéré est une peinture de Gustave Courbet réalisée en 1843. Cette œuvre est l’une des représentations les plus poignantes de la condition humaine par Courbet, illustrant son style réaliste et son approche introspective des émotions humaines.', 52, 83);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Les Deux Fridas ', 'Les Deux Fridas est une peinture de Frida Kahlo réalisée en 1939, peu après son divorce avec Diego Rivera. Cette œuvre est l’une des plus célèbres et significatives de Kahlo, illustrant son exploration de l’identité personnelle et des émotions profondes.', 54, 84);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Le Rêve ', 'Le Rêve est une peinture de Pablo Picasso réalisée en 1932. Cette œuvre est un exemple emblématique du style surréaliste et symbolique de Picasso à cette période de sa carrière.', 22, 85);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Cours de l’Empire : Destruction ', 'Cours de l’Empire : Destruction est une peinture réalisée par Thomas Cole en 1836. Cette œuvre fait partie d’une série de cinq tableaux intitulée Le Cours de l’Empire, qui explore le cycle de la montée et de la chute des civilisations à travers une série de paysages allégoriques.', 55, 86);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Composition VIII ', 'Composition VIII est une œuvre majeure de Vassily Kandinsky, réalisée en 1923. Cette peinture est un exemple emblématique de l’abstraction géométrique et du style du Bauhaus, où Kandinsky était enseignant à l’époque.', 56, 87);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Deux Satyres ', 'Deux Satyres est une œuvre de Peter Paul Rubens, réalisée au début du XVIIe siècle, probablement vers 1620. Cette peinture est un exemple de la maîtrise de Rubens dans le genre du portrait mythologique et son aptitude à capturer la vitalité et la sensualité à travers des compositions dynamiques.', 57, 88);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('El Jaleo ', 'El Jaleo est une peinture de John Singer Sargent réalisée en 1882. Cette œuvre est un excellent exemple de la maîtrise de Sargent pour capturer le mouvement et l’énergie dans ses compositions artistiques.', 49, 89);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Grands Chevaux Bleus ', 'Grands Chevaux Bleus est une peinture réalisée par Franz Marc en 1911, un exemple significatif de son style expressionniste et de son intérêt pour la représentation symbolique des animaux.', 58, 90);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Hylas et les Nymphes ', 'Hylas et les Nymphes est une peinture de John William Waterhouse, réalisée en 1896. Cette œuvre est un exemple notable du style préraphaélite de Waterhouse, connu pour sa représentation romantique et mythologique des thèmes classiques.', 47, 91);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('Jeune Homme à la Fenêtre ', 'Jeune Homme à la Fenêtre est une peinture de Gustave Caillebotte, réalisée en 1876. Cette œuvre est emblématique du style impressionniste de Caillebotte, mettant en avant son intérêt pour les scènes de la vie quotidienne et les explorations de la lumière et de la perspective.', 51, 92);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Homme au Casque d’Or ', 'L’Homme au Casque d’Or est une peinture réalisée par Rembrandt van Rijn en 1655. Cette œuvre est l’une des pièces majeures du peintre néerlandais et est emblématique de son talent pour les portraits et son utilisation magistrale de la lumière et de l’ombre.', 17, 93);
INSERT INTO public.oeuvres(nom_oeuvre, description, id_artiste, id_image) VALUES ('L’Empereur Napoléon dans son Bureau aux Tuileries ', 'L’Empereur Napoléon dans son Bureau aux Tuileries est une peinture de Jacques-Louis David réalisée en 1812. Cette œuvre est un exemple emblématique du style néoclassique de David, ainsi que de son rôle en tant que peintre officiel de Napoléon Bonaparte.', 43, 94);

INSERT INTO public.materiel(
	description_materiel, prix_materiel, nom_materiel, id_image)
	VALUES ('...', 20, 'Toile',101),
	('...', 15, 'Chevalet en bois',102),
	 ('...', 10, 'Set de pinceaux rond',103),
	 ('...', 10, 'Set de pinceaux carrée',104);

INSERT INTO public.images(lien_image)
	VALUES ('Content/img/materiaux/toile_pinceau.jpg'),
	('Content/img/materiaux/chevalet.jpg'),
	('Content/img/materiaux/pinceau_rond'),
	('Content/img/materiaux/pinceau_carrée');
	
INSERT INTO public.autres_materiaux (id_materiel, type_materiel) VALUES (101,'Toile');
INSERT INTO public.autres_materiaux (id_materiel, type_materiel) VALUES (102,'Chevalet');
INSERT INTO public.autres_materiaux (id_materiel, type_materiel) VALUES (103,'Pinceaux');
INSERT INTO public.autres_materiaux (id_materiel, type_materiel) VALUES (104,'Pinceaux');

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
