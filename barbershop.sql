-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2025 г., 11:06
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `barbershop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booked_dates`
--

CREATE TABLE `booked_dates` (
  `id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `UserID` int NOT NULL,
  `OrdersID` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `booked_dates`
--

INSERT INTO `booked_dates` (`id`, `date`, `phone`, `UserID`, `OrdersID`, `created_at`) VALUES
(10, '2025-04-30', '5555555', 2, 14, '2025-04-22 21:24:05');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `IDImg` int NOT NULL,
  `Img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`IDImg`, `Img`) VALUES
(1, 'image1.png'),
(2, 'image2.png'),
(3, 'image3.png'),
(4, 'image4.png'),
(5, 'image5.png'),
(6, 'image6.png'),
(7, 'image7.png'),
(8, 'header.png');

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `OrdersID` int NOT NULL,
  `UsersID` int NOT NULL,
  `ProductsID` int NOT NULL,
  `ProductNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`OrdersID`, `UsersID`, `ProductsID`, `ProductNum`) VALUES
(14, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `ProductsID` int NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ShortDescription` text,
  `FullDescription` text,
  `img` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`ProductsID`, `ProductName`, `Price`, `ShortDescription`, `FullDescription`, `img`, `Category`) VALUES
(1, 'Полубокс', '350.00', 'Выглядит как коротко выстриженные виски и затылок и длинные пряди на теменной части', 'Одна из самых популярных мужских стрижек, но в то же время многие с ней путаются. В полубоксе всегда приподняты виски и затылок, а вот длину можно варьировать.', 'poluboks.jpg', 'Мужская'),
(2, 'Бокс', '150.00', 'Ультракороткий тип причёски для мужчин ', 'Вечная классика, которая никогда не выйдет из моды. Бокс очень удобен и точно подойдет тем, кто не любит эксперименты во внешности. Он практически не требует ухода и его легко поддерживать.', 'boks.jpg', 'Мужская'),
(3, 'Кроп', '150.00', 'Коротко выбритый затылок и бока, короткая чёлка, удлинённые филированные «рваные» пряди на темени и затылке', 'Кроп интересен рваным срезом и такими же рваными, но плавными переходами длины. Стрижку легко адаптировать под любую форму лица, и она не нуждается в укладке.', 'krop.jpg', 'Мужская'),
(4, 'Топ кнот', '150.00', 'К выбритым вискам и затылку прилагается хвостик на макушке', 'Это та самая стрижка, когда к выбритым вискам и затылку прилагается хвостик на макушке. При этом верхние пряди могут быть достаточно длинными.', 'topKnot.jpg', 'Мужская'),
(5, 'Андеркат', '150.00', 'Волосы по бокам и на затылке коротко подстрижены, а на темени и верхней части головы остаются длинными', 'Андеркат уже оброс таким количеством вариаций и форм, что не составит труда подобрать его под любую форму лица. А еще он изумительно сочетается с фигурно выстриженной бородой.', 'anderkat.jpg', 'Мужская'),
(6, 'Хаш', '345.00', 'Мягкая многослойная стрижка, обычно – с челкой.', 'Мягкая многослойная стрижка, обычно – с челкой. Она очень динамичная и воздушная, выглядит объемной и совершенно не требует укладки. Подходит практически к любому типу лица.', 'hash.jpg', 'Женская'),
(7, 'Химэ', '360.00', 'Длинные прямые волосы, прямая чёлка, острые обрамляющие лицо слои.', 'Модный японский тренд, который прочно укоренился во всем остальном мире. Она же – прическа принцессы, которую традиционно носили особы королевской крови.\r\n\r\nХимэ универсальна и подходит разным формам лица и типам волос. Особенно выигрышно выглядит на прямых и густых волосах. На вьющихся волосах требует дополнительной укладки. ', 'hime.jpg', 'Женская'),
(8, 'Гарсон', '350.00', 'Короткая женская стрижка, при которой волосы от висков до макушки имеют разную длину.', 'Короткая женская стрижка, при которой волосы от висков до макушки имеют разную длину. Она напоминает мужские причёски, но при этом пользуется популярностью среди женщин уже сто лет.', 'garson.jpg', 'Женская'),
(9, 'Шегги', '370.00', 'Многослойная женская стрижка, придающая волосам дополнительный визуальный объем.', 'Многослойная женская стрижка, придающая волосам дополнительный визуальный объем. Замечательно подойдет творческим любительницам легкой беспорядочности в образе. Оптимальная длина – где-то до плеч.', 'shaggy.jpg', 'Женская'),
(10, 'Вулфкат', '350.00', 'Тонкие волосы такая стрижка визуально делает объёмнее, а более плотным и густым — придаёт форму.', 'Вулфкат универсален и подходит волосам любой длины, густоты и плотности. Тонкие волосы такая стрижка визуально делает объёмнее, а более плотным и густым — придаёт форму. \r\n\r\nПричёска почти не нуждается в укладке. Для немного более продуманного вида можно пройтись по вулфкату круглой расчёской и зафиксировать пряди укладочным гелем.', 'wolfkat.jpg', 'Женская'),
(11, 'Маллет', '380.00', 'Отличительная черта причёски — это дисконекция длин, то есть наличие в стрижке разных по длине зон с прядями.', 'Небрежный маллет по-прежнему останется в моде и в 2025 году. Стильная и бунтарская прическа, которая не требует укладки, отлично отрастает и вообще максимально неприхотливая.', 'mallet.jpg', 'Женская');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `UsersID` int NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`UsersID`, `Email`, `Name`, `Password`, `Role`) VALUES
(2, '1@mail.ru', '1', '$2y$10$1mzn/r3b1K1vXmUFP/Ue1eXV2HdqIJTZ3au4sxbU.lR0PGsKo8Odi', 'Admin'),
(8, 'Vitek@mail.ru', 'Трофимов Виктор Сергеевич', '$2y$10$3cCEhFFNHwwSYPjpeEIqjOCA0P.p10jp2uF.zbrRa/eHXlQ6LDiU.', 'User');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booked_dates`
--
ALTER TABLE `booked_dates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`IDImg`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrdersID`),
  ADD KEY `UsersID` (`UsersID`),
  ADD KEY `ProductsID` (`ProductsID`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductsID`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UsersID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booked_dates`
--
ALTER TABLE `booked_dates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `IDImg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrdersID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UsersID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UsersID`) REFERENCES `Users` (`UsersID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductsID`) REFERENCES `Products` (`ProductsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
