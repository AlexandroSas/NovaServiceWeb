CREATE TABLE IF NOT EXISTS rubrica (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Nome varchar(255) NOT NULL,
    Cognome varchar(255) NOT NULL,
    Telefono varchar(255),
    Cellulare varchar(255),
    Email varchar(255) NOT NULL,
    Attivo bit NOT NULL,
    
    CONSTRAINT unique_rubrica UNIQUE (Nome, Cognome, Email)
);