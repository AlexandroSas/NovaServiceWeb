CREATE TABLE IF NOT EXISTS periodo_possesso (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Data date NOT NULL,

    ID_Sede int NOT NULL,
    ID_MacchinaReale int NOT NULL,

    CONSTRAINT unique_periodo_possesso UNIQUE (Data, ID_MacchinaReale, ID_Sede)
);