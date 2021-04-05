-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2021 às 01:35
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `parimeiker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autonomo`
--

CREATE TABLE `autonomo` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autonomo`
--

INSERT INTO `autonomo` (`id`, `nome`, `email`, `tel`, `senha`, `cpf`) VALUES
(1, 'teste', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b', '1234567890'),
(2, 'teste2', 'teste@teste2', '12345678', '698dc19d489c4e4db73e28a713eab07b', '1234567890'),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(4, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(5, 'teste3', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b', '1234567890'),
(6, 'teste3', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b', '1234567890'),
(7, 'teste3', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b', '1234567890'),
(8, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(9, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(10, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `tel`, `senha`) VALUES
(1, 'teste', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b'),
(2, 'teste4', 'teste@teste', '12345678', '698dc19d489c4e4db73e28a713eab07b'),
(3, 'teste5', 'teste@teste.com', '12345678', '698dc19d489c4e4db73e28a713eab07b'),
(4, 'teste', 'teste@teste', '12335465', '698dc19d489c4e4db73e28a713eab07b'),
(5, 'teste', 'teste@teste2', '12335465', '698dc19d489c4e4db73e28a713eab07b'),
(6, 'teste', 'teste@teste', '123', '202cb962ac59075b964b07152d234b70'),
(7, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'Marlon Santana dos Santos', 'marlonfms2012@gmail.com2', '000000000000', '698dc19d489c4e4db73e28a713eab07b'),
(9, 'Marlon', 'marlonfms2012@gmail.com', '996469864', 'ed6372ce8a4eb2240e80dad6ba2d500b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `cnpj` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `tel`, `senha`, `cnpj`) VALUES
(1, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(2, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(4, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(5, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(6, 'aaa', 'aaa@aaa', '123456789', '47bce5c74f589f4867dbd57e9ca9f808', '12345678901234'),
(7, 'teste7', 'teste@teste', '000000000', '698dc19d489c4e4db73e28a713eab07b', 'serg4245'),
(8, 'teste8', 'teste@teste.com', '12345678', '698dc19d489c4e4db73e28a713eab07b', '090909090909');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autonomo`
--
ALTER TABLE `autonomo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autonomo`
--
ALTER TABLE `autonomo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
