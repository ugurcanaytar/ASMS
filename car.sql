-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 May 2016, 20:25:02
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
(200, 34, 'keskin@gmail.com', 400, 12345),
(201, 45, 'kayra@gmail.com', 401, 12345),
(202, 28, 'aziz@gmail.com', 402, 12345),
(203, 32, 'salvar@gmail.com', 403, 12345),
(204, 32, 'ergen@gmail.com', 404, 12345),
(205, 36, 'kocasakal@gmail.com', 405, 12345);

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
(1, 'Punto', '2016-05-11', 100, 1),
(2, 'Linea', '2016-05-18', 150, 2),
(3, '500L', '2016-05-23', 120, 3),
(4, 'Panda', '2016-04-12', 90, 4),
(5, 'Fiorino', '2016-03-15', 130, 5),
(6, 'Ducato', '2016-01-19', 140, 6),
(7, 'Freemont', '2016-05-23', 125, 7),
(8, 'Linea', '2016-05-09', 115, 8),
(9, 'Linea', '2016-05-15', 110, 1),
(10, '500L', '2016-05-22', 120, 2),
(11, 'Cruze', '2016-05-13', 124, 7),
(13, 'Cruze', '2016-05-19', 124, 8),
(14, 'Fiorino', '2016-05-11', 120, 3);

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
  `password` int(20) NOT NULL,
  `service_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `clerk`
--

INSERT INTO `clerk` (`employee_id`, `expert_level`, `clerk_email`, `ops_id`, `department_id`, `password`, `service_id`) VALUES
(300, 2, 'caner@gmail.com', 10000, 400, 12345, 0),
(301, 5, 'fatal@gmail.com', 10000, 401, 12345, 0),
(302, 3, 'kara@gmail.com', 10000, 402, 12345, 0),
(303, 9, 'karaman@gmail.com', 10000, 403, 12345, 0),
(304, 1, 'yeter@gmailc.com', 10000, 404, 12345, 0),
(305, 9, 'behzat@gmail.com', 10000, 405, 12345, 0),
(306, 7, 'tekin@gmail.com', 10000, 400, 12345, 0),
(307, 2, 'canan@gmail.com', 10000, 401, 12345, 0),
(308, 1, 'kenan@gmail.com', 10000, 402, 12345, 0),
(309, 3, 'haydar@gmail.com', 10000, 403, 12345, 0),
(310, 8, 'muezzin@gmail.com', 10000, 404, 12345, 0),
(311, 9, 'dersu@gmail.com', 10000, 405, 12345, 0);

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
  `rep_email` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `enterance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `address`, `phone_number`, `c_email`, `password`, `rep_email`, `enterance`) VALUES
(1, 'Haydar Kesik', 'Bilkent-2 g-4 01', '05432786521', 'haydar@gmail.com', '12345', 'canan@gmail.com', '2016-05-17'),
(2, 'Cansu Yilan', 'Bilkent-2 g-4 02', '05427642563', 'cansu@gmail.com', '12345', 'selim@gmail.com', '2015-11-18'),
(3, 'Kayhan Memis', 'Bilkent-2 g-4 03', '05467891243', 'kayhan@gmail.com', '12345', 'hanci@gmail.com', '2016-05-27'),
(4, 'Fatma Giritli', 'Bilkent-2 g-4 04', '05478913208', 'fatma@gmail.com', '12345', 'nilgun@gmail.com', '2016-05-31'),
(5, 'Sevgi Tanır', 'Bilkent-2 g-4 05', '05238975327', 'sevgi@gmail.com', '12345', 'sayman@gmail.com', '2016-05-13'),
(6, 'Fadime Sever', 'Bilkent-2 g-4 06', '05427805423', 'fadime@gmail.com', '12345', 'selim@gmail.com', '2016-07-08'),
(7, 'Goksu Kanlıdag', 'Bilkent-2 g-4 07', '05346723490', 'goksu@gmail.com', '12345', 'canan@gmail.com', '2015-12-16'),
(8, 'Arif Usta', 'Bilkent-2 g-4 08', '05328652340', 'arifusta@gmail.com', '12345', 'hanci@gmail.com', '2016-10-27');

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
(400, 'Engine', 250000),
(401, 'BodyWork', 380000),
(402, 'Dyeing', 450000),
(403, 'Cooling System', 340000),
(404, 'Electrical Equipment', 490000),
(405, 'Electronic Control Unit', 560000);

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
(500, 'Cem Yaprak', '12345', 'cem@gmail.com', 'keskin@gmail.com'),
(501, 'Caglar Germiyen', '12345', 'germiyen@gmail.com', 'ergen@gmail.com'),
(502, 'Tahri Muezzin', '12345', 'tahri@gmail.com', 'kayra@gmail.com'),
(503, 'Selda Yasar', '12345', 'selda@gmail.com', 'aziz@gmail.com'),
(504, 'Yasin Kumral', '12345', 'yasin@gmail.com', 'kocasakal@gmail.com'),
(505, 'Yigit Kutay', '12345', 'yigit@gmail.com', 'salvar@gmail.com'),
(506, 'Arif Usta', '12345', 'usta@gmail.com', 'aziz@gmail.com'),
(507, 'Billur Kalimera', '12345', 'billur@gmail.com', 'ergen@gmail.com');

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
(100, 'Canan Bekci', 2500),
(101, 'Selim Akin', 2400),
(102, 'Doruk Cerciler', 2600),
(103, 'Oguz Sayman', 2000),
(104, 'Nilgun Ucan', 2100),
(105, 'Sevim Hanci', 2200),
(200, 'Fatih Keskin', 4750),
(201, 'Feyzi Kayra', 4200),
(202, 'Kerim Aziz', 4400),
(203, 'Ahmet Salvar', 4600),
(204, 'Ali Ergin', 4000),
(205, 'Ismet Kocasakal', 4100),
(300, 'Caner Kerim', 14000),
(301, 'Mehmet Fatal', 1600),
(302, 'Fethi Kara', 1200),
(303, 'Hikmet Karaman', 1300),
(304, 'Bora Yeter', 1500),
(305, 'Behzat Amir', 1350),
(306, 'Tekin Fahri', 1700),
(307, 'Canan Ekinci', 1400),
(308, 'Kenan Muftuoglu', 1650),
(309, 'Haydar Bickin', 1800),
(310, 'Muezzin Sayman', 1540),
(311, 'Dersu Dayanik', 1560);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `operations`
--

CREATE TABLE `operations` (
  `ops_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `description` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `part_type` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `operations`
--

INSERT INTO `operations` (`ops_id`, `department_id`, `description`, `part_type`, `quantity`) VALUES
(10001, 400, 'engine can not cold down. It has to be rework.', 'Tire', 3),
(10003, 402, 'There are scretch on left front bumper. Car needs to paint with metalic blue paint.', 'Sparker', 1),
(10004, 403, 'Cooling system does not work efficiently. New gas has to added into cooling tank.', 'Cooling Gases', 1),
(10005, 404, 'GPS screen does not respond. Electrical equipments has to be re-work.', 'V8 Piston', 2),
(10006, 405, 'Car key does not work because of immobilazer failure. Electronic control unit has to be re-code.', 'Immobiliazer', 1),
(10007, 400, 'Motor take damage from left side. It does not fucntionally work.', 'Car Key', 2),
(10008, 401, 'Front mud-guard has to be change since half of it broken.', 'Propelline Nozzle', 1),
(10009, 402, 'Customer wants to paint his car into metalic purple.', 'Flywheels', 2),
(10010, 403, 'Cooling tank was punctured and cause to release gases insede it. It has to be fixed.', 'Exhaust System', 1),
(10011, 404, 'Headlight is not working because of the error in electric equipment. Has to be fixed.', 'Starter System', 1),
(10012, 405, 'Signals of car does work in the wrong way. Electronic control unit has to be re-work.', 'Fuel Pump', 1),
(10013, 400, 'Motor oil has to be change.', 'Control System', 1),
(10014, 401, 'Driver seat take damage because of accident. It has to be repair.', 'Fender', 1),
(10015, 402, 'Wax polish has to be used on car in order to inclose scratchs.', 'Gear Box', 1),
(10016, 403, 'heating system has to be rework.', 'Red Paint', 1),
(10017, 404, 'Radio does not work. It has to be changed.', 'Compressor', 1),
(10018, 405, 'Cruze control system does not work. Customer wants to fix that problem.', 'Ignitor Timer', 1);

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
(100, 'canan@gmail.com', '05554378921', 15, 12345),
(101, 'selim@gmail.com', '05346782134', 13, 12345),
(102, 'cerciler@gmail.com', '05219862354', 14, 12345),
(103, 'sayman@gmail.com', '05429874561', 15, 12345),
(104, 'nilgun@gmail.com', '05346781253', 17, 12345),
(105, 'hanci@gmail.com', '05378924572', 20, 12345);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `ops_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `available` int(1) NOT NULL,
  `demand` int(1) NOT NULL,
  `done` int(1) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `service`
--

INSERT INTO `service` (`service_id`, `car_id`, `ops_id`, `department_id`, `customer_id`, `available`, `demand`, `done`, `start_date`) VALUES
(3, 2, 10003, 402, 2, 9, 0, 1, '2016-05-11'),
(4, 2, 10004, 403, 2, 9, 0, 1, '2016-05-22'),
(5, 3, 10005, 404, 3, 9, 0, 1, '2016-05-29'),
(6, 3, 10006, 405, 3, 9, 0, 1, '2016-05-15'),
(7, 4, 10007, 400, 4, 0, 0, 0, '2016-05-01'),
(9, 4, 10008, 401, 4, 9, 0, 1, '2016-06-22'),
(11, 5, 10009, 402, 5, 0, 1, 0, '2016-07-14'),
(12, 5, 10010, 403, 5, 1, 0, 0, '2016-05-23'),
(13, 6, 10011, 404, 6, 1, 0, 0, '2016-05-23'),
(14, 6, 10012, 405, 6, 1, 0, 0, '2016-05-22'),
(15, 7, 10013, 400, 7, 1, 0, 0, '2016-05-27'),
(16, 7, 10014, 401, 7, 0, 1, 0, '2016-05-31'),
(17, 8, 10015, 402, 8, 0, 1, 0, '2016-06-17'),
(18, 8, 10016, 403, 8, 0, 1, 0, '2016-05-28'),
(19, 9, 10017, 404, 1, 1, 0, 0, '2016-06-25'),
(20, 10, 10018, 405, 2, 1, 0, 0, '2016-07-24'),
(21, 2, 10010, 403, 2, 1, 0, 0, '2016-06-08'),
(24, 10, 10015, 402, 2, 1, 0, 0, '2016-07-15'),
(25, 13, 10013, 400, 8, 0, 0, 0, '2016-05-27'),
(26, 6, 10017, 404, 6, 0, 1, 0, '2016-08-25'),
(27, 14, 10006, 405, 3, 9, 0, 1, '2016-05-26');

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
  `department_id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sparepart`
--

INSERT INTO `sparepart` (`part_id`, `part_type`, `distributor_id`, `cost`, `ops_id`, `employee_id`, `department_id`, `service_id`) VALUES
(700, 'Tire', 500, 5000, 10001, 200, 400, 1),
(703, 'Cooling Gases', 506, 6700, 10004, 203, 403, 4),
(704, 'V8 Piston', 507, 4500, 10005, 204, 404, 5),
(705, 'Immobiliazer', 500, 300, 10006, 205, 405, 6),
(709, 'Car Key', 501, 7000, 10007, 200, 400, 7),
(710, 'Propelline Nozzle', 502, 2000, 10008, 201, 401, 9),
(711, 'Flywheels', 503, 3500, 10009, 202, 402, 11),
(712, 'Exhaust System', 504, 5600, 10010, 203, 403, 12),
(713, 'Starter System', 505, 4500, 10011, 204, 404, 13),
(714, 'Fuel Pump', 506, 6000, 10012, 205, 405, 14),
(715, 'Control System', 507, 7000, 10013, 200, 400, 15),
(716, 'Fender', 500, 8000, 10014, 201, 401, 16),
(717, 'Gear Box', 501, 9000, 10015, 202, 402, 17),
(718, 'Red Paint', 502, 1000, 10016, 203, 403, 18),
(719, 'Compressor', 503, 2300, 10017, 204, 404, 19),
(720, 'Ignitor Timer', 504, 2400, 10018, 205, 405, 20),
(721, 'Sparker', 505, 1200, 10003, 202, 402, 3),
(723, 'V8 Piston', 506, 4500, 10005, 204, 404, 5),
(724, 'Car Key', 506, 7000, 10007, 200, 400, 7),
(725, 'Flywheels', 507, 3500, 10009, 202, 402, 11),
(738, 'Gear Box', 504, 9000, 10015, 202, 402, 24),
(748, 'Control System', 504, 7000, 10013, 200, 400, 15),
(749, 'Compressor', 502, 2300, 10017, 204, 404, 26),
(756, 'Immobiliazer', 502, 300, 10006, 200, 405, 6);

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
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `car_id_2` (`car_id`);

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
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;
--
-- Tablo için AUTO_INCREMENT değeri `distributor`
--
ALTER TABLE `distributor`
  MODIFY `distributor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
--
-- Tablo için AUTO_INCREMENT değeri `operations`
--
ALTER TABLE `operations`
  MODIFY `ops_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10019;
--
-- Tablo için AUTO_INCREMENT değeri `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Tablo için AUTO_INCREMENT değeri `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `part_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=757;
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
  ADD CONSTRAINT `SparePart_ibfk_4` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SparePart_ibfk_5` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
