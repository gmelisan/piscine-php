SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `articles` (
  `id` int(4) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pic` varchar(1024) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `name`, `pic`, `price`) VALUES
(1, 'Пепперони', 'pepperoni.jpg', 380),
(2, 'Барбекю', 'barbekyu.jpg', 460),
(3, 'Мясное ассорти', 'myasnoe_assorti.jpg', 490),
(4, 'Куриное Царство', 'kurinoe_tsarstvo.jpg', 360),
(5, '4 сыра', '4-sira.jpg', 440),
(6, 'Жульетта', 'julietta.jpg', 480),
(7, 'Дары моря', 'dary-morya.jpg', 470),
(8, 'Дьябло', 'diablo.jpg', 400);


CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Мясные'),
(2, 'Вегетарианские'),
(3, 'Рыбные'),
(4, 'Сезонные');

CREATE TABLE `cat_list` (
  `cat_id` int(4) NOT NULL,
  `article_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cat_list` (`cat_id`, `article_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 3),
(5, 6),
(5, 8);

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(4) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_details` (
  `order_id` int(4) NOT NULL,
  `article_id` int(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `login` varchar(32) NOT NULL,
  `passwd` varchar(1024) NOT NULL,
  `priv` varchar(16) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `second_name` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `passwd`, `priv`, `first_name`, `second_name`, `phone`) VALUES
(1, 'admin', 'fee32be7c00e73eab97a39549d79af73aec87b6fa22a0b56867a4975fe82344cd9776c6d6dff419e0f2e415c492340bb8329bbfac0c872934df66466c2e0e5d3', 'admin', 'Admin', 'Adminov', '+42 421 42 42'),
(2, 'gmelisan', 'd2e1d1c7534f1f2a481d41612437b7a79b28fd8d01611f95794767e7094e2a0459ad7fb2b1549504d72daac55f147a6dcd01ea969dee1752cd2e351664db8681', 'user', 'Vladimir', 'Nefyodov', ''),
(3, 'jdesmond', '0e7f7b8cf4cccdcb2d1095f3fb71443122a3ed847d7b61941e4629a0aaba0abe610a9225b85a4fc18ca8fddcea34af090b7dfe1f51ec6bbc38dbf5b2af36a786', 'user', '', '', '');


ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `articles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
