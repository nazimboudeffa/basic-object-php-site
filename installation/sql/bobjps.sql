-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 déc. 2021 à 22:45
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bobjps`
--

-- --------------------------------------------------------

--
-- Structure de la table `ossn_site_settings`
--

CREATE TABLE `ossn_site_settings` (
  `setting_id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ossn_site_settings`
--

INSERT INTO `ossn_site_settings` (`setting_id`, `name`, `value`) VALUES
(1, 'theme', 'goblue'),
(2, 'site_name', '<<sitename>>'),
(3, 'language', 'en'),
(4, 'cache', '0'),
(5, 'owner_email', '<<owner_email>>'),
(6, 'notification_email', '<<notification_email>>'),
(7, 'upgrades', '[\"1410545706.php\",\"1411396351.php\", \"1412353569.php\",\"1415553653.php\",\"1415819862.php\", \"1423419053.php\", \"1423419054.php\", \"1439295894.php\", \"1440716428.php\", \"1440867331.php\", \"1440603377.php\", \"1443202118.php\", \"1443211017.php\", \"1443545762.php\", \"1443617470.php\", \"1446311454.php\", \"1448807613.php\", \"1453676400.php\", \"1459411815.php\", \"1468010638.php\", \"1470127853.php\", \"1480759958.php\", \"1495366993.php\", \"1513524535.php\", \"1513603766.php\", \"1513783390.php\", \"1542223614.php\", \"1564080285.php\", \"1577836800.php\", \"1597058454.php\", \"1597734806.php\", \"1598389337.php\", \"1605286634.php\", \"1632413382.php\", \"1633420776.php\"]'),
(9, 'display_errors', 'off'),
(10, 'site_key', '<<secret>>'),
(11, 'last_cache', ''),
(12, 'site_version', '6.1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ossn_site_settings`
--
ALTER TABLE `ossn_site_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ossn_site_settings`
--
ALTER TABLE `ossn_site_settings`
  MODIFY `setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
