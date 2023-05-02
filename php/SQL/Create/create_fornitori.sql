CREATE TABLE IF NOT EXISTS fornitori (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Intestazione varchar(255) NOT NULL,
    LinkSito varchar(255),
    UtenzaSito varchar(255),
    PasswordSito varchar(255),
    Attivo bit NOT NULL,

    ID_Indirizzo int NOT NULL,

    CONSTRAINT unique_fornitori UNIQUE (ID_Indirizzo)
);