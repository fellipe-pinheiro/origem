-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Mar-2016 às 19:06
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
  `observacao` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `pessoa_tipo`, `cnpj_cpf`, `email`, `celular`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `ie`, `im`, `observacao`) VALUES
(1, 'Eric', 1, '222.333.444-90', 'eric@eric.com.br', '92222-3333', '2222-3333', 'Brasil', 1, 'Sem', 'Chácara Seis de Outubro', 'São Paulo', 'SP', '03318900', '243.220.078.129', '243.220.078.129', 'Lorem.......'),
(2, 'Fellipe', 0, '222.333.444-95', 'fellipe@felipe', '92222-4444', '2222-4444', NULL, 2, 'AP 3', 'ipiranga', 'São Paulo', 'SP', '03508030', '243.220.078.129', '243.220.078.129', 'Lorem.......'),
(3, 'Alice e Yasmin Publicidade e Propaganda ME', 1, '17.365.506/0001-05', 'tesouraria@aliceyasmin.com.br', '(14) 99679-2342', '(14) 2642-2159', 'Rua Doutor Ranimiro Lotufo', 822, 'nao tem', 'Vila São Judas Thadeu', 'Botucatu', 'SP', '18607-05', '334.111.926.294', '765.725.121.616', 'Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n'),
(4, 'Emanuel e Luiz Construções ME', 1, '01.862.914/0001-24', 'marketing@emanuelluiz.com.br', '(19) 99195-6148', '(19) 2786-0597', 'Rua Ângelo José de Araújo', 316, '', 'Jardim São Francisco', 'Amparo', 'SP', '13903-11', '328.996.673.800', '', '\r\n	Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n\r\n	Pharetra adipiscing massa eget torquent ad scelerisque sociosqu orci sollicitudin etiam augue, gravida per etiam lorem nibh lacinia nulla accumsan sapien. suscipit laoreet maecenas tincidunt pulvinar sed porta euismod viverra ut augue, mauris semper convallis arcu sapien purus erat fusce purus, lobortis consequat sollicitudin cursus himenaeos curabitur fermentum cursus rhoncus. cubilia aliquam nostra scelerisque pharetra malesuada porttitor odio aliquet mauris inceptos, condimentum pulvinar aliquet adipiscing neque sapien proin congue netus. pretium tincidunt magna quisque vulputate tristique diam tincidunt ut cursus, fames praesent urna lacinia dapibus leo interdum netus, felis porta vulputate per nisi aliquam diam adipiscing. \r\n\r\n	Proin nostra lorem lobortis felis nullam inceptos tellus, cubilia leo commodo maecenas cubilia dictum, etiam ipsum magna at elementum sociosqu. aliquet scelerisque orci ut pretium vivamus ullamcorper, euismod morbi porttitor torquent nisl etiam interdum, imperdiet convallis fames senectus integer. nec metus donec lectus suspendisse vulputate vel sagittis hac lacus, curabitur consectetur aliquet tristique elit senectus curae adipiscing ultrices donec, justo nam rutrum ut urna consequat vestibulum odio. placerat convallis turpis semper lacinia phasellus sem ligula phasellus elementum conubia, integer in mattis platea aliquet vestibulum consectetur quisque nisi ipsum, fringilla tristique aliquet nunc dictum feugiat habitasse imperdiet risus. \r\n\r\n	Eget tempus habitant ligula lectus elementum pretium, aliquam pellentesque condimentum nisi feugiat non pellentesque, tellus erat quam maecenas elementum. elit litora purus nisl justo aenean imperdiet semper aptent mauris ultrices fames mi sem, cubilia fringilla massa ante lorem fermentum nibh varius blandit class mattis rhoncus. hendrerit nibh duis habitant congue lectus dui netus suspendisse maecenas mattis, maecenas accumsan praesent orci adipiscing ullamcorper scelerisque feugiat. platea placerat aliquam inceptos risus mattis curabitur lorem litora hac sem netus, pretium conubia id lectus consequat enim ullamcorper suscipit sollicitudin. aliquam rhoncus vestibulum lorem nostra enim quis condimentum ut elit ligula augue rhoncus viverra, dictumst vehicula diam class magna class donec mi sit convallis dui. \r\n\r\n	Nunc urna nunc egestas gravida litora dolor, himenaeos lorem lectus ante nisi consequat nunc, sociosqu suspendisse netus rhoncus porta. molestie cubilia elementum platea erat non praesent tristique vitae eros luctus, habitant nisl metus nisl bibendum elementum nec felis volutpat, ut aliquam ut scelerisque nisi donec egestas pharetra adipiscing. habitasse at nisi purus in hendrerit molestie laoreet, platea integer velit lobortis dui lobortis, fermentum aliquam iaculis porttitor varius amet. convallis taciti ultricies tristique et interdum lacinia nullam urna, libero vehicula elementum posuere aenean dictumst odio egestas vitae, feugiat ut lacinia dictum pretium cursus congue. \r\n');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotolito`
--

INSERT INTO `fotolito` (`id`, `impressao_formato`, `descricao`, `valor`) VALUES
(1, 1, 'gsdgsd', '25.00'),
(2, 2, '', '30.00'),
(3, 3, '', '1.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao`
--

INSERT INTO `impressao` (`id`, `nome`, `descricao`, `valor`, `impressao_formato`) VALUES
(1, 'Alto Relevo', 'Alto', '200.00', 1),
(2, 'Baixo Relevo', 'Baixo', '150.00', 1);

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
(2, 'Alto Relevo', 'Teste', 1, '38.00', '30.00', '28.00'),
(3, 'Baixo Relevo', '', 1, '30.00', '28.00', '25.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao_formato`
--

INSERT INTO `impressao_formato` (`id`, `nome`, `altura`, `largura`, `descricao`) VALUES
(1, 'Formato A', 220, 480, 'Teste'),
(2, 'Formato B', 320, 330, 'Formato b'),
(3, 'Formato C', 330, 480, 'dsfa'),
(4, 'Formato D', 100, 100, 'werwer');

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
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
`id` int(11) NOT NULL,
  `data_orcamento` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `frete_id` int(11) DEFAULT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `frete_personalizado` decimal(10,2) DEFAULT NULL,
  `nota_fiscal_id` int(11) DEFAULT NULL,
  `valor_nota_fiscal` decimal(10,2) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `data_orcamento`, `total`, `frete_id`, `valor_frete`, `frete_personalizado`, `nota_fiscal_id`, `valor_nota_fiscal`, `servico_id`, `cliente_id`, `ativo`) VALUES
(1, '2016-03-01', '725.00', NULL, '30.00', '30.00', 1, '0.00', 1, 1, 1),
(2, '2016-03-01', '840.84', 1, '30.00', NULL, 1, '0.00', 2, 1, 1),
(3, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '0.00', 3, 1, 1),
(4, '2016-03-01', '22.93', NULL, NULL, NULL, 2, '2.43', 4, 2, 1),
(5, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 6, 1, 1),
(6, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 7, 1, 0),
(7, '2016-03-01', '745.00', NULL, '20.00', '20.00', 1, '0.00', 8, 1, 0),
(8, '2016-03-01', '310.00', NULL, '20.00', '20.00', 1, '0.00', 9, 1, 0),
(11, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 13, 1, 0),
(12, '2016-03-01', '840.84', 1, '30.00', NULL, 2, '85.84', 14, 1, 1),
(13, '2016-03-02', '2032.09', NULL, '50.00', '50.00', 3, '132.09', 15, 1, 0),
(14, '2016-03-02', '1978.52', NULL, '50.00', '50.00', 3, '128.52', 16, 1, 0),
(15, '2016-03-02', '2032.09', NULL, '50.00', '50.00', 3, '132.09', 17, 1, 1),
(16, '2016-03-03', '465.25', 2, '0.00', NULL, 2, '49.25', 18, 1, 0),
(17, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 19, 1, 0),
(18, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 20, 1, 1),
(19, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 21, 1, 1),
(20, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 22, 1, 1),
(21, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 23, 1, 1),
(22, '2016-03-03', '324.34', 2, '0.00', NULL, 2, '34.34', 24, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `papel`
--

INSERT INTO `papel` (`id`, `nome`, `gramatura`, `altura`, `largura`, `descricao`, `valor`) VALUES
(1, 'aspen', 250, 660, 960, 'Color Plus Metalico', '5.00'),
(2, 'majorca', 250, 660, 960, 'Color Plus Metalico', '7.00'),
(3, 'couche', 240, 660, 960, '', '3.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
(24, 'cartao', 100, '0.00', '2.90', '0.00', '290.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_acabamento`
--

CREATE TABLE IF NOT EXISTS `servico_acabamento` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `acabamento_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_acabamento`
--

INSERT INTO `servico_acabamento` (`id`, `servico_id`, `acabamento_id`, `quantidade`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(5, 6, 1, 1),
(6, 7, 1, 1),
(7, 8, 1, 1),
(8, 13, 1, 1),
(9, 14, 1, 1),
(10, 18, 2, 2),
(11, 19, 2, 2),
(12, 20, 2, 2),
(13, 21, 2, 2),
(14, 22, 2, 2),
(15, 23, 2, 2),
(16, 24, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_colagem`
--

CREATE TABLE IF NOT EXISTS `servico_colagem` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `colagem_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
(14, 14, '200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca`
--

CREATE TABLE IF NOT EXISTS `servico_faca` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_id` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_faca`
--

INSERT INTO `servico_faca` (`id`, `servico_id`, `faca_id`, `altura`, `largura`) VALUES
(1, 1, 1, 100, 100),
(2, 2, 1, 100, 100),
(3, 3, 1, 100, 100),
(5, 6, 1, 100, 100),
(6, 7, 1, 100, 100),
(7, 8, 1, 100, 100),
(8, 9, 1, 100, 100),
(12, 13, 1, 100, 100),
(13, 14, 1, 100, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_faca_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_cartao_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_faca_cartao`
--

INSERT INTO `servico_faca_cartao` (`id`, `servico_id`, `faca_cartao_id`) VALUES
(1, 18, 2),
(2, 19, 2),
(3, 20, 2),
(4, 21, 2),
(5, 22, 2),
(6, 23, 2),
(7, 24, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_impressao`
--

CREATE TABLE IF NOT EXISTS `servico_impressao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `impressao_id` int(11) NOT NULL,
  `fotolito_id` int(11) NOT NULL,
  `impressao_formato_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_impressao`
--

INSERT INTO `servico_impressao` (`id`, `servico_id`, `impressao_id`, `fotolito_id`, `impressao_formato_id`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 1, 1),
(3, 3, 1, 1, 1),
(5, 6, 1, 1, 1),
(6, 7, 1, 1, 1),
(7, 8, 1, 1, 1),
(8, 13, 1, 1, 1),
(9, 14, 1, 1, 1),
(10, 15, 1, 1, 1),
(12, 16, 1, 1, 1),
(14, 17, 1, 1, 1),
(11, 15, 2, 1, 1),
(13, 16, 2, 1, 1),
(15, 17, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_impressao_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_impressao_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `impressao_cartao_id` int(11) NOT NULL,
  `impressao_formato_id` int(11) NOT NULL,
  `fotolito_id` int(11) NOT NULL,
  `qtd_cor_frente` int(11) NOT NULL,
  `qtd_cor_verso` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_impressao_cartao`
--

INSERT INTO `servico_impressao_cartao` (`id`, `servico_id`, `impressao_cartao_id`, `impressao_formato_id`, `fotolito_id`, `qtd_cor_frente`, `qtd_cor_verso`) VALUES
(1, 18, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_laminacao`
--

CREATE TABLE IF NOT EXISTS `servico_laminacao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `laminacao_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
(20, 24, 1, '100.00');

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
  `empastamento_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico_papel`
--

INSERT INTO `servico_papel` (`id`, `servico_id`, `papel_id`, `empastamento_valor`, `quantidade`, `empastamento_status`) VALUES
(1, 1, 1, '100.00', 10, 1),
(2, 2, 1, '100.00', 10, 1),
(3, 3, 1, '100.00', 10, 1),
(5, 6, 1, '100.00', 10, 1),
(6, 7, 1, '100.00', 10, 1),
(7, 8, 1, '100.00', 10, 1),
(8, 13, 1, '100.00', 10, 1),
(9, 14, 1, '100.00', 10, 1),
(10, 15, 1, '0.00', 10, 0),
(11, 17, 1, '0.00', 10, 0),
(12, 18, 1, '0.00', 10, 0),
(13, 19, 1, '0.00', 10, 0),
(14, 20, 1, '0.00', 10, 0),
(15, 21, 1, '0.00', 10, 0),
(16, 22, 1, '0.00', 10, 0),
(17, 23, 1, '0.00', 10, 0),
(18, 24, 1, '0.00', 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'fellipe pinheiro', 'fellipe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Eric', 'ericnakaw', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Mario', 'mario', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `impressao_formato`
--
ALTER TABLE `impressao_formato`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `servico_faca`
--
ALTER TABLE `servico_faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `servico_papel`
--
ALTER TABLE `servico_papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
