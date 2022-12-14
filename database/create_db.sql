CREATE TABLE USER (
 id Integer PRIMARY KEY,
 mdp TEXT NOT NULL,
 mail TEXT NOT NULL UNIQUE,
 nom TEXT NOT NULL,
 prenom TEXT NOT NULL,
 date_de_naissance TEXT NOT NULL,
 sexe TEXT NOT NULL,
 poids INTEGER NOT NULL,
 taille INTEGER NOT NULL
);

CREATE TABLE ACTIVITE (
 Id INTEGER PRIMARY KEY,
 userId INTEGER NOT NULL,
 date Date NOT NULL,
 Description TEXT,
 FOREIGN KEY(userId) REFERENCES User(id)
);
 
CREATE TABLE ENTRAINEMENT (
 id INTEGER PRIMARY KEY,
 activiteId INTEGER NOT NULL,
 altitude REAL NOT NULL,
 longitude REAL NOT NULL,
 latitude REAL NOT NULL,
 frequence INTEGER NOT NULL,
 temps TEXT NOT NULL,
 FOREIGN KEY(activiteId) REFERENCES Activite(id)
);

