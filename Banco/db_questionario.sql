-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Fev-2022 às 22:56
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_questionario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `nivel`) VALUES
(1, 'admin'),
(2, 'Assitente'),
(3, 'Coordenador'),
(4, 'Auxiliar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `titulo`) VALUES
(16, 'Teste de satisfação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `descricao`) VALUES
(1, 'Asssistente de Logística'),
(3, NULL),
(4, 'Supervisor de Operações Logísticas Interior'),
(5, 'Encarregada de Expedição'),
(6, 'Assistente da qualidade'),
(7, 'Auxiliar de Logística'),
(8, 'Diretora'),
(9, 'Assistente Financeiro'),
(10, 'Coordenadora de RH');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `avaliacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id`, `descricao`, `avaliacao_id`) VALUES
(56, 'Quão é a utilização dos serviços da nossa empresa?', 16),
(57, 'Quão profissional é nossa empresa ?', 16),
(58, 'Em coparação com os nosso concorrentes, a qualidade dos nossos serviços é superior ?', 16),
(59, 'Em coparação com os nosso concorrentes, o preço dos nossos serviços é ?', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao_respostas`
--

CREATE TABLE `questao_respostas` (
  `id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `respostas_id` int(11) NOT NULL,
  `avaliacao_id` int(11) NOT NULL,
  `escrita` varchar(555) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questao_respostas`
--

INSERT INTO `questao_respostas` (`id`, `data`, `status`, `respostas_id`, `avaliacao_id`, `escrita`, `usuarios_id`) VALUES
(96, '2022-02-20 20:36:54', 1, 177, 16, '0', 7),
(97, '2022-02-20 20:36:54', 1, 178, 16, '0', 7),
(98, '2022-02-20 20:36:54', 1, 162, 16, '0', 7),
(99, '2022-02-20 20:36:54', 1, 167, 16, '0', 7),
(100, '2022-02-20 20:36:54', 1, 172, 16, '0', 7),
(101, '2022-02-20 20:37:14', 1, 177, 16, '0', 7),
(102, '2022-02-20 20:37:14', 1, 181, 16, '0', 7),
(103, '2022-02-20 20:37:14', 1, 163, 16, '0', 7),
(104, '2022-02-20 20:37:14', 1, 168, 16, '0', 7),
(105, '2022-02-20 20:37:14', 1, 174, 16, '0', 7),
(106, '2022-02-20 20:37:30', 1, 177, 16, '0', 7),
(107, '2022-02-20 20:37:30', 1, 178, 16, '0', 7),
(108, '2022-02-20 20:37:30', 1, 163, 16, '0', 7),
(109, '2022-02-20 20:37:30', 1, 167, 16, '0', 7),
(110, '2022-02-20 20:37:30', 1, 172, 16, '0', 7),
(111, '2022-02-20 20:37:50', 1, 181, 16, '0', 7),
(112, '2022-02-20 20:37:50', 1, 182, 16, '0', 7),
(113, '2022-02-20 20:37:50', 1, 165, 16, '0', 7),
(114, '2022-02-20 20:37:50', 1, 169, 16, '0', 7),
(115, '2022-02-20 20:37:50', 1, 176, 16, '0', 7),
(116, '2022-02-20 20:38:11', 1, 177, 16, '0', 7),
(117, '2022-02-20 20:38:11', 1, 178, 16, '0', 7),
(118, '2022-02-20 20:38:11', 1, 179, 16, '0', 7),
(119, '2022-02-20 20:38:11', 1, 180, 16, '0', 7),
(120, '2022-02-20 20:38:11', 1, 181, 16, '0', 7),
(121, '2022-02-20 20:38:11', 1, 182, 16, '0', 7),
(122, '2022-02-20 20:38:11', 1, 165, 16, '0', 7),
(123, '2022-02-20 20:38:11', 1, 175, 16, '0', 7),
(124, '2022-02-20 21:44:31', 1, 177, 16, '0', 7),
(125, '2022-02-20 21:44:31', 1, 178, 16, '0', 7),
(126, '2022-02-20 21:44:31', 1, 179, 16, '0', 7),
(127, '2022-02-20 21:44:31', 1, 180, 16, '0', 7),
(128, '2022-02-20 21:44:31', 1, 181, 16, '0', 7),
(129, '2022-02-20 21:44:31', 1, 182, 16, '0', 7),
(130, '2022-02-20 21:44:31', 1, 162, 16, '0', 7),
(131, '2022-02-20 21:44:31', 1, 167, 16, '0', 7),
(132, '2022-02-20 21:44:31', 1, 172, 16, '0', 7),
(133, '2022-02-20 21:49:37', 1, 177, 16, '0', 7),
(134, '2022-02-20 21:49:37', 1, 178, 16, '0', 7),
(135, '2022-02-20 21:49:37', 1, 162, 16, '0', 7),
(136, '2022-02-20 21:49:37', 1, 167, 16, '0', 7),
(137, '2022-02-20 21:49:37', 1, 172, 16, '0', 7),
(138, '2022-02-20 21:49:54', 1, 177, 16, '0', 7),
(139, '2022-02-20 21:49:54', 1, 178, 16, '0', 7),
(140, '2022-02-20 21:49:54', 1, 162, 16, '0', 7),
(141, '2022-02-20 21:49:54', 1, 167, 16, '0', 7),
(142, '2022-02-20 21:49:54', 1, 172, 16, '0', 7),
(143, '2022-02-20 21:50:14', 1, 177, 16, '0', 7),
(144, '2022-02-20 21:50:14', 1, 179, 16, '0', 7),
(145, '2022-02-20 21:50:14', 1, 182, 16, '0', 7),
(146, '2022-02-20 21:50:14', 1, 162, 16, '0', 7),
(147, '2022-02-20 21:50:14', 1, 167, 16, '0', 7),
(148, '2022-02-20 21:50:14', 1, 172, 16, '0', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `resp` varchar(225) DEFAULT NULL,
  `questao_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resp`, `questao_id`, `tipo_id`) VALUES
(162, 'Extremamente convinete ', 56, 1),
(163, 'Muito convinete', 56, 1),
(164, 'Mais ao Menos convinete', 56, 1),
(165, 'Pouco conviniente', 56, 1),
(166, 'Nada conviniente ', 56, 1),
(167, 'Extremamente convinete ', 57, 1),
(168, 'Muito convinete', 57, 1),
(169, 'Mais ao Menos convinete', 57, 1),
(170, 'Pouco conviniente', 57, 1),
(171, 'Nada conviniente', 57, 1),
(172, 'Extremamente convinete ', 58, 1),
(173, 'Muito convinete', 58, 1),
(174, 'Mais ao Menos convinete', 58, 1),
(175, 'Pouco conviniente', 58, 1),
(176, 'Nada conviniente ', 58, 1),
(177, 'Extremamente superior', 59, 2),
(178, 'Extremamente superiorMuito superior', 59, 2),
(179, 'Mais ao Menos superior', 59, 2),
(180, 'Pouco superior', 59, 2),
(181, 'Mais ou menos inferior', 59, 2),
(182, 'Igual', 59, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Resposta única '),
(2, 'Multipla escolha'),
(3, 'Pergunta de resposta aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `acessos_id` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `acessos_id`, `cargos_id`) VALUES
(4, 'admin', 'admin@eneylton.com', '$2y$10$mZ.QuTVOWHefiG58kSk2K.BW3VDnDFu/l1fhYaBmRhQ5eJTJImThm', 1, 1),
(7, 'Eneylton Barros', 'eneylton@hotmail.com', '$2y$10$JZR7X2ZpplGhF4dtchAhJedF/Y0/4ynAOd8VBlR4ehJfLOKHX4mLG', 2, 1),
(13, 'ene', 'enex@gmail.com.br', '202cb962ac59075b964b07152d234b70', 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao_avaliacao1_idx` (`avaliacao_id`);

--
-- Índices para tabela `questao_respostas`
--
ALTER TABLE `questao_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questao_respostas_avaliacao1_idx` (`avaliacao_id`),
  ADD KEY `fk_questao_respostas_usuarios1_idx` (`usuarios_id`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_respostas_questao_idx` (`questao_id`),
  ADD KEY `fk_respostas_tipo1_idx` (`tipo_id`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuarios_acessos1_idx` (`acessos_id`),
  ADD KEY `fk_usuarios_cargos1_idx` (`cargos_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `questao_respostas`
--
ALTER TABLE `questao_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_questao_avaliacao1` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questao_respostas`
--
ALTER TABLE `questao_respostas`
  ADD CONSTRAINT `fk_questao_respostas_avaliacao1` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questao_respostas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_respostas_questao` FOREIGN KEY (`questao_id`) REFERENCES `questao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_respostas_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_acessos1` FOREIGN KEY (`acessos_id`) REFERENCES `acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
