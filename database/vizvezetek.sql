-- ********************************************************
-- database es tablak letrehozasa

CREATE DATABASE vizvezetek_szerelok;
USE vizvezetek_szerelok;

CREATE TABLE szerelo (
    az INT PRIMARY KEY AUTO_INCREMENT,       
    nev VARCHAR(100),             
    kezdev INT                    
);

CREATE TABLE hely (
    az INT PRIMARY KEY AUTO_INCREMENT,           
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
    munkalapaz TEXT,        
    jogosultsag varchar(3) NOT NULL DEFAULT '_1_'              
);

INSERT INTO `felhasznalo` (`felhasznalonev`, `keresztnev`, `vezeteknev`, `jelszo`, `munkalapaz`, `jogosultsag`)
VALUES
('Rendszer', 'Admin', 'Admin', sha1('admin'), NULL, '__1'),
('p.sandor', 'Sándor', 'Petőfi', sha1('login1'), '1', '_1_'),
('a.janos', 'János', 'Arany', sha1('login2'), NULL, '_1_');


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
('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 40),
('belepes', 'Belépés', '', '100', 60),
('regisztracio', 'Regisztráció', '', '100', 59),
('munkalapok', 'Munkalapok', '', '111', 20),
('kiegeszitesek', 'Kiegészítések', 'elerhetoseg', '011', 50),
('kilepes', 'Kilépés', '', '011', 70),
('szerelok', 'Szerelők', '', '011', 30),
('megrendeles', 'Megrendelés', '', '011', 90),
('felhasznalok', 'Felhasználók', '', '001', 1),
('megrendelesek', 'Megrendelések', '', '011', 2),
('arfolyamok', 'Árfolyamok', '', '001', 3),
('importalas', 'Importálás', '', '001', 4),
('nyitolap', 'Nyitólap', '', '111', 10);



-- ********************************************************
-- megrendeles tabla letrehozasa es feltoltese adatokkal
CREATE TABLE megrendeles (
    az INT PRIMARY KEY AUTO_INCREMENT,          
    felhasznaloaz INT,                          
    helyaz INT,                                 
    leiras TEXT,                                
    szereloaz INT,                              
    FOREIGN KEY (felhasznaloaz) REFERENCES felhasznalo(az) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (helyaz) REFERENCES hely(az) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (szereloaz) REFERENCES szerelo(az) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `megrendeles` (`felhasznaloaz`, `helyaz`, `leiras`, `szereloaz`)
VALUES
('2', '7', 'Lorem ipsum lorem ipsum lorem ipsum', '1'),
('3', '8', 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2');