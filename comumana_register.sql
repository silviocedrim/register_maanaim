-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2017 às 15:47
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
-- Estrutura da tabela `campista`
--

CREATE TABLE `campista` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_nascimento` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `sexo` varchar(9) NOT NULL,
  `peso` double DEFAULT NULL,
  `altura` varchar(5) DEFAULT NULL,
  `camisa` varchar(3) DEFAULT NULL,
  `paroquia` varchar(255) DEFAULT NULL,
  `paroco` varchar(255) DEFAULT NULL,
  `sacramento` varchar(20) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `problema_saude` varchar(255) DEFAULT NULL,
  `remedio` varchar(255) DEFAULT NULL,
  `plano_saude` varchar(255) DEFAULT NULL,
  `conhece_acampamento` varchar(255) DEFAULT NULL,
  `porque_parcicipar` varchar(255) DEFAULT NULL,
  `conhece_campista` varchar(255) DEFAULT NULL,
  `conhece_equipe` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `telefone_responsavel` varchar(15) DEFAULT NULL,
  `grau_parentesco` varchar(20) DEFAULT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campista`
--

INSERT INTO `campista` (`id`, `cpf`, `nome`, `email`, `data_nascimento`, `idade`, `rg`, `sexo`, `peso`, `altura`, `camisa`, `paroquia`, `paroco`, `sacramento`, `cep`, `rua`, `numero`, `bairro`, `complemento`, `cidade`, `uf`, `telefone`, `problema_saude`, `remedio`, `plano_saude`, `conhece_acampamento`, `porque_parcicipar`, `conhece_campista`, `conhece_equipe`, `responsavel`, `telefone_responsavel`, `grau_parentesco`, `id_responsavel`) VALUES
(10, '07150770401', 'Silvio Luiz Gomes Cedrim JÃºnior', 'silviocedrim@outlook.com', '20/7/1987', 30, '7344858 SDS/PE', 'masculino', 76, '1.70', 'g', 'Soledade', 'Padre Paulo SÃ©rgio', 'Crisma', '52021060', 'Rua Gomes Pacheco', 382, 'Espinheiro', 'Apto 503 B', 'Recife', 'PE', '(99) 99999-9999', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', 'Sim', 'Sim', 'Sim', 'Chiquinha', '(22) 22222-2222', 'MÃ£e', 6),
(20, '07527825655', 'Cynthia Vasconcelos Chaves Cedrim', 'cynthiavasconceloschaves@gmail.com', '21/10/1987', 30, '7344858 SDS/PE', 'feminino', 76, '1.70', 'm', 'Soledade', 'Padre Paulo SÃ©rgio', 'Crisma', '52021060', 'Rua Gomes Pacheco', 382, 'Espinheiro', 'Apto 503 B', 'Recife', 'PE', '(87) 87878-7878', 'NÃ£o', 'NÃ£o', 'NÃ£o', 'Sim', 'Sim', 'Sim', 'Sim', 'Chiquinha', '(81) 81818-1818', 'MÃ£e', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grau_pertenca` enum('Irmão','Vocacionado','Missionário','Consagrado','Outro') NOT NULL,
  `data_criacao` datetime NOT NULL,
  `senha` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=Aria DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`id`, `nome`, `email`, `grau_pertenca`, `data_criacao`, `senha`, `login`, `administrador`) VALUES
(1, 'Silvio Cedrim JÃºnior', 'engenheirocedrim@gmail.com', 'Consagrado', '2017-11-09 18:37:28', '123456', 'silvio', 1),
(2, 'Samuel', 'sronaldlg@gmail.com', 'Missionário', '2017-11-09 18:37:28', '123456', 'ronald', 0),
(3, 'Marconi', 'marconi@gmail.com', 'Irmão', '2017-11-09 18:37:28', '123456', 'marconi', 0),
(4, 'Cynthia Vasconcelos Chaves Cedrim', 'cynthiavasconceloschaves@gmail.com', 'Consagrado', '2017-11-09 18:37:28', '123456', 'cynthia', 0),
(5, 'Akilla Melo', 'akilla@gmail.com', 'Vocacionado', '2017-11-09 18:37:28', '123456', 'akilla', 0),
(6, 'Silvia Gabriela GonÃ§alves Cedrim', 'bibi@gmail.com', 'Consagrado', '0000-00-00 00:00:00', '123456', 'gabicedrim', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento_inscricao`
--

CREATE TABLE `pagamento_inscricao` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `quantidade_parcelas` int(11) NOT NULL,
  `desconto` double NOT NULL,
  `id_campista` int(11) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamento_inscricao`
--

INSERT INTO `pagamento_inscricao` (`id`, `tipo`, `valor`, `quantidade_parcelas`, `desconto`, `id_campista`) VALUES
(1, 'Cheque', 70, 1, 0, 10),
(2, 'Dinheiro', 100, 1, 0, 20),
(3, 'Cheque', 70, 1, 10, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campista`
--
ALTER TABLE `campista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_membro_responsavel` (`id_responsavel`);

--
-- Indexes for table `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamento_inscricao`
--
ALTER TABLE `pagamento_inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campista` (`id_campista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campista`
--
ALTER TABLE `campista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pagamento_inscricao`
--
ALTER TABLE `pagamento_inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
