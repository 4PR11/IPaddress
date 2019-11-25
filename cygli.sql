-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2019 г., 11:44
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

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
-- Структура таблицы `lists`
--

CREATE TABLE `lists` (
  `LI_ID` int(11) NOT NULL,
  `ST_ID` int(11) NOT NULL,
  `WR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `LG_ID` int(11) NOT NULL,
  `WR_ID` int(11) DEFAULT NULL,
  `QUEST` varchar(300) DEFAULT NULL,
  `ANSWER` varchar(300) DEFAULT NULL,
  `RIGHT_FALSE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`LG_ID`, `WR_ID`, `QUEST`, `ANSWER`, `RIGHT_FALSE`) VALUES
(31, -1, '10.136.179.115/24', '5', 0),
(32, -1, '10.233.44.99/23', '5', 0),
(33, -1, '10.7.165.239/17', '5', 0),
(34, -1, '10.136.179.115/ff.ff.ff', '5', 0),
(35, -1, '10.233.44.99/ff.ff.fe', '5', 0),
(36, -1, '10.7.165.239/ff.ff.80', '5', 0),
(37, -1, '10.136.179.115/ff.ff.ff', '6', 0),
(38, -1, '10.233.44.99/ff.ff.fe', '7', 0),
(39, -1, '10.7.165.239/ff.ff.80', '6', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `mods`
--

CREATE TABLE `mods` (
  `MD_ID` int(11) NOT NULL,
  `NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mods`
--

INSERT INTO `mods` (`MD_ID`, `NAME`) VALUES
(1, 'test'),
(2, 'free');

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `MO_ID` int(11) NOT NULL,
  `NAME` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`MO_ID`, `NAME`) VALUES
(0, 'IP адреса');

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
(10, 'Игорь', 100, 'И0932'),
(11, 'Василий', 100, 'В0415');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `SB_ID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`SB_ID`, `NAME`) VALUES
(-1, 'systemSubject');

-- --------------------------------------------------------

--
-- Структура таблицы `weights`
--

CREATE TABLE `weights` (
  `WE_ID` int(11) NOT NULL,
  `TASK_NUM` int(11) DEFAULT NULL,
  `WEIGHT` double DEFAULT NULL,
  `WR_ID` int(11) NOT NULL
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
  `SB_ID` int(11) NOT NULL,
  `WO_ID` int(11) NOT NULL,
  `MO_ID` int(11) NOT NULL,
  `THEME` varchar(150) NOT NULL,
  `MD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`WR_ID`, `DATE`, `SB_ID`, `WO_ID`, `MO_ID`, `THEME`, `MD_ID`) VALUES
(-1, NULL, -1, 30, 0, 'systemTheme', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GR_ID`);

--
-- Индексы таблицы `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`LI_ID`),
  ADD KEY `WO_ID` (`WR_ID`);

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LG_ID`),
  ADD KEY `NT_ID` (`WR_ID`);

--
-- Индексы таблицы `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`MD_ID`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`MO_ID`);

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
-- Индексы таблицы `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`WE_ID`),
  ADD KEY `WO_ID` (`WR_ID`);

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
  ADD KEY `SB_ID` (`SB_ID`),
  ADD KEY `WO_ID` (`WO_ID`),
  ADD KEY `MO_ID` (`MO_ID`),
  ADD KEY `MD_ID` (`MD_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `GR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `lists`
--
ALTER TABLE `lists`
  MODIFY `LI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `LG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `mods`
--
ALTER TABLE `mods`
  MODIFY `MD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `ST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `weights`
--
ALTER TABLE `weights`
  MODIFY `WE_ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Ограничения внешнего ключа таблицы `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`GR_ID`) REFERENCES `groups` (`GR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_ibfk_1` FOREIGN KEY (`WR_ID`) REFERENCES `works` (`WR_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`SB_ID`) REFERENCES `subjects` (`SB_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_2` FOREIGN KEY (`WO_ID`) REFERENCES `workers` (`WO_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_3` FOREIGN KEY (`MO_ID`) REFERENCES `modules` (`MO_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `works_ibfk_4` FOREIGN KEY (`MD_ID`) REFERENCES `mods` (`MD_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
