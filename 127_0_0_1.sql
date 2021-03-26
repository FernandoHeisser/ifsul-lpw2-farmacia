-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 06-Out-2018 às 23:25
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmacia`
--
CREATE DATABASE IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `farmacia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cli` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cli`, `endereco`, `bairro`, `estado`, `cidade`, `telefone`, `cpf`, `email`) VALUES
(3, 'FERNANDO COSTA HEISSER', 'Rua PatrÃ­cio Pinheiro Ferreira', 'Centro', 'RS', 'Charqueadas', '51995258425', '123', 'fernando.heisserch@gmail.com'),
(5, 'GIOVANA COSTA HEISSER', 'Rua PatrÃ­cio Pinheiro Ferreira', 'Centro', 'RS', 'Charqueadas', '51995258425', '983', 'giovana.heisser@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `cod_med` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(45) NOT NULL,
  `laboratorio` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `lote` varchar(45) NOT NULL,
  `data_fabr` date NOT NULL,
  `data_validade` date NOT NULL,
  `custo` decimal(9,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`cod_med`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`cod_med`, `nome_prod`, `laboratorio`, `descricao`, `lote`, `data_fabr`, `data_validade`, `custo`, `quantidade`) VALUES
(3, 'Rivotril', 'Multilab', 'Forte', 'lote001', '2018-10-23', '2019-10-23', '8.00', 10),
(4, 'Paracetamol', 'Multilab', 'AnalgÃ©sico', 'lote002', '2018-01-23', '2019-01-23', '5.00', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `numero_venda` int(11) NOT NULL AUTO_INCREMENT,
  `cod_med` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `percentual_venda` decimal(2,2) NOT NULL,
  `preco_venda` decimal(9,2) NOT NULL,
  `quantidade_vendida` int(11) NOT NULL,
  PRIMARY KEY (`numero_venda`),
  KEY `fk_cod_med` (`cod_med`),
  KEY `fk_id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`numero_venda`, `cod_med`, `id_cliente`, `data_venda`, `percentual_venda`, `preco_venda`, `quantidade_vendida`) VALUES
(1, 1, 1, '2018-10-06', '0.20', '23.00', 1),
(2, 2, 2, '2018-10-06', '0.30', '10.00', 2),
(3, 3, 3, '2018-03-21', '0.10', '5.00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
