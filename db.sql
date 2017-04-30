-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 30, 2017 at 03:48 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PlayerNetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `Jugador`
--

CREATE TABLE `Jugador` (
`IdJugador` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Altura` float NOT NULL,
  `Peso` float NOT NULL,
  `FechaNacimiento` datetime NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Jugador`
--

INSERT INTO `Jugador` (`IdJugador`, `Nombre`, `Apellidos`, `Altura`, `Peso`, `FechaNacimiento`, `Ciudad`, `Estado`, `Email`) VALUES
(1, '$nombre', ' $apellidos', 1, 1, '0000-00-00 00:00:00', '$ciudad', '$estado', '$email'),
(2, 'a', 'a a', 1, 1, '0000-00-00 00:00:00', 'Aguascalientes', 'Aguascalientes', 'a@gmail.com'),
(3, 'a', 'a a', 1, 1, '0001-01-01 00:00:00', 'Aguascalientes', 'Aguascalientes', 'a@gmail.com'),
(4, 'a', 'q q', 1, 1, '0001-01-01 00:00:00', 'Aguascalientes', 'Aguascalientes', 'a@puto.com'),
(5, 'a', 'a a', 11, 1, '0001-01-01 00:00:00', 'Aguascalientes', 'Aguascalientes', 'a@gmail.com'),
(6, 'a', 'q q', 1, 1, '0001-01-01 00:00:00', 'Aguascalientes', 'Aguascalientes', 'a@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Jugador`
--
ALTER TABLE `Jugador`
 ADD PRIMARY KEY (`IdJugador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Jugador`
--
ALTER TABLE `Jugador`
MODIFY `IdJugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;