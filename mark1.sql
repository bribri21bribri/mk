-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 15 日 14:01
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mark1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `amount_plan`
--

CREATE TABLE `amount_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `price_plan`
--

CREATE TABLE `price_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `prod_plan`
--

CREATE TABLE `prod_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `name`, `user_level`) VALUES
(1, 'user1', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user_plan`
--

INSERT INTO `user_plan` (`id`, `name`, `user_level`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(2, 'test', 0, 10, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00'),
(3, 'user plan 2', 1, 20, 1, '2019-03-08 00:00:00', '2019-03-29 00:00:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `amount_plan`
--
ALTER TABLE `amount_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `price_plan`
--
ALTER TABLE `price_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prod_plan`
--
ALTER TABLE `prod_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `amount_plan`
--
ALTER TABLE `amount_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `prod_plan`
--
ALTER TABLE `prod_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
