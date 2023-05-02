CREATE TABLE IF NOT EXISTS contatori (
    ID INT AUTO_INCREMENT PRIMARY KEY,

    Tipologia char NOT NULL,
    Contatore int NOT NULL,
    Data date NOT NULL,

    ID_MacchinaReale int NOT NULL,

    CONSTRAINT unique_contatori UNIQUE (ID_MacchinaReale, Contatore, Tipologia)
);