SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `bank` (
  `id` int(5) NOT NULL,
  `pay` int(10) NOT NULL,
  `user` varchar(32) DEFAULT 'Guest',
  `date_pay` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `city` (
  `id` int(50) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Волгоград'),
(2, 'Воронеж'),
(23, 'Выдропужск'),
(24, 'Вышний Волочёк'),
(8, 'Екатеринбург'),
(20, 'Ижевск'),
(9, 'Казань'),
(15, 'Краснодар'),
(14, 'Красноярск'),
(3, 'Москва'),
(22, 'Мухосранск'),
(10, 'Нижний Новгород'),
(25, 'д. Новоебенёво'),
(7, 'Новосибирск'),
(12, 'Омск'),
(16, 'Пермь'),
(4, 'Ростов-На-Дону'),
(5, 'Самара'),
(6, 'Санкт-Петербург'),
(17, 'Саратов'),
(21, 'Серпухов'),
(19, 'Тольятти'),
(18, 'Тюмень'),
(13, 'Уфа'),
(11, 'Челябинск');

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `city` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `vk_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  `user_group` int(2) DEFAULT 2,
  `valid` int(1) NOT NULL DEFAULT 0,
  `save_me` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `login`, `email`, `password`, `firstname`, `lastname`, `phone`, `city`, `avatar`, `vk_link`, `youtube_link`, `user_group`, `valid`, `save_me`) VALUES
(1, 'admin', 'my@mail.dn', '$6$password$KnmAYhExeNOZx0lda63U3WPEfT7J5IVhaNUE8wEWKHdzsJnc1LEfZYZQPfmiI4uQ6S5fCXukaGd8fhe8Gd8Bd/', 'Вася', 'Иванов', '+79595622322', 'Челябинск', 'admin.jpg', '1', NULL, 1, 1, 'on');

ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `phone` (`phone`);

ALTER TABLE `bank`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `city`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
