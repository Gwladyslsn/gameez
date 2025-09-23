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

ALTER TABLE list 
CHANGE COLUMN id_joueur id_user INT NOT NULL;


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


CREATE TABLE list_items (
        id_list_item INT AUTO_INCREMENT PRIMARY KEY,
        list_id INT NOT NULL,
        id_game INT NOT NULL,
        CONSTRAINT fk_list FOREIGN KEY (list_id) REFERENCES list(id_list),
        CONSTRAINT fk_game FOREIGN KEY (id_game) REFERENCES game(id_game)
);

ALTER TABLE list_items 
CHANGE list_id id_list INT NOT NULL;

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

ALTER TABLE review 
CHANGE COLUMN id_joueur id_user INT NOT NULL;

ALTER TABLE review 
CHANGE COLUMN comment review_comment TEXT NOT NULL;


CREATE TABLE extension(
        id_extension Int AUTO_INCREMENT NOT NULL,
        extension_name VARCHAR(100) NOT NULL,
        extension_description text NOT NULL,
        complexity Int NOT NULL,
        extension_image Varchar (150) NOT NULL,
        release_date Date NOT NULL,
        id_game Int NOT NULL
        ,CONSTRAINT extension_PK PRIMARY KEY (id_extension)
        ,CONSTRAINT game_fk FOREIGN KEY (id_game) REFERENCES game(id_game)
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

INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Uno', '20 min', '2-10', '7+', 'image/jeux/uno.webp', 3, 'Débarrassez-vous de toutes vos cartes avant les autres.'),
('Saboteur', '30 min', '3-10', '8+', 'image/jeux/saboteur.webp', 3, 'Cherchez de l’or... ou sabotez vos camarades.'),
('Skyjo', '30 min', '2-8', '8+', 'image/jeux/skyjo.webp', 3, 'Minimisez vos points en gérant vos cartes.'),
('Exploding Kittens', '15 min', '2-5', '7+', 'image/jeux/explodingkittens.webp', 3, 'Évitez de tirer un chat explosif.'),
('Bang!', '20-40 min', '4-7', '10+', 'image/jeux/bang.webp', 3, 'Sheriff contre hors-la-loi dans un duel de cartes.'),
('The Mind', '15 min', '2-4', '8+', 'image/jeux/themind.webp', 3, 'Jouez vos cartes dans l’ordre sans parler.'),
('Love Letter', '20 min', '2-6', '10+', 'image/jeux/loveletter.webp', 3, 'Séduisez la princesse grâce à vos cartes.'),
('Coloretto', '30 min', '2-5', '8+', 'image/jeux/coloretto.webp', 3, 'Collectionnez des cartes de couleur sans en avoir trop.'),
('For Sale', '30 min', '3-6', '8+', 'image/jeux/forsale.webp', 3, 'Achetez et revendez des biens immobiliers.'),
('Tichu', '60 min', '4', '12+', 'image/jeux/tichu.webp', 3, 'Jeu d’atouts et de combinaisons chinois classique.');


INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Yams (Yahtzee)', '15-30 min', '2-6', '8+', 'image/jeux/yahtzee.webp', 4, 'Faites des combinaisons de dés pour marquer des points.'),
('King of Tokyo', '30 min', '2-6', '8+', 'image/jeux/kingoftokyo.webp', 4, 'Devenez le monstre qui contrôle Tokyo.'),
('Perudo', '30 min', '2-6', '8+', 'image/jeux/perudo.webp', 4, 'Bluffez vos adversaires avec vos dés cachés.'),
('Can\'t Stop', '30 min', '2-4', '9+', 'image/jeux/cantstop.webp', 4, 'Un jeu de stop ou encore avec des dés.'),
('Qwixx', '15 min', '2-5', '8+', 'image/jeux/qwixx.webp', 4, 'Cochez des cases en fonction des dés lancés.'),
('Strike', '15 min', '2-5', '8+', 'image/jeux/strike.webp', 4, 'Lancez des dés dans une arène pour en récupérer.'),
('Roll for the Galaxy', '45 min', '2-5', '13+', 'image/jeux/rollforthegalaxy.webp', 4, 'Développez une civilisation spatiale en lançant des dés.'),
('Las Vegas', '30 min', '2-5', '8+', 'image/jeux/lasvegas.webp', 4, 'Pariez vos dés dans les casinos pour gagner de l’argent.'),
('Dice Forge', '45 min', '2-4', '10+', 'image/jeux/diceforge.webp', 4, 'Personnalisez vos dés pour devenir plus puissant.');

INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Loup-Garou de Thiercelieux', '30-45 min', '8-18', '10+', 'image/jeux/loupgarou.webp', 5, 'Villageois contre loups-garous dans un jeu de bluff.'),
('Mafia', '30-60 min', '6-20', '12+', 'image/jeux/mafia.webp', 5, 'Bluffez vos adversaires pour survivre dans la mafia.'),
('Secret Hitler', '45 min', '5-10', '13+', 'image/jeux/secrethitler.webp', 5, 'Identifiez Hitler avant qu’il ne prenne le pouvoir.'),
('Avalon', '30 min', '5-10', '12+', 'image/jeux/avalon.webp', 5, 'Chevaliers de la Table Ronde contre traîtres.'),
('Spyfall', '15 min', '3-8', '12+', 'image/jeux/spyfall.webp', 5, 'Trouvez l’espion caché en posant des questions.'),
('Shadow Hunters', '60 min', '4-8', '13+', 'image/jeux/shadowhunters.webp', 5, 'Dévoilez qui est chasseur, ombre ou neutre.'),
('Codenames', '15 min', '2-8', '10+', 'image/jeux/codenames.webp', 5, 'Faites deviner des mots à votre équipe en évitant les assassins.'),
('Decrypto', '30 min', '3-8', '12+', 'image/jeux/decrypto.webp', 5, 'Faites deviner des codes sans vous faire intercepter.'),
('Good Cop Bad Cop', '20 min', '4-8', '12+', 'image/jeux/goodcopbadcop.webp', 5, 'Joueurs policiers corrompus ou loyaux doivent s’identifier.');


--cooperatif
INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Pandemic', '45 min', '2-4', '10+', 'image/jeux/pandemic.webp', 6, 'Sauvez le monde en éradiquant les maladies.'),
('Zombicide', '60 min', '1-6', '14+', 'image/jeux/zombicide.webp', 6, 'Affrontez les zombies en équipe pour survivre.'),
('The Crew', '20 min', '2-5', '10+', 'image/jeux/thecrew.webp', 6, 'Accomplissez des missions ensemble dans l’espace.'),
('Hanabi', '25 min', '2-5', '8+', 'image/jeux/hanabi.webp', 6, 'Créez un feu d’artifice parfait sans voir vos cartes.'),
('Flash Point', '45 min', '2-6', '10+', 'image/jeux/flashpoint.webp', 6, 'Sauvez des vies dans un immeuble en feu.'),
('Forbidden Island', '30 min', '2-4', '10+', 'image/jeux/forbiddenisland.webp', 6, 'Récupérez des trésors avant que l’île ne sombre.'),
('Spirit Island', '90 min', '1-4', '13+', 'image/jeux/spiritisland.webp', 6, 'Protégez votre île contre les envahisseurs.'),
('Arkham Horror', '120 min', '1-6', '14+', 'image/jeux/arkhamhorror.webp', 6, 'Combattez les horreurs cosmiques en équipe.'),
('Mysterium', '45 min', '2-7', '10+', 'image/jeux/mysterium.webp', 6, 'Résolvez un meurtre avec l’aide d’un fantôme.'),
('Chronicles of Avel', '60 min', '1-4', '8+', 'image/jeux/avel.webp', 6, 'Protégez votre royaume dans un univers fantastique.');

--Enquete
INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
VALUES
('Cluedo', '45 min', '2-6', '8+', 'image/jeux/cluedo.webp', 7, 'Trouvez le coupable, l’arme et le lieu du crime.'),
('Detective', '120 min', '1-5', '16+', 'image/jeux/detective.webp', 7, 'Résolvez des enquêtes réalistes avec indices.'),
('Chronicles of Crime', '60 min', '1-4', '12+', 'image/jeux/chroniclescrime.webp', 7, 'Utilisez votre smartphone pour élucider des crimes.'),
('Sherlock Holmes Détective Conseil', '90 min', '1-8', '12+', 'image/jeux/sherlockholmes.webp', 7, 'Plongez dans des enquêtes à Londres victorien.'),
('MicroMacro Crime City', '30 min', '1-4', '10+', 'image/jeux/micromacro.webp', 7, 'Retrouvez les criminels en scrutant la carte géante.'),
('Detective Club', '45 min', '4-8', '8+', 'image/jeux/detectiveclub.webp', 7, 'Débusquez le menteur à partir d’indices.'),
('Unlock!', '60 min', '2-6', '10+', 'image/jeux/unlock.webp', 7, 'Résolvez des énigmes dans un escape game maison.'),
('Exit', '60 min', '1-6', '12+', 'image/jeux/exit.webp', 7, 'Un escape game en version cartes.'),
('Suspects', '45 min', '1-6', '12+', 'image/jeux/suspects.webp', 7, 'Menez des enquêtes narratives immersives.'),
('Mysterium Park', '30 min', '2-6', '10+', 'image/jeux/mysteriumpark.webp', 7, 'Une version plus rapide de Mysterium pour deviner le coupable.');

INSERT INTO extension (extension_name, extension_description, complexity, extension_image, release_date, id_game) VALUES
('Seafarers', "Cette extension ajoute l'élément de voyage en mer au jeu de base Catan, permettant aux joueurs de construire des navires et d'explorer de nouvelles îles. Elle inclut des scénarios avec différentes cartes et objectifs.", 2, 'catan-seafarers.jpg', '1997-01-01', 41),
('Leaders', "Introduit des leaders historiques dotés de capacités uniques pour guider votre civilisation. Les joueurs sélectionnent des leaders avant chaque âge, ajoutant une nouvelle couche stratégique au jeu.", 3, '7wonders-leaders.jpg', '2011-01-01', 42),
('The Rise of Fenris', "Cette extension ajoute une campagne non rejouable de 8 épisodes, ainsi que 11 modules à débloquer. Elle conclut l'histoire de Scythe en introduisant de nouvelles factions et de nouveaux éléments de jeu.", 5, 'scythe-fenris.jpg', '2018-09-01', 45),
('On the Brink', "Ajoute plusieurs nouveaux rôles et événements, ainsi qu'un nouveau défi de souche virulente. Elle introduit le Bio-Terroriste et des événements de Mutation, augmentant la difficulté et la rejouabilité.", 4, 'pandemic-brink.jpg', '2009-01-01', 109),
('Power Up!', "Introduit des cartes d'Évolution pour chaque monstre, permettant aux joueurs de personnaliser leur monstre avec des capacités uniques. Il s'agit de la première extension pour le jeu de base.", 1, 'kot-powerup.jpg', '2012-01-01', 92),
('Prelude', "Une extension plus petite qui aide à accélérer le jeu. Les joueurs reçoivent deux cartes Prélude au début de la partie qui leur donnent un coup de pouce initial, permettant une mise en place plus rapide et des coups d'ouverture puissants.", 2, 'tm-prelude.jpg', '2018-09-01', 43);


/*TEST*/

SELECT COUNT(*) as nb_list FROM list WHERE id_user = 1;

SELECT COUNT(*) AS nb_games
FROM list_items li
JOIN list l ON li.id_list = l.id_list
WHERE l.id_user = 4;

SELECT COUNT(*) FROM game;
