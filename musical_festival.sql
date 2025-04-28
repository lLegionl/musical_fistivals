-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Апр 23 2025 г., 12:00
-- Версия сервера: 8.2.0
-- Версия PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `musical_festival`
--

-- --------------------------------------------------------

--
-- Структура таблицы `concert`
--

CREATE TABLE `concert` (
  `id` int NOT NULL,
  `concert_name` varchar(32) NOT NULL,
  `concert_image` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `concert_description` varchar(600) NOT NULL,
  `concert_date` varchar(32) NOT NULL,
  `concert_place` varchar(32) NOT NULL,
  `concert_seats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `concert`
--

INSERT INTO `concert` (`id`, `concert_name`, `concert_image`, `concert_description`, `concert_date`, `concert_place`, `concert_seats`) VALUES
(1, 'Rock Legends Night', 'comparrison_the_thief_of_joy.png', 'Погрузитесь в мир мощной музыки и незабываемых эмоций на \"Rock Legends Night\"! 🎸 Присоединяйтесь к нам, чтобы насладиться выступлениями лучших рок-групп, исполняющих хиты, которые стали классикой жанра.', '27 июля', 'VK Stadium', 4000),
(2, 'Rock Revolution', 'fxwhr8-crowd-silhouettes-music-concert-856782039_617992.webp', 'Приготовьтесь к незабываемой ночи на \"Rock Revolution: Legends Unleashed\"! 🎸 Это событие объединит лучших рок-музыкантов, которые подарят вам живые выступления с хитовыми классиками и новыми композициями, способными разжечь вашу душу!', '15 августа', 'ВТБ Арена', 5000),
(3, 'Rocksplosion', '17450-auditoriya-koncert-lyudi-predstavlenie-devuska-1920x1080.jpg', 'Приготовьтесь к мощному музыкальному взрыву на \"Rocksplosion: Ночь Легенд\"! 🎸 Это уникальное событие соберет на одной сцене культовых рок-исполнителей, которые порадуют вас своими лучшими хитами и незабываемыми выступлениями!', '5 августа', 'Арена \"Звездный Лед', 3000),
(461, 'Rock Titans', 'bf35f01e955c4f70afebcf50252e.jpg', 'Приглашаем вас на незабываемый концерт \"Rock Titans: Вечер Непокоренных\"! 🎸 Это событие объединит легендарных рок-музыкантов, которые подарят вам незабываемые живые выступления с хитами, которые вы знаете и любите!', '2 июля', 'Концертный зал \"Энергия\"', 5000);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `concert_id` int NOT NULL,
  `ticket_count` int NOT NULL,
  `ticket_status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ожидает подтверждение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `concert_id`, `ticket_count`, `ticket_status`) VALUES
(2, 1, 461, 4, 'ожидает подтверждение'),
(3, 1, 3, 2, 'ожидает подтверждение');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `surname`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Legion', 'Алексей', 'Шатров', 'Dhatro@yandex.ru', '+7 (919) 725-88-05', '111', '0'),
(2, '123', '123', '123', '123', '123', '123', '0'),
(4, '111', '111', '111', '111@gmail.com', '111', '111', '0'),
(5, '123', '123', '123', '123@123', '123', '123', '0'),
(6, 'Aboba', '34', '3434', 'admin@gmail.admin2', '3434', '3434', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `concert_id` (`concert_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
