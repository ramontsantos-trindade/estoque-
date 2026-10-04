CREATE DATABASE IF NOT EXISTS estoque CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE estoque;

CREATE TABLE IF NOT EXISTS produtos (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100)  NOT NULL,
    categoria     VARCHAR(50)   NOT NULL,
    descricao     TEXT,
    preco         DECIMAL(10,2) NOT NULL,
    quantidade    INT           NOT NULL DEFAULT 0,
    data_validade DATE          NOT NULL
);

INSERT INTO produtos (nome, categoria, descricao, preco, quantidade, data_validade) VALUES
('Arroz 5kg', 'Mercearia', 'Arroz branco tipo 1', 27.90, 40, '2027-03-15'),
('Leite 1L', 'Laticínios', 'Leite integral UHT', 5.49, 120, '2026-12-10');