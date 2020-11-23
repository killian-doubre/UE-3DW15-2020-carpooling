CREATE TABLE `users` (
    `id` int AUTO_INCREMENT NOT NULL,
    `firstname` varchar(255) NOT NULL,
    `lastname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `birthday` datetime NOT NULL,
    PRIMARY KEY (`id`)
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
    PRIMARY KEY (`id`),
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

CREATE TABLE `cars` (
    `idcar` int AUTO_INCREMENT NOT NULL,
    `marque` varchar(255) NOT NULL,
    `modele` varchar(255) NOT NULL,
    `typemoteur` varchar(255) NOT NULL,
    `couleur` varchar(255) NOT NULL,
    `author` INT NOT NULL,
    PRIMARY KEY (`idcar`),
    FOREIGN KEY (`author`) REFERENCES ads(`id`)
);



INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');