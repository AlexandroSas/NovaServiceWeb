CREATE TABLE IF NOT EXISTS lunerti (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    RegistroCarico varchar(255) NOT NULL,
    CreditoImposta double NOT NULL,
    Data date NOT NULL,

    ID_MacchinaReale int NOT NULL,

    CONSTRAINT unique_periodo_possesso UNIQUE (Data, ID_MacchinaReale)
);