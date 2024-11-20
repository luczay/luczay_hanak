-- ********************************************************
-- database es tablak letrehozasa

CREATE DATABASE vizvezetek_szerelok;
USE vizvezetek_szerelok;

CREATE TABLE szerelo (
    az INT PRIMARY KEY,       
    nev VARCHAR(100),             
    kezdev INT                    
);

CREATE TABLE hely (
    az INT PRIMARY KEY,           
    telepules VARCHAR(100),       
    utca VARCHAR(255)             
);

CREATE TABLE munkalap (
    az INT PRIMARY KEY AUTO_INCREMENT,    
    bedatum DATE,                         
    javdatum DATE,                        
    helyaz INT,                           
    szereloaz INT,                        
    munkaora INT,                         
    anyagar INT,                          
    FOREIGN KEY (helyaz) REFERENCES hely(az),           
    FOREIGN KEY (szereloaz) REFERENCES szerelo(az)      
);

-- ********************************************************
-- fajlok betoltese

-- a txt fajlokat az alabbi helyre kell masolni (xampp eseten): C:\xampp\mysql\data\vizvezetek_szerelok !!!!!!!!
LOAD DATA INFILE 'szerelo.txt'
INTO TABLE szerelo
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(az, nev, kezdev);

LOAD DATA INFILE 'hely.txt'
INTO TABLE hely
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(az, telepules, utca);

LOAD DATA INFILE 'munkalap.txt'
INTO TABLE munkalap
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(bedatum, javdatum, helyaz, szereloaz, munkaora, anyagar);