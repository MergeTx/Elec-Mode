-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Mar-2024 às 01:43
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `elec_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome_categoria`) VALUES
(1, 'Eletrônicos'),
(2, 'Roupas'),
(3, 'Alimentos'),
(4, 'Livros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `categoria_id` varchar(100) DEFAULT NULL,
  `marca_produto` varchar(100) DEFAULT NULL,
  `preco_produto` decimal(10,2) NOT NULL,
  `descricao_produto` text DEFAULT NULL,
  `disponibilidade_produto` tinyint(1) NOT NULL DEFAULT 1,
  `foto_produto` varchar(255) DEFAULT NULL,
  `qtd_estoque` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `categoria_id`, `marca_produto`, `preco_produto`, `descricao_produto`, `disponibilidade_produto`, `foto_produto`, `qtd_estoque`) VALUES
(1, 'Smartphone', '1', 'Samsung', 1200.00, 'Um smartphone de última geração com câmera de alta resolução e tela OLED.', 1, 'caminho/para/foto1.jpg', 50),
(2, 'Camiseta Polo', '2', 'Nike', 50.00, 'Uma camiseta de algodão confortável e elegante.', 1, 'caminho/para/foto2.jpg', 100),
(3, 'Arroz', '3', 'Tio João', 10.00, 'Arroz branco de grãos longos.', 1, 'caminho/para/foto3.jpg', 200),
(4, 'Introdução à Inteligência Artificial', '4', 'Editora ABC', 80.00, 'Livro introdutório sobre inteligência artificial.', 1, 'caminho/para/foto4.jpg', 30),
(5, 'Celular', '5', 'Samsumg', 0.00, 'A10S', 1, NULL, 8),
(6, 'A20s', '6', 'Samsumg', 1200.00, 'A20s', 20, NULL, 50),
(7, 'A30s', '7', 'Samsumg', 1300.00, 'A30s', 1, NULL, 10),
(8, 'A40s', '8', 'Samsumg', 1500.00, 'A40s', 1, NULL, 10),
(9, 'A50s', '9', 'Samsumg', 1800.00, 'A50s', 1, NULL, 10),
(10, 'Iphone 14 Pro Max', '10', 'Apple', 5500.00, 'Iphone 14 Pro Max', 1, NULL, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
