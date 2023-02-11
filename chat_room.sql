-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 août 2019 à 01:51
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat_room`
--

-- --------------------------------------------------------

--
-- Structure de la table `connected_users`
--

DROP TABLE IF EXISTS `connected_users`;
CREATE TABLE IF NOT EXISTS `connected_users` (
  `user_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `group_messages`
--

DROP TABLE IF EXISTS `group_messages`;
CREATE TABLE IF NOT EXISTS `group_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message_date` time DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message_notifications`
--

DROP TABLE IF EXISTS `message_notifications`;
CREATE TABLE IF NOT EXISTS `message_notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `hosted_user_id` int(11) DEFAULT NULL,
  `message_snipet` varchar(100) DEFAULT NULL,
  `message_date` time DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT '0',
  `private_chat_id` int(11) DEFAULT NULL,
  `invited_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `private_chat_id` (`private_chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `private_chat`
--

DROP TABLE IF EXISTS `private_chat`;
CREATE TABLE IF NOT EXISTS `private_chat` (
  `private_chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `hosted_user_id` int(11) DEFAULT NULL,
  `invited_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`private_chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `private_chat_messages`
--

DROP TABLE IF EXISTS `private_chat_messages`;
CREATE TABLE IF NOT EXISTS `private_chat_messages` (
  `private_chat_messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `private_chat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `message_date` time DEFAULT NULL,
  PRIMARY KEY (`private_chat_messages_id`),
  KEY `private_chat_id` (`private_chat_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
