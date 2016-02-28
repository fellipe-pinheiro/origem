-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Fev-2016 às 07:28
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acabamento`
--

INSERT INTO `acabamento` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'BOPP', 'Laminação para acabamento', '100.00'),
(2, 'Vazador', 'Vazador para cartões de visita', '10.00'),
(3, 'Corte e Vinco', 'Corte e vinco realizado na ED Corte', '60.00'),
(5, 'teste 1', '234', '1.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `cnpj_cpf` varchar(20) NOT NULL,
  `ie` varchar(20) DEFAULT NULL,
  `im` varchar(20) DEFAULT NULL,
  `pessoa_tipo` tinyint(1) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `observacao` text
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `cnpj_cpf`, `ie`, `im`, `pessoa_tipo`, `email`, `telefone`, `celular`, `observacao`) VALUES
(1, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis hendrerit suspendisse ultrices vivamus quisque, sem turpis scelerisque sapien elementum vel vestibulum donec nunc, egestas curabitur sed aenean elit velit nibh est. ultrices taciti dolor tellus eget morbi condimentum dictumst cras sociosqu, ullamcorper pellentesque congue proin venenatis auctor pharetra taciti scelerisque, fermentum nunc porttitor auctor purus turpis adipiscing vitae. ante enim magna torquent enim fringilla felis etiam lacus nibh, elementum tellus maecenas quisque est aliquet consequat dapibus odio, fringilla mauris commodo gravida diam a erat tincidunt. nunc venenatis consectetur integer et dapibus suspendisse ultrices non, porta rhoncus quisque dui amet fringilla molestie, felis facilisis quam varius metus nunc netus. '),
(2, 'teste 1', NULL, 0, '', '', '', '', '', '12345', '', '', 0, '', '', '', ''),
(3, 'daniel', NULL, 0, '', 'ipiranga', '', '', '', '54321', '', '', 0, '', '', '', ''),
(4, 'Eric1', 'Durval JosÃ© de Barros', 8, '', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(5, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(6, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(7, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(8, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(9, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(10, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(11, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(12, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(13, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(14, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(15, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(16, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(17, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(18, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(19, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(20, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(21, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(22, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(23, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(24, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(25, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(26, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(27, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(28, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(29, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(30, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(31, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(32, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(33, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(34, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(35, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(36, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(37, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(38, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(39, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(40, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(41, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(42, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(43, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(44, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(45, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(46, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(47, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(48, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(49, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(50, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(51, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(52, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(53, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(54, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(55, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(56, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(57, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(58, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(59, 'Eric', 'Durval JosÃ© de Barros', 8, 'Sem', 'Vila Gomes Cardim', 'São Pauo', 'SP', '03318900', '222.333.444-95', '194.041.737.173', '194.041.737.173', 0, 'teste@teste.com.br', '(11) 2233-7373', '(11) 99876-1234', 'L orem ipsum interdum lobortis venenatis'),
(60, 'felllipe', NULL, 0, '', 'ipiranga', '', '', '', '222333444', '', '', 0, 'f@f', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corte_vinco`
--

CREATE TABLE IF NOT EXISTS `corte_vinco` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `corte_vinco`
--

INSERT INTO `corte_vinco` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Corte e vinco', 'teste\r\n', '12.98');

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

--
-- Extraindo dados da tabela `faca`
--

INSERT INTO `faca` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Faca', 'Encomenda de faca', '2.20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faca_cartao`
--

CREATE TABLE IF NOT EXISTS `faca_cartao` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `faca_cartao`
--

INSERT INTO `faca_cartao` (`id`, `nome`, `descricao`, `valor`) VALUES
(5, '2 bocas', '', '10.64'),
(6, '4 bocas', '', '20.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotolito`
--

CREATE TABLE IF NOT EXISTS `fotolito` (
`id` int(11) NOT NULL,
  `impressao_formato` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotolito`
--

INSERT INTO `fotolito` (`id`, `impressao_formato`, `descricao`, `valor`) VALUES
(3, 5, 'teste', '25.00'),
(4, 6, 'qualquer', '20.00');

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

--
-- Extraindo dados da tabela `frete`
--

INSERT INTO `frete` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'A definir', 'Entrega sem motoboy', '0.00'),
(2, 'Motoboy', 'Entrega por motoboy', '30.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao`
--

INSERT INTO `impressao` (`id`, `nome`, `descricao`, `valor`, `impressao_formato`) VALUES
(2, 'Alto Rel', 'descrição', '200.00', 6),
(3, 'Baixo Relevo', 'Teste baixo', '150.00', 5),
(4, 'OFF', 'werqwr', '250.00', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao_cartao`
--

INSERT INTO `impressao_cartao` (`id`, `nome`, `descricao`, `impressao_formato`, `valor_100`, `valor_500`, `valor_1000`) VALUES
(3, 'Alto Relevo Cartão de visita', '100 cem', 5, '35.00', '30.00', '28.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressao_formato`
--

CREATE TABLE IF NOT EXISTS `impressao_formato` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `altura` int(5) NOT NULL,
  `largura` int(5) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao_formato`
--

INSERT INTO `impressao_formato` (`id`, `nome`, `altura`, `largura`, `descricao`) VALUES
(5, 'Formato A', 220, 480, 'Teste'),
(6, 'Formato B', 320, 330, 'Formato b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_impressao`
--

CREATE TABLE IF NOT EXISTS `itens_impressao` (
`id` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `impressao_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Extraindo dados da tabela `laminacao`
--

INSERT INTO `laminacao` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'BOPP', 'fgsfgdP', '12.80');

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

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Sem Nota', 'Sem Nota fiscal', '0.00'),
(2, 'Serviço', 'des', '11.84'),
(3, 'Vendas', '', '7.14');

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
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `papel`
--

INSERT INTO `papel` (`id`, `nome`, `gramatura`, `altura`, `largura`, `descricao`, `valor`) VALUES
(1, 'citrus yellow ', 240, 660, 960, 'descrição', '2.50'),
(2, 'infra violet', 240, 660, 960, 'descrição', '1.80'),
(3, 'lime tonic', 240, 660, 960, 'descrição', '3.20'),
(4, 'cosmo pink', 240, 660, 960, 'descrição', '1.90'),
(5, 'riviera blue', 240, 660, 960, 'descrição', '0.00'),
(6, 'black', 240, 660, 960, 'descrição', '0.00'),
(7, 'hot brown', 240, 660, 960, 'descrição', '0.00'),
(8, 'ultra red', 240, 660, 960, 'descrição', '0.00'),
(9, 'dot bright white', 240, 700, 1000, 'descrição', '0.00'),
(10, 'dot natural white', 240, 700, 1000, 'descrição', '0.00'),
(11, 'linear pale cream', 240, 700, 1000, 'descrição', '0.00'),
(12, 'linear natural white', 240, 700, 1000, 'descrição', '0.00'),
(13, 'linear bright white', 240, 700, 1000, 'descrição', '0.00'),
(14, 'design pale cream', 240, 700, 1000, 'descrição', '0.00'),
(15, 'design bright white', 240, 700, 1000, 'descrição', '0.00'),
(16, 'design ice white', 240, 700, 1000, 'descrição', '0.00'),
(17, 'basame natural white', 240, 700, 1000, 'descrição', '0.00'),
(18, 'basame bright white', 240, 700, 1000, 'descrição', '0.00'),
(19, 'tweed natural white', 240, 700, 1000, 'descrição', '0.00'),
(20, 'tweed bright white', 240, 700, 1000, 'descrição', '0.00'),
(21, 'shetland natural white', 240, 700, 1000, 'descrição', '0.00'),
(22, 'shetland bright white', 240, 700, 1000, 'descrição', '0.00'),
(23, 'tradition bright white', 240, 700, 1000, 'descrição', '0.00'),
(24, 'tradition ice white', 240, 700, 1000, 'descrição', '0.00'),
(25, 'tradition pale cream', 240, 700, 1000, 'descrição', '0.00'),
(26, 'tradition le rouge', 240, 700, 1000, 'descrição', '0.00'),
(27, 'tradition le bleu', 240, 700, 1000, 'descrição', '0.00'),
(28, 'tradition le noir', 240, 700, 1000, 'descrição', '0.00'),
(29, 'tradition natural white', 240, 700, 1000, 'descrição', '0.00'),
(30, 'sensat tactile matt bright', 240, 660, 960, 'descrição', '0.00'),
(31, 'originale crema', 240, 660, 960, 'descrição', '0.00'),
(32, 'originale bianco', 240, 660, 960, 'descrição', '0.00'),
(33, 'concetto bianco', 240, 660, 960, 'descrição', '0.00'),
(34, 'concetto naturale', 240, 660, 960, 'descrição', '0.00'),
(35, 'concetto avorio', 240, 660, 960, 'descrição', '0.00'),
(36, 'concetto metallo bianco', 240, 660, 960, 'descrição', '0.00'),
(37, 'stile bianco', 240, 660, 960, 'descrição', '0.00'),
(38, 'stile naturale', 240, 660, 960, 'descrição', '0.00'),
(39, 'stile avorio', 240, 660, 960, 'descrição', '0.00'),
(40, 'finezza bianco', 240, 660, 960, 'descrição', '0.00'),
(41, 'finezza naturale', 240, 660, 960, 'descrição', '0.00'),
(42, 'finezza avorio', 240, 660, 960, 'descrição', '0.00'),
(43, 'particles moonlight', 240, 700, 1000, 'descrição', '0.00'),
(44, 'particles snow', 240, 700, 1000, 'descrição', '0.00'),
(45, 'particles sunshine', 240, 700, 1000, 'descrição', '0.00'),
(46, 'vegetal', 240, 660, 960, 'descrição', '0.00'),
(47, 'giz', 240, 660, 960, 'descrição', '0.00'),
(48, 'trigo', 240, 660, 960, 'descrição', '0.00'),
(49, 'paprica', 240, 660, 960, 'descrição', '0.00'),
(50, 'mostarda', 240, 660, 960, 'descrição', '0.00'),
(51, 'oregano', 240, 660, 960, 'descrição', '0.00'),
(52, 'pedra sabao', 240, 660, 960, 'descrição', '0.00'),
(53, 'giz microcotele', 240, 660, 960, 'descrição', '0.00'),
(54, 'giz telado', 240, 660, 960, 'descrição', '0.00'),
(55, 'trigo microcotele', 240, 660, 960, 'descrição', '0.00'),
(56, 'trigo telado', 240, 660, 960, 'descrição', '0.00'),
(57, 'oregano microcotele', 240, 660, 960, 'descrição', '0.00'),
(58, 'oregano telado', 240, 660, 960, 'descrição', '0.00'),
(59, 'pedra sabao microcotele', 240, 660, 960, 'descrição', '0.00'),
(60, 'pedra sabao telado', 240, 660, 960, 'descrição', '0.00'),
(61, 'diamond', 240, 660, 960, 'descrição', '0.00'),
(62, 'diamond microcotele', 240, 660, 960, 'descrição', '0.00'),
(63, 'diamond dapple', 240, 660, 960, 'descrição', '0.00'),
(64, 'diamond telado', 240, 660, 960, 'descrição', '0.00'),
(65, 'madreperola', 240, 660, 960, 'descrição', '0.00'),
(66, 'ambar', 240, 660, 960, 'descrição', '0.00'),
(67, 'berilo', 240, 660, 960, 'descrição', '0.00'),
(68, 'coral', 240, 660, 960, 'descrição', '0.00'),
(69, 'turmalina', 240, 660, 960, 'descrição', '0.00'),
(70, 'opala', 240, 660, 960, 'descrição', '0.00'),
(71, 'agua marinha', 240, 660, 960, 'descrição', '0.00'),
(72, 'onix', 240, 660, 960, 'descrição', '0.00'),
(73, 'rubi', 240, 660, 960, 'descrição', '0.00'),
(74, 'diamante', 240, 660, 960, 'descrição', '0.00'),
(75, 'alaska', 240, 660, 960, 'descrição', '0.00'),
(76, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(77, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(78, 'sahara', 240, 660, 960, 'descrição', '0.00'),
(79, 'havana', 240, 660, 960, 'descrição', '0.00'),
(80, 'marrocos', 240, 660, 960, 'descrição', '0.00'),
(81, 'rio de janeiro', 240, 660, 960, 'descrição', '0.00'),
(82, 'jamaica', 240, 660, 960, 'descrição', '0.00'),
(83, 'cartagena', 240, 660, 960, 'descrição', '0.00'),
(84, 'madrid', 240, 660, 960, 'descrição', '0.00'),
(85, 'fidji', 240, 660, 960, 'descrição', '0.00'),
(86, 'cancun', 240, 660, 960, 'descrição', '0.00'),
(87, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(88, 'toquio', 240, 660, 960, 'descrição', '0.00'),
(89, 'amsterdam', 240, 660, 960, 'descrição', '0.00'),
(90, 'sao francisco', 240, 660, 960, 'descrição', '0.00'),
(91, 'roma', 240, 660, 960, 'descrição', '0.00'),
(92, 'milano', 240, 660, 960, 'descrição', '0.00'),
(93, 'paris', 240, 660, 960, 'descrição', '0.00'),
(94, 'nice', 240, 660, 960, 'descrição', '0.00'),
(95, 'bahamas', 240, 660, 960, 'descrição', '0.00'),
(96, 'grecia', 240, 660, 960, 'descrição', '0.00'),
(97, 'toronto', 240, 660, 960, 'descrição', '0.00'),
(98, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(99, 'tahiti', 240, 660, 960, 'descrição', '0.00'),
(100, 'buenos aires', 240, 660, 960, 'descrição', '0.00'),
(101, 'brasil', 240, 660, 960, 'descrição', '0.00'),
(102, 'santiago', 240, 660, 960, 'descrição', '0.00'),
(103, 'los angeles', 240, 660, 960, 'descrição', '0.00'),
(104, 'marfim telado', 240, 660, 960, 'descrição', '0.00'),
(105, 'marfim microcotele', 240, 660, 960, 'descrição', '0.00'),
(106, 'toquio telado', 240, 660, 960, 'descrição', '0.00'),
(107, 'toquio microcotele', 240, 660, 960, 'descrição', '0.00'),
(108, 'pequim telado', 240, 660, 960, 'descrição', '0.00'),
(109, 'pequim microcotele', 240, 660, 960, 'descrição', '0.00'),
(110, 'porto seguro telado', 240, 660, 960, 'descrição', '0.00'),
(111, 'porto seguro microcotele', 240, 660, 960, 'descrição', '0.00'),
(112, 'marrocos telado', 240, 660, 960, 'descrição', '0.00'),
(113, 'marrocos microcotele', 240, 660, 960, 'descrição', '0.00'),
(114, 'los angeles telado', 240, 660, 960, 'descrição', '0.00'),
(115, 'los angeles microcotele', 240, 660, 960, 'descrição', '0.00'),
(116, 'mar del plata', 240, 660, 960, 'descrição', '0.00'),
(117, 'mar del plata linear', 240, 660, 960, 'descrição', '0.00'),
(118, 'aspen', 240, 660, 960, 'descrição', '3.00'),
(119, 'aspen linear', 240, 660, 960, 'descrição', '0.00'),
(120, 'majorca', 240, 660, 960, 'descrição', '2.50'),
(121, 'majorca linear', 240, 660, 960, 'descrição', '0.00'),
(122, 'ibiza', 240, 660, 960, 'descrição', '0.00'),
(123, 'fine face branco', 240, 660, 960, 'descrição', '0.00'),
(124, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(125, 'virtual', 240, 660, 960, 'descrição', '0.00'),
(126, 'agua - marinha', 240, 660, 960, 'descrição', '0.00'),
(127, 'quartzo rosa', 240, 660, 960, 'descrição', '0.00'),
(128, 'lilac', 240, 660, 960, 'descrição', '0.00'),
(129, 'moscatel', 240, 660, 960, 'descrição', '0.00'),
(130, 'turquesa', 240, 660, 960, 'descrição', '0.00'),
(131, 'amazonita', 240, 660, 960, 'descrição', '0.00'),
(132, 'wasabi', 240, 660, 960, 'descrição', '0.00'),
(133, 'esmeralda', 240, 660, 960, 'descrição', '0.00'),
(134, 'antique', 240, 660, 960, 'descrição', '0.00'),
(135, 'ouro branco', 240, 660, 960, 'descrição', '0.00'),
(136, 'champagne', 240, 660, 960, 'descrição', '0.00'),
(137, 'ouro platino', 240, 660, 960, 'descrição', '0.00'),
(138, 'ouro nobre', 240, 660, 960, 'descrição', '0.00'),
(139, 'maxi gold', 240, 660, 960, 'descrição', '0.00'),
(140, 'ouro amarelo', 240, 660, 960, 'descrição', '0.00'),
(141, 'hermes', 240, 660, 960, 'descrição', '0.00'),
(142, 'passion', 240, 660, 960, 'descrição', '0.00'),
(143, 'copper', 240, 660, 960, 'descrição', '0.00'),
(144, 'rust', 240, 660, 960, 'descrição', '0.00'),
(145, 'nobuck', 240, 660, 960, 'descrição', '0.00'),
(146, 'cafe', 240, 660, 960, 'descrição', '0.00'),
(147, 'rubi', 240, 660, 960, 'descrição', '0.00'),
(148, 'pimenta rosa', 240, 660, 960, 'descrição', '0.00'),
(149, 'begonia', 240, 660, 960, 'descrição', '0.00'),
(150, 'ametista', 240, 660, 960, 'descrição', '0.00'),
(151, 'shiraz', 240, 660, 960, 'descrição', '0.00'),
(152, 'fantasy', 240, 660, 960, 'descrição', '0.00'),
(153, 'galaxia', 240, 660, 960, 'descrição', '0.00'),
(154, 'jeans', 240, 660, 960, 'descrição', '0.00'),
(155, 'aluminium', 240, 660, 960, 'descrição', '0.00'),
(156, 'platino', 240, 660, 960, 'descrição', '0.00'),
(157, 'grafite', 240, 660, 960, 'descrição', '0.00'),
(158, 'onix', 240, 660, 960, 'descrição', '0.00'),
(159, 'perola negra', 240, 660, 960, 'descrição', '0.00'),
(160, 'champagne telado', 240, 660, 960, 'descrição', '0.00'),
(161, 'nobuck telado', 240, 660, 960, 'descrição', '0.00'),
(162, 'cafe telado', 240, 660, 960, 'descrição', '0.00'),
(163, 'antique telado', 240, 660, 960, 'descrição', '0.00'),
(164, 'rubi telado', 240, 660, 960, 'descrição', '0.00'),
(165, 'galaxia telado', 240, 660, 960, 'descrição', '0.00'),
(166, 'lilac telado', 240, 660, 960, 'descrição', '0.00'),
(167, 'perola branca telado', 240, 660, 960, 'descrição', '0.00'),
(168, 'aluminium telado', 240, 660, 960, 'descrição', '0.00'),
(169, 'onix telado', 240, 660, 960, 'descrição', '0.00'),
(170, 'maxi gold', 240, 660, 960, 'descrição', '0.00'),
(171, 'esmeralda', 240, 660, 960, 'descrição', '0.00'),
(172, 'rosa luxcent', 240, 660, 960, 'descrição', '0.00'),
(173, 'fantasy', 240, 660, 960, 'descrição', '0.00'),
(174, 'galaxia', 240, 660, 960, 'descrição', '0.00'),
(175, 'grafite', 240, 660, 960, 'descrição', '0.00'),
(176, 'onix', 240, 660, 960, 'descrição', '0.00'),
(177, 'perola - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(178, 'palha - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(179, 'amarelo - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(180, 'limao - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(181, 'turquesa - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(182, 'rosa - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(183, 'vermelho - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(184, 'preto - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(185, 'verde', 240, 660, 960, 'descrição', '0.00'),
(186, 'amarelo', 240, 660, 960, 'descrição', '0.00'),
(187, 'laranja', 240, 660, 960, 'descrição', '0.00'),
(188, 'vermelho', 240, 660, 960, 'descrição', '0.00'),
(189, 'rosa', 240, 660, 960, 'descrição', '0.00'),
(190, 'roxo', 240, 660, 960, 'descrição', '0.00'),
(191, 'tabaco', 240, 660, 960, 'descrição', '0.00'),
(192, 'imbuia', 240, 660, 960, 'descrição', '0.00'),
(193, 'natural', 240, 660, 960, 'descrição', '0.00'),
(195, 'preto', 240, 660, 960, 'descrição', '0.00'),
(196, 'branco', 240, 660, 960, 'descrição', '0.00'),
(197, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(198, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(199, 'preto', 240, 660, 960, 'descrição', '0.00'),
(200, 'agua marinha', 240, 660, 960, 'descrição', '0.00'),
(201, 'quartzo rosa', 240, 660, 960, 'descrição', '0.00'),
(202, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(203, 'branco', 240, 660, 960, 'descrição', '0.00'),
(204, 'preto', 240, 660, 960, 'descrição', '0.00'),
(205, 'ouro', 240, 660, 960, 'descrição', '0.00'),
(206, 'prata', 240, 660, 960, 'descrição', '0.00'),
(207, 'branco', 240, 660, 960, 'descrição', '0.00'),
(208, 'branco brilho', 240, 660, 960, 'descrição', '0.00'),
(209, 'preto', 240, 660, 960, 'descrição', '0.00'),
(210, 'branco', 240, 660, 960, 'descrição', '0.00'),
(211, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(212, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(213, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(214, 'los angeles', 240, 660, 960, 'descrição', '0.00'),
(215, 'branco', 240, 660, 960, 'descrição', '0.00'),
(216, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(217, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(218, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(219, 'los angeles', 240, 660, 960, 'descrição', '0.00'),
(220, 'natural', 240, 660, 960, 'descrição', '0.00'),
(221, 'marrom', 240, 660, 960, 'descrição', '0.00'),
(222, 'preto', 240, 660, 960, 'descrição', '0.00'),
(223, 'ibira/natural', 240, 660, 960, 'descrição', '0.00'),
(224, 'pavao', 240, 660, 960, 'descrição', '0.00'),
(225, 'royal', 240, 660, 960, 'descrição', '0.00'),
(226, 'pink', 240, 660, 960, 'descrição', '0.00'),
(227, 'limao', 240, 660, 960, 'descrição', '0.00'),
(228, 'branco', 240, 660, 960, 'descrição', '0.00'),
(229, 'creme', 240, 660, 960, 'descrição', '0.00'),
(230, 'marrom', 240, 660, 960, 'descrição', '0.00'),
(231, 'preto', 240, 660, 960, 'descrição', '0.00'),
(232, 'branco', 240, 660, 960, 'descrição', '0.00'),
(233, 'creme', 240, 660, 960, 'descrição', '0.00'),
(234, 'passione', 240, 660, 960, 'descrição', '0.00'),
(235, 'yoga', 240, 660, 960, 'descrição', '0.00'),
(236, 'fascino', 240, 660, 960, 'descrição', '0.00'),
(237, 'giallo', 240, 660, 960, 'descrição', '0.00'),
(238, 'saggezza', 240, 660, 960, 'descrição', '0.00'),
(239, 'mistero', 240, 660, 960, 'descrição', '0.00'),
(240, 'purezza', 240, 660, 960, 'descrição', '0.00'),
(241, 'color armadillo premium white', 240, 660, 960, 'descrição', '0.00'),
(242, 'color armadillo nero', 240, 660, 960, 'descrição', '0.00'),
(243, 'color laser premium white', 240, 660, 960, 'descrição', '0.00'),
(244, 'color laser nero', 240, 660, 960, 'descrição', '0.00'),
(245, 'pearl ice', 240, 660, 960, 'descrição', '0.00'),
(246, 'pearl radiant', 240, 660, 960, 'descrição', '0.00'),
(247, 'pearl silver', 240, 660, 960, 'descrição', '0.00'),
(248, 'pearl lime', 240, 660, 960, 'descrição', '0.00'),
(249, 'pearl orange', 240, 660, 960, 'descrição', '0.00'),
(250, 'pearl bordeaux', 240, 660, 960, 'descrição', '0.00'),
(251, 'pearl purple', 240, 660, 960, 'descrição', '0.00'),
(252, 'pearl dark grey', 240, 660, 960, 'descrição', '0.00'),
(253, 'cottage premium white', 240, 660, 960, 'descrição', '0.00'),
(254, 'cottage ivory', 240, 660, 960, 'descrição', '0.00'),
(255, 'nettuno bianco artico', 240, 660, 960, 'descrição', '0.00'),
(256, 'nettuno polvere', 240, 660, 960, 'descrição', '0.00'),
(257, 'nettuno grigio fendi', 240, 660, 960, 'descrição', '0.00'),
(258, 'nettuno pompelmo', 240, 660, 960, 'descrição', '0.00'),
(259, 'nettuno rosso fuoco', 240, 660, 960, 'descrição', '0.00'),
(260, 'nettuno blu navy', 240, 660, 960, 'descrição', '0.00'),
(261, 'nettuno carruba', 240, 660, 960, 'descrição', '0.00'),
(262, 'nettuno nero', 240, 660, 960, 'descrição', '0.00'),
(263, 'tweed extra white', 240, 660, 960, 'descrição', '0.00'),
(264, 'tweed white', 240, 660, 960, 'descrição', '0.00'),
(265, 'tweed camel', 240, 660, 960, 'descrição', '0.00'),
(266, 'tweed blue', 240, 660, 960, 'descrição', '0.00'),
(267, 'tweed dark grey', 240, 660, 960, 'descrição', '0.00'),
(268, 'pinstripe white', 240, 660, 960, 'descrição', '0.00'),
(269, 'pinstrioe dark grey', 240, 660, 960, 'descrição', '0.00'),
(270, 'matt premium white', 240, 660, 960, 'descrição', '0.00'),
(271, 'gloss premium white', 240, 660, 960, 'descrição', '0.00'),
(272, 'raster premium white', 240, 660, 960, 'descrição', '0.00'),
(273, 'bianco', 240, 660, 960, 'descrição', '0.00'),
(274, 'naturale', 240, 660, 960, 'descrição', '0.00'),
(275, 'gsk premium white', 240, 660, 960, 'descrição', '0.00'),
(276, 'snow fluid', 240, 660, 960, 'descrição', '0.00'),
(277, 'snow fiandra', 240, 660, 960, 'descrição', '0.00'),
(278, 'snow laser', 240, 660, 960, 'descrição', '0.00'),
(279, 'snow metal', 240, 660, 960, 'descrição', '0.00'),
(280, 'jade riccio', 240, 660, 960, 'descrição', '0.00'),
(281, 'jade laser', 240, 660, 960, 'descrição', '0.00'),
(282, 'jade onde', 240, 660, 960, 'descrição', '0.00'),
(283, 'jade metal', 240, 660, 960, 'descrição', '0.00'),
(284, 'jade lizard', 240, 660, 960, 'descrição', '0.00'),
(285, 'jade raster', 240, 660, 960, 'descrição', '0.00'),
(286, 'goya white', 240, 660, 960, 'descrição', '0.00'),
(287, 'desiree red', 240, 660, 960, 'descrição', '0.00'),
(288, 'andira grey', 240, 660, 960, 'descrição', '0.00'),
(289, 'black truffle', 240, 660, 960, 'descrição', '0.00'),
(290, 'mocha', 240, 660, 960, 'descrição', '0.00'),
(291, 'violet', 240, 660, 960, 'descrição', '0.00'),
(292, 'black', 240, 660, 960, 'descrição', '0.00'),
(293, 'pink', 240, 660, 960, 'descrição', '0.00'),
(294, 'lavender', 240, 660, 960, 'descrição', '0.00'),
(295, 'absynthe', 240, 660, 960, 'descrição', '0.00'),
(296, 'red', 240, 660, 960, 'descrição', '0.00'),
(297, 'grey', 240, 660, 960, 'descrição', '0.00'),
(298, 'indigo', 240, 660, 960, 'descrição', '0.00'),
(299, 'emerald', 240, 660, 960, 'descrição', '0.00'),
(300, 'milk', 240, 660, 960, 'descrição', '0.00'),
(301, 'botanic', 240, 660, 960, 'descrição', '0.00'),
(302, 'chocolate', 240, 660, 960, 'descrição', '0.00'),
(303, 'cognac', 240, 660, 960, 'descrição', '0.00'),
(304, 'galvanised', 240, 660, 960, 'descrição', '0.00'),
(305, 'gold leat', 240, 660, 960, 'descrição', '0.00'),
(306, 'ice silver', 240, 660, 960, 'descrição', '0.00'),
(307, 'ink', 240, 660, 960, 'descrição', '0.00'),
(308, 'ionised', 240, 660, 960, 'descrição', '0.00'),
(309, 'lime', 240, 660, 960, 'descrição', '0.00'),
(310, 'lustre', 240, 660, 960, 'descrição', '0.00'),
(311, 'nude', 240, 660, 960, 'descrição', '0.00'),
(312, 'red lacquer', 240, 660, 960, 'descrição', '0.00'),
(313, 'super gold', 240, 660, 960, 'descrição', '0.00'),
(314, 'violette', 240, 660, 960, 'descrição', '0.00'),
(315, 'white gold', 240, 660, 960, 'descrição', '0.00'),
(316, 'ice gold (fusilier)', 240, 660, 960, 'descrição', '0.00'),
(317, 'white gold (fusilier)', 240, 660, 960, 'descrição', '0.00'),
(318, 'cryogen white', 240, 660, 960, 'descrição', '0.00'),
(319, 'virtual pearl', 240, 660, 960, 'descrição', '0.00'),
(320, 'bright white', 240, 660, 960, 'descrição', '0.00'),
(321, 'pearl', 240, 660, 960, 'descrição', '0.00'),
(322, 'silver', 240, 660, 960, 'descrição', '0.00'),
(323, 'prata brilho', 240, 660, 960, 'descrição', '0.00'),
(324, 'prata fosco', 240, 660, 960, 'descrição', '0.00'),
(325, 'ouro fosco', 240, 660, 960, 'descrição', '0.00'),
(326, 'prata fosco escovado', 240, 660, 960, 'descrição', '0.00'),
(327, 'ouro fosco escovado', 240, 660, 960, 'descrição', '0.00'),
(328, 'prata brilho', 240, 660, 960, 'descrição', '0.00'),
(329, 'ouro brilho', 240, 660, 960, 'descrição', '0.00'),
(330, 'prata fosco', 240, 660, 960, 'descrição', '0.00'),
(331, 'ouro fosco', 240, 660, 960, 'descrição', '0.00'),
(332, 'prata ', 240, 660, 960, 'descrição', '0.00'),
(333, 'ouro', 240, 660, 960, 'descrição', '0.00'),
(334, 'basame bright white', 240, 660, 960, 'descrição', '0.00'),
(335, 'design bright white', 240, 660, 960, 'descrição', '0.00'),
(336, 'design natural white', 240, 660, 960, 'descrição', '0.00'),
(337, 'linear bright white', 240, 660, 960, 'descrição', '0.00'),
(338, 'tweed bright white', 240, 660, 960, 'descrição', '0.00'),
(340, 'finezza bianco', 240, 660, 960, 'descrição', '0.00'),
(341, 'couche fosco', 240, 660, 960, 'descrição', '0.00'),
(342, 'acetato', 240, 620, 1200, 'descrição', '0.00'),
(343, 'kraft', 240, 660, 960, 'descrição', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'fellipe pinheiro', 'fellipe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'teste nome', 'teste', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acabamento`
--
ALTER TABLE `acabamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corte_vinco`
--
ALTER TABLE `corte_vinco`
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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frete`
--
ALTER TABLE `frete`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impressao`
--
ALTER TABLE `impressao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impressao_cartao`
--
ALTER TABLE `impressao_cartao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impressao_formato`
--
ALTER TABLE `impressao_formato`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens_impressao`
--
ALTER TABLE `itens_impressao`
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
-- Indexes for table `papel`
--
ALTER TABLE `papel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acabamento`
--
ALTER TABLE `acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `corte_vinco`
--
ALTER TABLE `corte_vinco`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faca`
--
ALTER TABLE `faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faca_cartao`
--
ALTER TABLE `faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fotolito`
--
ALTER TABLE `fotolito`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `frete`
--
ALTER TABLE `frete`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impressao`
--
ALTER TABLE `impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `impressao_cartao`
--
ALTER TABLE `impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `impressao_formato`
--
ALTER TABLE `impressao_formato`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itens_impressao`
--
ALTER TABLE `itens_impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=344;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
