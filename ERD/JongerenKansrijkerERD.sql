CREATE DATABASE JongerenKansrijker;

USE JongerenKansrijker;

CREATE TABLE activiteit (
	activiteitcode VARCHAR(3) AUTO_INCREMENT NOT NULL,
    activiteit VARCHAR(40) NOT NULL,
    PRIMARY KEY(activiteitcode)
);

CREATE TABLE instituut (
    instituutscode VARCHAR(5) AUTO_INCREMENT NOT NULL,
    instituut VARCHAR(40) NOT NULL,
    insituuttelefoon VARCHAR(11),
    PRIMARY KEY(instituutscode)
);

CREATE TABLE jongere (
    jongerecode VARCHAR(5) AUTO_INCREMENT NOT NULL,
    roepnaam VARCHAR(20) NOT NULL,
    tussenvoegsel VARCHAR(7),
    achternaam VARCHAR(25) NOT NULL,
    inschrijfdatum DATE NOT NULL,
    PRIMARY KEY(jongerecode)
);

CREATE TABLE jongereinstituut (
    jongereinstituutcode VARCHAR(25) AUTO_INCREMENT NOT NULL,
    jongerecode VARCHAR(5) NOT NULL,
    instituutscode VARCHAR(5) NOT NULL,
    startdatum DATE NOT NULL,
    PRIMARY KEY(jongereinstituutcode),
    FOREIGN KEY(jongerecode) REFERENCES jongere(jongerecode),
    FOREIGN KEY(instituutscode) REFERENCES instituut(instituutscode)
);

CREATE TABLE jongereactiviteit (
    jongereactiviteitcode VARCHAR(25) AUTO_INCREMENT NOT NULL,
    jongerecode VARCHAR(5) NOT NULL,
    activiteitcode VARCHAR(3) NOT NULL,
    startdatum DATE NOT NULL,
    afgerond TINYINT(1) NOT NULL,
    PRIMARY KEY(jongereactiviteitcode),
    FOREIGN KEY(jongerecode) REFERENCES jongere(jongerecode),
    FOREIGN KEY(activiteitcode) REFERENCES activiteit(activiteitcode)
);