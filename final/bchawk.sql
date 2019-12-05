-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13-Nov-2019 às 21:05
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bchawk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Documentos Históricos', NULL),
(2, 'Fotos Aéreas', NULL),
(3, 'Fotos Antigas', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `descricao`, `data`, `categoria_id`) VALUES
(1, 'Balneário Camboriú', '1953-10-10', 2),
(2, 'Itajaí', '1955-09-09', 2),
(3, 'Costa Verde Mar', '2019-11-13', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `descricao` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `fonte` varchar(256) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `descricao`, `url`, `data`, `fonte`, `post_id`) VALUES
(1, 'foto1', 'images/BALNEARIO5.jpg', '1953-10-10', 'Clube dos Entas', 1),
(2, 'Foto aérea', 'images/BALNEARIO6.jpg', '2019-11-13', 'http://cilitur.com.br', 1),
(4, 'Itajaí anos 50', 'images/itajai_anos50.jpg', '1955-10-10', 'Clube dos Entas', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `galeria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `descricao`, `galeria_id`) VALUES
(1, 'Foto da Praia Central 1953', 'Foto tirada em vôo da USAF', 1),
(2, 'Fotos de Itajaí', 'Fotos aéreas antigas de Itajaí', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_categoria1_idx` (`categoria_id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imagem_post_idx` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_galeria1_idx` (`galeria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_galeria1` FOREIGN KEY (`galeria_id`) REFERENCES `galeria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
