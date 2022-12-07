-- version 4.8.4
-- Gegenereerd op: 07 dec 2022 om 00:00
-- Serverversie: 5.7.24
-- PHP-versie: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `reservering2022`
-- Tabelstructuur voor tabel `reservations`

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `code` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Tabelstructuur voor tabel `users`

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Gegevens worden geëxporteerd voor tabel `users`

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.nl', '$2y$10$fKEYgN3WbRMCKF/j.9XsJOmNR9U/Jt0T7o7XpCeOkrTohcYS3i6GK');
COMMIT;
