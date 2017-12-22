SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `attendees`;
CREATE TABLE `attendees` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `meeting_id` (`meeting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`),
  CONSTRAINT `attendees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `communities`;
CREATE TABLE `communities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `community_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `community_id` (`community_id`),
  CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `organisers`;
CREATE TABLE `organisers` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `meeting_id` (`meeting_id`),
  CONSTRAINT `organisers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `organisers_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




INSERT INTO users (id, name)
VALUES  (1, 'Kevin Mouga'),
        (2, 'Laurent Lebrun'),
        (3, 'Tristant Test'),
        (4, 'Lucille Lol'),
        (5, 'Nani Crizo'),
        (6, 'Florent Vela'),
        (7, 'Stephane Bertra'),
        (8, 'Justine Belli');

INSERT INTO communities (id, name)
VALUES  (1, 'La fup'),
        (2, 'IPSSI'),
        (3, 'ESGI');

INSERT INTO meetings (id, title, description, date_start, date_end, community_id)
VALUES  (1, 'PHP 7.2', 'Toutes les nouveautees de php', '2018-03-13 02:32:21','2018-03-14 02:32:21',2),
        (2, 'Symfony 4', 'Toutes les nouveautees de Symfony', '2018-03-15 02:32:21','2018-03-19 02:32:21',1),
        (3, 'Docker', 'Toutes les nouveautees de Docker', '2017-12-27 08:00:00','2017-12-27 18:30:00',1),
        (4, 'React', 'Toutes les nouveautees de React', '2017-12-28 08:00:00','2017-12-28 18:30:00',3),
        (5, 'Javascript', 'Toutes les nouveautees de Javascript', '2017-12-27 08:00:00','2017-12-27 18:30:00',2),
        (6, 'Css', 'Toutes les nouveautées de Css', '2017-12-27 08:00:00','2017-12-27 18:30:00',3)
        ;


INSERT INTO organisers (meeting_id, user_id)
VALUES  (1, 1),
        (1, 2),
        (1, 3),
        (1, 4),
        (2, 2),
        (2, 3),
        (3, 7),
        (3, 8),
        (4, 1),
        (3, 2),
        (4, 4),
        (5, 5),
        (6, 3),
        (6, 6)
        ;

INSERT INTO attendees (meeting_id, user_id)
VALUES  (1, 5),
        (1, 6),
        (2, 1),
        (2, 4),
        (2, 5),
        (2, 6),
        (2, 7),
        (2, 8),
        (3, 1),
        (3, 2),
        (3, 3),
        (3, 4),
        (3, 5),
        (4, 2),
        (4, 3),
        (5, 4),
        (5, 1),
        (5, 2),
        (6, 1),
        (6, 2),
        (6, 8)
        ;