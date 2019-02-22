-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 juil. 2018 à 08:43
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `common-database`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `content_comment` varchar(140) DEFAULT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_comment` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_comment`),
  KEY `fk_comment_user1_idx` (`id_user`),
  KEY `fk_comment_tweet1_idx` (`id_tweet`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id_followed` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `status_follow` tinyint(5) NOT NULL DEFAULT '1',
  KEY `fk_follow_user2_idx` (`id_follower`),
  KEY `fk_follow_user1_idx` (`id_followed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`id_followed`, `id_follower`, `status_follow`) VALUES
(4, 1, 1),
(6, 1, 1),
(4, 1, 1),
(5, 1, 1),
(1, 5, 1),
(5, 6, 1),
(1, 6, 1),
(4, 6, 1),
(3, 6, 1),
(3, 1, 1),
(9, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

DROP TABLE IF EXISTS `hashtag`;
CREATE TABLE IF NOT EXISTS `hashtag` (
  `id_hashtag` int(11) NOT NULL AUTO_INCREMENT,
  `name_hashtag` varchar(255) NOT NULL,
  PRIMARY KEY (`id_hashtag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `status_like` tinyint(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_like`),
  KEY `fk_like_user1_idx` (`id_user`),
  KEY `fk_like_tweet1_idx` (`id_tweet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `id_tweet` int(11) NOT NULL,
  `name_media` varchar(255) DEFAULT NULL,
  `file_media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_media`),
  KEY `fk_media_tweet_idx` (`id_tweet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `content_message` text,
  `date_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_message` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`),
  KEY `fk_message_user1_idx` (`id_sender`),
  KEY `fk_message_user2_idx` (`id_receiver`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `retweet`
--

DROP TABLE IF EXISTS `retweet`;
CREATE TABLE IF NOT EXISTS `retweet` (
  `id_retweet` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `date_retweet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_retweet` tinyint(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_retweet`),
  KEY `fk_retweet_user1_idx` (`id_user`),
  KEY `fk_retweet_tweet1_idx` (`id_tweet`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `retweet`
--

INSERT INTO `retweet` (`id_retweet`, `id_user`, `id_tweet`, `date_retweet`, `delete_retweet`) VALUES
(4, 1, 28, '2018-07-26 19:50:21', 1),
(5, 1, 6, '2018-07-27 08:47:24', 1),
(6, 1, 5, '2018-07-28 15:44:55', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `id_tweet` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `content_tweet` varchar(140) DEFAULT NULL,
  `date_tweet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_tweet` tinyint(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tweet`),
  KEY `fk_tweet_user1_idx` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `id_user`, `content_tweet`, `date_tweet`, `delete_tweet`) VALUES
(32, 1, 'Hey !', '2018-07-26 19:30:11', 1),
(3, 1, 'Sa compte bien !', '2018-07-20 15:26:54', 1),
(28, 3, 'Sourire d\'ange', '2018-07-23 09:37:42', 1),
(5, 5, 'Je suis Wouaf Wouaf le Chien\r\nsigner @Boby', '2018-07-21 18:10:22', 1),
(6, 6, 'Je suis un test tweet de @followtest', '2018-07-21 18:16:08', 1),
(7, 1, 'Salut !', '2018-07-21 18:35:07', 1),
(30, 9, 'Tester', '2018-07-25 11:39:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tweet_to_tag`
--

DROP TABLE IF EXISTS `tweet_to_tag`;
CREATE TABLE IF NOT EXISTS `tweet_to_tag` (
  `id_tweet` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `status_ttt` int(11) NOT NULL DEFAULT '1',
  KEY `id_tweet` (`id_tweet`),
  KEY `id_tag` (`id_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT '#1da1f2',
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `firstname`, `lastname`, `password`, `avatar`, `theme`, `register_date`, `status`) VALUES
(1, 'John', 'mscod93@gmail.com', 'Raul', 'Delianu', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://cloud.netlifyusercontent.com/assets/344dbf88-fdf9-42bb-adb4-46f01eedd629/68dd54ca-60cf-4ef7-898b-26d7cbe48ec7/10-dithering-opt.jpg', '#1da1f2', '2018-07-18 16:08:24', 1),
(2, 'test', 'test@test.te', 'test', 'test', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-18 16:13:51', 0),
(3, 'Joker', 'sourir@dange.com', 'sais', 'On', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-19 14:59:07', 1),
(4, 'Lola', 'lola@fun.com', 'love', 'emeric', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-20 09:44:57', 1),
(5, 'Boby', 'wouaf@wouaf.fr', 'Dog', 'The', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-21 16:58:04', 1),
(6, 'followtest', 'follow@test.com', 'test', 'follow', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-21 17:15:00', 1),
(7, 'bouba', 'guerby.andre@yahoo.fr', 'Guerby', 'ANDRE', '7faed9f44f6c15ac7e79d60f39e10d83fc9a9ab3', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-21 20:17:14', 1),
(8, 'Avatar', 'avatar@test.fr', 'tar', 'ava', 'ceeac9fbb65bfe11e89fc0acde5503ec287dfbaf', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-23 10:47:19', 1),
(9, 'Testtweet', 'tweet@test.com', 'test', 'tweets', 'b96d4a2c710d321ba12190f316cd7857ffd0ecdd', 'https://www.reussirmavie.net/photo/art/grande/4917219-7338890.jpg?v=1517524283', '#1da1f2', '2018-07-25 11:39:23', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
