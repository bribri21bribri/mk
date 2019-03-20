-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 18 日 01:21
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.3.0

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
  `amount_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `amount_plan`
--

INSERT INTO `amount_plan` (`id`, `name`, `amount_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(7, 'sv', 5, 234, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00'),
(8, 'sv', 5, 234, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00'),
(9, 'sv', 5, 234, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire` datetime NOT NULL,
  `c_valid` tinyint(1) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `dis_unit` int(11) NOT NULL,
  `c_condi` int(11) NOT NULL COMMENT '發放條件'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_gain`
--

CREATE TABLE `coupon_gain` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `date_gain` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_used`
--

CREATE TABLE `coupon_used` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `dis_price` int(11) NOT NULL COMMENT '折抵金額',
  `date_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `price_plan`
--

CREATE TABLE `price_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `price_plan`
--

INSERT INTO `price_plan` (`id`, `name`, `price_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(9, 'test', 3000023, 234, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `prod_plan`
--

CREATE TABLE `prod_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prod_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `prod_plan`
--

INSERT INTO `prod_plan` (`id`, `name`, `prod_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(6, 'a', 0, 2, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00'),
(7, 'test', 0, 234, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00');

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
  `user_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user_plan`
--

INSERT INTO `user_plan` (`id`, `name`, `user_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(6, 'Mike', 2, 2, 0, '2018-07-22 00:00:00', '2018-07-22 00:00:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `amount_plan`
--
ALTER TABLE `amount_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- 資料表索引 `coupon_gain`
--
ALTER TABLE `coupon_gain`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `coupon_used`
--
ALTER TABLE `coupon_used`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_level` (`user_condi`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `amount_plan`
--
ALTER TABLE `amount_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `coupon_gain`
--
ALTER TABLE `coupon_gain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `prod_plan`
--
ALTER TABLE `prod_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
