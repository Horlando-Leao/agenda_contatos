-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/07/2021 às 01:09
-- Versão do servidor: 10.4.19-MariaDB
-- Versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda_contatos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `ativo` enum('sim','não') NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `email`, `ativo`, `data_criacao`, `data_atualizacao`) VALUES
(2, 'Horlando Leão 1', 'horlandoleao8@gmail.com1', 'sim', '2021-07-10 13:31:05', '2021-07-12 01:38:58'),
(6, 'Horlando Leão 11111', 'horlandoleao8@gmail.coms11', 'não', '2021-07-10 19:17:00', '2021-07-11 14:11:20'),
(7, 'aaaaaaaaaaa', 'aaaaaaaaaaa', 'sim', '2021-07-10 19:23:45', '2021-07-12 01:38:48'),
(8, 'bbbbbb', 'aaaa', 'não', '2021-07-10 19:59:30', '2021-07-11 14:11:24'),
(9, 'Horlando Leão1', 'horlandoleao8@gmail.com3', 'não', '2021-07-10 21:28:00', '2021-07-11 14:11:17'),
(10, 'bbbb', 'bbbbbbb', 'não', '2021-07-11 00:48:11', '2021-07-11 12:50:29'),
(12, 'teste', 'teste', 'não', '2021-07-11 13:01:02', '2021-07-11 14:11:13'),
(13, 'Horlando', 'ennio.benning@copergas.com.br', 'não', '2021-07-11 13:10:15', '2021-07-11 14:11:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `pais` varchar(20) NOT NULL DEFAULT 'Brasil',
  `cep` varchar(25) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `bairro` int(100) DEFAULT NULL,
  `logradouro` int(100) DEFAULT NULL,
  `id_contato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `id_contato` int(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `ativo` enum('sim','não') NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `telefone`
--

INSERT INTO `telefone` (`id`, `id_contato`, `telefone`, `ativo`, `data_criacao`, `data_atualizacao`) VALUES
(10, 2, '3333333', 'sim', '2021-07-12 02:40:27', '2021-07-12 03:35:43'),
(11, 2, '99999', 'sim', '2021-07-12 02:41:31', '0000-00-00 00:00:00'),
(12, 2, '999991111', 'sim', '2021-07-12 02:42:02', '0000-00-00 00:00:00'),
(13, 2, '999993333', 'sim', '2021-07-12 02:42:42', '0000-00-00 00:00:00'),
(14, 2, '11112222', 'sim', '2021-07-12 02:43:48', '0000-00-00 00:00:00'),
(15, 2, '777772222', 'sim', '2021-07-12 02:47:14', '0000-00-00 00:00:00'),
(16, 2, '12121212', 'sim', '2021-07-12 02:48:38', '0000-00-00 00:00:00'),
(18, 2, '12178757', 'sim', '2021-07-12 02:49:32', '0000-00-00 00:00:00'),
(20, 2, '78578', 'sim', '2021-07-12 02:50:19', '0000-00-00 00:00:00'),
(22, 2, '5645645', 'sim', '2021-07-12 02:50:59', '0000-00-00 00:00:00'),
(23, 2, '47474554', 'sim', '2021-07-12 02:51:18', '0000-00-00 00:00:00'),
(24, 2, '77777879876', 'sim', '2021-07-12 02:52:36', '0000-00-00 00:00:00'),
(26, 2, '(81) 9857-07284', 'sim', '2021-07-12 03:04:49', '0000-00-00 00:00:00'),
(27, 7, '57677656', 'sim', '2021-07-12 03:05:14', '0000-00-00 00:00:00'),
(28, 2, '77777', 'sim', '2021-07-12 03:27:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` int(100) NOT NULL,
  `email` int(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `ativo` enum('sim','não') NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_lista_telefonica_resumo`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_lista_telefonica_resumo` (
);

-- --------------------------------------------------------

--
-- Estrutura para view `vw_lista_telefonica_resumo`
--
DROP TABLE IF EXISTS `vw_lista_telefonica_resumo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lista_telefonica_resumo`  AS SELECT `con`.`id` AS `ID_USUARIO`, concat(`con`.`nome`,' - ',`con`.`email`) AS `NOME_USUARIO`, group_concat(`tel`.`telefone` separator ', ') AS `TELEFONES` FROM (`contatos` `con` left join `telefone` `tel` on(`tel`.`id_usuario` = `con`.`id`)) WHERE `con`.`ativo` like 'sim' GROUP BY `con`.`id` ORDER BY `con`.`nome` DESC ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contato` (`id_contato`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD KEY `id_usuario` (`id_contato`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_contato`) REFERENCES `contatos` (`id`);

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`id_contato`) REFERENCES `contatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
