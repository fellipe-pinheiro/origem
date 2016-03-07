-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Mar-2016 às 03:00
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acabamento`
--

INSERT INTO `acabamento` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Corte e vinco', 'EDcorte', '60.00'),
(2, 'Vasador', 'Vasador para faca', '10.00'),
(3, 'Outro Acabamento', 'outro', '20.00');

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
  `cep` varchar(8) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL,
  `im` varchar(20) DEFAULT NULL,
  `observacao` text,
  `contato_nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `pessoa_tipo`, `cnpj_cpf`, `email`, `celular`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `ie`, `im`, `observacao`, `contato_nome`) VALUES
(1, 'Eric', 1, '222.333.444-90', 'eric@eric.com.br', '92222-3333', '2222-3333', 'Brasil', 1, 'Sem', 'Chácara Seis de Outubro', 'São Paulo', 'SP', '03318900', '243.220.078.129', '243.220.078.129', 'Lorem.......', NULL),
(2, 'Fellipe', 0, '222.333.444-95', 'fellipe@felipe', '92222-4444', '2222-4444', NULL, 2, 'AP 3', 'ipiranga', 'São Paulo', 'SP', '03508030', '243.220.078.129', '243.220.078.129', 'Lorem.......', NULL),
(3, 'Alice e Yasmin Publicidade e Propaganda ME', 1, '17.365.506/0001-05', 'tesouraria@aliceyasmin.com.br', '(14) 99679-2342', '(14) 2642-2159', 'Rua Doutor Ranimiro Lotufo', 822, 'nao tem', 'Vila São Judas Thadeu', 'Botucatu', 'SP', '18607-05', '334.111.926.294', '765.725.121.616', 'Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n', NULL),
(4, 'Emanuel e Luiz Construções ME', 1, '01.862.914/0001-24', 'marketing@emanuelluiz.com.br', '(19) 99195-6148', '(19) 2786-0597', 'Rua Ângelo José de Araújo', 316, '', 'Jardim São Francisco', 'Amparo', 'SP', '13903-11', '328.996.673.800', '', '\r\n	Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n\r\n	Pharetra adipiscing massa eget torquent ad scelerisque sociosqu orci sollicitudin etiam augue, gravida per etiam lorem nibh lacinia nulla accumsan sapien. suscipit laoreet maecenas tincidunt pulvinar sed porta euismod viverra ut augue, mauris semper convallis arcu sapien purus erat fusce purus, lobortis consequat sollicitudin cursus himenaeos curabitur fermentum cursus rhoncus. cubilia aliquam nostra scelerisque pharetra malesuada porttitor odio aliquet mauris inceptos, condimentum pulvinar aliquet adipiscing neque sapien proin congue netus. pretium tincidunt magna quisque vulputate tristique diam tincidunt ut cursus, fames praesent urna lacinia dapibus leo interdum netus, felis porta vulputate per nisi aliquam diam adipiscing. \r\n\r\n	Proin nostra lorem lobortis felis nullam inceptos tellus, cubilia leo commodo maecenas cubilia dictum, etiam ipsum magna at elementum sociosqu. aliquet scelerisque orci ut pretium vivamus ullamcorper, euismod morbi porttitor torquent nisl etiam interdum, imperdiet convallis fames senectus integer. nec metus donec lectus suspendisse vulputate vel sagittis hac lacus, curabitur consectetur aliquet tristique elit senectus curae adipiscing ultrices donec, justo nam rutrum ut urna consequat vestibulum odio. placerat convallis turpis semper lacinia phasellus sem ligula phasellus elementum conubia, integer in mattis platea aliquet vestibulum consectetur quisque nisi ipsum, fringilla tristique aliquet nunc dictum feugiat habitasse imperdiet risus. \r\n\r\n	Eget tempus habitant ligula lectus elementum pretium, aliquam pellentesque condimentum nisi feugiat non pellentesque, tellus erat quam maecenas elementum. elit litora purus nisl justo aenean imperdiet semper aptent mauris ultrices fames mi sem, cubilia fringilla massa ante lorem fermentum nibh varius blandit class mattis rhoncus. hendrerit nibh duis habitant congue lectus dui netus suspendisse maecenas mattis, maecenas accumsan praesent orci adipiscing ullamcorper scelerisque feugiat. platea placerat aliquam inceptos risus mattis curabitur lorem litora hac sem netus, pretium conubia id lectus consequat enim ullamcorper suscipit sollicitudin. aliquam rhoncus vestibulum lorem nostra enim quis condimentum ut elit ligula augue rhoncus viverra, dictumst vehicula diam class magna class donec mi sit convallis dui. \r\n\r\n	Nunc urna nunc egestas gravida litora dolor, himenaeos lorem lectus ante nisi consequat nunc, sociosqu suspendisse netus rhoncus porta. molestie cubilia elementum platea erat non praesent tristique vitae eros luctus, habitant nisl metus nisl bibendum elementum nec felis volutpat, ut aliquam ut scelerisque nisi donec egestas pharetra adipiscing. habitasse at nisi purus in hendrerit molestie laoreet, platea integer velit lobortis dui lobortis, fermentum aliquam iaculis porttitor varius amet. convallis taciti ultricies tristique et interdum lacinia nullam urna, libero vehicula elementum posuere aenean dictumst odio egestas vitae, feugiat ut lacinia dictum pretium cursus congue. \r\n', NULL),
(9, 'Origem', 1, '1234', 'origemart@origem.com.br', '1234', '25746006', NULL, 34, 'fgsg', 'Vila Gomes Cardim', 'São Paulo', 'SP', '03318900', '1234', '1234', 'sdgfgfghfgh', NULL),
(10, 'Emanuel e Luiz Construções ME', 0, '', 'marketing@emanuelluiz.com.br', '1927860597', '1927860597', NULL, 0, '', '', 'Amparo', 'SP', '13903-11', '', '', '', NULL),
(11, 'Origem', 0, '1234', 'origemart@origem.com.br', '1234', '1234', NULL, 222, 'nao tem', 'Vila Gomes Cardim', 'São Paulo', 'SP', '13903-11', '1234', '1324', 'werwqr', NULL),
(12, 'Emanuel e Luiz Construções ME', 1, '67.187.885/0001-50', 'marketing@emanuelluiz.com.br', '1927860597', '1927860597', 'Rua Ângelo José de Araújo', 8, 'ghgdfhd', 'Bandeirantes', 'Amparo', 'SP', '13903-11', '334.111.926.294', '765.725.121.616', '', 'Manoel'),
(13, 'João da Silva', 1, '67.187.885/0001-50', 'tesouraria@aliceyasmin.com.br', '1927860597', '1426422159', NULL, 822, 'sem', 'Chácara Seis de Outubro', 'Amparo', 'SP', '03318900', '243.220.078.129', '243.220.078.129', 'loremm', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `faca_cartao`
--

INSERT INTO `faca_cartao` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, '2 bocas', '2 bocas para cartao', '60.00'),
(2, '4 bocas', '4 bocas para cartao', '120.00'),
(3, '6 bocas', '6 bocas para cartao', '180.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotolito`
--

CREATE TABLE IF NOT EXISTS `fotolito` (
`id` int(11) NOT NULL,
  `impressao_formato` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotolito`
--

INSERT INTO `fotolito` (`id`, `impressao_formato`, `descricao`, `valor`) VALUES
(1, 1, 'gsdgsd', '35.00'),
(2, 2, '', '30.00'),
(3, 3, '', '1.00'),
(4, 5, 'Fotolito para  cartao', '12.00'),
(5, 6, '', '0.00');

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
(1, 'Motoboy', 'Entrega por motoboy', '30.00'),
(2, 'Não Cobrar', '', '0.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao`
--

INSERT INTO `impressao` (`id`, `nome`, `descricao`, `valor`, `impressao_formato`) VALUES
(1, 'Alto Relevo', 'Alto', '400.00', 1),
(2, 'Baixo Relevo', 'Baixo', '150.00', 1),
(3, 'Digital', 'sdfsaf', '60.00', 4);

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

--
-- Extraindo dados da tabela `impressao_cartao`
--

INSERT INTO `impressao_cartao` (`id`, `nome`, `descricao`, `impressao_formato`, `valor_100`, `valor_500`, `valor_1000`) VALUES
(2, 'Cartao Visita', 'Unitario', 5, '38.00', '30.00', '28.00'),
(4, 'Revenda Cartao de visita', 'Revenda', 6, '30.00', '28.00', '25.00');

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
(1, 'Formato A', 220, 480, 'Teste'),
(2, 'Formato B', 320, 330, 'Formato b'),
(3, 'Formato C', 330, 480, 'dsfa'),
(4, 'Formato D', 100, 100, 'werwer'),
(5, 'Area para cartão', 55, 95, 'dfgs'),
(6, 'Area para cartão (REVENDA)', 55, 95, 'Revenda');

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
(3, 'Vendas', '', '7.54');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `data_orcamento`, `total`, `frete_id`, `valor_frete`, `frete_personalizado`, `nota_fiscal_id`, `valor_nota_fiscal`, `servico_id`, `cliente_id`, `ativo`, `pagamento`, `prazo`, `observacao`, `status`) VALUES
(1, '2016-03-01', '725.00', NULL, '30.00', '30.00', 1, '0.00', 1, 1, 1, NULL, NULL, '', 1),
(2, '2016-03-01', '840.84', 1, '30.00', NULL, 1, '0.00', 2, 1, 1, NULL, NULL, '', NULL),
(3, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '0.00', 3, 1, 1, NULL, NULL, '', NULL),
(4, '2016-03-01', '22.93', NULL, NULL, NULL, 2, '2.43', 4, 2, 1, NULL, NULL, '', NULL),
(5, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 6, 1, 1, NULL, NULL, '', NULL),
(6, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 7, 1, 0, NULL, NULL, '', NULL),
(7, '2016-03-01', '745.00', NULL, '20.00', '20.00', 1, '0.00', 8, 1, 0, NULL, NULL, '', NULL),
(8, '2016-03-01', '310.00', NULL, '20.00', '20.00', 1, '0.00', 9, 1, 0, NULL, NULL, '', NULL),
(11, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 13, 1, 0, NULL, NULL, '', NULL),
(12, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 14, 1, 1, NULL, NULL, '', NULL),
(13, '2016-03-02', '2032.09', NULL, '50.00', '50.00', 3, '132.09', 15, 1, 0, NULL, NULL, '', NULL),
(14, '2016-03-02', '1978.52', NULL, '50.00', '50.00', 3, '128.52', 16, 1, 0, NULL, NULL, '', NULL),
(15, '2016-03-02', '2032.09', NULL, '50.00', '50.00', 3, '132.09', 17, 1, 1, NULL, NULL, '', NULL),
(16, '2016-03-03', '465.25', 2, '0.00', NULL, 2, '49.25', 18, 1, 0, NULL, NULL, '', NULL),
(17, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 19, 1, 0, NULL, NULL, '', NULL),
(18, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 20, 1, 1, NULL, NULL, '', NULL),
(19, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 21, 1, 1, NULL, NULL, '', NULL),
(20, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 22, 1, 1, NULL, NULL, '', NULL),
(21, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 23, 1, 1, NULL, NULL, '', NULL),
(22, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 24, 1, 0, NULL, NULL, '', NULL),
(23, '2016-03-03', '360.00', NULL, '50.00', '50.00', 3, '21.87', 26, 4, 0, NULL, NULL, '', NULL),
(24, '2016-03-03', '338.49', NULL, '50.00', '50.00', 3, '20.36', 27, 4, 1, NULL, NULL, '', 1),
(25, '2016-03-03', '492.10', 2, '0.00', NULL, 2, '52.10', 28, 1, 1, NULL, NULL, '', NULL),
(26, '2016-03-03', '540.91', NULL, '60.00', '60.00', 2, '50.91', 29, 4, 0, NULL, NULL, '', NULL),
(27, '2016-03-03', '473.81', NULL, '60.00', '60.00', 2, '43.81', 30, 4, 1, NULL, NULL, '', NULL),
(28, '2016-03-03', '563.28', NULL, '60.00', '60.00', 2, '53.28', 31, 4, 0, NULL, NULL, '', NULL),
(29, '2016-03-04', '563.28', NULL, '60.00', '60.00', 2, '53.28', 32, 12, 1, 'teste pagamento teste2', 'teste prazo testes222 aqtqtq', '', 2),
(30, '2016-03-05', '111.84', NULL, '0.00', '0.00', 2, '11.84', 33, 2, 1, '', '', '', 0),
(31, '2016-03-05', '225.00', NULL, '0.00', '0.00', 1, '0.00', 34, 4, 0, '', 'rqwrwq', 'teste', 1),
(32, '2016-03-05', '225.00', NULL, '0.00', '0.00', 1, '0.00', 35, 4, 0, '', 'rqwrwq', 'testedddfadfafadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffdsffffffffffffffffffffffffffffffffffff', 1),
(33, '2016-03-05', '225.00', NULL, '0.00', '0.00', 1, '0.00', 36, 4, 1, 'testedddfadfafadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffdsffffffffffffffffffffffffffffffffffffsf', 'testedddfadfafadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffdsffffffffffffffffffffffffffffffffffffsf', 'testedddfadfafadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffdsffffffffffffffffffffffffffffffffffffsf', 2),
(34, '2016-03-06', '112.26', NULL, '0.00', '0.00', 2, '11.88', 37, 3, 0, 'a vista', '10 dias', 'sem nada', 1),
(35, '2016-03-06', '112.26', NULL, '0.00', '0.00', 2, '11.88', 38, 3, 0, 'a vista', '10 dias', 'sem nada', 0),
(36, '2016-03-06', '55.92', NULL, '0.00', '0.00', 2, '5.92', 39, 3, 1, '', '', '', 1),
(37, '2016-03-06', '246.47', NULL, '0.00', '0.00', 2, '26.09', 40, 3, 0, 'a vista', '10 dias', 'sem nada', 0),
(38, '2016-03-06', '240.88', NULL, '0.00', '0.00', 2, '25.50', 41, 3, 1, 'a vista', '10 dias', 'sem nada', 0),
(39, '2016-03-06', '150.00', NULL, '0.00', '0.00', 1, '0.00', 42, 1, 0, '', '', '', 0),
(40, '2016-03-06', '170.00', NULL, '0.00', '0.00', 1, '0.00', 43, 1, 1, '', '', '', 0),
(41, '2016-03-06', '241.97', NULL, '0.00', '0.00', 3, '16.97', 44, 1, 0, '', '', '', 0),
(42, '2016-03-06', '241.97', NULL, '0.00', '0.00', 3, '16.97', 45, 1, 0, '', '', '', 0),
(43, '2016-03-06', '709.76', NULL, '0.00', '0.00', 3, '49.76', 46, 1, 0, '', '', '', 0),
(44, '2016-03-06', '43.02', NULL, '0.00', '0.00', 3, '3.02', 47, 1, 0, '', '', '', 0),
(45, '2016-03-06', '154.86', NULL, '0.00', '0.00', 3, '10.86', 48, 1, 1, '', '', '', 0),
(46, '2016-03-06', '100.00', NULL, '0.00', '0.00', 1, '0.00', 49, 2, 0, '', '', '', 0),
(47, '2016-03-06', '290.00', NULL, '0.00', '0.00', 1, '0.00', 53, 2, 1, '', '', '', 0),
(48, '2016-03-06', '89.47', NULL, '0.00', '0.00', 2, '9.47', 54, 2, 0, '', '', '', 0),
(49, '2016-03-06', '201.31', NULL, '0.00', '0.00', 2, '21.31', 55, 2, 0, '', '', '', 0),
(50, '2016-03-06', '55.92', NULL, '0.00', '0.00', 2, '5.92', 56, 2, 0, '', '', '', 0),
(51, '2016-03-06', '123.02', NULL, '0.00', '0.00', 2, '13.02', 57, 2, 1, '', '', '', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `papel`
--

INSERT INTO `papel` (`id`, `nome`, `gramatura`, `altura`, `largura`, `descricao`, `valor`) VALUES
(1, 'aspen', 250, 660, 960, 'Color Plus Metalico', '2.00'),
(2, 'majorca', 250, 660, 960, 'Color Plus Metalico', '7.00'),
(3, 'couche', 240, 660, 960, '', '3.00'),
(4, 'Los angeles', 240, 660, 960, 'asdfa', '7.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `tipo`, `quantidade`, `desconto`, `valor_unitario`, `sub_total`, `total`) VALUES
(1, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(2, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(3, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(4, 'cartao', 100, '0.00', '0.21', '0.00', '20.50'),
(6, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(7, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(8, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(9, 'servico', 100, '0.00', '2.90', '0.00', '290.00'),
(13, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(14, 'servico', 100, '0.00', '7.25', '0.00', '725.00'),
(15, 'servico', 500, '0.00', '3.70', '0.00', '1850.00'),
(16, 'servico', 500, '0.00', '3.60', '0.00', '1800.00'),
(17, 'servico', 500, '0.00', '3.70', '0.00', '1850.00'),
(18, 'cartao', 100, '0.00', '4.16', '0.00', '416.00'),
(19, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(20, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(21, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(22, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(23, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(24, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(26, 'cartao', 100, '1.87', '2.90', '0.00', '290.00'),
(27, 'cartao', 100, '1.87', '2.70', '0.00', '270.00'),
(28, 'cartao', 100, '0.00', '4.40', '0.00', '440.00'),
(29, 'cartao', 100, '0.00', '4.30', '0.00', '430.00'),
(30, 'cartao', 100, '0.00', '3.70', '0.00', '370.00'),
(31, 'cartao', 100, '0.00', '4.50', '0.00', '450.00'),
(32, 'cartao', 100, '0.00', '4.50', '0.00', '450.00'),
(33, 'cartao', 100, '0.00', '1.00', '0.00', '100.00'),
(34, 'servico', 100, '0.00', '2.25', '0.00', '225.00'),
(35, 'servico', 100, '0.00', '2.25', '0.00', '225.00'),
(36, 'servico', 100, '0.00', '2.25', '0.00', '225.00'),
(37, 'cartao', 101, '0.00', '0.99', '0.00', '100.38'),
(38, 'cartao', 101, '0.00', '0.99', '0.00', '100.38'),
(39, 'cartao', 100, '0.00', '0.50', '0.00', '50.00'),
(40, 'cartao', 101, '0.00', '2.18', '0.00', '220.38'),
(41, 'cartao', 101, '0.00', '2.13', '0.00', '215.38'),
(42, 'cartao', 100, '0.00', '1.50', '0.00', '150.00'),
(43, 'cartao', 100, '0.00', '1.70', '0.00', '170.00'),
(44, 'servico', 100, '0.00', '2.25', '0.00', '225.00'),
(45, 'servico', 100, '0.00', '2.25', '0.00', '225.00'),
(46, 'servico', 100, '0.00', '6.60', '0.00', '660.00'),
(47, 'servico', 100, '0.00', '0.40', '0.00', '40.00'),
(48, 'servico', 100, '0.00', '1.44', '0.00', '144.00'),
(49, 'cartao', 100, '0.00', '1.00', '0.00', '100.00'),
(53, 'cartao', 100, '0.00', '2.90', '0.00', '290.00'),
(54, 'cartao', 100, '0.00', '0.80', '0.00', '80.00'),
(55, 'cartao', 100, '0.00', '1.80', '0.00', '180.00'),
(56, 'cartao', 100, '0.00', '0.50', '0.00', '50.00'),
(57, 'cartao', 100, '0.00', '1.10', '0.00', '110.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_acabamento`
--

INSERT INTO `servico_acabamento` (`id`, `servico_id`, `acabamento_id`, `quantidade`, `acabamento_valor`) VALUES
(1, 1, 1, 1, '0.00'),
(2, 2, 1, 1, '0.00'),
(3, 3, 1, 1, '0.00'),
(5, 6, 1, 1, '0.00'),
(6, 7, 1, 1, '0.00'),
(7, 8, 1, 1, '0.00'),
(8, 13, 1, 1, '0.00'),
(9, 14, 1, 1, '0.00'),
(10, 18, 2, 2, '0.00'),
(11, 19, 2, 2, '0.00'),
(12, 20, 2, 2, '0.00'),
(13, 21, 2, 2, '0.00'),
(14, 22, 2, 2, '0.00'),
(15, 23, 2, 2, '0.00'),
(16, 24, 2, 2, '0.00'),
(19, 26, 1, 1, '0.00'),
(20, 26, 2, 2, '0.00'),
(21, 27, 1, 1, '0.00'),
(22, 28, 2, 2, '0.00'),
(23, 29, 1, 1, '0.00'),
(24, 31, 1, 1, '0.00'),
(25, 32, 1, 1, '0.00'),
(26, 40, 1, 2, '0.00'),
(27, 41, 1, 2, '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_colagem`
--

CREATE TABLE IF NOT EXISTS `servico_colagem` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `colagem_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_colagem`
--

INSERT INTO `servico_colagem` (`id`, `servico_id`, `colagem_valor`) VALUES
(1, 1, '200.00'),
(2, 2, '200.00'),
(3, 3, '200.00'),
(4, 4, '20.50'),
(6, 6, '200.00'),
(7, 7, '200.00'),
(8, 8, '200.00'),
(9, 9, '200.00'),
(13, 13, '200.00'),
(14, 14, '200.00'),
(15, 28, '100.00'),
(16, 33, '100.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_faca`
--

INSERT INTO `servico_faca` (`id`, `servico_id`, `faca_id`, `altura`, `largura`, `faca_valor`) VALUES
(1, 1, 1, 100, 100, '0.00'),
(2, 2, 1, 100, 100, '0.00'),
(3, 3, 1, 100, 100, '0.00'),
(5, 6, 1, 100, 100, '0.00'),
(6, 7, 1, 100, 100, '0.00'),
(7, 8, 1, 100, 100, '0.00'),
(8, 9, 1, 100, 100, '0.00'),
(12, 13, 1, 100, 100, '0.00'),
(13, 14, 1, 100, 100, '0.00'),
(14, 47, 1, 100, 100, '0.00'),
(15, 48, 1, 100, 100, '3.00'),
(16, 48, 1, 100, 100, '2.00'),
(17, 48, 1, 100, 100, '2.20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_faca_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_cartao_id` int(11) NOT NULL,
  `faca_cartao_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_faca_cartao`
--

INSERT INTO `servico_faca_cartao` (`id`, `servico_id`, `faca_cartao_id`, `faca_cartao_valor`) VALUES
(1, 18, 2, '0.00'),
(2, 19, 2, '0.00'),
(3, 20, 2, '0.00'),
(4, 21, 2, '0.00'),
(5, 22, 2, '0.00'),
(6, 23, 2, '0.00'),
(7, 24, 2, '0.00'),
(9, 26, 1, '0.00'),
(10, 27, 1, '0.00'),
(11, 28, 2, '0.00'),
(12, 29, 2, '0.00'),
(13, 30, 2, '0.00'),
(14, 31, 2, '0.00'),
(15, 32, 2, '0.00'),
(16, 53, 1, '60.00'),
(17, 53, 1, '50.00'),
(18, 56, 1, '50.00'),
(19, 57, 1, '50.00'),
(20, 57, 1, '60.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_impressao`
--

INSERT INTO `servico_impressao` (`id`, `servico_id`, `impressao_id`, `impressao_valor`, `fotolito_id`, `fotolito_valor`, `impressao_formato_id`) VALUES
(1, 1, 1, '0.00', 1, '0.00', 1),
(2, 2, 1, '0.00', 1, '0.00', 1),
(3, 3, 1, '0.00', 1, '0.00', 1),
(5, 6, 1, '0.00', 1, '0.00', 1),
(6, 7, 1, '0.00', 1, '0.00', 1),
(7, 8, 1, '0.00', 1, '0.00', 1),
(8, 13, 1, '0.00', 1, '0.00', 1),
(9, 14, 1, '0.00', 1, '0.00', 1),
(10, 15, 1, '0.00', 1, '0.00', 1),
(11, 15, 2, '0.00', 1, '0.00', 1),
(12, 16, 1, '0.00', 1, '0.00', 1),
(13, 16, 2, '0.00', 1, '0.00', 1),
(14, 17, 1, '0.00', 1, '0.00', 1),
(15, 17, 2, '0.00', 1, '0.00', 1),
(16, 34, 1, '0.00', 1, '0.00', 1),
(17, 35, 1, '0.00', 1, '0.00', 1),
(18, 36, 1, '0.00', 1, '0.00', 1),
(19, 44, 1, '200.00', 1, '0.00', 1),
(20, 45, 1, '200.00', 1, '25.00', 1),
(21, 46, 1, '200.00', 1, '25.00', 1),
(22, 46, 1, '400.00', 1, '35.00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_impressao_cartao`
--

INSERT INTO `servico_impressao_cartao` (`id`, `servico_id`, `impressao_cartao_id`, `impressao_formato_id`, `impressao_cartao_valor_100`, `fotolito_valor`, `fotolito_id`, `qtd_cor_frente`, `qtd_cor_verso`, `impressao_cartao_valor_500`, `impressao_cartao_valor_1000`) VALUES
(1, 18, 2, 1, '0.00', '0.00', 1, 1, 1, '0.00', '0.00'),
(3, 26, 2, 5, '0.00', '0.00', 4, 1, 2, '0.00', '0.00'),
(4, 27, 2, 5, '0.00', '0.00', 4, 1, 2, '0.00', '0.00'),
(5, 28, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(6, 29, 2, 5, '0.00', '0.00', 4, 2, 1, '0.00', '0.00'),
(7, 30, 2, 5, '0.00', '0.00', 4, 2, 1, '0.00', '0.00'),
(8, 31, 2, 5, '0.00', '0.00', 4, 2, 1, '0.00', '0.00'),
(9, 32, 2, 5, '0.00', '0.00', 4, 2, 1, '0.00', '0.00'),
(10, 37, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(11, 38, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(12, 39, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(13, 40, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(14, 41, 2, 5, '0.00', '0.00', 4, 1, 0, '0.00', '0.00'),
(15, 49, 2, 5, '0.00', '0.00', 4, 1, 1, '0.00', '0.00'),
(16, 53, 2, 5, '38.00', '0.00', 4, 1, 1, '30.00', '28.00'),
(17, 53, 2, 5, '28.00', '0.00', 4, 1, 1, '20.00', '18.00'),
(18, 54, 2, 5, '28.00', '12.00', 4, 1, 1, '20.00', '18.00'),
(19, 55, 2, 5, '28.00', '12.00', 4, 1, 1, '20.00', '18.00'),
(20, 55, 2, 5, '38.00', '12.00', 4, 1, 1, '30.00', '28.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_laminacao`
--

CREATE TABLE IF NOT EXISTS `servico_laminacao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `laminacao_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_laminacao`
--

INSERT INTO `servico_laminacao` (`id`, `servico_id`, `laminacao_id`, `valor`) VALUES
(1, 1, 1, '50.00'),
(2, 2, 1, '50.00'),
(3, 3, 1, '50.00'),
(5, 6, 1, '50.00'),
(6, 7, 1, '50.00'),
(7, 8, 1, '50.00'),
(8, 9, 1, '50.00'),
(12, 13, 1, '50.00'),
(13, 14, 1, '50.00'),
(14, 18, 1, '100.00'),
(15, 19, 1, '100.00'),
(16, 20, 1, '100.00'),
(17, 21, 1, '100.00'),
(18, 22, 1, '100.00'),
(19, 23, 1, '100.00'),
(20, 24, 1, '100.00'),
(21, 28, 1, '100.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_papel`
--

INSERT INTO `servico_papel` (`id`, `servico_id`, `papel_id`, `empastamento_valor`, `quantidade`, `empastamento_status`, `papel_valor`) VALUES
(1, 1, 1, '100.00', 10, 1, '0.00'),
(2, 2, 1, '100.00', 10, 1, '0.00'),
(3, 3, 1, '100.00', 10, 1, '0.00'),
(5, 6, 1, '100.00', 10, 1, '0.00'),
(6, 7, 1, '100.00', 10, 1, '0.00'),
(7, 8, 1, '100.00', 10, 1, '0.00'),
(8, 13, 1, '100.00', 10, 1, '0.00'),
(9, 14, 1, '100.00', 10, 1, '0.00'),
(10, 15, 1, '0.00', 10, 0, '0.00'),
(11, 17, 1, '0.00', 10, 0, '0.00'),
(12, 18, 1, '0.00', 10, 0, '0.00'),
(13, 19, 1, '0.00', 10, 0, '0.00'),
(14, 20, 1, '0.00', 10, 0, '0.00'),
(15, 21, 1, '0.00', 10, 0, '0.00'),
(16, 22, 1, '0.00', 10, 0, '0.00'),
(17, 23, 1, '0.00', 10, 0, '0.00'),
(18, 24, 1, '0.00', 10, 0, '0.00'),
(19, 28, 1, '0.00', 10, 0, '0.00'),
(20, 29, 1, '50.00', 10, 1, '0.00'),
(21, 30, 1, '50.00', 10, 1, '0.00'),
(22, 31, 2, '50.00', 10, 1, '0.00'),
(23, 32, 2, '50.00', 10, 1, '0.00'),
(24, 37, 1, '0.00', 10, 0, '0.00'),
(25, 38, 1, '0.00', 10, 0, '0.00'),
(26, 40, 1, '0.00', 10, 0, '0.00'),
(27, 41, 1, '0.00', 9, 0, '5.00'),
(28, 42, 1, '100.00', 10, 1, '5.00'),
(29, 43, 1, '100.00', 10, 1, '5.00'),
(30, 43, 1, '0.00', 10, 0, '2.00');

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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'fellipe pinheiro', 'fellipe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Eric', 'ericnakaw', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Mario', 'mario', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'Fernando', 'fernando', 'ec3e661d7bc7bfbf5334e7dfad309f947dace5f7');

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
 ADD PRIMARY KEY (`id`,`impressao_formato`);

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
 ADD PRIMARY KEY (`id`,`servico_id`,`cliente_id`);

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
 ADD PRIMARY KEY (`id`,`servico_id`,`acabamento_id`);

--
-- Indexes for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
 ADD PRIMARY KEY (`id`,`servico_id`);

--
-- Indexes for table `servico_faca`
--
ALTER TABLE `servico_faca`
 ADD PRIMARY KEY (`id`,`servico_id`,`faca_id`);

--
-- Indexes for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
 ADD PRIMARY KEY (`id`,`servico_id`,`faca_cartao_id`);

--
-- Indexes for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
 ADD PRIMARY KEY (`id`,`servico_id`,`impressao_id`,`fotolito_id`,`impressao_formato_id`), ADD KEY `impressao_id` (`impressao_id`);

--
-- Indexes for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
 ADD PRIMARY KEY (`id`,`servico_id`,`impressao_cartao_id`,`impressao_formato_id`,`fotolito_id`), ADD KEY `impressao_cartao_id` (`impressao_cartao_id`);

--
-- Indexes for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
 ADD PRIMARY KEY (`id`,`servico_id`,`laminacao_id`);

--
-- Indexes for table `servico_papel`
--
ALTER TABLE `servico_papel`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `frete`
--
ALTER TABLE `frete`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impressao`
--
ALTER TABLE `impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `servico_faca`
--
ALTER TABLE `servico_faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `servico_papel`
--
ALTER TABLE `servico_papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `servico_impressao`
--
ALTER TABLE `servico_impressao`
ADD CONSTRAINT `servico_impressao_ibfk_1` FOREIGN KEY (`impressao_id`) REFERENCES `impressao` (`id`);

--
-- Limitadores para a tabela `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
ADD CONSTRAINT `servico_impressao_cartao_ibfk_1` FOREIGN KEY (`impressao_cartao_id`) REFERENCES `impressao_cartao` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
