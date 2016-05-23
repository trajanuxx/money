-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql08-farm59.uni5.net
-- Tempo de geração: 23/05/2016 às 14:35
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`trajanux`@`%` PROCEDURE `atualizarTempo`(ident INTEGER, tempo FLOAT)
    DETERMINISTIC
BEGIN


     Update organizer_Tarefas t set t.realizado = t.realizado +  tempo where t.id = ident;
     select id_otarefas into @identificador from  organizer_Tarefas ot where ot.id = ident;

  

IF (@identificador <> 0) THEN
   
    call atualizarTempo(@identificador, tempo);

END IF;

   

    END$$

--
-- Funções
--
CREATE DEFINER=`trajanux`@`%` FUNCTION `QuantidadeTotal`(
        `mes` VARCHAR(10),
        `tipo` INTEGER
    ) RETURNS float
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
declare ValorTotal float;
select 
 sum(tarefas.valor) AS total
into ValorTotal from
 tarefas
where
 upper(tarefas.mes) = upper(mes)
 and tarefas.tipo = tipo
 and tarefas.ano = @ano_Referencia
group by tarefas.mes , tarefas.tipo;

RETURN ROUND(ValorTotal,2);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

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
  `identificacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=266;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=481;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_id`
--

CREATE TABLE IF NOT EXISTS `tipo_id` (
  `doc` int(11) NOT NULL,
  `id_tarefa` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_palavras`
--

CREATE TABLE IF NOT EXISTS `tipo_palavras` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `PHPSESSID` varchar(200) NOT NULL,
  `situacao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=630 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=103;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_tarefas`
--

CREATE TABLE IF NOT EXISTS `tipo_tarefas` (
  `tipo` int(11) NOT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=372;

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
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de tabela `tipo_palavras`
--
ALTER TABLE `tipo_palavras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=630;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
