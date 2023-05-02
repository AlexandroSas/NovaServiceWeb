CREATE TABLE IF NOT EXISTS chiamate (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Data_Inserimento DATETIME NOT NULL,
    Descrizione varchar(255) NOT NULL,
    Priorità TINYINT NOT NULL,
    Appuntamento DATETIME,
    Status CHAR NOT NULL
    ++,
    ID_Macchina INT NOT NULL,
    ID_Tecnico INT,
    ID_Assistente INT NOT NULL,

    CONSTRAINT unique_chiamate UNIQUE (Descrizione, Data_Inserimento, ID_Macchina)
);