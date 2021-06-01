-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2021 às 22:55
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro_maquinas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cnpj_cli` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `qtd_maq` int(11) DEFAULT NULL,
  `cnpj_vend` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cnpj_cli`, `nome`, `qtd_maq`, `cnpj_vend`) VALUES
('1234', 'Joao4', 3, '123'),
('1235', 'jao1', 3, '123'),
('55550', 'cu', 3, '123555'),
('88', 'jao222', 3, '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lamina`
--

CREATE TABLE `lamina` (
  `cod_lamina` int(11) NOT NULL,
  `afiacao` varchar(50) NOT NULL,
  `diam_externo` varchar(10) NOT NULL,
  `diam_interno` varchar(10) NOT NULL,
  `cod_maq` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lamina`
--

INSERT INTO `lamina` (`cod_lamina`, `afiacao`, `diam_externo`, `diam_interno`, `cod_maq`) VALUES
(55, 'Serrilhada', '420', '57', '50'),
(98, 'Serrilhada', '300', '58', '50'),
(150, 'Lisa', '420', '58', '12345'),
(151, 'Lisa', '420', '58', '50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

CREATE TABLE `maquina` (
  `cod_maq` decimal(10,0) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `fases` int(3) NOT NULL,
  `voltagem` int(11) NOT NULL,
  `amperagem` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `maq` varchar(10) DEFAULT NULL,
  `cnpj_cli` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `maquina`
--

INSERT INTO `maquina` (`cod_maq`, `modelo`, `fases`, `voltagem`, `amperagem`, `peso`, `maq`, `cnpj_cli`) VALUES
('50', 'FT-250', 3, 220, '25', '400', '49', '1235'),
('550', 'FT-250', 3, 380, '45', '450', '35', '88'),
('551', 'FTI-250', 3, 380, '45', '450', '35', '1234'),
('552', 'FTI-600', 1, 220, '25', '300', '20', '1234'),
('12345', 'FTI-250', 3, 220, '25', '400', '48', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cnpj_vend` varchar(18) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`cnpj_vend`, `nome`) VALUES
('123', 'baaLKKKkk'),
('123555', 'teste'),
('134124341231', '454545ESDaaaaa'),
('37.337.264/0001-39', 'Filipe3'),
('37.337.264/0001-45', 'Daniel'),
('sgsdfgdsfsdf', 'Daniel');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cnpj_cli`),
  ADD KEY `vendedor_cliente_fk` (`cnpj_vend`);

--
-- Índices para tabela `lamina`
--
ALTER TABLE `lamina`
  ADD PRIMARY KEY (`cod_lamina`),
  ADD KEY `maquina_lamina_fk` (`cod_maq`);

--
-- Índices para tabela `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`cod_maq`),
  ADD KEY `cliente_maquina_fk` (`cnpj_cli`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cnpj_vend`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `vendedor_cliente_fk` FOREIGN KEY (`cnpj_vend`) REFERENCES `vendedor` (`cnpj_vend`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `lamina`
--
ALTER TABLE `lamina`
  ADD CONSTRAINT `maquina_lamina_fk` FOREIGN KEY (`cod_maq`) REFERENCES `maquina` (`cod_maq`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `cliente_maquina_fk` FOREIGN KEY (`cnpj_cli`) REFERENCES `cliente` (`cnpj_cli`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
