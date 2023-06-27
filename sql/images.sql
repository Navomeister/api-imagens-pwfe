-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2023 às 22:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `images`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `id_img_prod` int(11) NOT NULL,
  `fk_produto` int(11) NOT NULL,
  `path_img_prod` varchar(250) NOT NULL,
  `desc_img_prod` varchar(250) NOT NULL,
  `fonte` varchar(250) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`id_img_prod`, `fk_produto`, `path_img_prod`, `desc_img_prod`, `fonte`, `data_criado`) VALUES
(1, 1, 'img/EvwoCc1XYAEUIzR.jfif', 'Um brinquedo da Churrasqueira Controle Remoto, um clássico da televisão brasileira.', 'https://twitter.com/brinquedosbzuca/status/1368012745694711809', '2023-06-06 17:44:10'),
(2, 2, 'img/FXA9qLEX0AI5eDl.jfif', 'Brinquedo do carrinho de rolimã em que o famoso Marcos desceu o morro da vó Sovelina.', 'https://twitter.com/brinquedosBzuca/status/1544802481909256192?cxt=HHwWgMC-5YXrnvAqAAAA', '2023-06-06 17:54:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_usuario`
--

CREATE TABLE `imagem_usuario` (
  `id_img_user` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `path_img_user` varchar(250) NOT NULL,
  `desc_img_user` varchar(250) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(250) NOT NULL,
  `desc_produto` varchar(250) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `desc_produto`, `data_criado`) VALUES
(1, 'Churrasqueira Controle Remoto', 'CHURRASQUEIRA CONTROLE REMOTO. \r\n\r\n- O NUMERO 1 LIGA.\r\n\r\nPUTA VIDA!\r\nE AGORA PRA DESLIGAR ESSA MERDA AI, MEU? \r\nPORRA, LIGOU!\r\nE AGORA DESLIGA!\r\nTA PEGANDO FOGO BIXO!\r\nAPERTA ESSA MERDA AÍ QUE TA PEGANDO FOGO, PO!\r\nCHAMA O BOMBEIRO LÁ!', '2023-06-06 17:40:36'),
(2, 'Carrinho de Rolimarcos', 'Chegando em todas as nossas lojas do morro da vó Sovelina, o Carrinho de Rolimarcos.\r\n\r\nTaca-lhe pau, taca-lhe pau.', '2023-06-06 17:53:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(250) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`, `data_criado`) VALUES
(1, 'Cleito', '202cb962ac59075b964b07152d234b70', '2023-06-06 17:35:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD PRIMARY KEY (`id_img_prod`),
  ADD KEY `fk_produto` (`fk_produto`);

--
-- Índices de tabela `imagem_usuario`
--
ALTER TABLE `imagem_usuario`
  ADD PRIMARY KEY (`id_img_user`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  MODIFY `id_img_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imagem_usuario`
--
ALTER TABLE `imagem_usuario`
  MODIFY `id_img_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `imagem_usuario`
--
ALTER TABLE `imagem_usuario`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
