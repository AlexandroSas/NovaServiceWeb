CREATE TABLE IF NOT EXISTS rubrica_clienti (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    ID_Sede int NOT NULL,
    ID_Rubrica int NOT NULL,

    CONSTRAINT unique_rubrica_clienti UNIQUE (ID_Sede, ID_Rubrica)
);