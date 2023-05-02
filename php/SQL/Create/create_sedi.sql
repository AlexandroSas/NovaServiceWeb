CREATE TABLE IF NOT EXISTS sedi (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Intestazione varchar(255) NOT NULL,
    Attiva bit NOT NULL,

    ID_Indirizzo int NOT NULL,
    ID_Cliente int NOT NULL,

    CONSTRAINT unique_sedi UNIQUE (ID_Indirizzo, ID_Cliente)
);