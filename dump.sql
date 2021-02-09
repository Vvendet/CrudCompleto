CREATE TABLE produto
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    preco DOUBLE(10,2) NOT NULL,
    quantidade INT NOT NULL,
    descricao TEXT,
    dataCadastro DATETIME DEFAULT NOW()
);