-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2022 às 09:43
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ead_db`
--

-- --------------------------------------------------------

--
--V Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passw` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
--V Extraindo dados da tabela `alunos` 
--

INSERT INTO `students` (`id`, `name`, `email`, `passw`) VALUES
(1, 'Moisés Melo', 'moises@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Fulano', 'fulano@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE IF NOT EXISTS `aluno_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `aluno_curso`
--

INSERT INTO `aluno_curso` (`id`, `id_curso`, `id_aluno`) VALUES
(4, 1, 2),
(5, 4, 2),
(18, 1, 1),
(19, 2, 1),
(20, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_modulo`, `id_curso`, `ordem`, `tipo`) VALUES
(1, 1, 1, 1, 'video'),
(2, 1, 1, 2, 'video'),
(3, 2, 1, 1, 'video'),
(4, 2, 1, 2, 'video'),
(5, 2, 1, 3, 'questionario'),
(6, 3, 1, 1, 'video'),
(7, 3, 1, 2, 'video'),
(22, 16, 4, 0, 'video'),
(23, 16, 4, 0, 'video'),
(32, 17, 4, 1, 'video'),
(33, 17, 4, 2, 'video'),
(34, 16, 4, 1, 'questionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(37) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `imagem`, `descricao`) VALUES
(1, 'HTML', 'html.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard '),
(2, 'javascript', '7f5370f5ea60060ddd51757550168626.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard '),
(4, 'JAVA ', '9ecdf48216215ed507961244aca5724f.jpg', 'Desenvolvimento de Sistemas Web com a tecnologia JAVA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas`
--

CREATE TABLE IF NOT EXISTS `duvidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `respondida` tinyint(1) NOT NULL,
  `data_duvida` datetime NOT NULL,
  `duvida` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `duvidas`
--

INSERT INTO `duvidas` (`id`, `id_aluno`, `respondida`, `data_duvida`, `duvida`) VALUES
(1, 1, 0, '2022-09-05 23:17:47', 'testando duvida'),
(2, 1, 0, '2022-09-06 21:01:04', 'segundo teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `data_assistiu` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_aluno`, `id_aula`, `data_assistiu`) VALUES
(1, 1, 1, '2022-09-06 23:12:09'),
(2, 1, 2, '2022-09-08 13:50:56'),
(3, 1, 3, '2022-09-13 22:03:15'),
(4, 1, 5, '2022-09-14 23:05:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `id_curso`, `nome`) VALUES
(1, 1, 'Iniciante'),
(2, 1, 'Básico'),
(3, 1, 'Intermediário'),
(14, 1, 'Avançado '),
(15, 1, 'Super Avançado'),
(16, 4, 'Iniciante'),
(17, 4, 'Básico'),
(18, 4, 'Intermediário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionarios`
--

CREATE TABLE IF NOT EXISTS `questionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aula` int(11) NOT NULL,
  `questao` varchar(100) NOT NULL,
  `opcao1` varchar(100) NOT NULL,
  `opcao2` varchar(100) NOT NULL,
  `opcao3` varchar(100) NOT NULL,
  `opcao4` varchar(100) NOT NULL,
  `opcao5` varchar(100) NOT NULL,
  `resposta` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `questionarios`
--

INSERT INTO `questionarios` (`id`, `id_aula`, `questao`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `resposta`) VALUES
(1, 5, 'Encontre a resposta?', 'Op1', 'Op2', 'Op3', 'Op4', 'Op5', 3),
(3, 34, 'O que é Java?', 'Marca de café', 'Marca de tecnologia', 'Linguagem de marcação de texto', 'Linguagem de programação orientada a Objetos', 'Linguagem de programação não orientada a Objetos', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Moises ADM', 'moisesadm@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Fulano ADM', 'fulanoadm@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aula` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `id_aula`, `nome`, `descricao`, `url`) VALUES
(1, 1, 'Aula 1', NULL, '741193833'),
(2, 2, 'Aula 2', NULL, '300147122'),
(3, 3, 'Aula 3', NULL, NULL),
(4, 4, 'Aula 4', NULL, NULL),
(5, 6, 'Aula 5', NULL, NULL),
(6, 7, 'Aula 6', NULL, NULL),
(7, 8, 'Aula 1', NULL, NULL),
(8, 9, 'Aula 1', NULL, NULL),
(9, 11, 'Aula 01', NULL, NULL),
(21, 22, 'Aula 01', 'Uso de vareáveis e costantes', '122705263'),
(22, 23, 'Aula 002', NULL, NULL),
(28, 32, 'Aula 01', NULL, NULL),
(29, 33, 'Aula 02', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
