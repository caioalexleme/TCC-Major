-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Jun-2020 às 18:55
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cad_log`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(14, 'caio a', 'caio@gmail.com', 'caio', '$2y$10$A8yLjG7KhrzcJzQ8nAnwK.5lHi5/dmHGWR1kaVWKqU0MwAZ2js7Au'),
(13, 'eric', 'eric@gmail.com', 'eric', '$2y$10$aKgmfjvxV11KjjlR.00uG.iNtaZMndPdPCZHwJyhlG0vtPu2/tvMO'),
(12, 'afonso', 'afonso@hotmail.com', 'aff', '$2y$10$mEKl7LapPfqBlQKSZ4CT/uSQf4vn/mXmjZdbOHHzxaPZ5GlKfn1ti'),
(11, 'Alexandre lopes da silva benedito', 'alexandre.lopes10@hotmail.com', 'ale', '$2y$10$7fKam4aNLPrsS7zkcsPKsODu7yo/h96S116W/oPirF5IdLDYyrYOC'),
(10, 'Alexandre lopes da silva benedito', 'alexandre.lopes10@hotmail.com', 'ale', '$2y$10$ce1GVlz5IqnYFku/mvqOH.PPjohZfBgyZ5MzgfjbCl7F7OLLFYaJC'),
(9, 'ruy almeida', 'ruy@gmail.com', 'ruy', '$2y$10$fUgJuzyKxsXAJHeIGdrpku06/vc78j7njPlZCrneUHOx0rAYbSSSK'),
(15, 'rayel', 'rayel@gmail.com', 'rayel', '$2y$10$r5YpqYB1ryKLhhnVAqQ0ieHcnZME0LewE4C.EAMrUSoh6vGP05Ske');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
