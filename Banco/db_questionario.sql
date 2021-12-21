-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Dez-2021 às 20:16
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.28

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
(7, 'Teste');

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
  `descricao` varchar(45) DEFAULT NULL,
  `avaliacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`id`, `descricao`, `avaliacao_id`) VALUES
(23, 'Qual a idade do papa ?', 7),
(24, 'Qual a cor do cavalo braco de napoleão ?', 7),
(25, 'Fale mais sobre sua empresa', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao_respostas`
--

CREATE TABLE `questao_respostas` (
  `id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `escrita` varchar(255) DEFAULT NULL,
  `questao_id` int(11) NOT NULL,
  `respostas_id` int(11) NOT NULL,
  `avaliacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questao_respostas`
--

INSERT INTO `questao_respostas` (`id`, `data`, `status`, `escrita`, `questao_id`, `respostas_id`, `avaliacao_id`) VALUES
(12, '2021-12-21 18:38:36', 1, NULL, 83, 76, 7),
(13, '2021-12-21 18:38:41', 1, NULL, 83, 78, 7),
(14, '2021-12-21 18:38:44', 1, NULL, 83, 81, 7),
(15, '2021-12-21 18:38:49', 1, 'Texte de cadastro...', 83, 0, 7),
(16, '2021-12-21 18:44:37', 1, NULL, 83, 73, 7),
(17, '2021-12-21 18:44:37', 1, NULL, 83, 78, 7),
(18, '2021-12-21 18:44:37', 1, NULL, 83, 81, 7),
(19, '2021-12-21 18:44:37', 1, 'Outtros', 83, 0, 7),
(20, '2021-12-21 18:52:29', 1, NULL, 83, 74, 7),
(21, '2021-12-21 18:52:29', 1, NULL, 83, 78, 7),
(22, '2021-12-21 18:52:29', 1, NULL, 83, 79, 7),
(23, '2021-12-21 18:52:29', 1, NULL, 83, 80, 7),
(24, '2021-12-21 18:52:29', 1, NULL, 83, 81, 7),
(25, '2021-12-21 18:52:29', 1, 'Teste de cadstro', 83, 0, 7),
(26, '2021-12-21 18:54:49', 1, NULL, 83, 74, 7),
(27, '2021-12-21 18:54:49', 1, NULL, 83, 78, 7),
(28, '2021-12-21 18:54:49', 1, NULL, 83, 79, 7),
(29, '2021-12-21 18:54:49', 1, NULL, 83, 80, 7),
(30, '2021-12-21 18:54:49', 1, NULL, 83, 81, 7),
(31, '2021-12-21 18:54:49', 1, 'teste', 83, 0, 7);

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
(73, '22', 23, 1),
(74, '90', 23, 1),
(75, '85', 23, 1),
(76, '35', 23, 1),
(77, NULL, 23, 1),
(78, 'Branco', 24, 2),
(79, 'Preto', 24, 2),
(80, 'Azul', 24, 2),
(81, 'Vermelho', 24, 2),
(82, NULL, 24, 2),
(83, NULL, 25, 3);

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
  ADD KEY `fk_questao_respostas_avaliacao1_idx` (`avaliacao_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `questao_respostas`
--
ALTER TABLE `questao_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  ADD CONSTRAINT `fk_questao_respostas_avaliacao1` FOREIGN KEY (`avaliacao_id`) REFERENCES `avaliacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
