CREATE TABLE IF NOT EXISTS utenti (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    Nome VARCHAR(255) NOT NULL,
    Cognome VARCHAR(255) NOT NULL,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Cellulare VARCHAR(255),
    Ruolo VARCHAR(255) NOT NULL,

    CONSTRAINT unique_utenti_username UNIQUE (Username),
    CONSTRAINT unique_utenti_email UNIQUE (Email)
);