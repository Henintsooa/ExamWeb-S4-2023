CREATE DATABASE webs4;

USE webs4;

CREATE TABLE Profile(
    idProfile INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    passw VARCHAR(255),
    privilege INT 
);
insert into Profile VALUES (null,'Jean','123',0);
insert into Profile VALUES (null,'Jeanne','123',0);
insert into Profile VALUES (null,'Paul','123',0);
insert into Profile VALUES (null,'Pauline','123',0);
insert into Profile VALUES (null,'admin','admin',1);


CREATE TABLE UserData(
    idUserData INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idProfile int,
    sexe int,
    taille int,
    poids double,
    dateCurrent datetime,
    FOREIGN KEY(idProfile) REFERENCES Profile(idProfile)
);

CREATE TABLE TypeActivite(
    idType INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255)
);
insert into TypeActivite VALUES (null,'sport');
insert into TypeActivite VALUES (null,'repas');

CREATE TABLE Activite(
    idActivite INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(200),
    idType int,
    apport double,
    frequence int,
    prix double,
    FOREIGN KEY(idType) REFERENCES TypeActivite(idType)
);
insert into Activite VALUES (null,'sport pompe',1,-1,3,0);
insert into Activite VALUES (null,'sport squat',1,0.5,3,0);
insert into Activite VALUES (null,'sport marche',1,-0.5,5,0);
insert into Activite VALUES (null,'sport course',1,-1,5,0);
insert into Activite VALUES (null,'sport cardio',1,-1,3,0);

insert into Activite VALUES (null,'salade',2,-1,3,30000);
insert into Activite VALUES (null,'steak frite',2,3,3,50000);
insert into Activite VALUES (null,'riz cantonais',2,1,3,30000);
insert into Activite VALUES (null,'tofu',2,-1,4,20000);
insert into Activite VALUES (null,'crudite',2,-0.5,5,25000);


CREATE TABLE Regime(
    idRegime INT NOT NULL,
    idActivite int,
    jourActivite int,
    finActivite int,
    nom VARCHAR(200),
    FOREIGN KEY(idActivite) REFERENCES Activite(idActivite),
    PRIMARY KEY(idRegime,idActivite,jourActivite)
);

CREATE TABLE Objectif(
    idObjectif INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idProfile int,
    idRegime int,
    poids double,
    montant double,
    repetition int,
    FOREIGN KEY(idRegime) REFERENCES Regime(idRegime)
);

CREATE TABLE Wallet(
    idProfile INT,
    montant double,
    FOREIGN KEY(idProfile) REFERENCES Profile(idProfile)
);

CREATE TABLE Code(
    idCode INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    montant double,
    isUsed int,
    code VARCHAR(255) unique
);
insert into Code VALUES (null,10000,0,'code001');
insert into Code VALUES (null,20000,0,'code002');
insert into Code VALUES (null,30000,0,'code003');
insert into Code VALUES (null,40000,0,'code004');
insert into Code VALUES (null,50000,0,'code005');
insert into Code VALUES (null,60000,0,'code006');
insert into Code VALUES (null,70000,0,'code007');
insert into Code VALUES (null,80000,0,'code008');
insert into Code VALUES (null,90000,0,'code009');
insert into Code VALUES (null,100000,0,'code010');
insert into Code VALUES (null,10000,0,'code011');
insert into Code VALUES (null,20000,0,'code012');
insert into Code VALUES (null,30000,0,'code013');
insert into Code VALUES (null,40000,0,'code014');
insert into Code VALUES (null,50000,0,'code015');

CREATE TABLE PendingWallet(
    idProfile INT,
    idCode int,
    status int,
    FOREIGN KEY(idProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY(idCode) REFERENCES Code(idCode)
);

INSERT INTO Profile(username,passw,privilege) VALUES("admin","admin",1);

INSERT INTO TypeActivite(nom) VALUES ('Sport');
INSERT INTO TypeActivite(nom) VALUES ('Repas');

create or replace view reduirePoids as SELECT idRegime, SUM(apport) AS resultat
FROM activite
JOIN regime ON activite.idActivite = regime.idActivite
GROUP BY idRegime
HAVING resultat < 0;

create or replace view augmenterPoids as SELECT idRegime, SUM(apport) AS resultat
FROM activite
JOIN regime ON activite.idActivite = regime.idActivite
GROUP BY idRegime
HAVING resultat > 0;