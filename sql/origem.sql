-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2016 às 19:20
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `origem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acabamento`
--

CREATE TABLE IF NOT EXISTS `acabamento` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acabamento_2`
--

CREATE TABLE IF NOT EXISTS `acabamento_2` (
`id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pessoa_tipo` tinyint(1) DEFAULT NULL,
  `cnpj_cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL,
  `im` varchar(20) DEFAULT NULL,
  `observacao` text,
  `contato_nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faca`
--

CREATE TABLE IF NOT EXISTS `faca` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faca_cartao`
--

CREATE TABLE IF NOT EXISTS `faca_cartao` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotolito`
--

CREATE TABLE IF NOT EXISTS `fotolito` (
`id` int(11) NOT NULL,
  `impressao_formato` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frete`
--

CREATE TABLE IF NOT EXISTS `frete` (
`id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressao`
--

CREATE TABLE IF NOT EXISTS `impressao` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `impressao_formato` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressao_cartao`
--

CREATE TABLE IF NOT EXISTS `impressao_cartao` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `impressao_formato` int(11) NOT NULL,
  `valor_100` decimal(10,2) NOT NULL,
  `valor_500` decimal(10,2) NOT NULL,
  `valor_1000` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressao_formato`
--

CREATE TABLE IF NOT EXISTS `impressao_formato` (
`id` int(11) NOT NULL,
  `altura` int(5) NOT NULL,
  `largura` int(5) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laminacao`
--

CREATE TABLE IF NOT EXISTS `laminacao` (
`id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
`id` int(11) NOT NULL,
  `data_orcamento` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `frete_id` int(11) DEFAULT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `frete_personalizado` decimal(10,2) DEFAULT NULL,
  `nota_fiscal_id` int(11) NOT NULL,
  `valor_nota_fiscal` decimal(10,2) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `pagamento` text,
  `prazo` text,
  `observacao` text,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `papel`
--

CREATE TABLE IF NOT EXISTS `papel` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `gramatura` int(3) NOT NULL,
  `altura` int(5) NOT NULL,
  `largura` int(5) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
`id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_acabamento`
--

CREATE TABLE IF NOT EXISTS `servico_acabamento` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `acabamento_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `acabamento_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_acabamento_2`
--

CREATE TABLE IF NOT EXISTS `servico_acabamento_2` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `acabamento_2_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_colagem`
--

CREATE TABLE IF NOT EXISTS `servico_colagem` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `colagem_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca`
--

CREATE TABLE IF NOT EXISTS `servico_faca` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_id` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `faca_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_faca_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_cartao_id` int(11) NOT NULL,
  `faca_cartao_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_impressao`
--

CREATE TABLE IF NOT EXISTS `servico_impressao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `impressao_id` int(11) NOT NULL,
  `impressao_valor` decimal(10,2) NOT NULL,
  `fotolito_id` int(11) NOT NULL,
  `fotolito_valor` decimal(10,2) NOT NULL,
  `impressao_formato_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_impressao_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_impressao_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `impressao_cartao_id` int(11) NOT NULL,
  `impressao_formato_id` int(11) NOT NULL,
  `impressao_cartao_valor_100` decimal(10,2) NOT NULL,
  `fotolito_valor` decimal(10,2) NOT NULL,
  `fotolito_id` int(11) NOT NULL,
  `qtd_cor_frente` int(11) NOT NULL,
  `qtd_cor_verso` int(11) NOT NULL,
  `impressao_cartao_valor_500` decimal(10,2) NOT NULL,
  `impressao_cartao_valor_1000` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_laminacao`
--

CREATE TABLE IF NOT EXISTS `servico_laminacao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `laminacao_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_papel`
--

CREATE TABLE IF NOT EXISTS `servico_papel` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `papel_id` int(11) NOT NULL,
  `empastamento_valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `empastamento_status` tinyint(1) NOT NULL,
  `papel_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acabamento`
--
ALTER TABLE `acabamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acabamento_2`
--
ALTER TABLE `acabamento_2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faca`
--
ALTER TABLE `faca`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faca_cartao`
--
ALTER TABLE `faca_cartao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotolito`
--
ALTER TABLE `fotolito`
 ADD PRIMARY KEY (`id`,`impressao_formato`), ADD UNIQUE KEY `impressao_formato` (`impressao_formato`);

--
-- Indexes for table `frete`
--
ALTER TABLE `frete`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impressao`
--
ALTER TABLE `impressao`
 ADD PRIMARY KEY (`id`,`impressao_formato`), ADD KEY `impressao_formato` (`impressao_formato`);

--
-- Indexes for table `impressao_cartao`
--
ALTER TABLE `impressao_cartao`
 ADD PRIMARY KEY (`id`), ADD KEY `impressao_formato` (`impressao_formato`);

--
-- Indexes for table `impressao_formato`
--
ALTER TABLE `impressao_formato`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laminacao`
--
ALTER TABLE `laminacao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
 ADD PRIMARY KEY (`id`,`servico_id`,`cliente_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `frete_id` (`frete_id`), ADD KEY `nota_fiscal_id` (`nota_fiscal_id`), ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `papel`
--
ALTER TABLE `papel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
 ADD PRIMARY KEY (`id`,`servico_id`,`acabamento_id`), ADD KEY `acabamento_id` (`acabamento_id`), ADD KEY `servico_id` (`servico_id`);

--
-- Indexes for table `servico_acabamento_2`
--
ALTER TABLE `servico_acabamento_2`
 ADD PRIMARY KEY (`id`,`servico_id`,`acabamento_2_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `acabamento_2_id` (`acabamento_2_id`);

--
-- Indexes for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
 ADD PRIMARY KEY (`id`,`servico_id`), ADD KEY `servico_id` (`servico_id`);

--
-- Indexes for table `servico_faca`
--
ALTER TABLE `servico_faca`
 ADD PRIMARY KEY (`id`,`servico_id`,`faca_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `faca_id` (`faca_id`);

--
-- Indexes for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
 ADD PRIMARY KEY (`id`,`servico_id`,`faca_cartao_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `faca_cartao_id` (`faca_cartao_id`);

--
-- Indexes for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
 ADD PRIMARY KEY (`id`,`servico_id`,`impressao_id`,`fotolito_id`,`impressao_formato_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `impressao_id` (`impressao_id`), ADD KEY `fotolito_id` (`fotolito_id`), ADD KEY `impressao_formato_id` (`impressao_formato_id`);

--
-- Indexes for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
 ADD PRIMARY KEY (`id`,`servico_id`,`impressao_cartao_id`,`impressao_formato_id`,`fotolito_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `impressao_cartao_id` (`impressao_cartao_id`), ADD KEY `fotolito_id` (`fotolito_id`), ADD KEY `impressao_formato_id` (`impressao_formato_id`);

--
-- Indexes for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
 ADD PRIMARY KEY (`id`,`servico_id`,`laminacao_id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `laminacao_id` (`laminacao_id`);

--
-- Indexes for table `servico_papel`
--
ALTER TABLE `servico_papel`
 ADD PRIMARY KEY (`id`), ADD KEY `servico_id` (`servico_id`), ADD KEY `papel_id` (`papel_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acabamento`
--
ALTER TABLE `acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acabamento_2`
--
ALTER TABLE `acabamento_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `faca`
--
ALTER TABLE `faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faca_cartao`
--
ALTER TABLE `faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fotolito`
--
ALTER TABLE `fotolito`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `frete`
--
ALTER TABLE `frete`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impressao`
--
ALTER TABLE `impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impressao_cartao`
--
ALTER TABLE `impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `impressao_formato`
--
ALTER TABLE `impressao_formato`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `laminacao`
--
ALTER TABLE `laminacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `servico_acabamento_2`
--
ALTER TABLE `servico_acabamento_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `servico_faca`
--
ALTER TABLE `servico_faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `servico_papel`
--
ALTER TABLE `servico_papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fotolito`
--
ALTER TABLE `fotolito`
ADD CONSTRAINT `fotolito_ibfk_1` FOREIGN KEY (`impressao_formato`) REFERENCES `impressao_formato` (`id`),
ADD CONSTRAINT `fotolito_ibfk_2` FOREIGN KEY (`impressao_formato`) REFERENCES `impressao_formato` (`id`);

--
-- Limitadores para a tabela `impressao`
--
ALTER TABLE `impressao`
ADD CONSTRAINT `impressao_ibfk_1` FOREIGN KEY (`impressao_formato`) REFERENCES `impressao_formato` (`id`);

--
-- Limitadores para a tabela `impressao_cartao`
--
ALTER TABLE `impressao_cartao`
ADD CONSTRAINT `impressao_cartao_ibfk_1` FOREIGN KEY (`impressao_formato`) REFERENCES `impressao_formato` (`id`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
ADD CONSTRAINT `orcamento_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `orcamento_ibfk_10` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `nota` (`id`),
ADD CONSTRAINT `orcamento_ibfk_11` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
ADD CONSTRAINT `orcamento_ibfk_2` FOREIGN KEY (`frete_id`) REFERENCES `frete` (`id`),
ADD CONSTRAINT `orcamento_ibfk_3` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `orcamento_ibfk_4` FOREIGN KEY (`frete_id`) REFERENCES `frete` (`id`),
ADD CONSTRAINT `orcamento_ibfk_5` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `orcamento_ibfk_6` FOREIGN KEY (`frete_id`) REFERENCES `frete` (`id`),
ADD CONSTRAINT `orcamento_ibfk_7` FOREIGN KEY (`nota_fiscal_id`) REFERENCES `nota` (`id`),
ADD CONSTRAINT `orcamento_ibfk_8` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `orcamento_ibfk_9` FOREIGN KEY (`frete_id`) REFERENCES `frete` (`id`);

--
-- Limitadores para a tabela `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
ADD CONSTRAINT `servico_acabamento_ibfk_1` FOREIGN KEY (`acabamento_id`) REFERENCES `acabamento` (`id`),
ADD CONSTRAINT `servico_acabamento_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`);

--
-- Limitadores para a tabela `servico_acabamento_2`
--
ALTER TABLE `servico_acabamento_2`
ADD CONSTRAINT `servico_acabamento_2_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_acabamento_2_ibfk_2` FOREIGN KEY (`acabamento_2_id`) REFERENCES `acabamento_2` (`id`);

--
-- Limitadores para a tabela `servico_colagem`
--
ALTER TABLE `servico_colagem`
ADD CONSTRAINT `servico_colagem_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`);

--
-- Limitadores para a tabela `servico_faca`
--
ALTER TABLE `servico_faca`
ADD CONSTRAINT `servico_faca_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_faca_ibfk_2` FOREIGN KEY (`faca_id`) REFERENCES `faca` (`id`);

--
-- Limitadores para a tabela `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
ADD CONSTRAINT `servico_faca_cartao_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_faca_cartao_ibfk_2` FOREIGN KEY (`faca_cartao_id`) REFERENCES `faca_cartao` (`id`);

--
-- Limitadores para a tabela `servico_impressao`
--
ALTER TABLE `servico_impressao`
ADD CONSTRAINT `servico_impressao_ibfk_1` FOREIGN KEY (`impressao_id`) REFERENCES `impressao` (`id`),
ADD CONSTRAINT `servico_impressao_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_impressao_ibfk_3` FOREIGN KEY (`impressao_id`) REFERENCES `impressao` (`id`),
ADD CONSTRAINT `servico_impressao_ibfk_4` FOREIGN KEY (`fotolito_id`) REFERENCES `fotolito` (`id`),
ADD CONSTRAINT `servico_impressao_ibfk_5` FOREIGN KEY (`impressao_formato_id`) REFERENCES `impressao_formato` (`id`);

--
-- Limitadores para a tabela `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
ADD CONSTRAINT `servico_impressao_cartao_ibfk_1` FOREIGN KEY (`impressao_cartao_id`) REFERENCES `impressao_cartao` (`id`),
ADD CONSTRAINT `servico_impressao_cartao_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_impressao_cartao_ibfk_3` FOREIGN KEY (`impressao_cartao_id`) REFERENCES `impressao_cartao` (`id`),
ADD CONSTRAINT `servico_impressao_cartao_ibfk_4` FOREIGN KEY (`fotolito_id`) REFERENCES `fotolito` (`id`),
ADD CONSTRAINT `servico_impressao_cartao_ibfk_5` FOREIGN KEY (`impressao_formato_id`) REFERENCES `impressao_formato` (`id`);

--
-- Limitadores para a tabela `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
ADD CONSTRAINT `servico_laminacao_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_laminacao_ibfk_2` FOREIGN KEY (`laminacao_id`) REFERENCES `laminacao` (`id`);

--
-- Limitadores para a tabela `servico_papel`
--
ALTER TABLE `servico_papel`
ADD CONSTRAINT `servico_papel_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_papel_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servico` (`id`),
ADD CONSTRAINT `servico_papel_ibfk_3` FOREIGN KEY (`papel_id`) REFERENCES `papel` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
