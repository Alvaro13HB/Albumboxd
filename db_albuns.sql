-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/06/2025 às 13:27
-- Versão do servidor: 8.0.41-0ubuntu0.22.04.1
-- Versão do PHP: 8.3.16

CREATE DATABASE IF NOT EXISTS `db_albuns` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_albuns;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `Album` (
  `idAlbum` int NOT NULL,
  `nmAlbum` varchar(250) NOT NULL,
  `dtAlbum` date NOT NULL,
  `qtdfaixasAlbum` int NOT NULL,
  `idAutor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `Autor` (
  `idAutor` int NOT NULL,
  `nmAutor` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Autor` (`idAutor`, `nmAutor`) VALUES
(1, 'José');


CREATE TABLE `Nota` (
  `nota` double NOT NULL,
  `idAlbum` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `Usuario` (
  `idUsuario` int NOT NULL,
  `nickUsuario` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nmUsuario` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dtnascUsuario` date DEFAULT NULL,
  `emailUsuario` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senhaUsuario` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Usuario` (`idUsuario`, `nickUsuario`, `nmUsuario`, `dtnascUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(2, 'Alvaro13HB', 'Álvaro', '2007-04-19', 'alvarohbecati@gmail.com', '161f0c9b45d7979333c558b6a9a45389');


ALTER TABLE `Album`
  ADD PRIMARY KEY (`idAlbum`),
  ADD KEY `fk_autor` (`idAutor`);


ALTER TABLE `Autor`
  ADD PRIMARY KEY (`idAutor`);

ALTER TABLE `Nota`
  ADD PRIMARY KEY (`idAlbum`,`idUsuario`);

ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`idUsuario`);



ALTER TABLE `Album`
  MODIFY `idAlbum` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `Autor`
  MODIFY `idAutor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `Usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;



ALTER TABLE `Album`
  ADD CONSTRAINT `fk_autor` FOREIGN KEY (`idAutor`) REFERENCES `Autor` (`idAutor`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;