-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2018 às 05:18
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comicshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_produto`, `id_usuario`) VALUES
(17, 1, 8),
(19, 1, 8),
(20, 1, 8),
(21, 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `papeis`
--

CREATE TABLE `papeis` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `papeis`
--

INSERT INTO `papeis` (`id`, `descricao`) VALUES
(0, 'admin'),
(1, 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` double(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text,
  `dataCadastro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `quantidade`, `descricao`, `dataCadastro`) VALUES
(1, 'Demolidor - A queda de Murdock', 60.00, 9, 'asndlaksl', '2018-11-22 14:52:42'),
(3, 'Oldman Logan', 78.00, 0, 'akslaÃ§lskdÃ§aksk asdÃ§kaslÃ§kads asdjalkjsldkaj  klajsdlkjasld', '2018-11-23 16:03:38'),
(4, 'teste', 100.00, 2, 't', '2018-11-24 22:38:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `papel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `papel`) VALUES
(3, 'jose', 'jose@jose.jose', 'jose', '662eaa47199461d01a623884080934ab', 0),
(4, 'michel', 'michel@teste.com', 'mich', '698dc19d489c4e4db73e28a713eab07b', 0),
(5, 'teste', 'teste@teste.com', 'mich', '698dc19d489c4e4db73e28a713eab07b', 1),
(6, 'teste', 'teste@teste.com', 'mich', '698dc19d489c4e4db73e28a713eab07b', 1),
(7, 'teste', 'teste@teste.co', 'michel', '698dc19d489c4e4db73e28a713eab07b', 1),
(8, 'michel', 'michel@teste', 'michelvictor', '698dc19d489c4e4db73e28a713eab07b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_produto` (`id_produto`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indexes for table `papeis`
--
ALTER TABLE `papeis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_papel` (`papel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_papel` FOREIGN KEY (`papel`) REFERENCES `papeis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
