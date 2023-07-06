#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: actor
#------------------------------------------------------------

CREATE TABLE actor(
        id        Int  Auto_increment  NOT NULL ,
        name      Varchar (255) NOT NULL ,
        firstname Varchar (255) NOT NULL ,
        birthday  Date NOT NULL
	,CONSTRAINT actor_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (255)
	,CONSTRAINT category_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: movie
#------------------------------------------------------------

CREATE TABLE movie(
        id          Int  Auto_increment  NOT NULL ,
        title       Varchar (50) ,
        released_at Date ,
        description Longtext ,
        duration    Int ,
        cover       Varchar (50) ,
        id_category Int NOT NULL
	,CONSTRAINT movie_PK PRIMARY KEY (id)

	,CONSTRAINT movie_category_FK FOREIGN KEY (id_category) REFERENCES category(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Jouer
#------------------------------------------------------------

CREATE TABLE Jouer(
        id       Int NOT NULL ,
        id_movie Int NOT NULL
	,CONSTRAINT Jouer_PK PRIMARY KEY (id,id_movie)

	,CONSTRAINT Jouer_actor_FK FOREIGN KEY (id) REFERENCES actor(id)
	,CONSTRAINT Jouer_movie0_FK FOREIGN KEY (id_movie) REFERENCES movie(id)
)ENGINE=InnoDB;

