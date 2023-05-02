CREATE TABLE IF NOT EXISTS rubrica_fornitori (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    ID_Fornitore int NOT NULL,
    ID_Rubrica int NOT NULL,

    CONSTRAINT unique_rubrica_fornitori UNIQUE (ID_Fornitore, ID_Rubrica)
);