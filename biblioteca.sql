-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 22:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `curso` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeAluno` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `tituloLivro` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataDevolucao` date NOT NULL,
  `status` enum('Pendente','Devolvido') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `curso`, `nomeAluno`, `dataEmprestimo`, `tituloLivro`, `dataDevolucao`, `status`) VALUES
(2, '1º Enfermag', 'Bruno igor', '0000-00-00', 'Marvel', '0000-00-00', 'Pendente'),
(3, 'Enfermagem', 'lia', '2022-02-27', 'Chapeuzinho', '2022-02-27', 'Pendente'),
(4, '3inf', 'Augusto', '2022-02-20', 'Harry', '2022-02-25', 'Pendente'),
(5, '1hos', 'Juan', '2022-02-12', 'Harry Potter', '2022-02-16', 'Devolvido');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
