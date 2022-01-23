-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2022 г., 00:20
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `checklist_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_checklist`
--

CREATE TABLE `user_checklist` (
  `id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `start_check` text NOT NULL,
  `tehn_check` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_checklist`
--

INSERT INTO `user_checklist` (`id`, `user_id`, `start_check`, `tehn_check`) VALUES
(1, '3237909607733954593', 'a:3:{s:6:\"check1\";a:3:{i:0;s:7:\"checked\";i:2;s:7:\"checked\";i:3;s:7:\"checked\";}s:6:\"check2\";a:1:{i:1;s:7:\"checked\";}s:6:\"check3\";a:3:{i:0;s:7:\"checked\";i:1;s:7:\"checked\";i:3;s:7:\"checked\";}}', 'a:5:{s:6:\"check1\";a:1:{i:1;s:7:\"checked\";}s:6:\"check2\";a:1:{i:0;s:7:\"checked\";}s:6:\"check4\";a:1:{i:0;s:7:\"checked\";}s:6:\"check5\";a:1:{i:0;s:7:\"checked\";}s:6:\"check6\";a:1:{i:1;s:7:\"checked\";}}'),
(2, '1543450839', 'a:1:{s:6:\"check1\";a:3:{i:1;s:7:\"checked\";i:2;s:7:\"checked\";i:3;s:7:\"checked\";}}', 'a:3:{s:6:\"check1\";a:3:{i:0;s:7:\"checked\";i:2;s:7:\"checked\";i:3;s:7:\"checked\";}s:6:\"check2\";a:2:{i:2;s:7:\"checked\";i:4;s:7:\"checked\";}s:6:\"check4\";a:1:{i:0;s:7:\"checked\";}}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_checklist`
--
ALTER TABLE `user_checklist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_checklist`
--
ALTER TABLE `user_checklist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
