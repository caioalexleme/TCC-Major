-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Jul-2020 às 22:25
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(15) NOT NULL,
  `assunto` varchar(120) NOT NULL,
  `observacoes` varchar(250) NOT NULL,
  PRIMARY KEY (`id_contato`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `nome`, `email`, `telefone`, `assunto`, `observacoes`) VALUES
(4, 'Maria Ramos', 'maria@santos.com', '1195344-1866', 'Solicitar_Orcamento', 'Solicito um orçamento.'),
(7, 'Antonio Magno', 'antoniomagno@gmail.com', '11970908881', 'Fornecedores', 'Solicito inclusão.'),
(8, 'Rayell Santos', 'rayel.dossantos19@gmail.com', '11 50908080', 'Solicitar_Orcamento', 'Solicitar assunto.'),
(9, 'Rayell', 'rayel.dossantos16@gmail.com', '1140495369', 'Solicitar_Orcamento', 'Verificar orçamento.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` char(10) NOT NULL,
  `rua` varchar(160) NOT NULL,
  `num` varchar(6) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL,
  `complemento` varchar(160) DEFAULT NULL,
  `id_login` int(11) NOT NULL,
  `id_ped_venda` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_login` (`id_login`),
  KEY `id_ped_venda` (`id_ped_venda`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `rua`, `num`, `bairro`, `cidade`, `uf`, `complemento`, `id_login`, `id_ped_venda`) VALUES
(1, '9810', 'maria santos', '14', 'Eldorado', 'Diadema', 'SP', 'casa 2', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_forn` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(40) NOT NULL,
  `nome_forn` varchar(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_forn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_forn`, `razao_social`, `nome_forn`, `telefone`, `cnpj`, `email`) VALUES
(1, 'Cameras LTDA', 'Cameras', '11 40908800', '11', 'cameras@gmail.com'),
(6, 'Magno SSA', 'Magno LTDA', '11 980909000', '15', 'magno.santos16@gmail.com'),
(3, 'Trabalho LTDA', 'Trabalho', '11 70908801', '13', 'trabalho@gmail.com'),
(10, 'TECVOZ LTDA', 'TECVOZ', '(11) 3345-5555', '74.695.990/0001-66', 'tecvoz@hotmail.com'),
(9, 'Intelbras SA', 'Intelbras', '(11) 5611-0016', '82.901.000/0001-27', 'intelbras@intelbras.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `email`, `senha`) VALUES
(2, 'alan@gmail.com', '$2y$10$.qpdorioUGsxlqlgXx8XMeV5F8al2vTICP79P8aBozdRfvF5oykyW'),
(3, 'rayel.dossantos16@gmail.com', '$2y$10$zcdRSQtLiAoGnN37pULLfukVXwRYf2s1xAGgRVr4ssvm.RTXgffVK'),
(4, 'Major', '$2y$10$FwR5dsAgkKrxwlGeEyMVauQUwoSkC2A.y3D7G/YI9rKRF7ypKqqna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_adm`
--

DROP TABLE IF EXISTS `login_adm`;
CREATE TABLE IF NOT EXISTS `login_adm` (
  `id_login_adm` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_login_adm`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login_adm`
--

INSERT INTO `login_adm` (`id_login_adm`, `usuario`, `senha`) VALUES
(2, 'major', '$2y$10$aT04aHtOS5TbZu1AcsR76.4U7ROE5ng9MBOzQILT5Vj4oFimyhhAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao_empresa`
--

DROP TABLE IF EXISTS `manutencao_empresa`;
CREATE TABLE IF NOT EXISTS `manutencao_empresa` (
  `id_man_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(60) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(15) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id_man_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `manutencao_empresa`
--

INSERT INTO `manutencao_empresa` (`id_man_empresa`, `nome_empresa`, `cnpj`, `email`, `telefone`, `descricao`) VALUES
(1, 'Luibru', '33333333', 'luibru@gmail', '1111', 'gghg'),
(2, 'Diego', '22221', 'diego@gmail', '11111', 'ggggg'),
(3, 'Caio', '122222', 'caio@gmail.com', '1140901190', 'Verificação de manutenção'),
(4, 'Rayell Santos', '474169458', 'rayel.dossantos19@gmail.com', '11 40591100', 'Problemas na instalação'),
(5, 'Magno', '18988922090', 'rayel.dossantos10@gmail', '11 56900000', 'Verificar Camera'),
(6, 'Rayell', '019000', 'rayel.dossantos@gmail.com', '11 56890000', 'Solicito manutenção'),
(7, 'rayel', '12345678', 'rayel.r@gmail.com', '11 56789090', 'Servicos'),
(8, 'Rico Tech', '20101901000150', 'ricotech@gmail.com', '11 987909011', 'Verificação de câmera');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao_pessoa`
--

DROP TABLE IF EXISTS `manutencao_pessoa`;
CREATE TABLE IF NOT EXISTS `manutencao_pessoa` (
  `id_man_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(60) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(15) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id_man_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `manutencao_pessoa`
--

INSERT INTO `manutencao_pessoa` (`id_man_pessoa`, `nome_pessoa`, `cpf`, `email`, `telefone`, `descricao`) VALUES
(1, 'Mauro', '123.562.111-60', 'mauro10@gmail.com', '11 98000-1010', 'Erro na vizualização da câmera'),
(2, 'Rose', '111.456.228-88', 'rose133@gmail.com', '11 9810-1100', 'Visita técnica'),
(3, 'Rayell Santos', '41990188880', 'rayelsantos@hotmail.com', '11 980908080', 'Solicito Revisão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacote`
--

DROP TABLE IF EXISTS `pacote`;
CREATE TABLE IF NOT EXISTS `pacote` (
  `id_pacote` int(11) NOT NULL AUTO_INCREMENT,
  `desc_pacote` varchar(40) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `img` varchar(40) NOT NULL,
  `id_forn` int(11) NOT NULL,
  PRIMARY KEY (`id_pacote`),
  KEY `id_forn` (`id_forn`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacote`
--

INSERT INTO `pacote` (`id_pacote`, `desc_pacote`, `valor`, `img`, `id_forn`) VALUES
(3, 'Instalacoes 300M', '300.00', 'pacoteserv.jpg', 9),
(4, 'Instalacoes 600M', '600.00', 'pacote1serv.jpg', 9),
(5, 'Instalacoes 900M', '900.00', 'pacote2serv.jpg', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id_pgto` int(11) NOT NULL AUTO_INCREMENT,
  `desc_pgto` varchar(40) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id_pgto`),
  KEY `id_login` (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pgto`, `desc_pgto`, `id_login`) VALUES
(1, 'Boleto', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_venda`
--

DROP TABLE IF EXISTS `pedido_venda`;
CREATE TABLE IF NOT EXISTS `pedido_venda` (
  `id_ped_venda` int(11) NOT NULL AUTO_INCREMENT,
  `data_ped_venda` datetime NOT NULL,
  `valor_ped_venda` decimal(7,2) NOT NULL,
  `id_pgto` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id_ped_venda`),
  KEY `id_pgto` (`id_pgto`),
  KEY `id_login` (`id_login`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_venda`
--

INSERT INTO `pedido_venda` (`id_ped_venda`, `data_ped_venda`, `valor_ped_venda`, `id_pgto`, `id_login`) VALUES
(1, '2020-07-21 19:55:10', '300.00', 1, 3),
(2, '2020-07-22 17:49:00', '300.00', 1, 2),
(3, '2020-07-22 17:49:00', '550.00', 1, 2),
(4, '2020-07-22 17:50:18', '550.00', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `desc_prod` varchar(40) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `img` varchar(40) NOT NULL,
  `id_forn` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `id_forn` (`id_forn`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `desc_prod`, `valor`, `img`, `id_forn`) VALUES
(19, 'Camera Interna', '150.00', 'interna.jpg', 9),
(20, 'Camera Externa', '350.00', 'externa.jpg', 9),
(21, 'Camera Speed Dome', '11999.00', 'dome.jpg', 9),
(22, 'Camera MII 365', '198.00', 'minidome.jpg', 10),
(23, 'Camera IP', '200.00', 'ip.jpg', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registre_empresa`
--

DROP TABLE IF EXISTS `registre_empresa`;
CREATE TABLE IF NOT EXISTS `registre_empresa` (
  `CNPJ` char(18) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `conf_senha` varchar(255) NOT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registre_empresa`
--

INSERT INTO `registre_empresa` (`CNPJ`, `nome`, `telefone`, `email`, `senha`, `conf_senha`) VALUES
('08.729.864/0001-50', 'Innova Hospitais', '(11) 2178-2266', 'hospital@innova.com', '123', '123'),
('08.729.864/0001-70', 'Segurança de Negócios', '(11) 2316-1111', 'seg_negocios@gmail.com', '123', '123'),
('12345', 'Jose', '1140495369', 'jose@gmail.com', '123', '123'),
('23456', 'Rayell Diego Faustino dos Sant', '1140495369', 'rayel.dossantos16@gmail.com', '123', '123'),
('1234567890', 'Maria', '1140495369', 'maria@santos.com', '1234', '1234'),
('12223456789', 'Alexandre', '1140495369', 'alexandre@gmail.com', '123', '123'),
('12', 'Alan', '1140495369', 'alan@gmail.com', '$2y$10$.qpdorioUGsxlqlgXx8XMeV5F8al2vTICP79P8aBozdRfvF5oykyW', '$2y$10$LOIqEpiEv7dSYJqCRKLJNuaYr6BRcThQMdXxgqnORxvUD8wFgaafK'),
('11.225.222/0001-26', 'Major Seguranca', '(11) 40801120', 'Major', '$2y$10$FwR5dsAgkKrxwlGeEyMVauQUwoSkC2A.y3D7G/YI9rKRF7ypKqqna', '$2y$10$jXOyiqYrJd1.18rHxAQ4s.fkVbY3RfZ922NTHm6/gK.hOBziUtw6K');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registre_pessoa`
--

DROP TABLE IF EXISTS `registre_pessoa`;
CREATE TABLE IF NOT EXISTS `registre_pessoa` (
  `CPF` char(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `conf_senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registre_pessoa`
--

INSERT INTO `registre_pessoa` (`CPF`, `nome`, `telefone`, `email`, `senha`, `conf_senha`) VALUES
('551.112.388-88', 'Diego Santos', '(11) 98700-1533', 'diego@gmail.com', '123', '123'),
('112.678.888-06', 'Alexandre Alves', '(11) 97780-0010', 'alex@hotlook.com', '123', '123'),
('500.123.588-00', 'Rayell Diego', '11 999119916', 'rayel.dossantos16@gmail.com', '$2y$10$zcdRSQtLiAoGnN37pULLfukVXwRYf2s1xAGgRVr4ssvm.RTXgffVK', '$2y$10$s/XBrLW40jb5ianr4oaWMe9FiONMhE8ch0NgpTLds5aaTcqsHcBzO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
