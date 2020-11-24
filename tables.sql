CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL,
    `firstname` varchar(255) NOT NULL,
    `lastname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `birthday` datetime NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `cars` (
    `idcar` int AUTO_INCREMENT NOT NULL,
    `marque` varchar(255) NOT NULL,
    `modele` varchar(255) NOT NULL,
    `couleur` varchar(255) NOT NULL,
    `typemoteur` varchar(255) NOT NULL,
    `author` INT NOT NULL,
    PRIMARY KEY (`idcar`),
    FOREIGN KEY (`author`) REFERENCES ads(`id`)
);

CREATE TABLE `ads` (
    `idannonce` int AUTO_INCREMENT NOT NULL,
    `idauthor` varchar(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    `car` varchar(255) NOT NULL,
    `price` varchar(255) NOT NULL,
    `start` varchar(255) NOT NULL,
    `destination` varchar(255) NOT NULL,
    `departuredate` datetime NOT NULL,
    PRIMARY KEY (`idannonce`),
    FOREIGN KEY (`car`) REFERENCES car(`car`),
    FOREIGN KEY (`idauthor`) REFERENCES users(`idauthor`)
);

CREATE TABLE `adcomments` (
    `idcom` int AUTO_INCREMENT NOT NULL,
    `idad` int  NOT NULL,
    `author` varchar(255) NOT NULL,
    `comment` varchar(255) NOT NULL,
    `date` datetime NOT NULL,
    PRIMARY KEY (`idcom`),
    FOREIGN KEY (`idad`) REFERENCES ads(`idannonce`)
);

CREATE TABLE `reservations` (
    `id` int AUTO_INCREMENT NOT NULL,
    `idproprietaire` varchar(255) NOT NULL,
    `idcovoitureur` varchar(255) NOT NULL,
    `idannonce` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`idproprietaire`) REFERENCES users(`id`),
    FOREIGN KEY (`idcovoitureur`) REFERENCES users(`id`),
    FOREIGN KEY (`idannonce`) REFERENCES ads(`idannonce`)
);


INSERT INTO `users`(`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

INSERT INTO `cars` (`idcar`, `marque`, `modele`, `couleur`, `typemoteur`, `author`) VALUES
(1, 'Citroen', 'DS4', 'Rouge', 'electrique', 1),
(2, 'Peugeot', '205', 'Grise', 'diesel', 1),
(3, 'Tesla', 'Modèle S', 'Bleue', 'electrique', 2),
(4, 'Citroen', 'Saxo', 'Blanche', 'essence', 3);

INSERT INTO `ads` (`idannonce`, `idauthor`, `title`, `description`, `car`, `price`, `start`, `destination`, `departuredate`) VALUES
(1, 1, 'Depart à la montagne', 'Je pars la montagne pour les vacances, qui me suis ?', 1, '12,60', 'Hyères', 'Chamonix', '2020-12-20 12:00'),
(2, 1, 'Vacances à St-tropez', 'Je veux bronzer sur la plage cet été, pas vous ?', 2, '11,50', 'Paris', 'St-Tropez', '2020-12-14 7:00'),
(3, 3, 'Road-trip en Alsace', 'Je veux découvrir le paysage alsacien, je vous emmene ?', 4, '13,00', 'Orleans', 'Colmar', '2020-12-16 14:20');

INSERT INTO `adcomments` (`idcom`, `idad`, `author`, `comment`, `date`) VALUES
(1, 1, 2, 'Je serais ravi de faire parti du voyage !', '2020-11-28 10:15:52'),
(2, 1, 3, 'Moi aussi je veux faire du ski !', '2020-12-1 08:36:37'),
(3, 2, 3, 'Bronzer? Pourquoi pas après tout !', '2020-12-3 12:24:22'),
(4, 3, 2, 'Je veux passer de bonnes vacances moi aussi.', '2020-11-30 10:49:44'),
(5, 1, 2, 'Je peux te payer en creme solaire ?', '2020-12-2 22:56:39');

INSERT INTO `reservations` (`id`, `idproprietaire`, `idcovoitureur`, `idannonce`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3);