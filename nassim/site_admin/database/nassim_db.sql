-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para nassim_db
CREATE DATABASE IF NOT EXISTS `nassim_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `nassim_db`;

-- Copiando estrutura para tabela nassim_db.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text,
  `colecaoperfume` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela nassim_db.categorias: ~4 rows (aproximadamente)
DELETE FROM `categorias`;
INSERT INTO `categorias` (`id`, `nome`, `descricao`, `colecaoperfume`) VALUES
	(1, 'Masculina', 'Perfumes masculinos importados', NULL),
	(2, 'Feminino ', 'Perfumes femininos importados', NULL),
	(3, 'Árabes', 'Perfumes árabes premium', NULL),
	(4, 'Jequiti', 'Perfumes jequite que arrasam', 'Coleção sensação ');

-- Copiando estrutura para tabela nassim_db.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela nassim_db.produtos: ~3 rows (aproximadamente)
DELETE FROM `produtos`;
INSERT INTO `produtos` (`id`, `nome`, `marca`, `preco`, `estoque`) VALUES
	(1, 'Bleu de Chanel', 'Chanel', 799.90, 11),
	(2, 'Lattafa Asad', 'Lattafa', 188.91, 250),
	(3, 'Cebolinha', 'Jequiti', 200.00, 150);

-- Copiando estrutura para tabela nassim_db.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela nassim_db.usuarios: ~6 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `login`, `senha`) VALUES
	(2, 'Ewerton teste 2', '49999999999', 'teste@teste.com', NULL, '3861516'),
	(11, 'Ewerton', '49999999999', 'testee@teste.com', NULL, '$2y$10$F7a1vZNcv0uCm1.kH1BvkOHEoaJbIqmzZRPoLbWccxuq5CK18C36q'),
	(12, 'Samuel', '498888888888', 'samu@gmail.com', NULL, '$2y$10$Cyrm/DFO0E1gx9tMwB5U9Oxv/O1FqiDWN/Nngw7U30V4ZZtgtrSKK'),
	(13, 'Irma ', '497777777777777', 'irma@gmail.com', NULL, '$2y$10$ahM./NlbMpoSetR34rDgXe3Mp5ZWvgUXriCNM9fcUg5TkkZ3jicpG'),
	(22, 'Julia ', '51222222', 'julia@gmail.com', NULL, '1234'),
	(23, 'Isadora', '4333333333', 'isa@gmail.com', NULL, '$2y$10$E2HW3VxyY1y3kF.6lzVu8eU7yWKG32H9LNQw7fHd/xjgA0N7ETiCW');

-- Copiando estrutura para tabela nassim_db.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela nassim_db.vendas: ~2 rows (aproximadamente)
DELETE FROM `vendas`;
INSERT INTO `vendas` (`id`, `cliente`, `valor_total`, `data_venda`) VALUES
	(3, 'Érica Jaqueline', 1250.86, '2026-08-11'),
	(4, 'Michael Jackson', 15000000.00, '2026-06-15');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
