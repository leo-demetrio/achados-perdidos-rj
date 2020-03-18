-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2020 às 17:26
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `achados_perdidos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id_reg` int(11) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `data_perda` date DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  `nome_documento` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `data_registro` date DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_completo`
--

CREATE TABLE `registro_completo` (
  `id_reg` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `telefone_recado` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_login`
--

CREATE TABLE `registro_login` (
  `id_login` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `data_login` date DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_reg` int(11) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  `nome_proprietario` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`numero_documento`),
  ADD KEY `FK_REGISTRO_DOCUMENTOS` (`id_reg`);

--
-- Índices para tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Índices para tabela `registro_completo`
--
ALTER TABLE `registro_completo`
  ADD KEY `FK_REGISTRO` (`id_reg`);

--
-- Índices para tabela `registro_login`
--
ALTER TABLE `registro_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `FK_REGISTRO_LOGIN` (`id_reg`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `FK_REGISTRO_VEICULOS` (`id_reg`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `registro_login`
--
ALTER TABLE `registro_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `FK_REGISTRO_DOCUMENTOS` FOREIGN KEY (`id_reg`) REFERENCES `registro` (`id_registro`);

--
-- Limitadores para a tabela `registro_completo`
--
ALTER TABLE `registro_completo`
  ADD CONSTRAINT `FK_REGISTRO` FOREIGN KEY (`id_reg`) REFERENCES `registro` (`id_registro`);

--
-- Limitadores para a tabela `registro_login`
--
ALTER TABLE `registro_login`
  ADD CONSTRAINT `FK_REGISTRO_LOGIN` FOREIGN KEY (`id_reg`) REFERENCES `registro` (`id_registro`);

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `FK_REGISTRO_VEICULOS` FOREIGN KEY (`id_reg`) REFERENCES `registro` (`id_registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
