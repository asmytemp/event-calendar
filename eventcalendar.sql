-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 29 2019 г., 08:44
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eventcalendar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id_event` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour_begin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `hour_end` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_full` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(17) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` varchar(1700) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id_event`, `name`, `date`, `hour_begin`, `hour_end`, `organization`, `description`, `address`, `description_full`, `category`, `map`) VALUES
(4, 'Ауjava', '2019-07-13', '15:00', '20:00', 'auj', 'Отзовитесь гуру java! ', 'СПб, Набережная реки Мойки, 58', 'С каждым годом конференция растёт, становится ещё больше, интереснее и хардкорнее, собирая на площадке более тысячи участников.\r\n\r\nВсе доклады конференции только про востребованные в Java технологии. Основные темы: производительность, concurrency, тестирование, распределённые системы и высокие нагрузки в мире Java, а также будущее платформы.', 'IT', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.980123313194!2d30.31320397454506!3d59.93247199243732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631049ef02bdd%3A0xd12bcc5fca1194c6!2z0L3QsNCxLiDRgNC10LrQuCDQnNC-0LnQutC4LCA1OCwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5MDAwMA!5e0!3m2!1sru!2sru!4v1554302472772!5m2!1sru!2sru\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(7, 'Открытый урок «Как выучить разговорный английский?»', '2019-07-17', '17:30', '21:00', 'Easy Speak', 'Вы хотите свободно говорить на английском? В школе разговорного английского языка Easy Speak вы начнете самостоятельно говорить с первого занятия. Никакой зубрежки. Только практика под контролем опытных преподавателей.', 'Москва, м. «Проспект Мира»/«Сухаревская», ул. Мещанская, д. 9/14, стр 1', 'Приходите на бесплатный урок в Москве и узнайте:\r\n\r\n \r\n\r\n– как исправить ошибку, из-за которой вы учите английский годами;\r\n\r\n– как говорить на английском, не задумываясь о правилах, и преодолеть языковой барьер раз и навсегда;\r\n\r\n– как довести грамматику до автоматизма;\r\n\r\n– как побороть в себе страх общения с людьми и перестать думать о том, что вас поймут неправильно;\r\n\r\n– как научиться говорить без пауз, уверенно, не ошибаясь.\r\n\r\n \r\n\r\n​После урока мы проведем бесплатное тестирование, определим ваш уровень и подберем программу обучения!', 'Иностранный язык', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.9762701377836!2d37.62505331590179!3d55.77628398055961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a751a0411b1%3A0x6dc57e002477a04d!2zRWFzeSBTcGVhayAtINC60YPRgNGB0Ysg0LDQvdCz0LvQuNC50YHQutC-0LPQvg!5e0!3m2!1sru!2sru!4v1554307384209!5m2!1sru!2sru\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(11, 'Liza del Giocondo', '2019-06-24', '10:00', '15:00', 'pepito', 'Пять часов истории про самую загадочную женщину в мире!', 'Парк 300-летия, Санкт-Петербург', 'История ее знакомства с Леонардо, сколько и где писали картину и многое другое!', 'Наука', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.0641900263688!2d30.23257331607029!3d59.931077031873436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469630cc10e7f4c9%3A0x11e7ffe8d8cb7f29!2z0JLRi9GB0YLQsNCy0L7Rh9C90YvQuSDQutC-0LzQv9C70LXQutGBIMKr0JvQtdC90Y3QutGB0L_QvsK7!5e0!3m2!1sru!2sru!4v1558694378241!5m2!1sru!2sru\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>'),
(13, 'WakeUp for MakeUp', '2019-08-08', '13:00', '17:00', 'Godnotta', 'Годнота презентует бесплатные уроки макияжа', 'Лофт-проект ЭТАЖИ, Санкт-Петербург ', 'Здесь Вас будут учить лучшие стилисты, участвующие в показах мод! Окунитесь в мир красоты вместе с нами, любите себя!', 'Красота и здоровь', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.611746097987!2d30.35324351606992!3d59.921990681870106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963114d45d296b%3A0xa447ad80081097b1!2z0LvQvtGE0YIg0J_RgNC-0LXQutGCINCt0YLQsNC20Lg!5e0!3m2!1sru!2sru!4v1554744191068!5m2!1sru!2sru\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(27) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `email`, `role`) VALUES
(1, 'primarymaryroy', 'threedaysgrace', 'davinciforever@gmail.com', 'admin'),
(2, 'tiny', 'iloveeat', 'iloveeat@mail.ru', 'user'),
(3, 'mommy', 'memommy', 'm@mail.ru', 'user'),
(5, 'organizeee', 'myorg', 'my@mail.ru', 'organization'),
(6, 'aloe14', 'aloha', 'xaxatushka1999@mail.ru', 'user'),
(7, 'tdg333', 'iamtdg3', 'threedg@yandex.ru', 'user'),
(8, 'pepito', 'pepepitoo', 'pepe@gmail.com', 'organization'),
(9, 'pepes', 'pipes', 'xaxatushka1999@mail.ru', 'user'),
(10, 'triptiloid', 'keksus', 'triptiloid@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `visiting`
--

CREATE TABLE `visiting` (
  `ID_event` int(100) DEFAULT NULL,
  `ID_user` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `visiting`
--

INSERT INTO `visiting` (`ID_event`, `ID_user`) VALUES
(11, 6),
(11, 7),
(7, 2),
(11, 2),
(7, 3),
(11, 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `visiting`
--
ALTER TABLE `visiting`
  ADD KEY `visiting_event_id_event_fk` (`ID_event`),
  ADD KEY `visiting_users_id_user_fk` (`ID_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `visiting`
--
ALTER TABLE `visiting`
  ADD CONSTRAINT `visiting_event_id_event_fk` FOREIGN KEY (`ID_event`) REFERENCES `event` (`id_event`),
  ADD CONSTRAINT `visiting_users_id_user_fk` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
