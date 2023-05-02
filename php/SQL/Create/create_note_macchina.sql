CREATE TABLE IF NOT EXISTS note_macchina(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    ID_Macchina INT NOT NULL,
    ID_Nota INT NOT NULL,

    CONSTRAINT unique_note_macchina UNIQUE (ID_Macchina, ID_Nota)
);