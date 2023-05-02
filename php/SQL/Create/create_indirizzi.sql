CREATE TABLE IF NOT EXISTS indirizzi (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Indirizzo varchar(255) NOT NULL,
    Città varchar(255) NOT NULL,
    Provincia char(2) NOT NULL,
    CAP int NOT NULL,

    CONSTRAINT unique_indirizzi UNIQUE (Indirizzo, Città, Provincia, CAP)
);