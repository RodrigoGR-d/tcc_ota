-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/09/2026 às 22:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ota_pasteis`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `cpf_adm` bigint(14) NOT NULL,
  `nome_adm` varchar(40) DEFAULT NULL,
  `email_adm` varchar(50) DEFAULT NULL,
  `senha_adm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`cpf_adm`, `nome_adm`, `email_adm`, `senha_adm`) VALUES
(32232322332, 'pedro3000', 'pedrocavalcante82@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_ava` int(5) NOT NULL,
  `cpf_cli3` bigint(14) DEFAULT NULL,
  `id_pedido2` int(5) DEFAULT NULL,
  `avaliacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_ava`, `cpf_cli3`, `id_pedido2`, `avaliacao`) VALUES
(5, NULL, NULL, 'bom'),
(6, NULL, NULL, 'muito bom');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_item` int(5) DEFAULT NULL,
  `id_pedido3` int(5) DEFAULT NULL,
  `id_produto` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cli` bigint(14) NOT NULL,
  `nome_cli` varchar(50) DEFAULT NULL,
  `email_cli` varchar(40) DEFAULT NULL,
  `senha_cli` varchar(30) DEFAULT NULL,
  `telefone_cli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(5) NOT NULL,
  `logradouro_cli` varchar(50) DEFAULT NULL,
  `numero_cli` int(5) DEFAULT NULL,
  `complemento_cli` varchar(30) DEFAULT NULL,
  `bairro_cli` varchar(35) DEFAULT NULL,
  `cidade_cli` varchar(30) DEFAULT NULL,
  `estado_cli` varchar(2) DEFAULT NULL,
  `cep_cli` varchar(12) DEFAULT NULL,
  `cpf_cli4` bigint(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario_funcionamento`
--

CREATE TABLE `horario_funcionamento` (
  `id_func` int(5) NOT NULL,
  `dia_func` varchar(60) DEFAULT NULL,
  `inicio_func` time DEFAULT NULL,
  `final_func` time DEFAULT NULL,
  `bairro_func` varchar(40) DEFAULT NULL,
  `cidade_func` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `horario_funcionamento`
--

INSERT INTO `horario_funcionamento` (`id_func`, `dia_func`, `inicio_func`, `final_func`, `bairro_func`, `cidade_func`) VALUES
(4, 'segunda', '07:00:00', '12:00:00', 'Ponte Baixa', 'aparecida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pag` int(5) NOT NULL,
  `forma_pag` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(5) NOT NULL,
  `data_pedido` date DEFAULT NULL,
  `horario_pedido` time DEFAULT NULL,
  `total_ped` decimal(10,2) DEFAULT NULL,
  `id_pag2` int(5) DEFAULT NULL,
  `cpf_cli2` bigint(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_prod` int(5) NOT NULL,
  `prod_nome` varchar(40) DEFAULT NULL,
  `prod_foto` varchar(40) DEFAULT NULL,
  `prod_preco` decimal(10,2) DEFAULT NULL,
  `prod_descricao` text DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `prod_nome`, `prod_foto`, `prod_preco`, `prod_descricao`, `categoria`) VALUES
(20, 'pinga 51', '', 11.00, 'vvvvvv', 'bebida');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`cpf_adm`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_ava`),
  ADD KEY `fk_idpedido2` (`id_pedido2`),
  ADD KEY `fkcpf_cli3` (`cpf_cli3`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `fk_idpedido3` (`id_pedido3`),
  ADD KEY `fkid_produto` (`id_produto`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf_cli`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fkcpf4_cli` (`cpf_cli4`);

--
-- Índices de tabela `horario_funcionamento`
--
ALTER TABLE `horario_funcionamento`
  ADD PRIMARY KEY (`id_func`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pag`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_idpaga2` (`id_pag2`),
  ADD KEY `fkcpf_cli2` (`cpf_cli2`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_ava` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario_funcionamento`
--
ALTER TABLE `horario_funcionamento`
  MODIFY `id_func` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pag` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_idpedido2` FOREIGN KEY (`id_pedido2`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `fkcpf_cli3` FOREIGN KEY (`cpf_cli3`) REFERENCES `cliente` (`cpf_cli`);

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_idpedido3` FOREIGN KEY (`id_pedido3`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `fkid_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_prod`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fkcpf4_cli` FOREIGN KEY (`cpf_cli4`) REFERENCES `cliente` (`cpf_cli`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_idpaga2` FOREIGN KEY (`id_pag2`) REFERENCES `pagamento` (`id_pag`),
  ADD CONSTRAINT `fkcpf_cli2` FOREIGN KEY (`cpf_cli2`) REFERENCES `cliente` (`cpf_cli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
