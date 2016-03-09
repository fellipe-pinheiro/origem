-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Mar-2016 às 18:44
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

--
-- Extraindo dados da tabela `acabamento`
--

INSERT INTO `acabamento` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Corte e vinco', 'EDcorte', '60.00'),
(2, 'Vasador', 'Vasador para faca', '10.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `pessoa_tipo`, `cnpj_cpf`, `email`, `celular`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `ie`, `im`, `observacao`, `contato_nome`) VALUES
(2, 'Fellipe', 0, '222.333.444-95', 'fellipe@felipe', '92222-4444', '2222-4444', NULL, 2, 'AP 3', 'ipiranga', 'São Paulo', 'SP', '03508030', '243.220.078.129', '243.220.078.129', 'Lorem.......', NULL),
(3, 'Alice e Yasmin Publicidade e Propaganda ME', 1, '17.365.506/0001-05', 'tesouraria@aliceyasmin.com.br', '(14) 99679-2342', '(14) 2642-2159', 'Rua Doutor Ranimiro Lotufo', 822, 'nao tem', 'Vila São Judas Thadeu', 'Botucatu', 'SP', '18607-05', '334.111.926.294', '765.725.121.616', 'Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n', NULL),
(4, 'Emanuel e Luiz Construções ME', 1, '01.862.914/0001-24', 'marketing@emanuelluiz.com.br', '(19) 99195-6148', '(19) 2786-0597', 'Rua Ângelo José de Araújo', 316, '', 'Jardim São Francisco', 'Amparo', 'SP', '13903-11', '328.996.673.800', '', '\r\n	Lorem ipsum ut varius malesuada cras etiam metus, diam vehicula curae torquent aenean metus, lacinia primis eu malesuada eros congue. dolor mattis auctor quisque praesent quam convallis blandit sed eu ac aliquam, bibendum posuere imperdiet auctor lectus primis cursus adipiscing platea ullamcorper mollis, posuere consectetur semper quisque neque et lobortis quisque cursus consectetur. eget platea pulvinar ac tortor sodales dictum habitasse fames auctor mollis, lobortis condimentum lacinia nulla in cursus conubia mollis quis curabitur morbi, urna inceptos interdum consectetur sem lacus neque etiam et. rhoncus sapien lorem massa integer in erat neque facilisis primis facilisis, aenean non lectus quisque non fringilla curabitur maecenas massa. \r\n\r\n	Pharetra adipiscing massa eget torquent ad scelerisque sociosqu orci sollicitudin etiam augue, gravida per etiam lorem nibh lacinia nulla accumsan sapien. suscipit laoreet maecenas tincidunt pulvinar sed porta euismod viverra ut augue, mauris semper convallis arcu sapien purus erat fusce purus, lobortis consequat sollicitudin cursus himenaeos curabitur fermentum cursus rhoncus. cubilia aliquam nostra scelerisque pharetra malesuada porttitor odio aliquet mauris inceptos, condimentum pulvinar aliquet adipiscing neque sapien proin congue netus. pretium tincidunt magna quisque vulputate tristique diam tincidunt ut cursus, fames praesent urna lacinia dapibus leo interdum netus, felis porta vulputate per nisi aliquam diam adipiscing. \r\n\r\n	Proin nostra lorem lobortis felis nullam inceptos tellus, cubilia leo commodo maecenas cubilia dictum, etiam ipsum magna at elementum sociosqu. aliquet scelerisque orci ut pretium vivamus ullamcorper, euismod morbi porttitor torquent nisl etiam interdum, imperdiet convallis fames senectus integer. nec metus donec lectus suspendisse vulputate vel sagittis hac lacus, curabitur consectetur aliquet tristique elit senectus curae adipiscing ultrices donec, justo nam rutrum ut urna consequat vestibulum odio. placerat convallis turpis semper lacinia phasellus sem ligula phasellus elementum conubia, integer in mattis platea aliquet vestibulum consectetur quisque nisi ipsum, fringilla tristique aliquet nunc dictum feugiat habitasse imperdiet risus. \r\n\r\n	Eget tempus habitant ligula lectus elementum pretium, aliquam pellentesque condimentum nisi feugiat non pellentesque, tellus erat quam maecenas elementum. elit litora purus nisl justo aenean imperdiet semper aptent mauris ultrices fames mi sem, cubilia fringilla massa ante lorem fermentum nibh varius blandit class mattis rhoncus. hendrerit nibh duis habitant congue lectus dui netus suspendisse maecenas mattis, maecenas accumsan praesent orci adipiscing ullamcorper scelerisque feugiat. platea placerat aliquam inceptos risus mattis curabitur lorem litora hac sem netus, pretium conubia id lectus consequat enim ullamcorper suscipit sollicitudin. aliquam rhoncus vestibulum lorem nostra enim quis condimentum ut elit ligula augue rhoncus viverra, dictumst vehicula diam class magna class donec mi sit convallis dui. \r\n\r\n	Nunc urna nunc egestas gravida litora dolor, himenaeos lorem lectus ante nisi consequat nunc, sociosqu suspendisse netus rhoncus porta. molestie cubilia elementum platea erat non praesent tristique vitae eros luctus, habitant nisl metus nisl bibendum elementum nec felis volutpat, ut aliquam ut scelerisque nisi donec egestas pharetra adipiscing. habitasse at nisi purus in hendrerit molestie laoreet, platea integer velit lobortis dui lobortis, fermentum aliquam iaculis porttitor varius amet. convallis taciti ultricies tristique et interdum lacinia nullam urna, libero vehicula elementum posuere aenean dictumst odio egestas vitae, feugiat ut lacinia dictum pretium cursus congue. \r\n', NULL),
(9, 'Origem', 1, '1234', 'origemart@origem.com.br', '1234', '25746006', NULL, 34, 'fgsg', 'Vila Gomes Cardim', 'São Paulo', 'SP', '03318900', '1234', '1234', 'sdgfgfghfgh', NULL),
(11, 'Origem', 0, '1234', 'origemart@origem.com.br', '1234', '1234', '', 222, 'nao tem', 'Vila Gomes Cardim', 'São Paulo', 'SP', '13903-11', '1234', '1324', 'werwqr', 'Fernando'),
(12, 'Emanuel e Luiz Construções ME', 1, '67.187.885/0001-50', 'marketing@emanuelluiz.com.br', '1927860597', '1927860597', 'Rua Ângelo José de Araújo', 8, 'ghgdfhd', 'Bandeirantes', 'Amparo', 'SP', '13903-11', '334.111.926.294', '765.725.121.616', '', 'Manoel'),
(13, 'João da Silva', 1, '67.187.885/0001-50', 'tesouraria@aliceyasmin.com.br', '1927860597', '1426422159', NULL, 822, 'sem', 'Chácara Seis de Outubro', 'Amparo', 'SP', '03318900', '243.220.078.129', '243.220.078.129', 'loremm', NULL),
(14, 'Oito comunicacao', 1, '12345', 'projeto@8a80.com.br', '999998888', '2358-7374', NULL, 888, '1', 'Tatuapé', 'São Paulo', 'SP', '03567-01', '5678', '54321', 'Oito a oitenta', NULL),
(15, 'Rayssa e Leonardo Construções Ltda', 1, '57.364.932/0001-30', 'financeiro@rayssaleonardo.com.br', '(11) 99462-0024', '(11) 3972-4188', NULL, 946, 'Não tem', 'Vila Curuçá', 'Santo André', 'SP', '09280-26', '836.858.908.143', '', 'IMPORTANTE: Nosso gerador online de EMPRESAS tem como intenção ajudar estudantes, programadores, analistas e testadores a gerar todos os documentos necessário para uma empresa. Normalmente necessários parar testar seus softwares em desenvolvimento. \r\nA má utilização dos dados aqui gerados é de total responsabilidade do usuário. \r\nOs números são gerados de forma aleatória, respeitando as regras de criação de cada documento.', NULL),
(16, 'Maria da Penha', 1, '57.364.932/0001-30', 'maria@maria.com.br', '999998888', '98765-1234', NULL, 23, 'nao tem', 'Santa Luzia', 'Santo André', 'SP', '03535020', '836.858.908.143', '54321', 'nao tem', NULL),
(17, 'Ana e Antonella Informática Ltda', 1, '00.670.102/0001-14', 'compras@anaantonella.com.br', '(12) 98219-8218', '(12) 2779-3601', NULL, 186, '', 'Santana', 'São José dos Campos', 'SP', '12212-24', '944.305.835.371', '', 'IMPORTANTE: Nosso gerador online de EMPRESAS tem como intenção ajudar estudantes, programadores, analistas e testadores a gerar todos os documentos necessário para uma empresa. Normalmente necessários parar testar seus softwares em desenvolvimento. \r\nA má utilização dos dados aqui gerados é de total responsabilidade do usuário. \r\nOs números são gerados de forma aleatória, respeitando as regras de criação de cada documento.', NULL),
(18, 'Eric', 0, '123', '', '', '', '', 0, '', '', '', 'SP', '03508030', '124', '', '', ''),
(19, 'Eric', 0, '12345', 'eer@er', '1234', '1234', NULL, 888, 'complemento', 'Vila Curuçá', 'São José dos Campos', 'SP', '12212-240', '12345', '', 'sfsdaf', NULL),
(20, 'Padaria', 0, '', '', '', '', NULL, 0, '', '', '', 'SP', '', '', '', '', 'teste');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotolito`
--

INSERT INTO `fotolito` (`id`, `impressao_formato`, `descricao`, `valor`) VALUES
(1, 1, 'gsdgsd', '35.00'),
(2, 2, '', '30.00'),
(3, 3, '', '1.00'),
(4, 5, 'Fotolito para  cartao', '12.00'),
(5, 6, '55', '0.00'),
(7, 4, 'teste', '90.00');

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
(1, 'Motoboy', 'Entrega por motoboy', '30.01'),
(2, 'Não Cobrar', 'ewrwq', '0.00');

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
(1, 'Alto Relevo', 'Alto', '300.00', 2),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao_cartao`
--

INSERT INTO `impressao_cartao` (`id`, `nome`, `descricao`, `impressao_formato`, `valor_100`, `valor_500`, `valor_1000`) VALUES
(2, 'Cartão Visita', 'Unitário', 5, '38.00', '30.00', '28.00'),
(4, 'Revenda Cartao de visita', 'Revenda', 6, '30.00', '28.00', '25.00');

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

--
-- Extraindo dados da tabela `impressao_formato`
--

INSERT INTO `impressao_formato` (`id`, `altura`, `largura`, `descricao`) VALUES
(1, 220, 480, 'Teste'),
(2, 320, 330, 'Formato B'),
(3, 330, 480, 'dsfa'),
(4, 100, 100, ''),
(5, 55, 95, 'dfgs'),
(6, 55, 95, 'Revenda');

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
(1, 'BOPP', 'Laminação', '200.40');

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
(2, 'Serviço', 'des', '11.84'),
(3, 'Vendas', 'venda', '7.54');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Extraindo dados da tabela `papel`
--

INSERT INTO `papel` (`id`, `nome`, `gramatura`, `altura`, `largura`, `descricao`, `valor`) VALUES
(1, 'aspen', 400, 660, 960, 'Color Plus Metalico', '5.00'),
(2, 'majorca', 250, 660, 960, 'Color Plus Metalico', '7.00'),
(4, 'Los angeles', 240, 660, 960, 'asdfa', '7.00'),
(5, 'citrus yellow ', 240, 660, 960, 'descrição', '0.00'),
(6, 'infra violet', 240, 660, 960, 'descrição', '0.00'),
(7, 'lime tonic', 240, 660, 960, 'descrição', '0.00'),
(8, 'cosmo pink', 240, 660, 960, 'descrição', '0.00'),
(9, 'riviera blue', 240, 660, 960, 'descrição', '0.00'),
(10, 'black', 240, 660, 960, 'descrição', '0.00'),
(11, 'hot brown', 240, 660, 960, 'descrição', '0.00'),
(12, 'ultra red', 240, 660, 960, 'descrição', '0.00'),
(13, 'dot bright white', 240, 700, 1000, 'descrição', '0.00'),
(14, 'dot natural white', 240, 700, 1000, 'descrição', '0.00'),
(15, 'linear pale cream', 240, 700, 1000, 'descrição', '0.00'),
(16, 'linear natural white', 240, 700, 1000, 'descrição', '0.00'),
(17, 'linear bright white', 240, 700, 1000, 'descrição', '0.00'),
(18, 'design pale cream', 240, 700, 1000, 'descrição', '0.00'),
(19, 'design bright white', 240, 700, 1000, 'descrição', '0.00'),
(20, 'design ice white', 240, 700, 1000, 'descrição', '0.00'),
(21, 'basame natural white', 240, 700, 1000, 'descrição', '0.00'),
(22, 'basame bright white', 240, 700, 1000, 'descrição', '0.00'),
(23, 'tweed natural white', 240, 700, 1000, 'descrição', '0.00'),
(24, 'tweed bright white', 240, 700, 1000, 'descrição', '0.00'),
(25, 'shetland natural white', 240, 700, 1000, 'descrição', '0.00'),
(26, 'shetland bright white', 240, 700, 1000, 'descrição', '0.00'),
(27, 'tradition bright white', 240, 700, 1000, 'descrição', '0.00'),
(28, 'tradition ice white', 240, 700, 1000, 'descrição', '0.00'),
(29, 'tradition pale cream', 240, 700, 1000, 'descrição', '0.00'),
(30, 'tradition le rouge', 240, 700, 1000, 'descrição', '0.00'),
(31, 'tradition le bleu', 240, 700, 1000, 'descrição', '0.00'),
(32, 'tradition le noir', 240, 700, 1000, 'descrição', '0.00'),
(33, 'tradition natural white', 240, 700, 1000, 'descrição', '0.00'),
(34, 'sensat tactile matt bright', 240, 660, 960, 'descrição', '0.00'),
(35, 'originale crema', 240, 660, 960, 'descrição', '0.00'),
(36, 'originale bianco', 240, 660, 960, 'descrição', '0.00'),
(37, 'concetto bianco', 240, 660, 960, 'descrição', '0.00'),
(38, 'concetto naturale', 240, 660, 960, 'descrição', '0.00'),
(39, 'concetto avorio', 240, 660, 960, 'descrição', '0.00'),
(40, 'concetto metallo bianco', 240, 660, 960, 'descrição', '0.00'),
(41, 'stile bianco', 240, 660, 960, 'descrição', '0.00'),
(42, 'stile naturale', 240, 660, 960, 'descrição', '0.00'),
(43, 'stile avorio', 240, 660, 960, 'descrição', '0.00'),
(44, 'finezza bianco', 240, 660, 960, 'descrição', '0.00'),
(45, 'finezza naturale', 240, 660, 960, 'descrição', '0.00'),
(46, 'finezza avorio', 240, 660, 960, 'descrição', '0.00'),
(47, 'particles moonlight', 240, 700, 1000, 'descrição', '0.00'),
(48, 'particles snow', 240, 700, 1000, 'descrição', '0.00'),
(49, 'particles sunshine', 240, 700, 1000, 'descrição', '0.00'),
(50, 'vegetal', 240, 660, 960, 'descrição', '0.00'),
(51, 'giz', 240, 660, 960, 'descrição', '0.00'),
(52, 'trigo', 240, 660, 960, 'descrição', '0.00'),
(53, 'paprica', 240, 660, 960, 'descrição', '0.00'),
(54, 'mostarda', 240, 660, 960, 'descrição', '0.00'),
(55, 'oregano', 240, 660, 960, 'descrição', '0.00'),
(56, 'pedra sabao', 240, 660, 960, 'descrição', '0.00'),
(57, 'giz microcotele', 240, 660, 960, 'descrição', '0.00'),
(58, 'giz telado', 240, 660, 960, 'descrição', '0.00'),
(59, 'trigo microcotele', 240, 660, 960, 'descrição', '0.00'),
(60, 'trigo telado', 240, 660, 960, 'descrição', '0.00'),
(61, 'oregano microcotele', 240, 660, 960, 'descrição', '0.00'),
(62, 'oregano telado', 240, 660, 960, 'descrição', '0.00'),
(63, 'pedra sabao microcotele', 240, 660, 960, 'descrição', '0.00'),
(64, 'pedra sabao telado', 240, 660, 960, 'descrição', '0.00'),
(65, 'diamond', 240, 660, 960, 'descrição', '0.00'),
(66, 'diamond microcotele', 240, 660, 960, 'descrição', '0.00'),
(67, 'diamond dapple', 240, 660, 960, 'descrição', '0.00'),
(68, 'diamond telado', 240, 660, 960, 'descrição', '0.00'),
(69, 'madreperola', 240, 660, 960, 'descrição', '0.00'),
(70, 'ambar', 240, 660, 960, 'descrição', '0.00'),
(71, 'berilo', 240, 660, 960, 'descrição', '0.00'),
(72, 'coral', 240, 660, 960, 'descrição', '0.00'),
(73, 'turmalina', 240, 660, 960, 'descrição', '0.00'),
(74, 'opala', 240, 660, 960, 'descrição', '0.00'),
(75, 'agua marinha', 240, 660, 960, 'descrição', '0.00'),
(76, 'onix', 240, 660, 960, 'descrição', '0.00'),
(77, 'rubi', 240, 660, 960, 'descrição', '0.00'),
(78, 'diamante', 240, 660, 960, 'descrição', '0.00'),
(79, 'alaska', 240, 660, 960, 'descrição', '0.00'),
(80, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(81, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(82, 'sahara', 240, 660, 960, 'descrição', '0.00'),
(83, 'havana', 240, 660, 960, 'descrição', '0.00'),
(84, 'marrocos', 240, 660, 960, 'descrição', '0.00'),
(85, 'rio de janeiro', 240, 660, 960, 'descrição', '0.00'),
(86, 'jamaica', 240, 660, 960, 'descrição', '0.00'),
(87, 'cartagena', 240, 660, 960, 'descrição', '0.00'),
(88, 'madrid', 240, 660, 960, 'descrição', '0.00'),
(89, 'fidji', 240, 660, 960, 'descrição', '0.00'),
(90, 'cancun', 240, 660, 960, 'descrição', '0.00'),
(91, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(92, 'toquio', 240, 660, 960, 'descrição', '0.00'),
(93, 'amsterdam', 240, 660, 960, 'descrição', '0.00'),
(94, 'sao francisco', 240, 660, 960, 'descrição', '0.00'),
(95, 'roma', 240, 660, 960, 'descrição', '0.00'),
(96, 'milano', 240, 660, 960, 'descrição', '0.00'),
(97, 'paris', 240, 660, 960, 'descrição', '0.00'),
(98, 'nice', 240, 660, 960, 'descrição', '0.00'),
(99, 'bahamas', 240, 660, 960, 'descrição', '0.00'),
(100, 'grecia', 240, 660, 960, 'descrição', '0.00'),
(101, 'toronto', 240, 660, 960, 'descrição', '0.00'),
(102, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(103, 'tahiti', 240, 660, 960, 'descrição', '0.00'),
(104, 'buenos aires', 240, 660, 960, 'descrição', '0.00'),
(105, 'brasil', 240, 660, 960, 'descrição', '9.00'),
(106, 'santiago', 240, 660, 960, 'descrição', '0.00'),
(108, 'marfim telado', 240, 660, 960, 'descrição', '0.00'),
(109, 'marfim microcotele', 240, 660, 960, 'descrição', '0.00'),
(110, 'toquio telado', 240, 660, 960, 'descrição', '0.00'),
(111, 'toquio microcotele', 240, 660, 960, 'descrição', '0.00'),
(112, 'pequim telado', 240, 660, 960, 'descrição', '0.00'),
(113, 'pequim microcotele', 240, 660, 960, 'descrição', '0.00'),
(114, 'porto seguro telado', 240, 660, 960, 'descrição', '0.00'),
(115, 'porto seguro microcotele', 240, 660, 960, 'descrição', '0.00'),
(116, 'marrocos telado', 240, 660, 960, 'descrição', '0.00'),
(117, 'marrocos microcotele', 240, 660, 960, 'descrição', '0.00'),
(118, 'los angeles telado', 240, 660, 960, 'descrição', '0.00'),
(119, 'los angeles microcotele', 240, 660, 960, 'descrição', '0.00'),
(120, 'mar del plata', 240, 660, 960, 'descrição', '0.00'),
(121, 'mar del plata linear', 240, 660, 960, 'descrição', '0.00'),
(123, 'aspen linear', 240, 660, 960, 'descrição', '0.00'),
(124, 'majorca', 240, 660, 960, 'descrição', '0.00'),
(125, 'majorca linear', 240, 660, 960, 'descrição', '0.00'),
(126, 'ibiza', 240, 660, 960, 'descrição', '0.00'),
(127, 'fine face branco', 240, 660, 960, 'descrição', '0.00'),
(128, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(129, 'virtual', 240, 660, 960, 'descrição', '0.00'),
(130, 'agua - marinha', 240, 660, 960, 'descrição', '0.00'),
(131, 'quartzo rosa', 240, 660, 960, 'descrição', '0.00'),
(132, 'lilac', 240, 660, 960, 'descrição', '0.00'),
(133, 'moscatel', 240, 660, 960, 'descrição', '0.00'),
(134, 'turquesa', 240, 660, 960, 'descrição', '0.00'),
(135, 'amazonita', 240, 660, 960, 'descrição', '0.00'),
(136, 'wasabi', 240, 660, 960, 'descrição', '0.00'),
(137, 'esmeralda', 240, 660, 960, 'descrição', '0.00'),
(138, 'antique', 240, 660, 960, 'descrição', '0.00'),
(139, 'ouro branco', 240, 660, 960, 'descrição', '0.00'),
(140, 'champagne', 240, 660, 960, 'descrição', '0.00'),
(141, 'ouro platino', 240, 660, 960, 'descrição', '0.00'),
(142, 'ouro nobre', 240, 660, 960, 'descrição', '0.00'),
(143, 'maxi gold', 240, 660, 960, 'descrição', '0.00'),
(144, 'ouro amarelo', 240, 660, 960, 'descrição', '0.00'),
(145, 'hermes', 240, 660, 960, 'descrição', '0.00'),
(146, 'passion', 240, 660, 960, 'descrição', '0.00'),
(147, 'copper', 240, 660, 960, 'descrição', '0.00'),
(148, 'rust', 240, 660, 960, 'descrição', '0.00'),
(149, 'nobuck', 240, 660, 960, 'descrição', '0.00'),
(150, 'cafe', 240, 660, 960, 'descrição', '0.00'),
(151, 'rubi', 240, 660, 960, 'descrição', '0.00'),
(152, 'pimenta rosa', 240, 660, 960, 'descrição', '0.00'),
(153, 'begonia', 240, 660, 960, 'descrição', '0.00'),
(154, 'ametista', 240, 660, 960, 'descrição', '0.00'),
(155, 'shiraz', 240, 660, 960, 'descrição', '0.00'),
(156, 'fantasy', 240, 660, 960, 'descrição', '0.00'),
(157, 'galaxia', 240, 660, 960, 'descrição', '0.00'),
(158, 'jeans', 240, 660, 960, 'descrição', '0.00'),
(159, 'aluminium', 240, 660, 960, 'descrição', '0.00'),
(160, 'platino', 240, 660, 960, 'descrição', '0.00'),
(161, 'grafite', 240, 660, 960, 'descrição', '0.00'),
(162, 'onix', 240, 660, 960, 'descrição', '0.00'),
(163, 'perola negra', 240, 660, 960, 'descrição', '0.00'),
(164, 'champagne telado', 240, 660, 960, 'descrição', '0.00'),
(165, 'nobuck telado', 240, 660, 960, 'descrição', '0.00'),
(166, 'cafe telado', 240, 660, 960, 'descrição', '0.00'),
(167, 'antique telado', 240, 660, 960, 'descrição', '0.00'),
(168, 'rubi telado', 240, 660, 960, 'descrição', '0.00'),
(169, 'galaxia telado', 240, 660, 960, 'descrição', '0.00'),
(170, 'lilac telado', 240, 660, 960, 'descrição', '0.00'),
(171, 'perola branca telado', 240, 660, 960, 'descrição', '0.00'),
(172, 'aluminium telado', 240, 660, 960, 'descrição', '0.00'),
(173, 'onix telado', 240, 660, 960, 'descrição', '0.00'),
(174, 'maxi gold', 240, 660, 960, 'descrição', '0.00'),
(175, 'esmeralda', 240, 660, 960, 'descrição', '0.00'),
(176, 'rosa luxcent', 240, 660, 960, 'descrição', '0.00'),
(177, 'fantasy', 240, 660, 960, 'descrição', '0.00'),
(178, 'galaxia', 240, 660, 960, 'descrição', '0.00'),
(179, 'grafite', 240, 660, 960, 'descrição', '0.00'),
(180, 'onix', 240, 660, 960, 'descrição', '0.00'),
(181, 'perola - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(182, 'palha - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(183, 'amarelo - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(184, 'limao - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(185, 'turquesa - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(186, 'rosa - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(187, 'vermelho - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(188, 'preto - fora de linha', 240, 660, 960, 'descrição', '0.00'),
(189, 'verde', 240, 660, 960, 'descrição', '0.00'),
(190, 'amarelo', 240, 660, 960, 'descrição', '0.00'),
(191, 'laranja', 240, 660, 960, 'descrição', '0.00'),
(192, 'vermelho', 240, 660, 960, 'descrição', '0.00'),
(193, 'rosa', 240, 660, 960, 'descrição', '0.00'),
(194, 'roxo', 240, 660, 960, 'descrição', '0.00'),
(195, 'tabaco', 240, 660, 960, 'descrição', '0.00'),
(196, 'imbuia', 240, 660, 960, 'descrição', '0.00'),
(197, 'natural', 240, 660, 960, 'descrição', '0.00'),
(199, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(200, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(201, 'preto', 240, 660, 960, 'descrição', '0.00'),
(202, 'agua marinha', 240, 660, 960, 'descrição', '0.00'),
(203, 'quartzo rosa', 240, 660, 960, 'descrição', '0.00'),
(204, 'perola branca', 240, 660, 960, 'descrição', '0.00'),
(205, 'preto', 240, 660, 960, 'descrição', '0.00'),
(206, 'ouro', 240, 660, 960, 'descrição', '0.00'),
(207, 'prata', 240, 660, 960, 'descrição', '0.00'),
(208, 'branco brilho', 240, 660, 960, 'descrição', '0.00'),
(209, 'preto', 240, 660, 960, 'descrição', '0.00'),
(210, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(211, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(212, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(214, 'branco', 240, 660, 960, 'descrição', '0.00'),
(215, 'marfim', 240, 660, 960, 'descrição', '0.00'),
(216, 'pequim', 240, 660, 960, 'descrição', '0.00'),
(217, 'porto seguro', 240, 660, 960, 'descrição', '0.00'),
(219, 'natural', 240, 660, 960, 'descrição', '0.00'),
(220, 'marrom', 240, 660, 960, 'descrição', '0.00'),
(221, 'preto', 240, 660, 960, 'descrição', '0.00'),
(222, 'ibira/natural', 240, 660, 960, 'descrição', '0.00'),
(223, 'pavao', 240, 660, 960, 'descrição', '0.00'),
(224, 'royal', 240, 660, 960, 'descrição', '0.00'),
(225, 'pink', 240, 660, 960, 'descrição', '0.00'),
(226, 'limao', 240, 660, 960, 'descrição', '0.00'),
(227, 'branco', 240, 660, 960, 'descrição', '0.00'),
(228, 'creme', 240, 660, 960, 'descrição', '0.00'),
(229, 'marrom', 240, 660, 960, 'descrição', '0.00'),
(230, 'preto', 240, 660, 960, 'descrição', '0.00'),
(231, 'creme', 240, 660, 960, 'descrição', '0.00'),
(232, 'passione', 240, 660, 960, 'descrição', '0.00'),
(233, 'yoga', 240, 660, 960, 'descrição', '0.00'),
(234, 'fascino', 240, 660, 960, 'descrição', '0.00'),
(235, 'giallo', 240, 660, 960, 'descrição', '0.00'),
(236, 'saggezza', 240, 660, 960, 'descrição', '0.00'),
(237, 'mistero', 240, 660, 960, 'descrição', '0.00'),
(238, 'purezza', 240, 660, 960, 'descrição', '0.00'),
(239, 'color armadillo premium white', 240, 660, 960, 'descrição', '0.00'),
(240, 'color armadillo nero', 240, 660, 960, 'descrição', '0.00'),
(241, 'color laser premium white', 240, 660, 960, 'descrição', '0.00'),
(242, 'color laser nero', 240, 660, 960, 'descrição', '0.00'),
(243, 'pearl ice', 240, 660, 960, 'descrição', '0.00'),
(244, 'pearl radiant', 240, 660, 960, 'descrição', '0.00'),
(245, 'pearl silver', 240, 660, 960, 'descrição', '0.00'),
(246, 'pearl lime', 240, 660, 960, 'descrição', '0.00'),
(247, 'pearl orange', 240, 660, 960, 'descrição', '0.00'),
(248, 'pearl bordeaux', 240, 660, 960, 'descrição', '0.00'),
(249, 'pearl purple', 240, 660, 960, 'descrição', '0.00'),
(250, 'pearl dark grey', 240, 660, 960, 'descrição', '0.00'),
(251, 'cottage premium white', 240, 660, 960, 'descrição', '0.00'),
(252, 'cottage ivory', 240, 660, 960, 'descrição', '0.00'),
(253, 'nettuno bianco artico', 240, 660, 960, 'descrição', '0.00'),
(254, 'nettuno polvere', 240, 660, 960, 'descrição', '0.00'),
(255, 'nettuno grigio fendi', 240, 660, 960, 'descrição', '0.00'),
(256, 'nettuno pompelmo', 240, 660, 960, 'descrição', '0.00'),
(257, 'nettuno rosso fuoco', 240, 660, 960, 'descrição', '0.00'),
(258, 'nettuno blu navy', 240, 660, 960, 'descrição', '0.00'),
(259, 'nettuno carruba', 240, 660, 960, 'descrição', '0.00'),
(260, 'nettuno nero', 240, 660, 960, 'descrição', '0.00'),
(261, 'tweed extra white', 240, 660, 960, 'descrição', '0.00'),
(262, 'tweed white', 240, 660, 960, 'descrição', '0.00'),
(263, 'tweed camel', 240, 660, 960, 'descrição', '0.00'),
(264, 'tweed blue', 240, 660, 960, 'descrição', '0.00'),
(265, 'tweed dark grey', 240, 660, 960, 'descrição', '0.00'),
(266, 'pinstripe white', 240, 660, 960, 'descrição', '0.00'),
(267, 'pinstrioe dark grey', 240, 660, 960, 'descrição', '0.00'),
(268, 'matt premium white', 240, 660, 960, 'descrição', '0.00'),
(269, 'gloss premium white', 240, 660, 960, 'descrição', '0.00'),
(270, 'raster premium white', 240, 660, 960, 'descrição', '0.00'),
(271, 'bianco', 240, 660, 960, 'descrição', '0.00'),
(272, 'naturale', 240, 660, 960, 'descrição', '0.00'),
(273, 'gsk premium white', 240, 660, 960, 'descrição', '0.00'),
(274, 'snow fluid', 240, 660, 960, 'descrição', '0.00'),
(275, 'snow fiandra', 240, 660, 960, 'descrição', '0.00'),
(276, 'snow laser', 240, 660, 960, 'descrição', '0.00'),
(277, 'snow metal', 240, 660, 960, 'descrição', '0.00'),
(278, 'jade riccio', 240, 660, 960, 'descrição', '0.00'),
(279, 'jade laser', 240, 660, 960, 'descrição', '0.00'),
(280, 'jade onde', 240, 660, 960, 'descrição', '0.00'),
(281, 'jade metal', 240, 660, 960, 'descrição', '0.00'),
(282, 'jade lizard', 240, 660, 960, 'descrição', '0.00'),
(283, 'jade raster', 240, 660, 960, 'descrição', '0.00'),
(284, 'goya white', 240, 660, 960, 'descrição', '0.00'),
(285, 'desiree red', 240, 660, 960, 'descrição', '0.00'),
(286, 'andira grey', 240, 660, 960, 'descrição', '0.00'),
(287, 'black truffle', 240, 660, 960, 'descrição', '0.00'),
(288, 'mocha', 240, 660, 960, 'descrição', '0.00'),
(289, 'violet', 240, 660, 960, 'descrição', '0.00'),
(290, 'black', 240, 660, 960, 'descrição', '0.00'),
(291, 'pink', 240, 660, 960, 'descrição', '0.00'),
(292, 'lavender', 240, 660, 960, 'descrição', '0.00'),
(293, 'absynthe', 240, 660, 960, 'descrição', '0.00'),
(294, 'red', 240, 660, 960, 'descrição', '0.00'),
(295, 'grey', 240, 660, 960, 'descrição', '0.00'),
(296, 'indigo', 240, 660, 960, 'descrição', '0.00'),
(297, 'emerald', 240, 660, 960, 'descrição', '0.00'),
(298, 'milk', 240, 660, 960, 'descrição', '0.00'),
(299, 'botanic', 240, 660, 960, 'descrição', '0.00'),
(300, 'chocolate', 240, 660, 960, 'descrição', '0.00'),
(301, 'cognac', 240, 660, 960, 'descrição', '0.00'),
(302, 'galvanised', 240, 660, 960, 'descrição', '0.00'),
(303, 'gold leat', 240, 660, 960, 'descrição', '0.00'),
(304, 'ice silver', 240, 660, 960, 'descrição', '0.00'),
(305, 'ink', 240, 660, 960, 'descrição', '0.00'),
(306, 'ionised', 240, 660, 960, 'descrição', '0.00'),
(307, 'lime', 240, 660, 960, 'descrição', '0.00'),
(308, 'lustre', 240, 660, 960, 'descrição', '0.00'),
(309, 'nude', 240, 660, 960, 'descrição', '0.00'),
(310, 'red lacquer', 240, 660, 960, 'descrição', '0.00'),
(311, 'super gold', 240, 660, 960, 'descrição', '0.00'),
(312, 'violette', 240, 660, 960, 'descrição', '0.00'),
(313, 'white gold', 240, 660, 960, 'descrição', '0.00'),
(314, 'ice gold (fusilier)', 240, 660, 960, 'descrição', '0.00'),
(315, 'white gold (fusilier)', 240, 660, 960, 'descrição', '0.00'),
(316, 'cryogen white', 240, 660, 960, 'descrição', '0.00'),
(317, 'virtual pearl', 240, 660, 960, 'descrição', '0.00'),
(318, 'bright white', 240, 660, 960, 'descrição', '0.00'),
(319, 'pearl', 240, 660, 960, 'descrição', '0.00'),
(320, 'silver', 240, 660, 960, 'descrição', '0.00'),
(321, 'prata brilho', 240, 660, 960, 'descrição', '0.00'),
(322, 'prata fosco', 240, 660, 960, 'descrição', '0.00'),
(323, 'ouro fosco', 240, 660, 960, 'descrição', '0.00'),
(324, 'prata fosco escovado', 240, 660, 960, 'descrição', '0.00'),
(325, 'ouro fosco escovado', 240, 660, 960, 'descrição', '0.00'),
(326, 'prata brilho', 240, 660, 960, 'descrição', '0.00'),
(327, 'ouro brilho', 240, 660, 960, 'descrição', '0.00'),
(328, 'prata fosco', 240, 660, 960, 'descrição', '0.00'),
(329, 'ouro fosco', 240, 660, 960, 'descrição', '0.00'),
(330, 'prata ', 240, 660, 960, 'descrição', '0.00'),
(331, 'ouro', 240, 660, 960, 'descrição', '0.00'),
(332, 'basame bright white', 240, 660, 960, 'descrição', '0.00'),
(333, 'design bright white', 240, 660, 960, 'descrição', '0.00'),
(334, 'design natural white', 240, 660, 960, 'descrição', '0.00'),
(335, 'linear bright white', 240, 660, 960, 'descrição', '0.00'),
(336, 'tweed bright white', 240, 660, 960, 'descrição', '0.00'),
(337, 'concetto bianco', 240, 660, 960, 'descrição', '0.00'),
(338, 'finezza bianco', 240, 660, 960, 'descrição', '0.00'),
(339, 'couche fosco', 240, 660, 960, 'descrição', '0.00'),
(340, 'acetato 62x120', 240, 660, 960, 'descrição', '0.00'),
(341, 'kraft', 240, 660, 960, 'descrição', '0.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

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
(57, 'cartao', 100, '0.00', '1.10', '0.00', '110.00'),
(61, 'cartao', 100, '0.00', '4.81', '0.00', '481.44'),
(62, 'cartao', 100, '0.00', '6.00', '0.00', '600.00'),
(63, 'cartao', 500, '90.00', '1.37', '0.00', '684.90'),
(64, 'cartao', 500, '90.00', '1.50', '0.00', '749.90'),
(65, 'cartao', 999, '90.00', '0.94', '0.00', '937.70'),
(66, 'servico', 100, '0.00', '4.10', '0.00', '410.00'),
(67, 'cartao', 100, '0.00', '1.00', '0.00', '100.00'),
(68, 'cartao', 100, '0.00', '4.81', '0.00', '481.44'),
(69, 'cartao', 100, '0.00', '1.00', '0.00', '100.00'),
(70, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(71, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(72, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(73, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(74, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(75, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(76, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(77, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(78, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(79, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(80, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(81, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(82, 'servico', 100, '0.00', '11.62', '0.00', '1162.09'),
(83, 'servico', 100, '0.00', '11.62', '0.00', '1162.09'),
(84, 'servico', 100, '0.00', '11.62', '0.00', '1162.09'),
(85, 'cartao', 100, '0.00', '9.34', '0.00', '933.74'),
(86, 'servico', 100, '0.00', '11.62', '0.00', '1162.09'),
(87, 'servico', 100, '0.00', '11.62', '0.00', '1162.09');

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

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
(27, 41, 1, 2, '0.00'),
(31, 61, 1, 1, '0.00'),
(32, 63, 2, 4, '0.00'),
(33, 64, 2, 4, '0.00'),
(34, 65, 2, 4, '0.00'),
(35, 66, 1, 1, '0.00'),
(36, 68, 1, 1, '0.00'),
(37, 70, 2, 4, '0.00'),
(38, 70, 1, 1, '0.00'),
(39, 71, 2, 4, '0.00'),
(40, 71, 1, 1, '0.00'),
(41, 72, 2, 4, '0.00'),
(42, 72, 1, 1, '0.00'),
(43, 73, 2, 4, '0.00'),
(44, 73, 1, 1, '0.00'),
(45, 74, 2, 4, '0.00'),
(46, 74, 1, 1, '0.00'),
(47, 75, 2, 4, '0.00'),
(48, 75, 1, 1, '0.00'),
(49, 76, 2, 4, '0.00'),
(50, 76, 1, 1, '0.00'),
(51, 77, 2, 4, '0.00'),
(52, 77, 1, 1, '0.00'),
(53, 78, 2, 4, '0.00'),
(54, 78, 1, 1, '0.00'),
(55, 79, 2, 4, '0.00'),
(56, 79, 1, 1, '0.00'),
(57, 80, 2, 4, '0.00'),
(58, 80, 1, 1, '0.00'),
(59, 81, 2, 4, '0.00'),
(60, 81, 1, 1, '0.00'),
(61, 82, 1, 1, '0.00'),
(62, 83, 1, 1, '0.00'),
(63, 84, 1, 1, '0.00'),
(64, 85, 2, 4, '0.00'),
(65, 85, 1, 1, '0.00'),
(66, 86, 1, 1, '0.00'),
(67, 87, 1, 1, '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_colagem`
--

CREATE TABLE IF NOT EXISTS `servico_colagem` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `colagem_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
(16, 33, '100.00'),
(20, 61, '19.59'),
(21, 63, '125.00'),
(22, 64, '125.00'),
(23, 65, '125.00'),
(24, 66, '200.00'),
(25, 67, '100.00'),
(26, 68, '19.59'),
(27, 69, '100.00'),
(28, 70, '123.40'),
(29, 71, '123.40'),
(30, 72, '123.40'),
(31, 73, '123.40'),
(32, 74, '123.40'),
(33, 75, '123.40'),
(34, 76, '123.40'),
(35, 77, '123.40'),
(36, 78, '123.40'),
(37, 79, '123.40'),
(38, 80, '123.40'),
(39, 81, '123.40'),
(40, 82, '123.59'),
(41, 83, '123.59'),
(42, 84, '123.59'),
(43, 85, '123.40'),
(44, 86, '123.59'),
(45, 87, '123.59');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
(17, 48, 1, 100, 100, '2.20'),
(18, 66, 1, 100, 100, '0.00'),
(19, 82, 1, 100, 100, '2.20'),
(20, 83, 1, 100, 100, '2.20'),
(21, 84, 1, 100, 100, '2.20'),
(22, 86, 1, 100, 100, '2.20'),
(23, 87, 1, 100, 100, '2.20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_faca_cartao`
--

CREATE TABLE IF NOT EXISTS `servico_faca_cartao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `faca_cartao_id` int(11) NOT NULL,
  `faca_cartao_valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

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
(20, 57, 1, '60.00'),
(24, 61, 1, '60.00'),
(25, 63, 1, '60.00'),
(26, 64, 1, '60.00'),
(27, 65, 1, '60.00'),
(28, 68, 1, '60.00'),
(29, 70, 2, '120.00'),
(30, 71, 2, '120.00'),
(31, 72, 2, '120.00'),
(32, 73, 2, '120.00'),
(33, 74, 2, '120.00'),
(34, 75, 2, '120.00'),
(35, 76, 2, '120.00'),
(36, 77, 2, '120.00'),
(37, 78, 2, '120.00'),
(38, 79, 2, '120.00'),
(39, 80, 2, '120.00'),
(40, 81, 2, '120.00'),
(41, 85, 2, '120.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
(22, 46, 1, '400.00', 1, '35.00', 1),
(23, 66, 1, '0.00', 2, '0.00', 2),
(24, 82, 1, '300.00', 2, '30.00', 2),
(25, 83, 1, '300.00', 2, '30.00', 2),
(26, 84, 1, '300.00', 2, '30.00', 2),
(27, 86, 1, '300.00', 2, '30.00', 2),
(28, 87, 1, '300.00', 2, '30.00', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

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
(20, 55, 2, 5, '38.00', '12.00', 4, 1, 1, '30.00', '28.00'),
(24, 61, 2, 5, '38.00', '12.00', 4, 1, 0, '30.00', '28.00'),
(25, 62, 2, 5, '38.00', '12.00', 4, 10, 2, '30.00', '28.00'),
(26, 63, 2, 5, '38.00', '12.00', 4, 1, 0, '30.00', '28.00'),
(27, 64, 2, 5, '38.00', '12.00', 4, 1, 0, '30.00', '28.00'),
(28, 65, 2, 5, '38.00', '12.00', 4, 1, 0, '30.00', '28.00'),
(29, 68, 2, 5, '38.00', '12.00', 4, 1, 0, '30.00', '28.00'),
(30, 70, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(31, 71, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(32, 72, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(33, 73, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(34, 74, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(35, 75, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(36, 76, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(37, 77, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(38, 78, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(39, 79, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(40, 80, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(41, 81, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00'),
(42, 85, 2, 5, '38.00', '12.00', 4, 1, 2, '30.00', '28.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_laminacao`
--

CREATE TABLE IF NOT EXISTS `servico_laminacao` (
`id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  `laminacao_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

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
(21, 28, 1, '100.00'),
(25, 61, 1, '100.30'),
(26, 63, 1, '120.00'),
(27, 64, 1, '120.00'),
(28, 65, 1, '120.00'),
(29, 66, 1, '50.00'),
(30, 68, 1, '100.30'),
(31, 70, 1, '390.34'),
(32, 71, 1, '390.34'),
(33, 72, 1, '390.34'),
(34, 73, 1, '390.34'),
(35, 74, 1, '390.34'),
(36, 75, 1, '390.34'),
(37, 76, 1, '390.34'),
(38, 77, 1, '390.34'),
(39, 78, 1, '390.34'),
(40, 79, 1, '390.34'),
(41, 80, 1, '390.34'),
(42, 81, 1, '390.34'),
(43, 82, 1, '234.50'),
(44, 83, 1, '234.50'),
(45, 84, 1, '234.50'),
(46, 85, 1, '390.34'),
(47, 86, 1, '234.50'),
(48, 87, 1, '234.50');

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

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
(30, 43, 1, '0.00', 10, 0, '2.00'),
(37, 61, 1, '100.55', 21, 1, '2.00'),
(38, 61, 2, '0.00', 7, 0, '7.00'),
(39, 63, 1, '130.90', 13, 1, '2.00'),
(40, 63, 2, '0.00', 3, 0, '7.00'),
(41, 64, 1, '130.90', 13, 1, '2.00'),
(42, 64, 2, '0.00', 3, 0, '7.00'),
(43, 64, 1, '0.00', 13, 0, '5.00'),
(44, 65, 1, '130.00', 13, 1, '5.00'),
(45, 65, 2, '0.00', 3, 0, '7.00'),
(46, 65, 1, '0.00', 13, 0, '5.00'),
(47, 66, 1, '100.00', 10, 1, '0.00'),
(48, 68, 1, '100.55', 21, 1, '2.00'),
(49, 68, 2, '0.00', 7, 0, '7.00'),
(50, 70, 1, '0.00', 10, 0, '5.00'),
(51, 71, 1, '0.00', 10, 0, '5.00'),
(52, 72, 1, '0.00', 10, 0, '5.00'),
(53, 73, 1, '0.00', 10, 0, '5.00'),
(54, 74, 1, '0.00', 10, 0, '5.00'),
(55, 75, 1, '0.00', 10, 0, '5.00'),
(56, 76, 1, '0.00', 10, 0, '5.00'),
(57, 77, 1, '0.00', 10, 0, '5.00'),
(58, 78, 1, '0.00', 10, 0, '5.00'),
(59, 79, 1, '0.00', 10, 0, '5.00'),
(60, 80, 1, '0.00', 10, 0, '5.00'),
(61, 81, 1, '0.00', 10, 0, '5.00'),
(62, 82, 2, '0.00', 10, 0, '7.00'),
(63, 82, 1, '200.00', 20, 1, '5.00'),
(64, 83, 2, '0.00', 10, 0, '7.00'),
(65, 83, 1, '200.00', 20, 1, '5.00'),
(66, 84, 2, '0.00', 10, 0, '7.00'),
(67, 84, 1, '200.00', 20, 1, '5.00'),
(68, 85, 1, '0.00', 10, 0, '5.00'),
(69, 86, 2, '0.00', 10, 0, '7.00'),
(70, 86, 1, '200.00', 20, 1, '5.00'),
(71, 87, 2, '0.00', 10, 0, '7.00'),
(72, 87, 1, '200.00', 20, 1, '5.00');

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
(1, 'Fellipe Pinheiro', 'fellipe', ''),
(2, 'Eric', 'ericnakaw', ''),
(4, 'Fernando', 'fernando', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `papel`
--
ALTER TABLE `papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `servico_acabamento`
--
ALTER TABLE `servico_acabamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `servico_colagem`
--
ALTER TABLE `servico_colagem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `servico_faca`
--
ALTER TABLE `servico_faca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `servico_faca_cartao`
--
ALTER TABLE `servico_faca_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `servico_impressao`
--
ALTER TABLE `servico_impressao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `servico_impressao_cartao`
--
ALTER TABLE `servico_impressao_cartao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `servico_laminacao`
--
ALTER TABLE `servico_laminacao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `servico_papel`
--
ALTER TABLE `servico_papel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
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
