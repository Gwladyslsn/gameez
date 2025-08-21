-- Active: 1751042571760@@127.0.0.1@3307@gameez
CREATE DATABASE gameez;

use DATABASE gameez;


/*TABLE UTILISATEUR*/
CREATE TABLE user(
        id_joueur     Int  Auto_increment  NOT NULL ,
        user_name     Varchar (150) ,
        user_lastname Varchar (150) ,
        user_tel      Varchar (15) ,
        user_mail     Varchar (150) ,
        user_password Varchar (150) NOT NULL ,
        user_dob      Date NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_joueur)
)

ALTER TABLE user
CHANGE id_joueur id_user INT AUTO_INCREMENT;


/*TABLE ADMIN*/
CREATE TABLE admin(
        id_admin       Int  Auto_increment  NOT NULL ,
        admin_name     Varchar (150) ,
        admin_lastname Varchar (150) ,
        admin_tel      Varchar (15) ,
        admin_mail     Varchar (150) ,
        admin_password Varchar (150) NOT NULL
	,CONSTRAINT admin_PK PRIMARY KEY (id_admin)
)

/*JEU*/

CREATE TABLE category(
        id_category   Int  Auto_increment  NOT NULL ,
        category_name Varchar (150)
	,CONSTRAINT category_PK PRIMARY KEY (id_category)
)

CREATE TABLE game(
        id_game       Int  Auto_increment  NOT NULL ,
        game_name     Varchar (150) ,
        game_duration Int ,
        nb_gamer      Int NOT NULL ,
        age_gamer     Int NOT NULL ,
        image         Varchar (150) NOT NULL ,
        id_category   Int NOT NULL
	,CONSTRAINT game_PK PRIMARY KEY (id_game)
	,CONSTRAINT game_category_FK FOREIGN KEY (id_category) REFERENCES category(id_category)
)

ALTER TABLE game
ADD COLUMN game_description TEXT;

ALTER TABLE game MODIFY game_duration VARCHAR(50);
ALTER TABLE game MODIFY nb_gamer VARCHAR(50);
ALTER TABLE game MODIFY age_gamer VARCHAR(50);

/*liste*/
CREATE TABLE list(
        id_list   Int  Auto_increment  NOT NULL ,
        list_name Varchar (150) ,
        create_at Date NOT NULL ,
        id_joueur Int NOT NULL
	,CONSTRAINT list_PK PRIMARY KEY (id_list)

	,CONSTRAINT list_user_FK FOREIGN KEY (id_joueur) REFERENCES user(id_joueur)
)

/*avis*/
CREATE TABLE review(
        id_review   Int  Auto_increment  NOT NULL ,
        review_note Int ,
        comment     Text NOT NULL ,
        review_date Date NOT NULL ,
        id_joueur   Int NOT NULL ,
        id_game     Int NOT NULL
	,CONSTRAINT review_PK PRIMARY KEY (id_review)

	,CONSTRAINT review_user_FK FOREIGN KEY (id_joueur) REFERENCES user(id_joueur)
	,CONSTRAINT review_game0_FK FOREIGN KEY (id_game) REFERENCES game(id_game)
)



/* AJOUT DE DONNEES */

INSERT INTO category (category_name)
VALUES
('Stratégie'),
('Ambiance'),
('Cartes'),
('Dés'),
('Rôles'),
('Cooperatif'),
('Enquêtes'),
('Enfant'),
('Culturel');

INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Catan', '60-90 min', '3-4', '10+', 'image/jeux/catan.webp', 1, 'Colonisez une île, échangez des ressources et développez vos colonies.'),
('7 Wonders', '30 min', '3-7', '10+', 'image/jeux/7wonders.webp', 1, 'Construisez une merveille antique et développez votre civilisation.'),
('Terraforming Mars', '120 min', '1-5', '12+', 'image/jeux/terraformingmars.webp', 1, 'Développez Mars pour la rendre habitable en gérant vos ressources.'),
('Risk', '120 min', '2-6', '10+', 'image/jeux/risk.webp', 1, 'Conquérez le monde dans ce jeu de stratégie militaire.'),
('Scythe', '90-120 min', '1-7', '14+', 'image/jeux/scythe.webp', 1, 'Un jeu de conquête et gestion de ressources dans une uchronie 1920s.'),
('Brass: Birmingham', '90-120 min', '2-4', '14+', 'image/jeux/brass.webp', 1, 'Développez votre réseau industriel pendant la révolution industrielle.'),
('Puerto Rico', '90 min', '2-5', '12+', 'image/jeux/puertorico.webp', 1, 'Gérez une colonie en produisant et expédiant des marchandises.'),
('Agricola', '120 min', '1-5', '12+', 'image/jeux/agricola.webp', 1, 'Faites prospérer votre ferme et nourrissez votre famille.'),
('Through the Ages', '180 min', '2-4', '14+', 'image/jeux/throughages.webp', 1, 'Développez une civilisation à travers les âges.'),
('Eclipse', '120-180 min', '2-6', '14+', 'image/jeux/eclipse.webp', 1, 'Conquérez l’espace dans ce 4X stratégique intergalactique.'),

('Times Up!', '30 min', '4-12', '12+', 'image/jeux/timesup.webp', 2, 'Faites deviner des personnalités en un temps limité.'),
('Blanc-Manger Coco', '30 min', '3-12', '16+', 'image/jeux/blancmangercoco.webp', 2, 'Complétez des phrases avec des cartes drôles et absurdes.'),
('Concept', '40 min', '4-12', '10+', 'image/jeux/concept.webp', 2, 'Faites deviner des mots en associant des pictogrammes.'),
('Jungle Speed', '15 min', '2-10', '7+', 'image/jeux/junglespeed.webp', 2, 'Attrapez le totem avant vos adversaires.'),
('Dixit', '30 min', '3-6', '8+', 'image/jeux/dixit.webp', 2, 'Faites deviner une image avec une phrase poétique ou énigmatique.'),
('Crazy Cups', '15 min', '2-4', '6+', 'image/jeux/crazycups.webp', 2, 'Reproduisez des modèles en empilant des gobelets colorés.'),
('Just One', '20 min', '3-7', '8+', 'image/jeux/justone.webp', 2, 'Faites deviner un mot avec des indices uniques.'),
('Pictionary', '30-60 min', '3-16', '8+', 'image/jeux/pictionary.webp', 2, 'Dessinez et faites deviner le plus de mots possible.'),
('Top Ten', '30 min', '4-9', '14+', 'image/jeux/topten.webp', 2, 'Classez des réponses délirantes selon un thème.'),
('TTMC', '45-90 min', '2-16', '14+', 'image/jeux/ttmc.webp', 2, 'Répondez à des questions de culture générale adaptées à vos connaissances.');

DELETE FROM game;
