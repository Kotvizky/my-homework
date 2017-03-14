-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2017 г., 15:15
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hw3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `description` text,
  `photo` varchar(500) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `photo`) VALUES
(3, 'johnny', '$2y$10$nMQ4DNgo8xHf2edOg8z/QOwmRfniI225Pzl5ygHx4v0R1kiuBQEJi', 'Женя Котвицкий', '1976-07-10', 'фото с рыбой. ', '3-fish.jpg'),
(25, 'semen1234', '$2y$10$fedOE7oW2D3uYdTZ6vgEU.oGxlwp2/JqF/.K7r4iWNKauaK4LIe1C', 'Семен', '1990-01-01', 'Это мое описание', ''),
(27, 'pavel456', '$2y$10$pZELBeNjSe3EGUpaY2M/BuuF5yyf7WkplN28vc5zyCgZjsQ89XBhu', 'Павел', '1983-02-01', 'без фото', NULL),
(28, 'tanya999', '$2y$10$ITdnYXVdOWBGttxFdWC2UO7qCGBGMKvZkl9/gGJl8iW0kUMkrucVy', 'Таня', '1995-05-05', 'Новый пользователь без фото', '28-cat.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
