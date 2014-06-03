-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2014 年 6 月 03 日 13:55
-- サーバのバージョン： 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `NextGroupWareDB`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `body` text,
  `comment_date` date NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `poster` (`poster`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `poster`, `body`, `comment_date`, `delete_flg`) VALUES
(1, 1, 4, 'commentcomment', '2014-06-10', 0),
(2, 1, 4, 'commentcomment', '2014-06-10', 0),
(3, 1, 3, 'hogebodyhoge', '2014-06-02', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `body` text,
  `content_date` date NOT NULL,
  `update_date` date NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `kind` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- テーブルのデータのダンプ `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `title`, `body`, `content_date`, `update_date`, `delete_flg`, `kind`) VALUES
(1, 3, 'title edit title', 'test edit contents', '2014-06-03', '2014-06-04', 0, 0),
(3, 3, 'title edit title', 'contents edit contents', '2014-06-03', '2014-06-04', 0, 1),
(4, 3, 'title edit title', 'test edit contents', '2014-06-03', '2014-06-04', 1, 1),
(5, 3, 'title edit title', 'contents edit contents', '2014-06-03', '2014-06-02', 0, 0),
(6, 3, 'title edit title', 'test edit contents', '2014-06-03', '2014-06-03', 0, 0),
(7, 1, 'title edit title', 'test edit contents', '2014-06-03', '2014-06-03', 0, 0),
(8, 1, 'title edit title', 'test edit contents', '2014-06-03', '2014-06-03', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- テーブルのデータのダンプ `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, '0'),
(2, '2010'),
(3, '2011'),
(4, '2012'),
(5, '2013'),
(6, '2014'),
(7, '2015'),
(8, '2016'),
(9, '2017'),
(10, '2018'),
(11, '2019');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img_path` varchar(100) DEFAULT 'user/img/dummy.png',
  `latest_login` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `group_id`, `stat`, `name`, `mail`, `password`, `img_path`, `latest_login`) VALUES
(1, 1, 2, 'user01', 'user01@mail', 'user01', NULL, '2014-06-02'),
(2, 2, 1, 'user02', 'user02@mail', 'user02', NULL, '2014-06-02'),
(3, 2, 2, 'user03', 'user03@mail', 'user03', NULL, '2014-06-02'),
(4, 3, 2, 'user04', 'user04@mail', 'user04', NULL, '2014-06-02'),
(5, 3, 1, 'user05', 'user05@mail', 'user05', NULL, '2014-06-02'),
(6, 3, 2, 'user06', 'user06@mail', 'user06', NULL, '2014-06-02'),
(7, 4, 2, 'user07', 'user07@mail', 'user07', NULL, '2014-06-02'),
(8, 5, 2, 'user08', 'user08@mail', 'user08', NULL, '2014-06-02'),
(9, 6, 2, 'user09', 'user09@mail', 'user09', NULL, '2014-06-02'),
(10, 4, 1, 'user10', 'user10@mail', 'user10', NULL, '2014-06-02'),
(11, 5, 1, 'atariatari', 'atari@gagahogha.com', '12364', NULL, '2014-06-03'),
(12, 2, 1, 'aaaa', 'aaaa', 'aaaa', NULL, '2014-06-03'),
(13, 8, 1, 'hogehoge', 'hogehoge@mail', 'hoge', NULL, '2014-06-03');

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- テーブルの制約 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
