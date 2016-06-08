-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql08-farm59.uni5.net
-- Tempo de geração: 08/06/2016 às 09:20
-- Versão do servidor: 5.5.40-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `trajanux`
--
CREATE DATABASE IF NOT EXISTS `trajanux` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trajanux`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE IF NOT EXISTS `tarefas` (
  `data` varchar(100) NOT NULL,
  `mes` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `valor` float NOT NULL,
  `id` varchar(200) NOT NULL,
  `Categoria` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `Item` varchar(300) NOT NULL,
  `banco` text NOT NULL,
  `agenciacontacartao` varchar(500) NOT NULL,
  `tiporegistro` varchar(500) NOT NULL,
  `identificacao` varchar(500) NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=266;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '1',
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=481;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_id`
--

DROP TABLE IF EXISTS `tipo_id`;
CREATE TABLE IF NOT EXISTS `tipo_id` (
  `doc` int(11) NOT NULL,
  `id_tarefa` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_palavras`
--

DROP TABLE IF EXISTS `tipo_palavras`;
CREATE TABLE IF NOT EXISTS `tipo_palavras` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `PHPSESSID` varchar(200) NOT NULL,
  `situacao` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=704 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=103;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_tarefas`
--

DROP TABLE IF EXISTS `tipo_tarefas`;
CREATE TABLE IF NOT EXISTS `tipo_tarefas` (
  `tipo` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=372;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `grupo` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD UNIQUE KEY `doc_3` (`id`) USING BTREE, ADD KEY `doc` (`id`) USING BTREE, ADD KEY `doc_2` (`id`) USING BTREE;

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices de tabela `tipo_id`
--
ALTER TABLE `tipo_id`
  ADD PRIMARY KEY (`doc`) USING BTREE;

--
-- Índices de tabela `tipo_palavras`
--
ALTER TABLE `tipo_palavras`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices de tabela `tipo_tarefas`
--
ALTER TABLE `tipo_tarefas`
  ADD UNIQUE KEY `item` (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de tabela `tipo_palavras`
--
ALTER TABLE `tipo_palavras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=704;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;