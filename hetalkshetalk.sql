-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/01/2025 às 20:38
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
-- Estrutura para tabela `atores`
--

CREATE TABLE `atores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `falecimento` date NOT NULL,
  `nacionalidade` varchar(30) NOT NULL,
  `nome_artistico` varchar(30) DEFAULT NULL,
  `cidade_nascimento` varchar(30) DEFAULT NULL,
  `estado_nascimento` varchar(30) DEFAULT NULL,
  `filhos` text DEFAULT NULL,
  `conjuges` text DEFAULT NULL,
  `txt_apresentacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atores`
--

INSERT INTO `atores` (`id`, `nome`, `nascimento`, `falecimento`, `nacionalidade`, `nome_artistico`, `cidade_nascimento`, `estado_nascimento`, `filhos`, `conjuges`, `txt_apresentacao`) VALUES
(1, 'John Christopher Depp II', '1963-06-09', '0000-00-00', 'Estados Unidos', 'Johny Deep', NULL, NULL, NULL, NULL, NULL),
(2, 'Matheus de Oliveira Timotheo', '1995-11-02', '0000-00-00', 'Brasileiro', 'Eu sou Matheus, você não é Mat', 'Rio de Janeiro', 'RJ', 'Leonardo de Souza Timotheo', 'Bianca Campos Borges', 'Eu sou Matheus, você não é Matheus.'),
(3, 'Bianca Campos Borges', '1111-11-11', '0000-00-00', 'Brasileiro', 'Bibi', NULL, NULL, NULL, NULL, NULL),
(4, 'Bianca Campos Borges', '1111-11-11', '0000-00-00', 'Brasileiro', 'Bibi', NULL, NULL, NULL, NULL, NULL),
(5, 'Leonardo de Souza Timotheo', '2020-02-20', '0000-00-00', 'brasileiro', 'Léo', NULL, NULL, NULL, NULL, NULL),
(6, 'Joelma de Oliveira Timoheo', '1972-08-13', '0000-00-00', 'brasileira', 'calypso', NULL, NULL, NULL, NULL, NULL),
(7, 'Wagner Santos Timotheo', '1967-11-18', '0000-00-00', 'Brasileiro', 'Wagner', NULL, NULL, NULL, NULL, NULL),
(8, 'Leonardo timotheo', '1111-11-11', '0000-00-00', 'Br', 'leo', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `data`, `categoria`) VALUES
(1, '2025-01-13 17:20:10', 'Comédia'),
(2, '2025-01-13 17:20:32', 'Terror'),
(3, '2025-01-14 15:51:19', 'Romance'),
(4, '2025-01-15 19:08:07', 'Ação'),
(5, '2025-01-15 19:09:12', 'Drama');

-- --------------------------------------------------------

--
-- Estrutura para tabela `elencos`
--

CREATE TABLE `elencos` (
  `id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL,
  `ator_id` int(11) NOT NULL,
  `papel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `elencos`
--

INSERT INTO `elencos` (`id`, `titulo_id`, `ator_id`, `papel`) VALUES
(2, 37, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titulo` varchar(40) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `diretor` varchar(20) DEFAULT NULL,
  `duracao` int(20) DEFAULT NULL,
  `titulo_original` varchar(20) DEFAULT NULL,
  `data_estreia` date DEFAULT NULL,
  `meta_dados` text DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `pais_origem` varchar(20) DEFAULT NULL,
  `roteiro` varchar(30) DEFAULT NULL,
  `classificacao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `titulos`
--

INSERT INTO `titulos` (`id`, `data`, `titulo`, `tipo`, `diretor`, `duracao`, `titulo_original`, `data_estreia`, `meta_dados`, `sinopse`, `pais_origem`, `roteiro`, `classificacao`) VALUES
(29, '2025-01-10 22:07:55', 'Virgin River', 'serie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2025-01-13 14:29:47', 'Round 6', 'serie', 'asdasda', NULL, 'asdadad', '1995-11-02', NULL, NULL, NULL, NULL, NULL),
(31, '2025-01-13 17:06:33', 'fsdfsdfs', 'serie', 'sdfsdfsdf', NULL, 'fsdfsdfs', '0000-00-00', 'dgdfgdfg', 'dfgdfgdgd', 'ersddggd', 'gdfgdfgdg', NULL),
(32, '2025-01-14 14:58:36', 'asdasd', 'serie', 'asdads', 0, 'asdasd', '1111-11-11', 'dsasdasd', 'asdasdad', 'asdads', 'asdadsa', NULL),
(33, '2025-01-15 18:48:19', 'Ghost Recon', 'filme', 'Matheus de oliveira ', 105, 'Ghost Recon', '1995-11-02', 'Filme de ação onde soldados enfrentam o quartel de medelim', 'Filme de ação onde soldados enfrentam o quartel de medelim', 'Brasil', 'Bianca Campos Borges', '18 anos'),
(37, '2025-01-16 17:33:44', 'asdasd', 'filme', 'asdasd', 0, 'asdasd', '1111-11-11', 'asdasd', 'asdasdasd', 'asdasdasdasd', '', 'asdasd'),
(38, '2025-01-16 17:40:17', '', '', '', 0, '', '0000-00-00', '', '', '', '', ''),
(39, '2025-01-16 17:40:44', '', '', '', 0, '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `titulo_categoria`
--

CREATE TABLE `titulo_categoria` (
  `titulo_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `titulo_categoria`
--

INSERT INTO `titulo_categoria` (`titulo_id`, `categoria_id`) VALUES
(32, 1),
(32, 2),
(33, 3),
(33, 2),
(37, 1);

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
-- Índices de tabela `atores`
--
ALTER TABLE `atores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices de tabela `elencos`
--
ALTER TABLE `elencos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titulo_id` (`titulo_id`),
  ADD KEY `ator_id` (`ator_id`);

--
-- Índices de tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD KEY `titulo_id` (`titulo_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atores`
--
ALTER TABLE `atores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `elencos`
--
ALTER TABLE `elencos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `elencos`
--
ALTER TABLE `elencos`
  ADD CONSTRAINT `elencos_ibfk_1` FOREIGN KEY (`titulo_id`) REFERENCES `titulos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elencos_ibfk_2` FOREIGN KEY (`ator_id`) REFERENCES `atores` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD CONSTRAINT `titulo_categoria_ibfk_1` FOREIGN KEY (`titulo_id`) REFERENCES `titulos` (`id`),
  ADD CONSTRAINT `titulo_categoria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
