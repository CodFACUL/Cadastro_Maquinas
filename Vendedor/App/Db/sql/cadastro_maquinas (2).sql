-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2021 às 02:43
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
  `cnpj_cli` varchar(18) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `qtd_maq` int(11) DEFAULT NULL,
  `cnpj_vend` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cnpj_cli`, `nome`, `qtd_maq`, `cnpj_vend`) VALUES
('37.337.264/0001-82', 'Tirol', 1, '37.337.264/0001-39'),
('37.337.264/0001-85', 'Pamplona', 0, '37.337.264/0001-39'),
('37.337.264/0001-90', 'Lactovale', 2, '37.337.264/0001-45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lamina`
--

CREATE TABLE `lamina` (
  `cod_lamina` int(11) NOT NULL,
  `afiacao` varchar(50) NOT NULL,
  `diam_externo` varchar(10) NOT NULL,
  `diam_interno` varchar(10) NOT NULL,
  `cod_maq` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lamina`
--

INSERT INTO `lamina` (`cod_lamina`, `afiacao`, `diam_externo`, `diam_interno`, `cod_maq`) VALUES
(420, 'Lisa', '300', '57', '4020-370-430'),
(425, 'Serrilhada', '420', '58', '4020-370-410'),
(430, 'Lisa', '420', '57', '4020-370-400');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

CREATE TABLE `maquina` (
  `cod_maq` varchar(20) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `fases` int(3) NOT NULL,
  `voltagem` int(11) NOT NULL,
  `amperagem` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `maq` varchar(10) DEFAULT NULL,
  `cnpj_cli` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `maquina`
--

INSERT INTO `maquina` (`cod_maq`, `modelo`, `fases`, `voltagem`, `amperagem`, `peso`, `maq`, `cnpj_cli`) VALUES
('4020-370-400', 'FT-600', 3, 380, '45', '1000', '20', '37.337.264/0001-90'),
('4020-370-410', 'FT-250', 1, 220, '25', '450', '21', '37.337.264/0001-82'),
('4020-370-430', 'FT-250', 1, 220, '25', '450', '22', '37.337.264/0001-90');

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
('37.337.264/0001-39', 'Daniel'),
('37.337.264/0001-45', 'Filipe'),
('37.337.264/0001-69', 'Julio');

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
