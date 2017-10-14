-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Out-2017 às 20:22
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comumana_register`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grau_pertenca` enum('Irmão','Vocacionado','Missionário','Consagrado','Outro') NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=Aria DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`id`, `nome`, `email`, `grau_pertenca`, `data_criacao`) VALUES
(1, 'Silvio Cedrim JÃºnior', 'engenheirocedrim@gmail.com', 'Consagrado', '2017-08-09 20:43:40'),
(2, 'Samuel', 'sronaldlg@gmail.com', 'Missionário', '2017-08-14 14:41:20'),
(3, 'Marconi', 'marconi@gmail.com', 'Irmão', '2017-08-14 14:43:24'),
(4, 'Cynthia Vasconcelos Chaves Cedrim', 'cynthiavasconceloschaves@gmail.com', 'Consagrado', '0000-00-00 00:00:00'),
(5, 'Akilla Melo', 'akilla@gmail.com', 'Vocacionado', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `login` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `id_membro` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `senha`, `data_criacao`, `login`, `administrador`, `id_membro`) VALUES
(1, '123456', '0000-00-00 00:00:00', 'silvio', 1, 1),
(2, '123456', '0000-00-00 00:00:00', 'ronald', 0, 2),
(3, '123456', '0000-00-00 00:00:00', 'cynthia', 0, 4),
(4, '123456', '0000-00-00 00:00:00', 'akilla', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_membro` (`id_membro`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_usuario_membro` (`id_membro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
