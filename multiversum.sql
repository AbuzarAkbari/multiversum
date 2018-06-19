-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 jun 2018 om 09:21
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiversum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `iban` int(11) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `Plaats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders_has_products`
--

CREATE TABLE `orders_has_products` (
  `orders_order_id` int(11) NOT NULL,
  `Products_EAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `Products_EAN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `photos`
--

INSERT INTO `photos` (`photos_id`, `image_path`, `Products_EAN`) VALUES
(1, 'view/assets/images/HTC_Vive/main.jpeg', '4718487699124'),
(2, 'view/assets/images/HTC_Vive/htc1.jpeg', '4718487699124'),
(3, 'view/assets/images/HTC_Vive/2001214991.jpeg', '4718487699124'),
(4, 'view/assets/images/HTC_Vive/2001214987.jpeg', '4718487699124'),
(5, 'view/assets/images/HTC_Vive/2001214983.jpeg', '4718487699124'),
(6, 'view/assets/images/HTC_Vive/2000965531.jpeg', '4718487699124'),
(7, 'view/assets/images/Oculus_rift/main.jpeg', '8158200201030'),
(8, 'view/assets/images/Oculus_rift/Oculus_Rift.jpg', '8158200201030'),
(9, 'view/assets/images/Sony_PlayStation/main.jpeg', '2750057115988'),
(10, 'view/assets/images/Vuzix-iWear-Video Headphones/2001317735.png', '0187774000891'),
(11, 'view/assets/images/Vuzix-iWear-Video Headphones/2001317733.png', '0187774000891'),
(12, 'view/assets/images/Lenovo_Explorer_Headset/2001712847.jpeg', '0191999086226'),
(13, 'view/assets/images/Lenovo_Explorer_Headset/2001712849.jpeg', '0191999086226'),
(14, 'view/assets/images/Lenovo_Explorer_Headset/main.jpeg', '0191999086226'),
(15, 'view/assets/images/HP_Windows_MIxed_Reality_Headset/2001712143.jpeg', '0192018001602'),
(16, 'view/assets/images/HP_Windows_MIxed_Reality_Headset/2001712145.jpeg', '0192018001602'),
(17, 'view/assets/images/HP_Windows_MIxed_Reality_Headset/main.jpg', '0192018001602'),
(18, 'view/assets/images/Oculus_rift/main.jpeg', '0815820020004'),
(19, 'view/assets/images/Homido-Smartphone-Virtual-Reality-Headset/2000566019.jpg', '3760071190020'),
(20, 'view/assets/images/Homido-Smartphone-Virtual-Reality-Headset/2000566020.jpeg', '3760071190020'),
(21, 'view/assets/images/Homido-Smartphone-Virtual-Reality-Headset/main.jpg', '3760071190020'),
(22, 'view/assets/images/Medion_Erazer/2001691081.jpeg', '4015625616662'),
(23, 'view/assets/images/Medion_Erazer/2001691083.jpeg', '4015625616662'),
(24, 'view/assets/images/Medion_Erazer/2001691087.jpeg', '4015625616662'),
(25, 'view/assets/images/Medion_Erazer/2001691089.jpeg', '4015625616662'),
(26, 'view/assets/images/Medion_Erazer/2001691091.jpeg', '4015625616662'),
(27, 'view/assets/images/Medion_Erazer/2001691097.jpeg', '4015625616662'),
(28, 'view/assets/images/Medion_Erazer/2001691099.jpeg', '4015625616662'),
(29, 'view/assets/images/Medion_Erazer/main.jpeg', '4015625616662'),
(30, 'view/assets/images/Technaxx-TX-77-Virtual-Reality-Headset/2001184395.jpeg', '4260358122397'),
(31, 'view/assets/images/Technaxx-TX-77-Virtual-Reality-Headset/2001184397.jpeg', '4260358122397'),
(32, 'view/assets/images/Technaxx-TX-77-Virtual-Reality-Headset/main.jpeg', '4260358122397'),
(33, 'view/assets/images/Acer_Mixed_Reality_Headset/2001712801.jpg', '4713883398558'),
(34, 'view/assets/images/Acer_Mixed_Reality_Headset/2001712803.jpg', '4713883398558'),
(35, 'view/assets/images/Acer_Mixed_Reality_Headset/main.jpg', '4713883398558'),
(36, 'view/assets/images/HTC_Vive_business/main.jpeg', '4718487692866'),
(37, 'view/assets/images/HTC_vive_pro/2001919397.png', '4718487708185'),
(38, 'view/assets/images/HTC_vive_pro/2001919401.png', '4718487708185'),
(39, 'view/assets/images/HTC_vive_pro/2001919405.png', '4718487708185'),
(40, 'view/assets/images/HTC_vive_pro/2001919399.png', '4718487708185'),
(41, 'view/assets/images/Stealth-VR-Virtual-Reality bril/2001184381.jpeg', '5055269707219'),
(42, 'view/assets/images/Stealth-VR-Virtual-Reality bril/main.jpeg', '5055269707219'),
(43, 'view/assets/images/Freefly-VR/2000631660.jpeg', '5060427580016'),
(44, 'view/assets/images/Freefly-VR/2000631661.jpeg', '5060427580016'),
(45, 'view/assets/images/Freefly-VR/main.jpeg', '5060427580016'),
(46, 'view/assets/images/Dell-Visor/main.jpeg', '5397184004470'),
(47, 'view/assets/images/Hyper-BoboVR-Z4/2001764671.jpeg', '6941921144159'),
(48, 'view/assets/images/Hyper-BoboVR-Z4/2001764673.png', '6941921144159'),
(49, 'view/assets/images/Hyper-BoboVR-Z4/main.jpeg', '6941921144159'),
(50, 'view/assets/images/Oculus_rift/main.jpeg', '8158200201030'),
(51, 'view/assets/images/Trust-GXT-720-3D-Virtual-Reality-Glasses/2001351317.jpg', '8713439213225'),
(52, 'view/assets/images/Trust-GXT-720-3D-Virtual-Reality-Glasses/2001351319.jpg', '8713439213225'),
(53, 'view/assets/images/Trust-GXT-720-3D-Virtual-Reality-Glasses/2001351321.jpg', '8713439213225'),
(54, 'view/assets/images/Trust-GXT-720-3D-Virtual-Reality-Glasses/2001351323.jpg', '8713439213225'),
(55, 'view/assets/images/Trust-GXT-720-3D-Virtual-Reality-Glasses/main.jpg', '8713439213225'),
(56, 'view/assets/images/VR-Shinecon-VR-Bril/main.jpeg', '8718722130593'),
(57, 'view/assets/images/VR-BOX-VR-bril/main.jpeg', '8718722130630'),
(58, 'view/assets/images/Ritech-Riem-3-VR-Bril/main.jpeg', '8718722141537'),
(59, 'view/assets/images/LG-R100-360-VR/2001081275.jpeg', '8806087005479'),
(60, 'view/assets/images/LG-R100-360-VR/2001081277.jpeg', '8806087005479'),
(61, 'view/assets/images/LG-R100-360-VR/main.jpeg', '8806087005479'),
(62, 'view/assets/images/Samsung-Galaxy-Gear-VR-(v2)/2000774350.jpeg', '8806088150222'),
(63, 'view/assets/images/Samsung-Galaxy-Gear-VR-(v2)/2000774351.jpeg', '8806088150222'),
(64, 'view/assets/images/Samsung-Galaxy-Gear-VR-(v2)/main.jpeg', '8806088150222'),
(65, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/2001477123.png', '8806088775883'),
(66, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/2001477125.png', '8806088775883'),
(67, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/main.jpg', '8806088775883'),
(68, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/2001477123.png', '8806088972039'),
(69, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/2001477125.png', '8806088972039'),
(70, 'view/assets/images/Samsung-New-Gear-VR-Gear-VR-Controller/main.jpg', '8806088972039');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `EAN` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL,
  `refresh_rate` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `accessoires` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `connection` varchar(255) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`EAN`, `price`, `platform`, `resolution`, `refresh_rate`, `function`, `color`, `accessoires`, `product_name`, `detail`, `connection`, `brand`) VALUES
('0187774000891', '378.65', 'PC, PlayStation 4, Smartphone, Xbox One', '1280x720 (HD)', '60Hz', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer, Microfoon', 'zwart', 'Kabels', 'Vuzix iWear Video Headphones', 'Displaysysteem Draagbare video met uitstekend geluid en twee HD-schermen. - High-definition 3D-weergave voor games, films, entertainment, wearable en virtual reality. Portable Mobile Entertainment en VR.', 'HDMI, USB 2.0', 'Vuzix'),
('0191999086226', '456.55', 'PC', '2880x1440', '90Hz', 'Accelerometer, Camera, Gyroscoop, Magnetometer', 'zwart', NULL, 'Lenovo Explorer Headset', 'Windows Mixed Reality headset Te bedienen met: Motion controllers, Xbox-controller, Toetsenbord en muis, Cortana Voice', 'USB 3.0', 'Lenovo'),
('0192018001602', '399.00', 'PC', '2880x1440', '90Hz', 'Accelerometer, Camera, Gyroscoop', 'zwart', 'Controller(s), Headset bedraad, Kabels', 'HP Windows Mixed Reality headset', 'Duik in de wereld van Mixed Reality waar de grenzen tussen echt en digitaal vervagen. De HP Mixed Reality Headset met controllers is ontworpen voor een geavanceerde weergave en optimaal comfort en biedt een geweldige computerervaring.', '3.5mm, HDMI, USB 3.0', 'HP'),
('0815820020004', '549.00', 'PC', '	2160x1200', '90Hz', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer', 'zwart', 'Afstandbediening, Controller(s), Kabels', 'Oculus Rift', 'Voor en achterkant bevat sensoren zodat er 360 graden positionele tracking is; Externe IR camera tracking sensor (met een bereik van 3,5m bij 1,5m). Dit kan later uitgebreid worden met meerdere sensoren;  Geïntegreerde over je oren audio headset met 3D po', 'HDMI, USB 2.0, 3x USB 3.0', 'Oculus'),
('2750057115988', '229.00', 'PlayStation 4', '1920x1080 (Full HD)', '90Hz', 'Accelerometer, Gyroscoop', 'zwart', 'Headset bedraad, Kabels', 'Sony PlayStation VR', 'Met de Sony PlayStation VR Worlds Pakket is jouw PS4 in één keer klaar voor VR. De hoofdrolspeler in het pakket is de Sony PlayStation VR bril, welke jou straks meeneemt in de diepgaande wereld van PlayStation VR games. Ook ontvang je de PlayStation Camer', 'HDMI, USB 2.0', 'Sony'),
('3760071190020', '35.00', 'Smartphone', NULL, NULL, 'Accelerometer, Gyroscoop, Verstelbare lenzen', 'zwart', NULL, 'Homido Smartphone Virtual Reality Headset', 'Is geschikt voor smartphones met een gyroscoop, met een 1,6 GHz CPU processor en een minimale schermresolutie van HD 720x1280 Voor 4.7 inch tot 5.5 inch smartphones Bekijk video''s en games in 3D en met 360 graden zicht Heeft een verstelbare elastische hoo', NULL, 'Homido'),
('4015625616662', '449.00', 'PC', '2880x1440', '90Hz', 'Accelerometer, Camera, Gyroscoop, Microfoon', 'Blauw, Zwart', 'Controller(s), Headset bedraad', 'Medion Erazer X1000 Mixed Reality Headset', 'VR gamen zonder losse sensoren doe je voortaan met de Medion Erazer X1000 Mixed Reality VR Bril. Deze Virtual Reality bril volgt zelf de bewegingen van de bril, zonder dat je statieven en sensoren nodig hebt. Het is dus een kwestie van aansluiten op een g', '3.5mm, HDMI, USB 2.0', 'Medion'),
('4260358122397', '8.62', 'Smartphone', NULL, NULL, 'Verstelbare lenzen', 'Zwart', NULL, 'Technaxx TX-77 Virtual Reality Headset', 'technaxx VR Glasses TX 77 Virtual Reality Bril', NULL, 'Technaxx'),
('4713883398558', '392.42', 'PC', '2880x1440', '90Hz', 'Accelerometer, Camera, Gyroscoop, Magnetometer, Microfoon', 'Blauw', 'Controller(s), Headset bedraad', 'Acer Mixed Reality Headset', 'Met gepersonaliseerde virtuele oppervlakken die zijn geïnspireerd op reizen, sport, cultuur, live concerten, tijdreizen, games zoals Minecraft en meer dan 20.000 universele Windows-apps, kun je ontsnappen aan de dagelijkse sleur en je eigen unieke wereld ', 'HDMI, USB 3.0', 'Acer'),
('4718487692866', '1389.00', 'PC', '2160x1200', '90Hz', 'Accelerometer, Camera, Gyroscoop, Verstelbare lenzen', 'zwart', 'Controller(s), Headset bedraad, Kabels', 'HTC Vive Business Edition', 'De Vive Business Edition wordt geleverd met de headset, twee draadloze controllers, een Vive Link Box, oordopjes en twee Vive-basisstations en Dedicated Business Edition customer support line.', 'HDMI, USB 2.0, USB 3.0', 'HTC'),
('4718487699124', '599.00', 'PC', '2160x1200', '90Hz', 'Accelerometer, Camera, Gyroscoop, Verstelbare lenzen', 'zwart', 'Controller(s), Headset bedraad, Kabels', 'HTC Vive', 'De Vive Consumer Edition wordt geleverd met de headset, twee draadloze controllers, een Vive Link Box, oordopjes en twee Vive-basisstations.', 'HDMI, USB 2.0, USB 3.0', 'HTC'),
('4718487708185', '879.00', 'PC', '2880x1600', '90Hz', 'Camera, Koptelefoon, Microfoon, Verstelbare lenzen', 'Blauw, Zwart', NULL, 'HTC Vive Pro', 'De HTC Vive Pro is de tweede generatie van de op gaming gerichte HTC Vive VR brillen, waarbij vooral kinderziektes zijn weggewerkt. Zo is de resolutie nog verder verhoogd naar 2880x1600 (1440p per oog). Dit maakt games gedetailleerder en samen met de verm', '3.5mm, USB 3.0 (Type-C)', 'HTC'),
('5055269707219', '36.99', 'Smartphone', NULL, NULL, 'Verstelbare lenzen', 'zwart', NULL, 'Stealth VR Virtual Reality bril', 'De VR100 is een stijlvolle, strakke HMD die comfort en kwaliteit combineert voor een maximale VR-ervaring. Met het opvouwbare vizier heb je volledige toegang tot de 35 mm lenzen aan de binnenkant voor onderhoud, terwijl je met de afneembare magnetische vo', NULL, 'Stealth VR'),
('5060427580016', '60.96', 'Smartphone', NULL, NULL, NULL, 'Zwart', 'Afstandbediening', 'Freefly VR', 'Grote 42 mm lenzen voor een maximale immersie, voorzien van anti-fog coating, ergonomisch comfort met faux-leather. Inclusief opbergdoos, lensdoekje en afstandsbediening voor de applicatiebediening van de Smartphone', NULL, 'Freefly'),
('5397184004470', '495.88', 'PC', '2880x1440', '90Hz', 'Accelerometer, Camera, Gyroscoop, Magnetometer', 'Wit', 'Headset bedraad', 'Dell Visor', 'Windows Mixed Reality headset Te bedienen met: Motion controllers, Xbox-controller, Toetsenbord en muis, Cortana Voice. Inclusief 2x Dell Visor controllers.', '3.5mm, HDMI, USB 3.0', 'Dell'),
('6941921144159', '39.95', 'Smartphone', NULL, NULL, 'Koptelefoon', 'Wit', NULL, 'Hyper BoboVR Z4', 'Dit is de nieuwste en meest veelzijdige virtual reality headset die werkt met verschillende smartphones met Android en iOS. De headset is draadloos, heeft een gezichtsveld van 120° graden en is te gebruiken met verschillende VR apps. Nog een leuke feature', '3.5mm', NULL),
('8158200201030', '449.00', 'PC', '2160x1200', '90Hz', 'Accelerometer, Gyroscoop, Koptelefoon, Magnetometer', 'zilver', 'Afstandbediening, Controller(s)', 'Oculus Rift Bundle (Rift + Touch)', 'Ga in één keer aan de slag met de Oculus Rift zoals het bedoeld is: met 2 touch controllers. Dit pakket omvat namelijk de Oculus Rift VR Bril, 2 Oculus Rift Touch Controllers en 6 gratis meegeleverde games. Ook beschik je over 2 Oculus sensoren die zowel ', 'HDMI, USB 2.0, 3x USB 3.0', 'Oculus'),
('8713439213225', '32.99', 'Smartphone', NULL, NULL, NULL, 'zwart', 'Controller(s', 'Trust GXT 720 3D Virtual Reality Glasses', 'Met de Trust GXT 720 ervaar je Virtual Reality in 3D. Bekijk 3D- en 360°- video''s op YouTube en andere videoservices. Speel een VR-game via een app die je downloadt via de App Store of Google Play Store. De bril is geschikt voor elke smartphone tot 6 inch', NULL, 'Trust'),
('8718722130593', '24.95', 'Smartphone', NULL, NULL, 'Verstelbare lenzen', 'zwart', NULL, 'VR Shinecon VR Bril', 'Altijd al mee willen spelen in een actie film of onderdeel te zijn van je favoriete videogame? Met de VR SHINECON Virtual Reality bril ben jij de hoofdpersoon in je eigen fantasiewereld. De VR SHINECON Virtual Reality bril heeft een comfortabele hoofdband', NULL, 'VR Shinecon'),
('8718722130630', '16.80', 'Smartphone', NULL, NULL, 'Verstelbare lenzen', 'Wit, Zwart', 'Afstandbediening', 'VR BOX VR-bril', 'Bekijkt u vaak filmpjes of speelt u vaak spelletjes op uw smartphone? Dan is deze VR-Box precies wat u nodig heeft voor nog meer kijk- en speelplezier! Dankzij het 360 graden 3D gezichtsveld is het alsof u er zelf écht bij bent: een super ervaring!', NULL, 'VR BOX'),
('8718722141537', '22.00', 'Smartphone', NULL, NULL, 'Verstelbare lenzen', 'Wit, Zwart', 'Afstandbediening', 'Ritech Riem 3 VR Bril', 'De RITECH Riem 3 Virtual Reality Bril laat je meenemen naar een unieke wereld, waar alles om jou draait. Geniet van een unieke 3D-ervaring tijdens je favoriete films, video’s en games. De RITCH Riem 3 Virtual Reality Bril beschikt over HD-optische lenzen,', NULL, 'Ritech'),
('8806087005479', '38.61', 'Smartphone', NULL, NULL, 'Accelerometer, Gyroscoop', 'zilver', 'Kabels', 'LG R100 360 VR', 'De compacte LG Virtual reality bril. Dompel jezelf onder in vreemde werelden. Met de mobiele en uiterst compacte virtual reality bril van LG je puur entertainment overal mee naartoe.', '3.5mm', 'LG'),
('8806088150222', '36.44', 'Smartphone', NULL, NULL, 'Accelerometer, Gyroscoop', 'wit', NULL, 'Samsung Galaxy Gear VR (v2)', 'Geschikt voor: Samsung Galaxy Note5, Samsung Galaxy S6, Samsung Galaxy S6 Edge, Samsung Galaxy S6 Edge+, Samsung Galaxy S7, Samsung Galaxy S7 Edge', NULL, 'Samsung'),
('8806088775883', '121.59', 'Smartphone', NULL, NULL, 'Accelerometer, Gyroscoop', 'Zwart', 'Controller(s)', 'Samsung New Gear VR + Gear VR Controller', 'Geschikt voor: Samsung Galaxy S6, Samsung Galaxy S7, Samsung Galaxy S8', NULL, 'Samsung'),
('8806088972039', '114.95', 'Smartphone', NULL, NULL, 'Accelerometer, Gyroscoop', 'zwart', NULL, 'Samsung Gear VR 4 + Gear VR Controller', 'Werkt met Samsung Galaxy Note 8, S8, S8 Plus of S7 Edge, S7, S6 edge Plus, S6', 'Controller(s)', 'Samsung');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexen voor tabel `orders_has_products`
--
ALTER TABLE `orders_has_products`
  ADD PRIMARY KEY (`orders_order_id`,`Products_EAN`),
  ADD KEY `fk_orders_has_Products_Products1_idx` (`Products_EAN`),
  ADD KEY `fk_orders_has_Products_orders1_idx` (`orders_order_id`);

--
-- Indexen voor tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`),
  ADD KEY `fk_photos_Products1_idx` (`Products_EAN`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`EAN`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orders_has_products`
--
ALTER TABLE `orders_has_products`
  ADD CONSTRAINT `fk_orders_has_Products_Products1` FOREIGN KEY (`Products_EAN`) REFERENCES `products` (`EAN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_has_Products_orders1` FOREIGN KEY (`orders_order_id`) REFERENCES `orders` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_photos_Products1` FOREIGN KEY (`Products_EAN`) REFERENCES `products` (`EAN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
