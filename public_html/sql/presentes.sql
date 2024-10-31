DROP DATABASE IF EXISTS presentes;

CREATE DATABASE presentes;
USE presentes;


CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `buscar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `usuario` (
  `email` varchar(100) NOT NULL PRIMARY KEY,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `criacao` date DEFAULT NULL,
  `foto` varchar(45) DEFAULT 'jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `lista` (
  `codigo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `item` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `lista_codigo` int(11) NOT NULL,
  `produto_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


ALTER TABLE `item`
  ADD FOREIGN KEY (`lista_codigo`) REFERENCES `lista`(`codigo`),
  ADD FOREIGN KEY (`produto_codigo`) REFERENCES `produto`(`codigo`);

ALTER TABLE `lista`
  ADD FOREIGN KEY (`usuario`) REFERENCES `usuario`(`email`);