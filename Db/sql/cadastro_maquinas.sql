-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2021 às 02:45
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

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
  `cep` varchar(8) NOT NULL,
  `cnpj_vend` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

CREATE TABLE `maquina` (
  `cod_maq` decimal(10,0) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `fases` decimal(3,1) NOT NULL,
  `voltagem` int(11) NOT NULL,
  `amperagem` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `maq` varchar(10) DEFAULT NULL,
  `cnpj_cli` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `cep` varchar(8) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cnpj_vend` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cnpj_cli`),
  ADD KEY `vendedor_cliente_fk` (`cnpj_vend`),
  ADD KEY `regiao_cliente_fk` (`cep`);

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
-- Índices para tabela `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`cep`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cnpj_vend`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lamina`
--
ALTER TABLE `lamina`
  MODIFY `cod_lamina` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `regiao_cliente_fk` FOREIGN KEY (`cep`) REFERENCES `regiao` (`cep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vendedor_cliente_fk` FOREIGN KEY (`cnpj_vend`) REFERENCES `vendedor` (`cnpj_vend`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lamina`
--
ALTER TABLE `lamina`
  ADD CONSTRAINT `maquina_lamina_fk` FOREIGN KEY (`cod_maq`) REFERENCES `maquina` (`cod_maq`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `cliente_maquina_fk` FOREIGN KEY (`cnpj_cli`) REFERENCES `cliente` (`cnpj_cli`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
