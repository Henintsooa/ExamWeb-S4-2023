CREATE DATABASE webs4;

USE webs4;

CREATE TABLE Profile(
    idProfile INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    passw VARCHAR(255),
    privilege INT 
);

