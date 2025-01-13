-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/01/2025 às 18:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hetalkshetalk`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titulo` varchar(40) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `diretor` varchar(20) DEFAULT NULL,
  `duracao` int(20) DEFAULT NULL,
  `titulo_original` varchar(20) DEFAULT NULL,
  `data_estreia` date DEFAULT NULL,
  `meta_dados` text DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `pais_origem` varchar(20) DEFAULT NULL,
  `roteiro` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `titulos`
--

INSERT INTO `titulos` (`id`, `data`, `titulo`, `tipo`, `categoria`, `diretor`, `duracao`, `titulo_original`, `data_estreia`, `meta_dados`, `sinopse`, `pais_origem`, `roteiro`) VALUES
(29, '2025-01-10 22:07:55', 'Virgin River', 'serie', 'romance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2025-01-13 14:29:47', 'Round 6', 'serie', 'terror', 'asdasda', NULL, 'asdadad', '1995-11-02', NULL, NULL, NULL, NULL),
(31, '2025-01-13 17:06:33', 'fsdfsdfs', 'serie', 'comedia', 'sdfsdfsdf', NULL, 'fsdfsdfs', '0000-00-00', 'dgdfgdfg', 'dfgdfgdgd', 'ersddggd', 'gdfgdfgdg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permissoes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `data`, `username`, `password`, `permissoes`) VALUES
(2, '2025-01-11 13:28:28', 'matheus', '123456', 'master');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
