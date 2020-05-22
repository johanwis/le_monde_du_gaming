-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 22 mai 2020 à 10:26
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `le_monde_du_gaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(255) NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `ordre` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `titre`, `date_creation`, `ordre`) VALUES
(1, 'Pc', '2020-05-16 00:00:00', 1),
(2, 'Playstation', '2020-05-16 00:00:00', 2),
(3, 'Nintendo', '2020-05-16 00:00:00', 3),
(4, 'Xbox', '2020-05-16 00:00:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(255) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`) VALUES
(1, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(2, 'test2', 'test2@gmail.com', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(255) NOT NULL,
  `id_forum` int(255) NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `id_forum`, `titre`, `contenu`, `date_creation`, `id_user`) VALUES
(1, 3, 'quelle accessoire à la wii? ', 'bonjour, j\'ai encore ma veille wii et j\'aimerais tout les accessoire de la wii mais je ne sais pas ou les trouver help svp', '2020-05-16 05:30:00', 1),
(2, 4, 'débat xbox, xbox360 où xboxone?', 'salut quelle console est selon-vous la plus mythique  et pour quoi et ne me dite pas à playstation c\'est mieux ou pc, je parle que la xbox', '2020-05-16 12:00:00', 1),
(3, 1, 'Quelle pc me conseiller-vous?', 'salut! j\'aimerais savoirs quelle pc vous me conseiller-vous pour 500€', '2020-05-16 17:00:00', 1),
(4, 2, 'Quelle jeux-me consiellerez-vous', 'hey, je viens de recevoir pour mon anniversaire une ps4 je sais que il y a des exclus tout comme la xbox mais je ne sais pas quoi choisir vous me conseillez quoi les gars?', '2020-05-16 21:21:21', 1),
(5, 2, '&agrave; quoi sert ce&ccedil;i?', 'salut j\'ai remarquer sur ma manette que &agrave; cot&eacute; de la prise jack que il y a autre prise et je me demande &agrave; quoi elle peuvent servir? merci de l\'aide', '2020-05-18 15:35:48', 1),
(6, 1, 'j\'arrive pas &agrave; jouer &agrave; valorent?', 'salut les mecs et les fille je sais que il y a de stream qui joue &agrave; valorent et j\'aimerais y jouer mais j\'arrive &agrave; l\'avoir', '2020-05-18 15:38:46', 1),
(7, 4, 'dur&eacute;e de vie de la console', 'quel est la dur&eacute;e de vie de la xbox360?', '2020-05-19 17:18:35', 1);

-- --------------------------------------------------------

--
-- Structure de la table `topic_commentaire`
--

CREATE TABLE `topic_commentaire` (
  `id` int(255) NOT NULL,
  `id_topic` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `topic_commentaire`
--

INSERT INTO `topic_commentaire` (`id`, `id_topic`, `id_user`, `text`, `date_creation`) VALUES
(1, 3, 2, 'Alors je te conseille le  ACER  Aspire 317-32-P5XJ. mais si tu peut rajouter un peut moins de 100€ du peut avoir le MSI GF63 Thin 9RCX-605XFR', '2020-05-18 03:08:06'),
(2, 2, 2, 'je te conseille les uncharted qui sont un excellent jeux action aventure comme les \r\ntomb-raider il y a aussi horrizon zero dawn ', '2020-05-18 10:06:00'),
(3, 4, 2, 'alors déjà il y a pour moi ça sera la xbox premier du nom car ça restera ma premier console que mon père à acheter pour la famille même si les graphisme ont vieilli ca restera ma premier console. Puis il y a la seconde que mon père a acheter aussi où j\'ai jouée jusqu\'à deux où trois ans que la ps4 et xbox one sont sortie ', '2020-05-18 15:24:00'),
(4, 1, 2, 'wow pour avoir tout les accessoires faut il y aller car il de tout des accessoires pour le wii sport comme une fléchettes, où comme un boule de bowling, il y a un kart gonflable pour mario kart et il y a aussi la balance board pour le jeu wii fit et là il y a que 4 accessoires ', '2020-05-18 23:59:33'),
(5, 6, 2, 'alors pour pouvoir jouer &agrave; valorent si tu a cr&eacute;e un compte riot alors lie ce compte &agrave; ton compte de twitch puis regarder des streamer qui joue &agrave; valorent et qui on le drop activ&eacute;e  et tu receveras un mail quand tu pourras acc&eacute;der au jeu et ensuite t&eacute;l&eacute;charge le jeu', '2020-05-21 06:26:57'),
(6, 6, 2, 'voil&agrave; je pense avoir tu r&eacute;sumer', '2020-05-21 06:35:09'),
(7, 6, 2, 'test', '2020-05-21 06:40:01'),
(8, 5, 3, 'alors si je crois comprendre ce que tu dis si tu ach&eacute;ter un socle de recharge tu le pose dessus est &ccedil;a charge c\'est partique si tu as deux manettes', '2020-05-21 16:30:06'),
(9, 5, 1, 'oui c\'est &ccedil;a', '2020-05-21 16:40:43'),
(10, 5, 1, 'essai', '2020-05-21 16:51:24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `topic_commentaire`
--
ALTER TABLE `topic_commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `topic_commentaire`
--
ALTER TABLE `topic_commentaire`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
