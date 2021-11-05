-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:80
-- 生成日時: 2021 年 11 月 05 日 12:28
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `lesson`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `instrument`
--

CREATE TABLE `instrument` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT '楽器名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `instrument`
--

INSERT INTO `instrument` (`id`, `name`) VALUES
(2, 'エレクトーン'),
(7, 'キーボード'),
(5, 'ギター'),
(6, 'ドラム'),
(1, 'ピアノ'),
(4, 'ベース'),
(3, 'ヴォーカル');

-- --------------------------------------------------------

--
-- テーブルの構造 `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `del_flg` int(11) NOT NULL DEFAULT '0' COMMENT '権限(0:表示1:非表示)',
  `image` varchar(255) NOT NULL COMMENT '講師画像',
  `name` varchar(50) NOT NULL COMMENT '講師名',
  `kana` varchar(50) NOT NULL COMMENT 'フリガナ',
  `email` varchar(100) NOT NULL COMMENT 'メールアドレス',
  `tel` varchar(11) DEFAULT NULL COMMENT '電話番号',
  `code` varchar(11) NOT NULL COMMENT '郵便番号',
  `address` varchar(100) NOT NULL COMMENT '住所',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `inst_id` int(11) NOT NULL COMMENT '楽器ID',
  `body` text NOT NULL COMMENT '経歴',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `staff`
--

INSERT INTO `staff` (`id`, `del_flg`, `image`, `name`, `kana`, `email`, `tel`, `code`, `address`, `password`, `inst_id`, `body`, `created_at`, `update_at`) VALUES
(11, 0, 'logo1-test.png', '山田', 'ヤマダタロウ', 'test3@gmail.com', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$He06ybI2LAw8ndz0MySud.0Cs7Pmu1GvQ3nn83O03GwP8fKEuiMwq', 2, '大学を卒業後様々なアーティストのレコーディングに参加。\r\n', '2021-10-30 10:34:55', '2021-11-03 12:59:03'),
(16, 0, 'logo1.jpg', '斎藤みほ', 'サイトウミホ', 'test@co.jp', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$4X5TekF8kVPn5mtxC.TY5.8HS8OoYuR7.V.d1jmd1UtovS.cavQQW', 4, '現在は某メジャーアーティストのバックで演奏をしたりしています。', '2021-11-02 20:21:32', '2021-11-03 14:11:35'),
(17, 0, '22236438.png', '吉岡誠', 'ヨシオカマコト', 'klfvnkfdn@gmail.com', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$3U6jLPpAmSnf6vlU52sF8OtHtxl/9X4ZOm9XPh91pUU23GMa6DJjq', 4, 'テストです。', '2021-11-03 13:21:02', '2021-11-03 13:21:02'),
(18, 1, 'default.png', '佐藤大地', 'サトウダイチ', 'dkvbzkb@co.jp', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$5yDX5YnlvJhiBe8JeyM.qOkNyT5.M.tPlebT0OP75RkduvSHmXsWK', 4, 'テスト', '2021-11-03 14:03:38', '2021-11-03 14:03:38'),
(19, 0, '子供ピアノ.jpg', '藤田五郎', 'フジタゴロウ', 'svkzndf@gmail.com', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$ZbEuxYxX4FxUgkmZp27oXuNxu5QKqUeUUeC2a76000JMhhYUynmDu', 5, 'テスト。', '2021-11-03 14:04:52', '2021-11-03 14:04:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `change_flg` int(11) NOT NULL DEFAULT '0' COMMENT '権限(0:表示1:非表示)',
  `users_id` int(11) NOT NULL COMMENT 'users_id',
  `staff_id` int(11) NOT NULL COMMENT 'staff_id',
  `day_shift` varchar(50) NOT NULL COMMENT '月日',
  `time_shift` varchar(50) NOT NULL COMMENT '時間日時',
  `created_at` datetime NOT NULL COMMENT '登録日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `image` varchar(255) NOT NULL COMMENT '会員画像',
  `name` varchar(50) NOT NULL COMMENT '氏名',
  `kana` varchar(50) NOT NULL COMMENT 'フリガナ',
  `email` varchar(100) NOT NULL COMMENT 'メールアドレス',
  `tel` varchar(11) DEFAULT NULL COMMENT '電話番号',
  `code` varchar(11) NOT NULL COMMENT '郵便番号',
  `address` varchar(100) NOT NULL COMMENT '住所',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `inst_id` int(11) NOT NULL COMMENT '楽器ID',
  `body` text COMMENT '備考欄',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登録日時',
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `kana`, `email`, `tel`, `code`, `address`, `password`, `inst_id`, `body`, `created_at`, `update_at`) VALUES
(0, 'default.png', '山田太郎', 'ヤマダタロウ', 'manage@co.jp', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$16JYokxJCuJk9UmQcjk1AOQLqSg/SoQAiEnhLttvJA6k5pyOP0hMK', 4, 'テストです。', '2021-11-05 12:24:20', '2021-11-05 12:24:20'),
(22, 'logo1.jpg', '佐藤太郎', 'サトウタロウ', 'test2@gmail.com', '08055013910', '2220000', '神奈川県横浜市港北区1-1-1', '$2y$10$dwUvrOc.nowlXJoyEJRvS.aUhph/jtgVoG.hLz5ekoPcq8I0qJ1gq', 4, 'おはようございます。\r\n本日はよろしくお願いいたします。\r\nこんばんは', '2021-10-24 20:46:11', '2021-11-05 08:59:53'),
(23, '1449633.png', '山田太郎', 'ヤマダタロウ', 'test@co.jp', '08095013910', '2100000', '神奈川県川崎市川崎区1-1-1', '$2y$10$o78RDajjBlE25VjfrVbvMO6v3oTMiUlDsVc8Ol44Tal3pfREOyO3G', 2, '', '2021-11-03 12:57:28', '2021-11-03 12:57:28'),
(24, 'default.png', '山口晶子', 'ヤマグチアキコ', 'ffkvzbb@co.jp', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$A3t3Dyis32vYdQG4f1loouVgq0LoC1WmWDXHkZ7koL50ncRulc/Ki', 6, '', '2021-11-03 13:56:18', '2021-11-03 13:56:18'),
(25, 'ヴァイオリン.jpg', '山本太郎', 'ヤマモトタロウ', 'kvjbfdvzk@gmail.com', '08095013910', '2440000', '神奈川県横浜市戸塚区1-1-1', '$2y$10$NVodE6MlWs/Pad1/v.1zP.WqJ6uPsG5IscUHnY3Phjsnqe6mQqVja', 7, '', '2021-11-03 13:58:01', '2021-11-03 13:58:01');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- テーブルのインデックス `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- テーブルのインデックス `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `instrument`
--
ALTER TABLE `instrument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
