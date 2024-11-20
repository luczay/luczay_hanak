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


-- ********************************************************
-- felhasznalo tabla letrehozasa es feltoltese adatokkal

CREATE TABLE felhasznalo (
    az INT PRIMARY KEY AUTO_INCREMENT,
    felhasznalonev VARCHAR(50),    
    keresztnev VARCHAR(50),     
    vezeteknev VARCHAR(70),  
    jelszo varchar(40) NOT NULL DEFAULT '',         
    munkalapaz INT,        
    jogosultsag varchar(3) NOT NULL DEFAULT '_1_',               
    FOREIGN KEY (munkalapaz) REFERENCES munkalap(az)     
);

INSERT INTO `felhasznalo` (`felhasznalonev`, `keresztnev`, `vezeteknev`, `jelszo`, `munkalapaz`, `jogosultsag`)
VALUES
('Rendszer', 'Admin', 'Admin', sha1('admin'), NULL, '__1'),
('p.sandor', 'Sándor', 'Petőfi', sha1('login1'), 1, '_1_');


-- ********************************************************
-- menu tabla letrehozasa es feltoltese adatokkal
CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('admin', 'Admin', '', '001', 80),
('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 40),
('belepes', 'Belépés', '', '100', 60),
('munkalapok', 'Munkalapok', '011', '111', 20),
('kiegeszitesek', 'Kiegészítések', 'elerhetoseg', '011', 50),
('kilepes', 'Kilépés', '', '011', 70),
('szerelok', 'Szerelők', '', '011', 30),
('megrendeles', 'Megrendelés', '', '011', 90),
('megrendelesek', 'Megrendelések', '', '001', 1),
('nyitolap', 'Nyitólap', '', '111', 10);