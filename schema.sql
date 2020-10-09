-- CREATE DATABASE `tasks-db`
--   DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- USE `tasks-db`;
--
-- CREATE TABLE `users` (
--   `user_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   `user_login` varchar(20) NOT NULL,
--   `user_password` varchar(60) NOT NULL,
--   `user_name` varchar(20) NOT NULL,
--   `user_surname` varchar(20) NOT NULL,
--   `user_patronymic` varchar(20) NOT NULL,
--   `user_date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
-- )
--   ENGINE=InnoDB
--   DEFAULT CHARSET=utf8
--   COMMENT = 'Таблица пользователей';


CREATE DATABASE IF NOT EXISTS `feedback-bd`
  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `feedback-bd`;

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
)
    ENGINE=InnoDB
    DEFAULT CHARSET=utf8mb4
    COLLATE=utf8mb4_unicode_ci;

