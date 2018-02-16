
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 09 2015 г., 10:35
-- Версия сервера: 5.1.69
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u822737775_111`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_adm`
--

CREATE TABLE IF NOT EXISTS `db_adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_adm`
--

INSERT INTO `db_adm` (`id`, `login`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `db_deposit`
--

CREATE TABLE IF NOT EXISTS `db_deposit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date_start` int(13) NOT NULL,
  `date_end` int(13) NOT NULL,
  `summa` float NOT NULL,
  `percent` float NOT NULL,
  `count` int(13) NOT NULL,
  `count_full` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  `id_trans` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=961 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_fake`
--

CREATE TABLE IF NOT EXISTS `db_fake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `vivod` double(10,2) NOT NULL,
  `pay` double(10,2) NOT NULL,
  `qiwi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_fake`
--

INSERT INTO `db_fake` (`id`, `user`, `vivod`, `pay`, `qiwi`) VALUES
(1, 0, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert`
--

CREATE TABLE IF NOT EXISTS `db_insert` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `user_id` int(13) NOT NULL,
  `summa` float NOT NULL,
  `batch` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert_payeer`
--

CREATE TABLE IF NOT EXISTS `db_insert_payeer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `summa` double NOT NULL,
  `user_id` int(10) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(13) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_online`
--

CREATE TABLE IF NOT EXISTS `db_online` (
  `id` int(11) NOT NULL,
  `ip` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `db_online`
--

INSERT INTO `db_online` (`id`, `ip`, `date`) VALUES
(0, '193.33.166.121', 1431167020);

-- --------------------------------------------------------

--
-- Структура таблицы `db_otziv`
--

CREATE TABLE IF NOT EXISTS `db_otziv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=256 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE IF NOT EXISTS `db_stats` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `popol` float NOT NULL,
  `vivod` float NOT NULL,
  `user` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `db_stats`
--

INSERT INTO `db_stats` (`id`, `popol`, `vivod`, `user`) VALUES
(1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `db_sup`
--

CREATE TABLE IF NOT EXISTS `db_sup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sup_text`
--

CREATE TABLE IF NOT EXISTS `db_sup_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users`
--

CREATE TABLE IF NOT EXISTS `db_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `pass` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `date_reg` int(11) NOT NULL,
  `refer` int(10) NOT NULL,
  `kol_ref` int(11) NOT NULL,
  `money_in` float NOT NULL,
  `money_out` float NOT NULL,
  `ref_sum` float NOT NULL,
  `ip` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `qiwi` varchar(15) NOT NULL,
  `ban` int(1) NOT NULL,
  `ref_perc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3204 ;

-- --------------------------------------------------------

--
-- Структура таблицы `db_vivod`
--

CREATE TABLE IF NOT EXISTS `db_vivod` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `user_id` int(10) NOT NULL,
  `summa` float NOT NULL,
  `batch` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=241 ;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_question`
--

CREATE TABLE IF NOT EXISTS `poll_question` (
  `quest_id` int(5) NOT NULL AUTO_INCREMENT,
  `quest_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quest_act` int(1) NOT NULL,
  PRIMARY KEY (`quest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_variant`
--

CREATE TABLE IF NOT EXISTS `poll_variant` (
  `var_id` int(5) NOT NULL AUTO_INCREMENT,
  `var_id_quest` int(5) NOT NULL,
  `var_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `var_voice` int(4) NOT NULL,
  PRIMARY KEY (`var_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
