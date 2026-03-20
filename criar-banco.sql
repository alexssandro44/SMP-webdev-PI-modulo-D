.open database.db
.mode column

--------------------- SALAS ---------------------------
DROP TABLE IF EXISTS salas;

CREATE TABLE salas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    bloco TEXT NOT NULL
);

------------------------------------------------------


--------------------- PCS -----------------------------
DROP TABLE IF EXISTS pcs;

CREATE TABLE pcs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sala_id INTEGER NOT NULL,
    numero INTEGER NOT NULL, -- PC 1, PC 2...

    modelo TEXT,
    patrimonio TEXT,
    monitor TEXT,
    modelo_monitor TEXT,
    ponto_rede TEXT,
    imagem TEXT,

    status TEXT DEFAULT 'ativo', -- ativo, manutencao, irregular
    
    FOREIGN KEY (sala_id) REFERENCES salas(id) ON DELETE CASCADE
    FOREIGN KEY (sala_id) REFERENCES salas(id)
);

------------------------------------------------------
