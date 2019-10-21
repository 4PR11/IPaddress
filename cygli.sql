-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2019 г., 13:42
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cygli`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `GR_ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`GR_ID`, `NAME`) VALUES
(100, '3-ПР-11');

-- --------------------------------------------------------

--
-- Структура таблицы `loads`
--

CREATE TABLE `loads` (
  `LD_ID` int(11) NOT NULL,
  `SB_ID` int(11) DEFAULT NULL,
  `WO_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `LG_ID` int(11) NOT NULL,
  `NT_ID` int(11) DEFAULT NULL,
  `QUEST` varchar(300) DEFAULT NULL,
  `ANSWER` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `mods`
--

CREATE TABLE `mods` (
  `MD_ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `NT_ID` int(11) NOT NULL,
  `ST_ID` int(11) DEFAULT NULL,
  `WR_ID` int(11) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `MD_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `ST_ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `GR_ID` int(11) DEFAULT NULL,
  `ADC` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`ST_ID`, `NAME`, `GR_ID`, `ADC`) VALUES
(10, 'Игорь', 100, 'И0932');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `SB_ID` int(11) NOT NULL,
  `NAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `WO_ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOGIN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`WO_ID`, `NAME`, `PASSWORD`, `LOGIN`) VALUES
(30, 'Крутина Ольга Михайловна', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

CREATE TABLE `works` (
  `WR_ID` int(11) NOT NULL,
  `DATE` varchar(50) DEFAULT NULL,
  `LD_ID` int(11) DEFAULT NULL,
  `QUEST` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GR_ID`);

--
-- Индексы таблицы `loads`
--
ALTER TABLE `loads`
  ADD PRIMARY KEY (`LD_ID`),
  ADD KEY `WO_ID` (`WO_ID`),
  ADD KEY `SB_ID` (`SB_ID`);

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LG_ID`),
  ADD KEY `NT_ID` (`NT_ID`);

--
-- Индексы таблицы `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`MD_ID`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`NT_ID`),
  ADD KEY `MD_ID` (`MD_ID`),
  ADD KEY `WR_ID` (`WR_ID`),
  ADD KEY `ST_ID` (`ST_ID`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ST_ID`),
  ADD KEY `GR_ID` (`GR_ID`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SB_ID`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`WO_ID`);

--
-- Индексы таблицы `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`WR_ID`),
  ADD KEY `LD_ID` (`LD_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `GR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `loads`
--
ALTER TABLE `loads`
  MODIFY `LD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `LG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `mods`
--
ALTER TABLE `mods`
  MODIFY `MD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `NT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `ST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `WO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `WR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `loads`
--
ALTER TABLE `loads`
  ADD CONSTRAINT `loads_ibfk_1` FOREIGN KEY (`WO_ID`) REFERENCES `workers` (`WO_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `loads_ibfk_2` FOREIGN KEY (`SB_ID`) REFERENCES `subjects` (`SB_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`NT_ID`) REFERENCES `notes` (`NT_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`MD_ID`) REFERENCES `mods` (`MD_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`ST_ID`) REFERENCES `students` (`ST_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`GR_ID`) REFERENCES `groups` (`GR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`LD_ID`) REFERENCES `loads` (`LD_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
