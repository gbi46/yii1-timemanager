
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
-- Структура таблицы `tm_projects`
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
-- Структура таблицы `tm_tasks`
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
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tm_projects`
--
ALTER TABLE `tm_projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tm_tasks`
--
ALTER TABLE `tm_tasks`
  ADD PRIMARY KEY (`id`);