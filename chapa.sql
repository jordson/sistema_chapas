-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.31 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela sistema_chapa.chapas: ~5 rows (aproximadamente)
INSERT INTO `chapas` (`id`, `nome`, `peso`, `usuario_id`, `nome_usuario`) VALUES
	(1, 'dupla', 4.00, NULL, NULL),
	(2, 'tro', 9.00, 2, NULL),
	(3, 'simples', 6.00, 2, 'jordson'),
	(4, 'tripla', 9.00, 1, 'joao'),
	(5, 'tripla', 6.00, 2, 'vagabundo');

-- Copiando dados para a tabela sistema_chapa.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `senha`, `user_type`) VALUES
	(1, 'adm', '123', 'adm'),
	(2, 'publico', '147', 'publico');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;


/*! criação da tabela view */;
CREATE VIEW chapas_view AS
SELECT
    id,
    nome,
    peso,
    usuario_id,
    nome_usuario
FROM
    chapas;


/*! criação do usuario publico */;

CREATE USER 'publico'@'%' IDENTIFIED BY 'senha_segura_aqui';

/*! Conceda acesso de visualização à view "chapas_view" para o usuário publico: */;

GRANT SELECT ON sistema_chapa.chapas_view TO 'publico'@'%';

FLUSH PRIVILEGES;




