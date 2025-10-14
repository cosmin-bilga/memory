-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 14 oct. 2025 à 14:09
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.4.0
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--
-- --------------------------------------------------------
--
-- Structure de la table `players`
--
DROP TABLE IF EXISTS `players`;

CREATE TABLE
  IF NOT EXISTS `players` (
    `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `login` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `login` (`login`)
  ) ENGINE = MyISAM AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `players`
--
INSERT INTO
  `players` (`id`, `login`, `password`, `name`)
VALUES
  (
    1,
    's',
    '$2y$12$I73uIApXBT/CS2Gft9ZReuBLXSMZuiXkyAJka4XwNZyyIYENx7Z9m',
    's'
  ),
  (
    2,
    'c',
    '$2y$12$kvpsecHh6txnbU7hWUznJuxRiQ914B0ZRtRIoveT4PS0KyskDL9JC',
    'Coco'
  ),
  (
    3,
    'd',
    '$2y$12$b7MT/ykikC.ar.XuzFjR6OhYq6EoJJOlTTyS2k7cE/GuKbwFfelNy',
    'd'
  ),
  (
    4,
    'sh',
    '$2y$12$DBSOBuHTG/QYc2rACRfsW.8XbcP2UoW4hJFSEp7eMNBswjzL00Bs2',
    'e'
  ),
  (
    5,
    'f',
    '$2y$12$273t3v0jBOvg4loXVqi9h.blJNRD06fsrjt3M7YTsRNY0MDHWVRMq',
    'f'
  ),
  (
    6,
    't',
    '$2y$12$BwUZ8HA0x9OiFvyoHW72QOiY5MRDnRDaAhiSCIPYupFSbiw4SSQtu',
    't'
  ),
  (
    7,
    'h',
    '$2y$12$XRTYFwuPVPWZwSL1JJ0OTuwzy/uXymYofHUjxxJLjv.BBRBp88sRq',
    'h'
  ),
  (
    8,
    'y',
    '$2y$12$F0RzjOKkbhmr/EQZso8.wuYDFqUZBa1uvZnMEEEAqP.iMvS3vRYL2',
    'y'
  ),
  (
    9,
    'er',
    '$2y$12$9kwYeXKYIl4mKiuI4PA8UOXsUGFBdU9ZbZ7lnK17P5JYbFIEZsqDm',
    'er'
  ),
  (
    10,
    'Cosmin',
    '$2y$12$bKmzcQywqUqnlQZJCMsmTuyCwJRt9frIen5e9xVIfhfmk2qA53UnG',
    'Cosmin Bilga'
  ),
  (
    11,
    'Vlad',
    '$2y$12$UqbAi8VqBGQ0U/XZ2v2KgOb7PQ07juYZ4e.4IASV49OlueH0f8M7i',
    'Vlad'
  );

-- --------------------------------------------------------
--
-- Structure de la table `scores`
--
DROP TABLE IF EXISTS `scores`;

CREATE TABLE
  IF NOT EXISTS `scores` (
    `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `player_id` int (11) NOT NULL,
    `score` int (11) NOT NULL,
    `completion_time` time NOT NULL,
    `time_completed` datetime NOT NULL,
    `number_of_pairs` int (11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = MyISAM AUTO_INCREMENT = 35 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `scores`
--
INSERT INTO
  `scores` (
    `id`,
    `player_id`,
    `score`,
    `completion_time`,
    `time_completed`,
    `number_of_pairs`
  )
VALUES
  (1, 1, 29, '00:00:37', '2025-10-10 15:42:34', 6),
  (2, 1, 14, '00:00:18', '2025-10-10 15:43:53', 6),
  (3, 1, 16, '00:00:28', '2025-10-10 16:16:01', 6),
  (4, 1, 15, '16:35:26', '2025-10-13 08:51:51', 6),
  (5, 1, 19, '00:00:43', '2025-10-13 10:06:31', 6),
  (6, 1, 15, '00:00:28', '2025-10-13 10:07:05', 6),
  (7, 1, 9, '01:02:18', '2025-10-13 11:42:44', 6),
  (8, 1, 14, '00:01:09', '2025-10-13 11:46:51', 6),
  (9, 1, 16, '00:00:28', '2025-10-13 11:57:50', 6),
  (10, 1, 10, '00:00:18', '2025-10-13 13:51:46', 6),
  (11, 1, 12, '00:08:04', '2025-10-13 14:04:01', 6),
  (12, 1, 9, '01:09:41', '2025-10-13 16:25:46', 6),
  (13, 1, 9, '16:41:04', '2025-10-14 09:12:02', 6),
  (14, 5, 9, '00:03:09', '2025-10-14 09:30:14', 6),
  (15, 3, 4, '00:00:06', '2025-10-14 10:44:22', 3),
  (16, 3, 5, '00:00:08', '2025-10-14 10:46:44', 3),
  (17, 3, 19, '00:00:43', '2025-10-14 11:21:06', 8),
  (18, 3, 17, '00:00:45', '2025-10-14 11:25:46', 8),
  (19, 3, 7, '00:00:11', '2025-10-14 11:27:07', 3),
  (20, 3, 28, '00:00:50', '2025-10-14 12:15:25', 7),
  (21, 3, 4, '00:00:10', '2025-10-14 13:33:26', 3),
  (22, 3, 6, '00:04:13', '2025-10-14 13:38:13', 3),
  (23, 3, 7, '00:00:14', '2025-10-14 13:52:45', 3),
  (24, 10, 34, '00:01:33', '2025-10-14 14:06:16', 12),
  (25, 10, 20, '00:15:08', '2025-10-14 14:27:38', 3),
  (26, 10, 6, '00:00:35', '2025-10-14 14:28:34', 3),
  (27, 10, 11, '00:00:22', '2025-10-14 14:29:28', 7),
  (28, 10, 9, '00:04:07', '2025-10-14 14:53:13', 3),
  (29, 10, 6, '00:00:33', '2025-10-14 15:00:37', 3),
  (30, 10, 5, '00:00:09', '2025-10-14 15:19:06', 3),
  (31, 10, 5, '00:02:22', '2025-10-14 15:23:46', 3),
  (32, 10, 9, '00:00:15', '2025-10-14 15:38:24', 3),
  (33, 10, 5, '00:00:08', '2025-10-14 15:40:20', 3),
  (34, 10, 7, '00:01:17', '2025-10-14 15:56:32', 3);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;