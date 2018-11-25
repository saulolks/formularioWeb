-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25-Nov-2018 às 18:01
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formulariocadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `cep` int(9) NOT NULL,
  `rua` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numero` int(7) DEFAULT NULL,
  `bairro` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `nascimento`, `cpf`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `complemento`) VALUES
('3fc61080-e9a8-4696-99a9-be81322dce6a', 'Saulo Lucas Gomes Ferreira', '2018-11-05', 12345678987, 53401270, 'Rua Braz Marques Pinho Seabra', 779, 'Centro', 'Paulista', 'PE', ''),
('bfcb520f-30a8-4cfc-bbfb-4990c82beaed', 'MÃ¡rio Santos Cavalcanti', '2018-11-02', 98415615213, 68901076, 'Avenida ProcÃ³pio Rola', NULL, 'Santa Rita', 'MacapÃ¡', 'AM', ''),
('4d3940fd-75f6-44fa-a3b4-53b5fdc08a60', 'Maryane Maria Barros de Farias', '2018-05-01', 69845616874, 53401611, 'Travessa do Nobre', 2888, 'Nobre', 'Paulista', 'PE', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
