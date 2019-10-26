-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 3 月 13 日 07:23
-- サーバのバージョン： 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHILIALE`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `comment`) VALUES
(1, 2, 'Oz', 'レッツデバック'),
(2, 2, 'Oz', '奇跡も、魔法も、あるんだよ。'),
(3, 2, 'Oz', '奇跡も、魔法も、あるんだよ。'),
(4, 2, 'Oz', '奇跡も、魔法も、あるんだよ。'),
(5, 2, 'Oz', 'バグが直らんよ'),
(6, 2, 'Oz', 'テスト');

-- --------------------------------------------------------

--
-- テーブルの構造 `future_archives`
--

CREATE TABLE `future_archives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isbn_code` int(13) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `library_archives`
--

CREATE TABLE `library_archives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isbn_code` int(13) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `library_archives`
--

INSERT INTO `library_archives` (`id`, `user_id`, `isbn_code`, `book_img`, `book_title`, `book_author`) VALUES
(1, 2, 0, '', 'モモ', 'ミヒャエル・エンデ'),
(2, 2, 0, '', '老人と海', 'ヘミングウェイ');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `past_archives`
--

CREATE TABLE `past_archives` (
  `id` int(11) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `isbn_code` int(13) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `past_archives`
--

INSERT INTO `past_archives` (`id`, `user_id`, `isbn_code`, `book_title`, `book_author`, `book_img`, `comment`) VALUES
(100, '2', 2147483647, '怒りの葡萄', 'ジョン・スタインベック', '20180628192543angry.jpg', '怒りの葡萄ってなんやねんw'),
(102, '2', 2147483647, 'エミール上', 'ルソー,J-J.', '', ''),
(119, '2', 0, '長いお別れ', 'レイモンド・チャンドラー', '', ''),
(120, '2', 0, 'ツァラトゥストラはかく語りき', 'ニーチェ', '', ''),
(121, '2', 0, '神曲', 'ダンテ', '', ''),
(122, '2', 0, '踊る人形', 'コナン・ドイル', '', ''),
(123, '2', 0, '坊っちゃん', '夏目漱石', '', ''),
(124, '2', 0, 'そして誰もいなくなった', 'アガサ・クリスティ', '', ''),
(125, '2', 0, '砂の器', '松本清張', '', ''),
(127, '2', 0, '異邦人', 'カミュ', '', ''),
(128, '2', 0, '恐るべき子供たち', 'ジャン・コクトー', '', ''),
(129, '2', 0, 'これからの正義の話しをしよう', 'マイケル・サンデル', '', ''),
(130, '2', 0, '人間失格', '太宰治', '', ''),
(131, '2', 0, '変身', 'カフカ', '', ''),
(132, '2', 0, 'ドン・キホーテ', 'セルバンテス', '', ''),
(199, '2', 2147483647, 'アンドロイドは電気羊の夢を見るか?', 'フィリップ・K・ディック', '', ''),
(200, '2', 0, '長いお別れ', 'レイモンド・チャンドラー', '', ''),
(201, '2', 0, 'ツァラトゥストラはかく語りき', 'ニーチェ', '', ''),
(202, '2', 0, '神曲', 'ダンテ', '', ''),
(203, '2', 0, '踊る人形', 'コナン・ドイル', '', ''),
(204, '2', 0, '坊っちゃん', '夏目漱石', '', ''),
(205, '2', 0, 'そして誰もいなくなった', 'アガサ・クリスティ', '', ''),
(206, '2', 0, '砂の器', '松本清張', '', ''),
(207, '2', 0, 'アンドロイドは電気羊の夢をみるか', 'フィリップ・K・ディック', '', ''),
(208, '2', 0, '異邦人', 'カミュ', '', ''),
(209, '2', 0, '恐るべき子供たち', 'ジャン・コクトー', '', ''),
(210, '2', 0, 'これからの正義の話しをしよう', 'マイケル・サンデル', '', ''),
(211, '2', 0, '人間失格', '太宰治', '', ''),
(212, '2', 0, '変身', 'カフカ', '', ''),
(213, '2', 0, 'ドン・キホーテ', 'セルバンテス', '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'ふぃりあ', 'philia@gmail.com', '$2y$10$Cuv/IL.EeWWSp52vpjrn8uZ6NGnEefo0FRP7q4.FnKylgI.7.X/au'),
(2, 'Oz', 'Oz.nytia07@gmail.com', '$2y$10$QLDXGUQv5ksIAIYgqnfEJOatG1SNUnDr9Ovn2aUY4yQVdO1MW239G'),
(15, 'example', 'example@example', '$2y$10$GgGGiIBrlJw93yG34CzoJurfSFaebS8mxfHGzwxTuaJqoeIVuTmT2'),
(16, 'sample', 'sample@sample', '$2y$10$KNSaIk71cIRQdGstVSdKVenyZi3hGHr98g3L5Gbb1CQF7Umv7i44C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `future_archives`
--
ALTER TABLE `future_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_archives`
--
ALTER TABLE `library_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_archives`
--
ALTER TABLE `past_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `future_archives`
--
ALTER TABLE `future_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_archives`
--
ALTER TABLE `library_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `past_archives`
--
ALTER TABLE `past_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
