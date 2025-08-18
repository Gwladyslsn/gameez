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

