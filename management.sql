-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ağu 2023, 23:13:05
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `management`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `iletisimID` int(11) NOT NULL,
  `kisi_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ulke` varchar(50) NOT NULL,
  `sehir` varchar(50) NOT NULL,
  `tamAdres` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`iletisimID`, `kisi_id`, `email`, `ulke`, `sehir`, `tamAdres`) VALUES
(1, 1, 'h@kan.com', 'TURKIYE', 'MALATYA', ''),
(2, 2, 'Y@semin.com', 'TURKIYE', 'KONYA', ''),
(3, 3, 'G@onca.com', 'TURKIYE', 'ANKARA', ''),
(4, 4, 'Erk@n.com', 'TURKIYE', 'BURSA', 'YESIL CAMI'),
(5, 5, 'F@ruk.com', 'TURKIYE', 'KARAMAN', ''),
(6, 6, 'Arn@ld.com', 'ALMANYA', 'BERLIN', ''),
(7, 7, 'R@se.com', 'ALMANYA', 'Frankfurt', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisiler`
--

CREATE TABLE `kisiler` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `soyadi` varchar(50) NOT NULL,
  `yas` tinyint(3) NOT NULL,
  `cinsiyet` varchar(5) NOT NULL,
  `meslek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kisiler`
--

INSERT INTO `kisiler` (`id`, `adi`, `soyadi`, `yas`, `cinsiyet`, `meslek_id`) VALUES
(1, 'Hakan', 'Alnaz', 27, 'ERKEK', 2),
(2, 'Yasemin', 'Kozan', 22, 'KADIN', 1),
(3, 'Gonca', 'Mercan', 25, 'KADIN', 3),
(4, 'Erkan', 'Kaman', 29, 'ERKEK', 4),
(5, 'Faruk', 'Şentürk', 44, 'ERKEK', 5),
(6, 'Arnold', 'Pestol', 28, 'ERKEK', 6),
(7, 'Rose', 'Lenes', 29, 'KADIN', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `meslek`
--

CREATE TABLE `meslek` (
  `meslekID` int(11) NOT NULL,
  `meslekAdi` varchar(100) NOT NULL,
  `minMaas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `meslek`
--

INSERT INTO `meslek` (`meslekID`, `meslekAdi`, `minMaas`) VALUES
(1, 'Öğretmen', 12000),
(2, 'Polis', 14000),
(3, 'Doktor', 20000),
(4, 'Mühendis', 18000),
(5, 'Yazılımcı', 15000),
(6, 'Diğer', 11500);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`iletisimID`),
  ADD UNIQUE KEY `kisi_id` (`kisi_id`);

--
-- Tablo için indeksler `kisiler`
--
ALTER TABLE `kisiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `meslek`
--
ALTER TABLE `meslek`
  ADD PRIMARY KEY (`meslekID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `iletisimID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kisiler`
--
ALTER TABLE `kisiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `meslek`
--
ALTER TABLE `meslek`
  MODIFY `meslekID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
