CREATE TABLE IF NOT EXISTS macchine (
    ID INT AUTO_INCREMENT PRIMARY KEY,

    Tipologia varchar(255) NOT NULL,
    Produttore varchar(255) NOT NULL,
    Modello varchar(255) NOT NULL,
    
    CONSTRAINT unique_macchine UNIQUE (Tipologia, Produttore, Modello)
);