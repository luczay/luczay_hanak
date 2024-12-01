
CREATE TABLE `vizvezetekdb`.szerelo (
    az INT PRIMARY KEY,       
    nev VARCHAR(100),             
    kezdev INT                    
);

CREATE TABLE `vizvezetekdb`.hely (
    az INT PRIMARY KEY,           
    telepules VARCHAR(100),       
    utca VARCHAR(255)             
);

CREATE TABLE `vizvezetekdb`.munkalap (
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

