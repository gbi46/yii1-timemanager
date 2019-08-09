-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Сер 09 2019 р., 20:24
-- Версія сервера: 10.1.28-MariaDB
-- Версія PHP: 7.1.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `s`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tm_projects`
--

DROP TABLE IF EXISTS `tm_projects`;
CREATE TABLE `tm_projects` (
  `id` int(9) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `branch` varchar(255) NOT NULL,
  `br_position` int(11) NOT NULL,
  `max_br_position` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `t` varchar(10) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tm_tasks`
--

DROP TABLE IF EXISTS `tm_tasks`;
CREATE TABLE `tm_tasks` (
  `id` int(7) NOT NULL,
  `project` varchar(200) DEFAULT NULL,
  `task` text,
  `curday` varchar(10) DEFAULT NULL,
  `resume` text,
  `earn` varchar(200) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `tm_projects`
--
ALTER TABLE `tm_projects`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tm_tasks`
--
ALTER TABLE `tm_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tm_projects`
--
ALTER TABLE `tm_projects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблиці `tm_tasks`
--
ALTER TABLE `tm_tasks`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
