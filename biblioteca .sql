-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Out-2017 às 01:48
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `ra` varchar(12) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `ra`, `senha`) VALUES
(1, 'Kaique Guedes', '1611320280', '38ee32572a29d6b381df5c026efd5e64'),
(2, 'Israellen Taines', '1611320127', '412620a2ddaf0cbab7da3207fa6c21ff');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bibliotecario`
--

INSERT INTO `bibliotecario` (`id`, `nome`, `usuario`, `senha`) VALUES
(2, 'leandro', '1', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `data_empre` datetime NOT NULL,
  `data_devo` datetime NOT NULL,
  `aluno_ra` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `quant` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`data_empre`, `data_devo`, `aluno_ra`, `livro_id`, `quant`) VALUES
('2017-10-25 00:00:00', '2017-10-27 00:00:00', 1611320280, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `livro` varchar(30) NOT NULL,
  `editora` varchar(20) NOT NULL,
  `descri` varchar(200) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `quant` int(2) NOT NULL,
  `autor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `livro`, `editora`, `descri`, `genero`, `quant`, `autor`) VALUES
(1, 'JAVA 8', 'Erica', 'Destinado a Estudantes de TI', 'Estudantil', 5, 'Roberto Affonso'),
(4, 'DIREITO CIVIL', 'Saraiva', 'Transmite o direito das obrigaÃ§Ãµes apresentando noÃ§Ãµes gerais sobre o tema', 'Estudantil', 4, 'GonÃ§alves, Roberto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bibliotecario`
--
ALTER TABLE `bibliotecario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
