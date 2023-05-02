CREATE TABLE IF NOT EXISTS macchine_reali (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    CespiteFiscale int,
    Matricola varchar(255),

    ID_Macchina int NOT NULL,

    CONSTRAINT unique_macchine_reali UNIQUE (ID_Macchina, Matricola)
);