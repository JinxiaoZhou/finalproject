SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `food_list` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `fat` decimal(11,0) NOT NULL,
  `carbohydrate` decimal(11,0) NOT NULL,
  `protein` decimal(11,0) NOT NULL,
  `gram` decimal(11,0) NOT NULL,
  `calories` decimal(11,0) NOT NULL
);


INSERT IGNORE INTO `food_list` (`id`, `name`, `fat`, `carbohydrate`, `protein`, `gram`, `calories`) VALUES
(1, 'water ', 0, 0, 0, 0, 0),
(2, 'oreo', 7, 25, 1, 34, 160),
(3, 'obj', 50, 100, 50, 1000, 2000),
(4, 'coco', 10, 20, 0, 500, 200),
(5, '1', 1, 1, 1, 1, 1),
(6, '2', 2, 22, 22, 22, 2),
(7, '111', 1, 1, 1, 11, 1);


CREATE TABLE  IF NOT EXISTS `login_info` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);


INSERT IGNORE INTO `login_info` (`id`, `username`, `password`) VALUES
(1, '1', '1');


CREATE TABLE IF NOT EXISTS `today_list` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `food_list_id` int(11) NOT NULL,
  FOREIGN KEY (`food_list_id`) REFERENCES `food_list`(`id`)
);



INSERT IGNORE INTO `today_list` (`id`, `food_list_id`) VALUES
(1, 7),
(2, 5),
(3, 3),
(4, 1);


ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `login_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `today_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

COMMIT;

