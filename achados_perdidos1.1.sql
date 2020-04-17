-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2020 às 14:46
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id_reg`, `numero_documento`, `tipo_documento`, `data_perda`, `data_registro`, `nome_documento`, `situacao`) VALUES
(2, '22222222', 'Habilitacao', '2020-04-07', '2011-04-20', 'livro de culinaria', 'roubado'),
(2, '232433', 'cpf', '0000-00-00', '2011-04-20', 'livro de finanças', 'roubado'),
(2, '77777777', 'identidade', '2020-04-08', '2011-04-20', 'Batman Arkahan City', 'furtado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos_achados`
--

CREATE TABLE `documentos_achados` (
  `id_reg` int(11) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `data_perda` date DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  `nome_documento` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `documentos_achados`
--

INSERT INTO `documentos_achados` (`id_reg`, `numero_documento`, `tipo_documento`, `data_perda`, `data_registro`, `nome_documento`, `situacao`) VALUES
(2, '22222222', 'identidade', '0000-00-00', '2016-04-20', '', 'achado'),
(2, '22222222', 'identidade', '0000-00-00', '2016-04-20', '', 'achado'),
(2, '232433', 'identidade', '0000-00-00', '2016-04-20', '', 'achado'),
(2, '232433', 'identidade', '0000-00-00', '2016-04-20', '', 'achado'),
(2, '77777777', 'identidade', '2020-04-07', '2016-04-20', 'livro de culinaria', 'achado'),
(2, '77777777', 'identidade', '2020-04-07', '2016-04-20', 'livro de culinaria', 'achado'),
(2, '77777777', 'identidade', '2020-04-07', '2016-04-20', 'livro de culinaria', 'achado');

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

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`email`, `senha`, `id_registro`, `data_registro`, `ip`) VALUES
('leocdemetrio@yahoo.com.br', '$argon2i$v=19$m=65536,t=4,p=1$NHl1dnhlQnhGeVEvaVNq', 2, '2011-04-20', '127.0.0.1');

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

--
-- Extraindo dados da tabela `registro_completo`
--

INSERT INTO `registro_completo` (`id_reg`, `nome`, `telefone`, `telefone_recado`, `email`) VALUES
(2, 'Leo', '21986965590', '21986965590', 'leocdemetrio@yahoo.com.br');

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
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_reg`, `placa`, `modelo`, `cor`, `data_registro`, `nome_proprietario`, `situacao`) VALUES
(2, '22222222', 'fusca', 'dourado', '2014-04-20', 'Leo', 'furtado');

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
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
