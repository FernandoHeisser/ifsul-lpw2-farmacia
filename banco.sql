CREATE DATABASE farmacia;
USE farmacia;

CREATE TABLE medicamento(
	cod_med INT PRIMARY KEY AUTO_INCREMENT,
    nome_prod VARCHAR(45) NOT NULL,
    laboratorio VARCHAR(45) NOT NULL,
    descricao VARCHAR(45) NOT NULL,
    lote VARCHAR(45) NOT NULL,
    data_fabr DATE NOT NULL,
    data_validade DATE NOT NULL,
    custo DECIMAL(9,2) NOT NULL,
    quantidade INT NOT NULL
);

CREATE TABLE cliente(
	id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome_cli VARCHAR(45) NOT NULL,
    endereco VARCHAR(45) NOT NULL,
    bairro VARCHAR(45) NOT NULL,
    estado VARCHAR(45) NOT NULL,
    cidade VARCHAR(45) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(45) NOT NULL
);

CREATE TABLE venda(
	numero_venda INT PRIMARY KEY AUTO_INCREMENT,
    cod_med INT NOT NULL,
    id_cliente INT NOT NULL,
    data_venda DATE NOT NULL,
    percentual_venda DECIMAL(2,2) NOT NULL,
    preco_venda DECIMAL(9,2) NOT NULL,
    quantidade_vendida INT NOT NULL,
    FOREIGN KEY fk_cod_med (cod_med) REFERENCES medicamento (cod_med),
    FOREIGN KEY fk_id_cliente (id_cliente) REFERENCES cliente (id_cliente)
);