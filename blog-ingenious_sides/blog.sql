-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 fév. 2021 à 16:47
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`) VALUES
(1, 'Administrateur', 'admin@localhost', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 'FantZ2s6G4UXRRX9rvOl', 'admin'),
(4, 'VIRGINIE KHALDI', 'virginie.allaghenkhaldi@gmail.com', '', 'vm7YxiSurqUq0EayniULVFwOcBUyQH', 'modo');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date`, `seen`) VALUES
(2, 'VIRGINIE KHALDI', 'virginie.allaghenkhaldi@gmail.com', 'c est super!', 3, '2021-02-16 17:05:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date`, `posted`) VALUES
(3, 'Réseaux sociaux : comment maintenir le lien social lors du confinement ? ', '« Plus rien ne sera jamais comme avant » (…). \r\n\r\nPar Virginie KHALDI\r\n\r\n\r\n\r\nDes mots qu’on a pu entendre depuis le début de  la crise COVID-19 . Dans le monde, des personnes sont confinées pour limiter la propagation des différentes coronavirus. En France, depuis le début, retarder, faire retomber la courbe épidémique, sont les buts des mesures du gouvernement depuis près d’un an. Conséquence: la fréquentation des réseaux sociaux a explosé. La crise sanitaire a accéléré l’évolution qui avait déjà commencé. 2021 s’annonce pour continuer dans cette voie. D’après les personnes interrogées, nombreux ont indiqué avoir déjà téléphoné ou écrit à ceux dont ils sont éloignés et être prêt à organiser des festivités à distance. \r\n\r\n\r\nSur Facebook, les groupes rassemblent des voisins et favorisent l’échange. Une façon plus sereine de vivre le confinement; créer du lien social et la solidarité. Même l’éducation a été touchée. Il a fallu repenser l’enseignement, s’adapter, que ce soit  en tant qu’enseignant ou parent. Lors de la fermeture des écoles, des enseignants ont dû s’intéresser aux technologies sans y être prêts. Avec l’appui de parents :\r\n-	Zoom s’installe pour la classe virtuelle, \r\n-	Teams, pour le collaboratif (devoirs, notation, ressources vidéos).\r\n-	 Whatsapp : un chat pour l’entraide entre parents en difficultés  et des animations.\r\nLa Santé s’est aussi intéressée aux réseaux sociaux pour communiquer sur les tests. Des dépistages massifs ont pu rallier le plus grand nombre durant la fin d’année. \r\n\r\n\r\nEn attendant la réouverture des restaurants, des cours de cuisine ont lieu avec des Chefs, en direct de leurs comptes Instagram, lors de live quotidien. \r\n\r\n\r\nSur Smule, vous pouvez faire du Karaoké : chanter, composer, partager, avec des amis et d\'autres personnes. Anniversaire, apéro-web, bref, un petit verre à distance face à la webcam : pour le lien. Les Français ont une nouvelle manière d’être ensemble. \r\n\r\n\r\nLes NTIC se sont invités dans le privé. Cela permet de prendre des nouvelles , même des personnes qu’on a perdu de vue. Nous sommes des ’’créatures’’ sociales. Cette pandémie est propice à l’évolution des mentalités, des comportements et du rapport au monde.\r\n\r\n\r\nUne nouvelle société se dessine. Mais ce qui est certain, nous n’oublierons jamais cette période et avons hâte de retrouver les versions originales des retrouvailles. \r\n\r\n', 'admin@localhost', 'reseaux_sociaux.jpg', '2021-02-16 00:00:00', 1),
(20, 'VIE NUMERIQUE : l’après pandémie COVID-19, plus Solidaire, plus connecté.\r\n\r\n     Quelle vie aurons-nous après la pandémie ?\r\n', 'Par Virginie KHALDI \r\n\r\nLes coronavirus bouleversent notre quotidien et nous oblige à réinventer nos vies et nos rapports sociaux, depuis plus d’un an. Difficile de prédire ce qui va rester. Ce qu’on peut déjà constater, c’est la prise de conscience collective aussi bien sur le plan écologique que sociale. Faire davantage attention à ce que l’on mange, aux dégâts que l’on fait à la nature…\r\nIl y aura aussi un impact sur nos modes de vie au quotidien ainsi que sur nos  vies professionnelles.\r\nAvant la crise, nous étions physiquement ensemble, mais virtuellement isolés. En faisant le choix de la santé sur l’économie, cette crise rappelle l’importance que l’on donne à l’individu et nous conduit vers plus de bienveillance.\r\n\r\nSolidarité post-Covid-19 : la crise et ses conséquences nous ont donné envie d’être plus solidaires des autres.\r\nTendre vers une consommation plus raisonnable et responsable : on achète local, on soutient les producteurs ; il y a un nouveau rapport au territoire et à la proximité.\r\n\r\nCréer du lien social malgré la distance. La crise a précipité toute une partie de la population dans le digi-monde. Des Français ont même fait l’expérience du e-commerce et du Drive pour la première fois.\r\n\r\nOn développe le lien de solidarité de proximité pour nourrir la sociabilité. \r\nLe confinement produit de nouvelles formes de relations Pour lutter contre l’isolement social, chaque individu, peut interagir avec des personnes vulnérables. Un lien social peut alors perdurer.\r\n\r\nAvec le digital les Français ont pris plus souvent des nouvelles de personnes isolées de leur entourage, la population a remercié les caissières, les infirmières… pour leur travail, et rendent service à leurs voisins en situation précaire pour ne pas continuer de creuser le fossé des inégalités sociales.\r\n\r\nDes habitudes prises pendant la crise sanitaire qui perdureront au-delà :l’ \"effet cliquet\" sur le digital et notre environnement. Est un train de naître, une manière de faire différemment. On ne peut plus être dans l’enfermement sur soi.\r\n\r\nCette crise sanitaire a définitivement installé de nouveaux comportements et de nouvelles attentes.  \r\n\r\nCe qui, au départ, n’était que de la pure gestion de crise s’est très vite mué en un changement profond.\r\n\r\nMais, s’il faut retenir quelque chose de positif de cette période, alors retenons les avancées numériques (dans le monde du travail et l’environnement éducatif) et la solidarité que nous avons pu déployer.\r\n', 'admin@localhost', 'terre_masque.jpg', '2021-02-16 00:00:00', 1),
(21, 'RETOUR D’EXPERIENCE : EMPLOI ET HANDICAP, ET SI ON COMMENCAIT PAR UN DUO ?', 'Un jour - une rencontre - un partage.\r\nPar Virginie KHALDI \r\n\r\nDuo Day : un binôme, une rencontre.\r\n\r\nFormer des binômes partout en France entre personnes handicapées et salariées qui ne le sont pas le temps d’une journée de travail. C’est le but du\r\nDuo Day promu par la secrétaire d’État Sophie Cluzel.\r\nObjectif double : une rencontre et un partage d\'expérience.\r\n\r\nRSE (Responsabilité Sociétale des Entreprises),\r\nQVT (Qualité de Vie au Travail) : des facteurs indispensables de nos jours et qui participent à la performance des entreprises.\r\n\r\nNous ne nous connaissions pas et ce jeudi 19 novembre, nous avons tout de même partagé notre journée de travail. J\'ai été propulsée au sein du\r\ngroupe Bouygues, plus précisément au sein de Bouygues Energies et Services...\r\n\r\nDe nombreuses entreprises engagées notamment :\r\nCDC Habitat, USG People, (un échantillon des entreprises qui m’ont contacté pour cette journée d\'échange), mais mon choix s\'est porté sur le groupe Bouygues ; plus un choix du cœur, car cette marque\r\nm\'accompagne depuis de très nombreuses années.\r\n\r\nBouygues, un groupe accompagnateur et\r\nacteur du changement.\r\n\r\nacteur du changement.\r\n\r\nVous rappelez - vous du single de l’artiste bordelais Talisco,\"The Keys\" ?\r\nLe fameux spot de la campagne publicitaire\r\n« We love technologie » de Bouygues\r\nTelecom montrant la liberté, l\'amitié et le dépassement de soi ?\r\nCe clip représente bien en partie les valeurs du groupe et ce single est devenu sa signature musicale.\r\n\r\nMais aussi mon rappel de liberté et de rêve d\'évasion depuis quelques années, car oui, ensemble, nous sommes la clé !\r\nPourquoi Bouygues ? Car ce groupe aspire à changer les mentalités grâce à sa RSE\r\n(Responsabilité sociétale des entreprises) et ses valeurs se rapprochent des miennes.\r\n\r\nBouygues Energies & Services\r\nGrâce à leurs 13 000 talents, ils\r\ninterviennent partout dans le monde pour\r\nproduire et transporter l\'énergie, concevoir\r\ndes bâtiments intelligents...\r\nBouygues Energies & Services appartient\r\nau groupe Bouygues Construction présent en France et dans 25 pays à travers le monde.\r\nCette entité conçoit, installe, entretient et exploite des systèmes techniques et des services sur-mesure, offrant ainsi une meilleure maîtrise des consommations énergétiques ainsi qu\'une meilleure qualité de vie et de travail pour les utilisateurs.\r\n\r\nPour le groupe Bouygues, le RSE représente un levier stratégique et un axe de différenciation fort et se positionne comme un apporteur de solutions durables innovantes. Le groupe et ses filiales contribuent à une société plus inclusive et au bien-vivre ensemble. Ils sont acteurs dans la promotion de l’entraide, de la convivialité et de la solidarité, chez Bouygues Énergies & Services en particulier.\r\n\r\nNOTRE DUO.\r\nAnne-Tiphaine VALO, créatrice et Responsable du service Innovations Servicielles et Expérience Client, me dévoile une journée type sur son poste.\r\n\r\nForte de ses 14 années passées au sein du groupe, elle m\'explique toute la mobilisation des équipes pour conduire des opérations de manière exemplaire, dans le respect des clients, des collaborateurs et collaboratrices, des candidats et de l’ensemble des parties prenantes, quelle que soit la filiale du groupe.\r\n\r\nEt au bout de 14 ans d’ancienneté, elle ne se voit pas ailleurs.\r\nVis ma vie de Responsable Marketing.\r\n\r\nL’expertise de Bouygues Energies & Services s\'articule autour de 3 grands métiers : \r\n\r\n- les réseaux d\'énergies et numériques\r\n-le génie électrique, climatique et mécanique\r\n-le facility management.\r\n\r\nLa co-conception est en leur sens la meilleure expérience client. Ils travaillent avec des partenaires divers et variés pour co-créer des solutions innovantes afin d\'accompagner leurs clients dans leurs projets de transformation et dans les nouveaux modes de travail et d\'organisation.\r\n\r\n\"La curiosité, l’écoute, l\'adaptabilité, l\'agilité et la créativité sont les qualités requises pour mon métier\", m\'avoue-t\'elle en toute transparence.\r\n\r\nQuand Anne-Tiphaine VALO s\'exprime sur son métier, on ressent vraiment de la passion. \r\n\r\n\r\nLe Duo Day, une première pour toutes les deux !\r\n\r\nAnne-Tiphaine VALO m\'a avoué que c\'était sa première fois en tant qu\'accueillante de l\'événement Duo Day. \r\n\r\nLe ton de l\'échange était dans la complicité, la bienveillance et la transparence.\r\n\r\nJ’ai proposé de conduire notre échange sous un format d’interview et ce fil conducteur nous a permis d’aborder de nombreux sujets : nos parcours respectifs, nos missions, nos envies etc. \r\n\r\n Durant ce partage, elle a dévoilé des stratégies passées et futures. Mais ce que je retiens de cette expérience c\'est que nous avons échangé comme deux homologues. Elle s\'est intéressée à mon parcours, m\'a donné des conseils, m\'a guidée, m\'a confortée dans le choix de ma reconversion professionnelle.\r\n\r\nJ\'ai bien conscience d\'avoir eu un moment très privilégié avec elle et je l\'en remercie.\r\n\r\nLe format initial ayant été revu à cause du Covid-19, elle m\'a à nouveau invitée à venir passer une journée dans les locaux du siège de l’entreprise situés à Guyancourt, dès que possible; les super goodies préparés pour l’occasion m\'y attendent !\r\n\r\nPoint d\'avancement, catalogue et expertise stratégique ont été les sujets abordés lors de cette rencontre.\r\n\r\nJ\'ai aussi pu échanger sur mes doutes, mes appréhensions et aborder plus sereinement cet univers de freelancing avec les grands comptes.\r\n\r\nUNE NOUVELLE INVITATION.\r\n\r\nA priori, ma compagnie lui a plu. Elle pense renouveler l\'expérience l\'année prochaine sur la plateforme Duo Day et m\'a invitée en réel, au siège, afin de prolonger nos échanges dans un autre contexte. \r\n\r\nSon ressenti en fin d\'expérience : très enrichissant !\r\n\r\nEn ce qui me concerne, je ne regrette absolument pas. J\'étais sceptique au départ car le format avait changé et j\'avais des appréhensions ; je ne connaissais pas du tout le concept du Duo Day, c’était aussi ma première fois.\r\n\r\nMais finalement, tout s\'est bien déroulé et j\'ai enfin la conviction que tout est possible !\r\n \r\nJ\'ajoute aussi que la personnalité d\'Anne-Tiphaine VALO a beaucoup joué dans la réussite de cette rencontre. J\'ai beaucoup apprécié son écoute, son humanité et sa finesse. Et je sais que je n\'hésiterai pas à revenir vers elle si nécessaire ! \r\n\r\nAvec elle, je n\'ai pas découvert seulement un métier, mais plusieurs, et ils ont tous un lien important entre eux : l’Humain.\r\nJ\'ai apprécié le plaisir qu\'Anne-Tiphaine VALO avait à transmettre son quotidien et l’en remercie. \r\n\r\n\r\nA faire et à refaire sans hésiter !\r\n\r\n\r\n\r\n', 'admin@localhost', 'duoday.png', '2021-02-16 00:00:00', 1),
(23, 'Diritatis eius sanguine laetabatur perfusorumque obscurum latens aliquotiens vel hoc quod certaminibus latens ingentia in.', 'Quod cum ita sit, paucae domus studiorum seriis cultibus antea celebratae nunc ludibriis ignaviae torpentis exundant, vocali sonu, perflabili tinnitu fidium resultantes. denique pro philosopho cantor et in locum oratoris doctor artium ludicrarum accitur et bybliothecis sepulcrorum ritu in perpetuum clausis organa fabricantur hydraulica, et lyrae ad speciem carpentorum ingentes tibiaeque et histrionici gestus instrumenta non levia.\r\n\r\nEtenim si attendere diligenter, existimare vere de omni hac causa volueritis, sic constituetis, iudices, nec descensurum quemquam ad hanc accusationem fuisse, cui, utrum vellet, liceret, nec, cum descendisset, quicquam habiturum spei fuisse, nisi alicuius intolerabili libidine et nimis acerbo odio niteretur. Sed ego Atratino, humanissimo atque optimo adulescenti meo necessario, ignosco, qui habet excusationem vel pietatis vel necessitatis vel aetatis. Si voluit accusare, pietati tribuo, si iussus est, necessitati, si speravit aliquid, pueritiae. Ceteris non modo nihil ignoscendum, sed etiam acriter est resistendum.\r\n\r\nRestabat ut Caesar post haec properaret accitus et abstergendae causa suspicionis sororem suam, eius uxorem, Constantius ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet ambigeret metuens saepe cruentum, spe tamen quod eum lenire poterit ut germanum profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium repentina. cuius post obitum maritus contemplans cecidisse fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.\r\n\r\nEt quoniam apud eos ut in capite mundi morborum acerbitates celsius dominantur, ad quos vel sedandos omnis professio medendi torpescit, excogitatum est adminiculum sospitale nequi amicum perferentem similia videat, additumque est cautionibus paucis remedium aliud satis validum, ut famulos percontatum missos quem ad modum valeant noti hac aegritudine colligati, non ante recipiant domum quam lavacro purgaverint corpus. ita etiam alienis oculis visa metuitur labes.\r\n\r\nEt olim licet otiosae sint tribus pacataeque centuriae et nulla suffragiorum certamina set Pompiliani redierit securitas temporis, per omnes tamen quotquot sunt partes terrarum, ut domina suscipitur et regina et ubique patrum reverenda cum auctoritate canities populique Romani nomen circumspectum et verecundum.\r\n\r\nPost haec Gallus Hierapolim profecturus ut expeditioni specie tenus adesset, Antiochensi plebi suppliciter obsecranti ut inediae dispelleret metum, quae per multas difficilisque causas adfore iam sperabatur, non ut mos est principibus, quorum diffusa potestas localibus subinde medetur aerumnis, disponi quicquam statuit vel ex provinciis alimenta transferri conterminis, sed consularem Syriae Theophilum prope adstantem ultima metuenti multitudini dedit id adsidue replicando quod invito rectore nullus egere poterit victu.\r\n\r\nIllud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.', 'admin@localhost', 'Image2.png', '2021-02-16 00:00:00', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
