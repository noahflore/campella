-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16/01/2023 às 01:56
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pessoas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amigui`
--

CREATE TABLE `amigui` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `numero` int(30) NOT NULL,
  `chave` varchar(30) NOT NULL,
  `checado` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `amigui`
--

INSERT INTO `amigui` (`id`, `nome`, `sobrenome`, `numero`, `chave`, `checado`) VALUES
(1, 'noah', 'flores', 0, '0', 0),
(1, 'noah', 'flores', 0, '0', 0),
(1, 'noah', 'flores', 0, '0', 0),
(1, 'noah', 'flores', 33, '0', 0),
(1, 'noah', 'flores', 44444444, 'e712ce637bf3815e', 1),
(1, 'sofia', 'amador', 33, 'e712ce637bf3815e', 1),
(1, 'camila', 'louca', 1111111, '6ff0df972c39dfc8', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `chave` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `insta` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `cpf` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `sobrenome`, `numero`, `chave`, `email`, `insta`, `estado`, `cidade`, `cep`, `cpf`) VALUES
(1, 'camila', 'louca', '333', '72b6534d4a6baede', 'teste27@gmail.com', 'sssss', 'sssssssss', 'ipira', '333333333333', '33333333'),
(1, 'lucas', 'safado', '2222222', '8fe43d963787b4e5', 'teste28@gmail.com', 'sssss', 'bahia', 'ipira', '333333333333', '33333333');

-- --------------------------------------------------------

--
-- Estrutura para tabela `kants`
--

CREATE TABLE `kants` (
  `id` int(11) NOT NULL,
  `quantidade` bigint(20) NOT NULL,
  `checado` varchar(100) NOT NULL,
  `meno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `kants`
--

INSERT INTO `kants` (`id`, `quantidade`, `checado`, `meno`) VALUES
(1, 11000, '$2y$10$GOGGfn6eahKBFgkF.25CvO2Oyk43RHa0gdJNZbYJys8ieFIBiV0LO', 6),
(25, 0, '$2y$10$zqh1nPxUOh6wrzsm/KGwV.dZwOizdOuDOP8Pc4i/eyrrkj1gjBWmy', 2),
(26, 1000, '$2y$10$xPUcECHSSaS.7Nmtc9bonOMRaPFVQ6acQhqsxs6vJtOfapJ9rJNfy', 5),
(29, 0, '$2y$10$MXkR/HnIiXV6PBGQ9G2T0O/.aSEjuDGW7uhck5/AsbYEOTPU8JpQq', 7),
(32, 2000, '$2y$10$3HHMF0wBQ6/ebRwoFvimOeJJpsMyOoE/8ESs/oOBmmTQp6FL98q3q', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `sexo` enum('f','m','o') NOT NULL,
  `cre` datetime NOT NULL,
  `modi` datetime NOT NULL,
  `dia` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `sobrenome`, `email`, `senha`, `sexo`, `cre`, `modi`, `dia`, `tipo`, `ip`) VALUES
(1, 'noah', 'flores', 'root@root.com', '$2y$10$qejOuO3ngdWcR2SpSlbAZOFw9iKs9UDbHQk5UAB7DqRHZ8pMyWAuy', 'o', '2022-10-20 09:33:00', '2022-12-23 05:23:00', 14, 'D+WM0000', '::1'),
(3, 'noah1', 'flores1', 'teste@gmail.com', '$2y$10$4xMp5K5GltNzbflHMq2c7uhFjCS8kianyHkf.wSkC2Mai/GCySC7G', 'f', '2022-10-21 03:59:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(9, 'bigode', 'amigo', '2teste@gmail.com', '$2y$10$2pAZ.c40An/L.GBwmxSmlOiMM5B4r7M/x7vgDv.2AWH80bjxbrRvG', 'f', '2022-10-21 04:27:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(10, 'bigode', 'amigo', '32teste@gmail.com', '2222222', 'f', '2022-10-21 04:27:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(11, 'bigode', 'amigo', '323teste@gmail.com', '11111', 'f', '2022-10-21 04:29:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(17, 'bigode', 'amigo', '323teste@gmail.com1', 'a', 'f', '2022-10-21 04:43:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(18, 'aa', 'amigo', '666teste@gmail.com', 'a', 'f', '2022-10-21 05:37:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(19, 'aa', 'amigo', '6666teste@gmail.com', '', 'f', '2022-10-21 05:40:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(20, 'aa', 'amigo', '66666teste@gmail.com', '$2y$10$rNayZZL2GqtzzVv8qi3rLuuHrOHL3irfqSuUGucJjtf7gTVtLyHCu', 'f', '2022-10-21 06:01:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(21, 'aa', 'bb', 'a@a', '$2y$10$Xo54tL3UEklEXFpHSYY5AOrLeFsvYCtvATDUaboIUpVs0LEOu7G22', 'f', '2022-10-28 09:45:00', '0000-00-00 00:00:00', 0, 'DBWM0000', ''),
(22, 'teste25', 'n', 'teste25@gmail.com', '$2y$10$LXb.nqEC9BnoZuAYYpEwuesO5xwIcmPe0SP6PNOHk8AS46K9dqxFm', 'f', '2022-11-16 07:52:00', '0000-00-00 00:00:00', 19, 'SBWM0000', ''),
(24, 'teste26', 'n', 'teste26@gmail.com', '$2y$10$UX1MXom2eyrnJ2elcXH95u8ifeNLLriZ3ACcGVmdbtXYdLxvloOt2', 'f', '2022-11-18 04:18:00', '0000-00-00 00:00:00', 18, 'SBWM0000', ''),
(25, 'teste27', 'n', 'teste27@gmail.com', '$2y$10$CX6QBdgUIpC.77qLUbbrVuVPiY.DNHApeJ4IbE1TJ8EJMggiIagHq', 'f', '2022-11-18 04:32:00', '0000-00-00 00:00:00', 26, 'DBWM0000', '::1'),
(26, 'teste28', 'n', 'teste28@gmail.com', '$2y$10$nRDwPy81MBhBGSb0W9nM7eFLN2PwZuG0YukMOL90LXe5qthJJ/alS', 'f', '2022-12-13 04:37:00', '0000-00-00 00:00:00', 15, 'DBWM0000', '::1'),
(27, 'teste32', 'n', 'teste32@gmail.com', '$2y$10$F7Jb0Xuy0JZlR6SGJ7vbPetwXsYuzUf8bJYhw43Drxys0iK5mgnui', 'f', '2023-01-07 08:04:00', '0000-00-00 00:00:00', 7, 'DBWM0000', '::1'),
(28, 'teste33', 'n', 'teste33@gmail.com', '$2y$10$e9dzK0IrrxZWK8ri.ft1FewBMyU7q8cpJpHxNRsqh3oktYBBD6XWK', 'f', '2023-01-07 08:08:00', '0000-00-00 00:00:00', 7, 'DBWM0000', '::1'),
(29, 'teste34', 'n', 'teste34@gmail.com', '$2y$10$qlCMV3lNmYo7Rlfj90u6h.4pJYL3tN8.7XPZH9qZAgxoTRgt6PuL.', 'f', '2023-01-07 08:11:00', '0000-00-00 00:00:00', 7, 'DBWM0000', '::1'),
(32, 'teste35', 'n', 'teste35@gmail.com', '$2y$10$UVCC8hXMKtL1COvHer.myeJOTBLErBtVwzlBnO5lv.4/CCqVrsHYq', 'f', '2023-01-09 03:55:00', '0000-00-00 00:00:00', 13, 'DBWM0000', '::1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `chave` (`chave`);

--
-- Índices de tabela `kants`
--
ALTER TABLE `kants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meno` (`meno`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `kants`
--
ALTER TABLE `kants`
  MODIFY `meno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
