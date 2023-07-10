CREATE DATABASE webs4;

USE webs4;

CREATE TABLE Profile(
    idProfile INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    passw VARCHAR(255),
    privilege INT 
);

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

CREATE TABLE Activite(
    idActivite INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom varchar(200),
    idType int,
    apport double,
    frequence int,
    prix double,
    FOREIGN KEY(idType) REFERENCES TypeActivite(idType)
);

CREATE TABLE Regime(
    idRegime INT NOT NULL,
    idActivite int,
    jourActivite int,
    finActivite int,
    FOREIGN KEY(idActivite) REFERENCES Activite(idActivite),
    PRIMARY KEY(idRegime,idActivite)
);

CREATE TABLE Objectif(
    idObjectif INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
    code VARCHAR(255)
);

CREATE TABLE PendingWallet(
    idProfile INT,
    idCode int,
    status int,
    FOREIGN KEY(idProfile) REFERENCES Profile(idProfile),
    FOREIGN KEY(idCode) REFERENCES Code(idCode)
);

INSERT INTO TypeActivite(nom) VALUES ('Sport');
INSERT INTO TypeActivite(nom) VALUES ('Repas');