-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 nov. 2020 à 13:21
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espacemembre`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_time_publication` datetime NOT NULL,
  `date_time_edition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `contenu`, `date_time_publication`, `date_time_edition`) VALUES
(5, 'Annonce soirée mystère ', ' Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint. Unde quod at minus quia velit ipsa ea qui.\r\n                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut \r\n                            laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat \r\n                            in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.\r\n                          ', '2020-11-06 09:19:13', '0000-00-00 00:00:00'),
(6, 'Annonce soirée mystère ', ' Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint. Unde quod at minus quia velit ipsa ea qui.\r\n                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut \r\n                            laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat \r\n                            in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.\r\n                          ', '2020-11-06 09:19:37', '0000-00-00 00:00:00'),
(7, 'Annonce soirée mystère ', ' Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint. Unde quod at minus quia velit ipsa ea qui.\r\n                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut \r\n                            laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat \r\n                            in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.\r\n                          ', '2020-11-06 09:20:13', '0000-00-00 00:00:00'),
(8, 'Annonce soirée mystère ', '   Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint. Unde quod at minus quia velit ipsa ea qui. \r\n                            Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor \r\n                            sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat \r\n                            enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco \r\n                            magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum \r\n                            adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore culpa occaecat ut \r\n                            laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat \r\n                            in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.', '2020-11-06 10:24:46', '0000-00-00 00:00:00'),
(9, 'Annonce soirée mystère ', 'sc', '2020-11-06 13:03:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `espace`
--

CREATE TABLE `espace` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `motdepasse` text NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `num_tel` int(10) NOT NULL,
  `num_appart` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `espace`
--

INSERT INTO `espace` (`id`, `pseudo`, `mail`, `motdepasse`, `avatar`, `nom`, `prenom`, `num_tel`, `num_appart`) VALUES
(1, 'admin', 'admin@gmail.com', '24df3191692bd98d2bd36da36007b0be158eefbf', '', '', '', 0, 0),
(2, 'kami h', 'kami@gmail.com', '24df3191692bd98d2bd36da36007b0be158eefbf', '2.png', '', '', 625498087, 240),
(3, 'among', 'among@gmail.com', '24df3191692bd98d2bd36da36007b0be158eefbf', '3.png', '', '', 0, 0),
(4, 'sira', 'sira@gmail.com', 'f7634f09f329936b7d78f90656c961dd756e6814', '4.png', 'Mendy', 'Marie Hélène Iréne Sira', 621349990, 131),
(5, 'agmon3', 'amongadmin@gmail.com', '24df3191692bd98d2bd36da36007b0be158eefbf', '5.png', 'admin', 'Marie Hélène Iréne Sira', 621349990, 131),
(6, 'Maurane', 'maurane@gmail.com', '24df3191692bd98d2bd36da36007b0be158eefbf', '6.jpg', 'admon', 'aby', 682917036, 240);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `espace`
--
ALTER TABLE `espace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `espace`
--
ALTER TABLE `espace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
