-- version 4.8.4
-- Gegenereerd op: 12 dec 2022 om 08:41
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
    `email` varchar(30) NOT NULL,
    `phone` int(11) NOT NULL,
    `note` text NOT NULL,
    `reservation_date` date NOT NULL,
    `code` int(10) DEFAULT NULL,
    `tag_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Gegevens worden geëxporteerd voor tabel `reservations`

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `note`, `reservation_date`, `code`, `tag_id`) VALUES
    (4, 'henk patat', 'sdasd@sdsaas.nl', 678321312, '67832131 2678321312 678321312', '2022-12-08', 3123, 0);

-- Tabelstructuur voor tabel `tags`

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `tag` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Gegevens worden geëxporteerd voor tabel `tags`

INSERT INTO `tags` (`id`, `tag`) VALUES
                                     (1, 'rits'),
                                     (2, 'reparatie'),
                                     (3, 'maken');

-- Tabelstructuur voor tabel `users`

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(60) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Gegevens worden geëxporteerd voor tabel `users`

INSERT INTO `users` (`id`, `email`, `password`) VALUES
    (1, 'admin@admin.nl', '$2y$10$fKEYgN3WbRMCKF/j.9XsJOmNR9U/Jt0T7o7XpCeOkrTohcYS3i6GK');
COMMIT;