CREATE TABLE IF NOT EXISTS clienti (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Intestazione varchar(255) NOT NULL,
    IVA varchar(255) NOT NULL,
    CF varchar(255) NOT NULL,
    SDI varchar(255) NOT NULL,
    Pec varchar(255) NOT NULL,
    Moroso bit NOT NULL,
    Attivo bit NOT NULL,

    ID_IndirizzoFiscale int NOT NULL,

    CONSTRAINT unique_clienti UNIQUE (ID_IndirizzoFiscale)
);