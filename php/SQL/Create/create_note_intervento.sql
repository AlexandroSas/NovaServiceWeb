CREATE TABLE IF NOT EXISTS note_intervento(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    ID_Intervento INT NOT NULL,
    ID_Nota INT NOT NULL,

    CONSTRAINT unique_note_intervento UNIQUE (ID_Intervento, ID_Nota)
);