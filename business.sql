-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 30 Δεκ 2021 στις 22:09:59
-- Έκδοση διακομιστή: 10.4.21-MariaDB
-- Έκδοση PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `id18202822_business`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `FULL_NAME` varchar(30) NOT NULL,
  `AFM` varchar(15) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`FULL_NAME`, `AFM`, `PHONE_NUMBER`) VALUES
('DIMITRIS TOZAKIDIS', '012345678', '6984578632'),
('GEORGE KAMPOSOS JR.', '0574105641', '6981245752'),
('GEORGIA PAPAPETROU', '1025478652', '6947565078'),
('MICHAEL JORDAN', '2323654723', '6984632514'),
('CHRISTOS ARSENIOU', '2564756301', '6984786516'),
('EMILY REYES', '3312708954', '2025550134'),
('MAKIS MPROUMERIOTIS', '4056302169', '6949632145'),
('ALEXANDROS NIKOLAIDIS', '4556412358', '6974563214'),
('LEBRON JAMES', '6236234523', '6987532306'),
('TIM BIRKIN', '8845123698', '3017825462'),
('MICHALIS ARSENIOU', '9874563210', '6982231607');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `ID` varchar(20) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `SUPPLIER` varchar(30) NOT NULL,
  `MEASUREMENT_UNIT` varchar(20) NOT NULL,
  `PRICE_PER_UNIT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`ID`, `NAME`, `SUPPLIER`, `MEASUREMENT_UNIT`, `PRICE_PER_UNIT`) VALUES
('FR-1', 'SIEMENS KG49NAXDP', 'SIEMENS AG', 'PIECE', 1029),
('FR-2', 'BEKO GNE60531XN', 'BEKO MAGAZASI', 'PIECE', 1149),
('FR-3', 'BOSCH KGN49XIDP', 'BOSCH', 'PIECE', 820),
('MP-1', 'SAMSUNG GALAXY S21', 'SAMSUNG ELECTRONICS', 'PIECE', 830),
('MP-2', 'IPHONE 13 PRO MAX', 'APPLE INC.', 'PIECE', 1300),
('MP-3', 'NOKIA 3310', 'NOKIA OYJ', 'PIECE', 30),
('MP-4', 'XIAOMI REDMI NOTE 10 PRO', 'XIAOMI INC.', 'PIECE', 285),
('TV-1', 'TURBO-X SMART TV FULL HD TXV-S3270F', 'TURBO-X', 'PIECE', 239),
('TV-2', 'LG SMART TV LED 4K UHD 43UP75003LF', 'LG CORP.', 'PIECE', 370),
('WM-1', 'BOSCH WAN24008GR', 'BOSCH', 'PIECE', 368);

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `product_info`
-- (Δείτε παρακάτω για την πραγματική προβολή)
--
CREATE TABLE `product_info` (
`ID` varchar(20)
,`NAME` varchar(50)
,`SUPPLIER` varchar(30)
,`AFM` varchar(15)
,`MEASUREMENT_UNIT` varchar(20)
,`PRICE_PER_UNIT` float
);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `purchases`
--

CREATE TABLE `purchases` (
  `NUMBER` int(11) NOT NULL,
  `SUPPLIER` varchar(30) NOT NULL,
  `PRODUCT` varchar(50) NOT NULL,
  `QUANTITY` float NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `purchases`
--

INSERT INTO `purchases` (`NUMBER`, `SUPPLIER`, `PRODUCT`, `QUANTITY`, `DATE`) VALUES
(1, 'SIEMENS AG', 'SIEMENS KG49NAXDP', 20, '2021-08-03'),
(2, 'BEKO MAGAZASI', 'BEKO GNE60531XN', 30, '2021-09-20'),
(3, 'BOSCH', 'BOSCH KGN49XIDP', 25, '2021-09-21'),
(4, 'SAMSUNG ELECTRONICS', 'SAMSUNG GALAXY S21', 40, '2021-07-14'),
(5, 'APPLE INC.', 'IPHONE 13 PRO MAX', 17, '2021-09-28'),
(6, 'NOKIA OYJ', 'NOKIA 3310', 70, '2021-10-13'),
(7, 'XIAOMI INC.', 'XIAOMI REDMI NOTE 10 PRO', 40, '2021-10-25'),
(8, 'TURBO-X', 'TURBO-X SMART TV FULL HD TXV-S3270F', 32, '2021-10-15'),
(9, 'LG CORP.', 'LG SMART TV LED 4K UHD 43UP75003LF', 20, '2021-09-08'),
(10, 'BOSCH', 'BOSCH WAN24008GR', 13, '2021-11-03');

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `purchase_info`
-- (Δείτε παρακάτω για την πραγματική προβολή)
--
CREATE TABLE `purchase_info` (
`NUMBER` int(11)
,`SUPPLIER` varchar(30)
,`AFM` varchar(15)
,`PRODUCT` varchar(50)
,`ID` varchar(20)
,`QUANTITY` float
,`MEASUREMENT_UNIT` varchar(20)
,`PRICE_PER_UNIT` float
,`DATE` date
);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sales`
--

CREATE TABLE `sales` (
  `NUMBER` int(11) NOT NULL,
  `CUSTOMER` varchar(30) NOT NULL,
  `PRODUCT` varchar(50) NOT NULL,
  `QUANTITY` float NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `sales`
--

INSERT INTO `sales` (`NUMBER`, `CUSTOMER`, `PRODUCT`, `QUANTITY`, `DATE`) VALUES
(1, 'MAKIS MPROUMERIOTIS', 'IPHONE 13 PRO MAX', 2, '2021-12-03'),
(2, 'ALEXANDROS NIKOLAIDIS', 'BOSCH WAN24008GR', 1, '2021-12-30'),
(3, 'LEBRON JAMES', 'TURBO-X SMART TV FULL HD TXV-S3270F', 20, '2022-01-03'),
(4, 'DIMITRIS TOZAKIDIS', 'LG SMART TV LED 4K UHD 43UP75003LF', 1, '2021-12-14'),
(5, 'CHRISTOS ARSENIOU', 'NOKIA 3310', 1, '2021-12-21'),
(6, 'GEORGE KAMPOSOS JR.', 'SIEMENS KG49NAXDP', 2, '2021-12-29'),
(7, 'GEORGIA PAPAPETROU', 'SAMSUNG GALAXY S21', 1, '2021-11-30'),
(8, 'MICHAEL JORDAN', 'BEKO GNE60531XN', 5, '2022-01-10'),
(9, 'ALEXANDROS NIKOLAIDIS', 'BOSCH KGN49XIDP', 1, '2021-12-27'),
(10, 'MAKIS MPROUMERIOTIS', 'TURBO-X SMART TV FULL HD TXV-S3270F', 2, '2021-10-12');

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `sale_info`
-- (Δείτε παρακάτω για την πραγματική προβολή)
--
CREATE TABLE `sale_info` (
`NUMBER` int(11)
,`CUSTOMER` varchar(30)
,`AFM` varchar(15)
,`PHONE_NUMBER` varchar(20)
,`PRODUCT` varchar(50)
,`ID` varchar(20)
,`QUANTITY` float
,`MEASUREMENT_UNIT` varchar(20)
,`PRICE_PER_UNIT` float
,`DATE` date
,`SUPPLIER` varchar(30)
);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `suppliers`
--

CREATE TABLE `suppliers` (
  `COMPANY_NAME` varchar(30) NOT NULL,
  `AFM` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `suppliers`
--

INSERT INTO `suppliers` (`COMPANY_NAME`, `AFM`) VALUES
('APPLE INC.', '1'),
('BEKO MAGAZASI', '8'),
('BOSCH', '9'),
('HUAWEI TECHNOLOGIES', '6'),
('LG CORP.', '5'),
('NOKIA OYJ', '4'),
('SAMSUNG ELECTRONICS', '2'),
('SIEMENS AG', '7'),
('TURBO-X', '10'),
('XIAOMI INC.', '3');

-- --------------------------------------------------------

--
-- Δομή για προβολή `product_info`
--
DROP TABLE IF EXISTS `product_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info`  AS SELECT `p`.`ID` AS `ID`, `p`.`NAME` AS `NAME`, `p`.`SUPPLIER` AS `SUPPLIER`, `s`.`AFM` AS `AFM`, `p`.`MEASUREMENT_UNIT` AS `MEASUREMENT_UNIT`, `p`.`PRICE_PER_UNIT` AS `PRICE_PER_UNIT` FROM (`products` `p` join `suppliers` `s` on(`p`.`SUPPLIER` = `s`.`COMPANY_NAME`)) ;

-- --------------------------------------------------------

--
-- Δομή για προβολή `purchase_info`
--
DROP TABLE IF EXISTS `purchase_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_info`  AS SELECT `pu`.`NUMBER` AS `NUMBER`, `pu`.`SUPPLIER` AS `SUPPLIER`, `s`.`AFM` AS `AFM`, `pu`.`PRODUCT` AS `PRODUCT`, `p`.`ID` AS `ID`, `pu`.`QUANTITY` AS `QUANTITY`, `p`.`MEASUREMENT_UNIT` AS `MEASUREMENT_UNIT`, `p`.`PRICE_PER_UNIT` AS `PRICE_PER_UNIT`, `pu`.`DATE` AS `DATE` FROM ((`purchases` `pu` join `products` `p` on(`pu`.`PRODUCT` = `p`.`NAME`)) join `suppliers` `s` on(`pu`.`SUPPLIER` = `s`.`COMPANY_NAME`)) ;

-- --------------------------------------------------------

--
-- Δομή για προβολή `sale_info`
--
DROP TABLE IF EXISTS `sale_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sale_info`  AS SELECT `s`.`NUMBER` AS `NUMBER`, `s`.`CUSTOMER` AS `CUSTOMER`, `c`.`AFM` AS `AFM`, `c`.`PHONE_NUMBER` AS `PHONE_NUMBER`, `s`.`PRODUCT` AS `PRODUCT`, `p`.`ID` AS `ID`, `s`.`QUANTITY` AS `QUANTITY`, `p`.`MEASUREMENT_UNIT` AS `MEASUREMENT_UNIT`, `p`.`PRICE_PER_UNIT` AS `PRICE_PER_UNIT`, `s`.`DATE` AS `DATE`, `p`.`SUPPLIER` AS `SUPPLIER` FROM ((`sales` `s` join `products` `p` on(`s`.`PRODUCT` = `p`.`NAME`)) join `customers` `c` on(`s`.`CUSTOMER` = `c`.`FULL_NAME`)) ;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`AFM`),
  ADD UNIQUE KEY `FULL_NAME` (`FULL_NAME`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD KEY `SUPPLIER` (`SUPPLIER`);

--
-- Ευρετήρια για πίνακα `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`NUMBER`),
  ADD KEY `PRODUCT` (`PRODUCT`),
  ADD KEY `SUPPLIER_NAME` (`SUPPLIER`);

--
-- Ευρετήρια για πίνακα `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`NUMBER`),
  ADD KEY `PRODUCT` (`PRODUCT`),
  ADD KEY `CUSTOMER` (`CUSTOMER`);

--
-- Ευρετήρια για πίνακα `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`AFM`),
  ADD UNIQUE KEY `COMPANY_NAME` (`COMPANY_NAME`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `purchases`
--
ALTER TABLE `purchases`
  MODIFY `NUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT για πίνακα `sales`
--
ALTER TABLE `sales`
  MODIFY `NUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `SUPPLIER` FOREIGN KEY (`SUPPLIER`) REFERENCES `suppliers` (`COMPANY_NAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `COMPANY_NAME` FOREIGN KEY (`SUPPLIER`) REFERENCES `suppliers` (`COMPANY_NAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCT_NAME` FOREIGN KEY (`PRODUCT`) REFERENCES `products` (`NAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `CUSTOMER` FOREIGN KEY (`CUSTOMER`) REFERENCES `customers` (`FULL_NAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCT` FOREIGN KEY (`PRODUCT`) REFERENCES `products` (`NAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
