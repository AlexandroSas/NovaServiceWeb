CREATE TABLE IF NOT EXISTS orari (
    ID INT AUTO_INCREMENT PRIMARY KEY,

    Apertura TIME NOT NULL,
    Chiusura TIME NOT NULL,
    ID_Sede INT NOT NULL,
    
    CONSTRAINT unique_orari UNIQUE (Apertura, Chiusura, ID_Sede)
);