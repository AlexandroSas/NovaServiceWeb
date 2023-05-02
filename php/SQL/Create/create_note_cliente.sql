CREATE TABLE IF NOT EXISTS note_cliente(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    
    ID_Cliente INT NOT NULL,
    ID_Chiamata INT NOT NULL,
    ID_Nota INT NOT NULL,

    CONSTRAINT unique_note_cliente UNIQUE (ID_Cliente, ID_Chiamata, ID_Nota)
);