-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2016, 11:42:47
-- Sunucu sürümü: 10.1.13-MariaDB
-- PHP Sürümü: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `car`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `captain`
--

CREATE TABLE `captain` (
  `employee_id` int(10) NOT NULL,
  `expert_level` int(2) NOT NULL,
  `cap_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `department_id` int(10) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `captain`
--

INSERT INTO `captain` (`employee_id`, `expert_level`, `cap_email`, `department_id`, `password`) VALUES
(100, 40, 'bmetin@gmail.com', 500, 12345),
(101, 42, 'koguz@gmail.com', 501, 12345),
(102, 29, 'aorhan@gmail.com', 502, 12345),
(103, 28, 'kocasakal@gmail.com', 503, 12345),
(104, 36, 'gçelik@gmail.com', 504, 12345),
(105, 44, 'zülfikar@gmail.com', 500, 12345);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `car`
--

CREATE TABLE `car` (
  `car_id` int(10) NOT NULL,
  `model` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `release_date` date NOT NULL,
  `engine_volume` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `car`
--

INSERT INTO `car` (`car_id`, `model`, `release_date`, `engine_volume`, `owner_id`) VALUES
(1, 'Linea', '2010-08-20', 100, 1),
(2, 'Fiorino', '2008-06-20', 120, 2),
(3, 'Doblo', '2010-11-20', 110, 3),
(4, 'Punto', '2014-12-16', 130, 4),
(5, 'Bravo', '2015-03-17', 140, 5),
(6, 'Panda', '2014-09-24', 105, 6),
(7, 'Linea', '2016-04-03', 100, 1),
(9, 'Egea', '2016-05-26', 300, 2),
(10, 'Cruze', '2016-05-19', 100, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `clerk`
--

CREATE TABLE `clerk` (
  `employee_id` int(10) NOT NULL,
  `expert_level` int(2) NOT NULL,
  `clerk_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `ops_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `clerk`
--

INSERT INTO `clerk` (`employee_id`, `expert_level`, `clerk_email`, `ops_id`, `department_id`, `password`) VALUES
(1, 7, 'mkirgiz@gmail.com', 10000, 500, 12345),
(2, 4, 'akobanci@gmail.com', 10001, 501, 12345),
(3, 9, 'gkocar@gmail.com', 10002, 502, 12345),
(4, 4, 'karabıyık@gmail.com', 10001, 503, 12345),
(5, 8, 'hamza@gmail.com', 10002, 504, 12345),
(6, 5, 'baştürk@gmail.com', 10001, 500, 12345),
(7, 3, 'barışpala@gmail.com', 10005, 501, 12345),
(8, 2, 'ahmetçetin@gmail.com', 10004, 502, 12345),
(9, 1, 'muhammed@gmail.com', 10003, 503, 12345),
(10, 6, 'mahmut@gmail.com', 10004, 504, 12345);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `c_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `rep_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `phone_number`, `c_email`, `password`, `rep_email`) VALUES
(1, 'Caner Akça', 'Bilkent-2 g-4 01', '05322008543', 'cnr123@gmail.com', '12345', 'iozpolat@gmail.com'),
(2, 'Mahmut Kaya', 'Bilkent-2 g-4 02', '05325887823', 'mkaya@gmail.com', '12345', 'eozgul@gmail.com'),
(3, 'Ayşe Kulin', 'Bilkent-2 g-4 03', '05556633995', 'aysekulin@gmail.com', '12345', 'caglasck@gmail.com'),
(4, 'Mehmet Durmuş', 'Bilkent-2 g-4 04', '05324887236', 'mdurmus@gmail.com', '12345', 'eozgul@gmail.com'),
(5, 'Pelin Aksu', 'Bilkent-2 g-4 05', '05322884675', 'pelinaksu@gmail.com', '12345', 'caglasck@gmail.com'),
(6, 'Onur Bıçkın', 'Bilkent-2 g-4 06', '05557638542', 'bıçkın@gmail.com', '12345', 'billur@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `budget` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `budget`) VALUES
(500, 'Dyeing', 100000),
(501, 'Engine', 250000),
(502, 'Bodywork', 200000),
(503, 'Air Conditioning', 220000),
(504, 'Fuel Injection', 300000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `distributor`
--

CREATE TABLE `distributor` (
  `distributor_id` int(10) NOT NULL,
  `distributor_name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `distributor_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `cap_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `distributor`
--

INSERT INTO `distributor` (`distributor_id`, `distributor_name`, `password`, `distributor_email`, `cap_email`) VALUES
(1, 'Murat Ayaz', '12345', 'm.ayaz@gmail.com', 'bmetin@gmail.com'),
(2, 'Mustafa Berberoğlu', '12345', 'mber@gmail.com', 'koguz@gmail.com'),
(3, 'Enver Durmuş', '12345', 'edurmus@gmail.com', 'aorhan@gmail.com'),
(4, 'Caglar Alkış', '12345', 'alkış@gmail.com', 'kocasakal@gmail.com'),
(5, 'Mehmet Kaya', '12345', 'm.kaya@gmail.com', 'gçelik@gmail.com'),
(6, 'Yıldıray Buğa', '12345', 'yıldıray@gmail.com', 'bmetin@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `employee_salary` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_salary`) VALUES
(1, 'Mert Kırgız', 1200),
(2, 'Ali Kobancı', 2145),
(3, 'Gürol Koçar', 2347),
(4, 'Huseyin Karabıyık', 1400),
(5, 'Hamza Bogazlı', 1600),
(6, 'Onur Baştürk', 2100),
(7, 'Barış Pala', 2200),
(8, 'Ahmet Çetin', 1800),
(9, 'Muhammed Kesir', 1800),
(10, 'Mahmut Çarıkçı', 2100),
(100, 'Barbaros Metin', 4800),
(101, 'Kürşat Oğuz', 5300),
(102, 'Ahmet Orhan', 5280),
(103, 'İsmet Kocasakal', 4750),
(104, 'Gökhan Çelik', 6200),
(105, 'Zülfikar Gülbitti', 4700),
(1000, 'Ecem Özgül', 2450),
(1001, 'İrem Özpolat', 2200),
(1002, 'Çağla Saçak', 2600),
(1003, 'Çiğdem Billur', 3150);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `operations`
--

CREATE TABLE `operations` (
  `ops_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `description` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `operations`
--

INSERT INTO `operations` (`ops_id`, `department_id`, `description`, `start_date`, `end_date`) VALUES
(300, 501, 'aku bitmis', '2016-05-21', '2016-05-27'),
(2000, 501, 'sa', '2016-04-29', '2016-05-28'),
(10001, 501, 'Engine cannot cold down. Detail investigation needed.', '2016-05-10', '2016-05-30'),
(10001, 502, 'sa', '2016-05-12', '2016-05-13'),
(10002, 502, 'Left-back bumper cover needed to repair or change.', '2016-06-15', '2016-07-18'),
(10003, 503, 'Cooling system malfunctioned. Leak test need to be done.', '2015-12-15', '2015-12-23'),
(10004, 504, 'Spark plug does not work. Rework needed.', '2016-03-16', '2016-03-24'),
(10005, 502, 'Left-front tampon broken. Need to be changed. ', '2016-01-20', '2016-02-05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `representative`
--

CREATE TABLE `representative` (
  `employee_id` int(10) NOT NULL,
  `rep_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `expert_level` int(2) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `representative`
--

INSERT INTO `representative` (`employee_id`, `rep_email`, `phone`, `expert_level`, `password`) VALUES
(1000, 'eozgul@gmail.com', '05457658493', 11, 12345),
(1001, 'iozpolat@gmail.com', '05554653712', 16, 12345),
(1002, 'caglasck@gmail.com', '05321689400', 21, 12345),
(1003, 'billur@gmail.com', '05422887163', 17, 12345);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `ops_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `service`
--

INSERT INTO `service` (`service_id`, `car_id`, `ops_id`, `department_id`, `customer_id`) VALUES
(2, 1, 10001, 501, 1),
(3, 4, 10001, 502, 3),
(4, 9, 2000, 501, 5),
(5, 10, 300, 501, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sparepart`
--

CREATE TABLE `sparepart` (
  `part_id` int(10) NOT NULL,
  `part_type` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `distributor_id` int(10) NOT NULL,
  `cost` int(15) NOT NULL,
  `ops_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sparepart`
--

INSERT INTO `sparepart` (`part_id`, `part_type`, `distributor_id`, `cost`, `ops_id`, `employee_id`, `department_id`) VALUES
(234, 'v8 piston', 2, 12000, 10001, 100, 501),
(421, 'carburetor fan', 3, 1400, 10003, 102, 500),
(456, 'leftback bumper', 4, 1500, 10002, 103, 504),
(523, 'engine spark-plug', 5, 3400, 10004, 104, 503),
(546, 'fuel tank', 5, 12000, 10004, 100, 501),
(10023, 'fuel tank', 2, 12000, 10005, 100, 500),
(10024, 'engine spark-plug', 6, 3400, 10003, 100, 500),
(10025, 'leftback bumper', 4, 1500, 10002, 101, 501);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `captain`
--
ALTER TABLE `captain`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `cap_email` (`cap_email`),
  ADD KEY `department_id` (`department_id`);

--
-- Tablo için indeksler `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Tablo için indeksler `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `clerk_email` (`clerk_email`),
  ADD KEY `department_id` (`department_id`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `rep_email` (`rep_email`);

--
-- Tablo için indeksler `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Tablo için indeksler `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`distributor_id`),
  ADD UNIQUE KEY `distributor_email` (`distributor_email`),
  ADD KEY `cap_email` (`cap_email`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Tablo için indeksler `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`ops_id`,`department_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Tablo için indeksler `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `rep_email` (`rep_email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Tablo için indeksler `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `car_id` (`car_id`,`ops_id`,`department_id`),
  ADD KEY `ops_id` (`ops_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Tablo için indeksler `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `distributor_id` (`distributor_id`),
  ADD KEY `ops_id` (`ops_id`),
  ADD KEY `captain_id` (`employee_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;
--
-- Tablo için AUTO_INCREMENT değeri `distributor`
--
ALTER TABLE `distributor`
  MODIFY `distributor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `operations`
--
ALTER TABLE `operations`
  MODIFY `ops_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;
--
-- Tablo için AUTO_INCREMENT değeri `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `part_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10026;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `captain`
--
ALTER TABLE `captain`
  ADD CONSTRAINT `Captain_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Captain_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `clerk`
--
ALTER TABLE `clerk`
  ADD CONSTRAINT `Clerk_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Clerk_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`rep_email`) REFERENCES `representative` (`rep_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `Distributor_ibfk_1` FOREIGN KEY (`cap_email`) REFERENCES `captain` (`cap_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `Operations_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `representative`
--
ALTER TABLE `representative`
  ADD CONSTRAINT `Representative_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `Service_ibfk_2` FOREIGN KEY (`ops_id`) REFERENCES `operations` (`ops_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Service_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Service_ibfk_5` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Service_ibfk_6` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `SparePart_ibfk_1` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`distributor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SparePart_ibfk_2` FOREIGN KEY (`ops_id`) REFERENCES `operations` (`ops_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SparePart_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `captain` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SparePart_ibfk_4` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
