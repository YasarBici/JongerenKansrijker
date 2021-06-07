CREATE DATABASE JongerenKansrijker;

USE JongerenKansrijker;

CREATE TABLE activiteit (
    activiteitcode INT AUTO_INCREMENT NOT NULL,
    activiteit VARCHAR(255) NOT NULL,
    PRIMARY KEY(activiteitcode)
);

CREATE TABLE instituut (
    instituutscode INT AUTO_INCREMENT NOT NULL,
    instituut VARCHAR(255) NOT NULL,
    insituuttelefoon VARCHAR(255),
    PRIMARY KEY(instituutscode)
);

CREATE TABLE jongere (
    jongerecode INT AUTO_INCREMENT NOT NULL,
    roepnaam VARCHAR(255) NOT NULL,
    tussenvoegsel VARCHAR(255),
    achternaam VARCHAR(255) NOT NULL,
    inschrijfdatum DATE NOT NULL,
    PRIMARY KEY(jongerecode)
);

CREATE TABLE jongereinstituut (
    jongereinstituutcode INT AUTO_INCREMENT NOT NULL,
    jongerecode INT NOT NULL,
    instituutscode INT NOT NULL,
    startdatum DATE NOT NULL,
    PRIMARY KEY(jongereinstituutcode),
    FOREIGN KEY(jongerecode) REFERENCES jongere(jongerecode),
    FOREIGN KEY(instituutscode) REFERENCES instituut(instituutscode)
);

CREATE TABLE jongereactiviteit (
    jongereactiviteitcode INT AUTO_INCREMENT NOT NULL,
    jongerecode INT NOT NULL,
    activiteitcode INT NOT NULL,
    startdatum DATE NOT NULL,
    afgerond TINYINT NOT NULL,
    PRIMARY KEY(jongereactiviteitcode),
    FOREIGN KEY(jongerecode) REFERENCES jongere(jongerecode),
    FOREIGN KEY(activiteitcode) REFERENCES activiteit(activiteitcode)
);

CREATE TABLE medewerker (
    medewerkerID INT AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(medewerkerID)
);