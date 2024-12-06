-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 10:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superfin`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadband_payments`
--

CREATE TABLE `broadband_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_number` int(50) NOT NULL,
  `service_provider` varchar(50) NOT NULL,
  `bill_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `broadband_payments`
--

INSERT INTO `broadband_payments` (`id`, `user_id`, `account_number`, `service_provider`, `bill_amount`, `status`, `created_at`) VALUES
(1, 1005, 481, 'GtplFiber', 100.00, 'successful', '2024-10-19 16:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'Kyla Padilla', 'jevamyfo@mailinator.com', 'Laudantium consequa', 'Ea debitis minima et'),
(3, 'Damian Rhodes', 'mecut@mailinator.com', 'At non repudiandae e', 'Corporis accusantium'),
(4, 'Brady Dunn', 'syfesyta@mailinator.com', 'Et magni laboriosam', 'Recusandae Dignissi'),
(5, 'Serina Orr', 'zasakuga@mailinator.com', 'Sequi commodo tempor', 'Amet accusamus accu');

-- --------------------------------------------------------

--
-- Table structure for table `dth_recharges`
--

CREATE TABLE `dth_recharges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscriber_id` varchar(10) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dth_recharges`
--

INSERT INTO `dth_recharges` (`id`, `user_id`, `subscriber_id`, `operator`, `amount`, `status`, `created_at`) VALUES
(8, 1005, '7196758678', 'AIRTEL', 100.00, 'successful', '2024-10-19 16:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `education_fees`
--

CREATE TABLE `education_fees` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` int(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `fees_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_fees`
--

INSERT INTO `education_fees` (`id`, `user_id`, `student_name`, `student_id`, `institution`, `fees_amount`, `status`, `created_at`) VALUES
(1, 0, 'Wyoming Baxter', 10, 'GujaratTechnologicalUniversity', 4.00, 'successful', '2024-10-19 09:33:39'),
(2, 1002, 'Cathleen Owens', 99, 'GujaratTechnologicalUniversity', 59.00, 'successful', '2024-10-19 10:35:02'),
(3, 1005, 'Patricia Cantu', 94, 'parulUniversity', 100.00, 'successful', '2024-10-19 16:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `electricity_payments`
--

CREATE TABLE `electricity_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `consumer_number` varchar(11) NOT NULL,
  `electricity_board` varchar(50) NOT NULL,
  `bill_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electricity_payments`
--

INSERT INTO `electricity_payments` (`id`, `user_id`, `consumer_number`, `electricity_board`, `bill_amount`, `status`, `created_at`) VALUES
(1, 1002, '12654756756', 'DGVCL', 2.00, 'successful', '2024-10-19 10:29:16'),
(2, 1005, '72012312312', 'DGVCL', 100.00, 'successful', '2024-10-19 16:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `gas_bookings`
--

CREATE TABLE `gas_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `gas_provider` varchar(50) NOT NULL,
  `booking_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gas_bookings`
--

INSERT INTO `gas_bookings` (`id`, `user_id`, `customer_id`, `gas_provider`, `booking_amount`, `status`, `created_at`) VALUES
(1, 1002, '31937218928934723', '#', 66.00, 'successful', '2024-10-19 10:43:48'),
(2, 1002, '31937218928934723', 'Bharat', 94.00, 'successful', '2024-10-19 10:44:01'),
(3, 1005, '34123123123123123', '#', 100.00, 'successful', '2024-10-19 16:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_recharges`
--

CREATE TABLE `mobile_recharges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','successful','failed') DEFAULT 'successful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_recharges`
--

INSERT INTO `mobile_recharges` (`id`, `user_id`, `mobile_number`, `operator`, `amount`, `status`, `created_at`) VALUES
(1, 1002, '6263464565', 'AIRTEL', 299.00, 'successful', '2024-10-19 09:12:56'),
(2, 1002, '7504575675', 'JIO', 6.00, 'successful', '2024-10-19 10:26:30'),
(3, 1005, '2023645776', 'VI', 100.00, 'successful', '2024-10-19 16:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `news_tbl`
--

CREATE TABLE `news_tbl` (
  `news_id` int(11) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_headline` varchar(255) NOT NULL,
  `news_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_tbl`
--

INSERT INTO `news_tbl` (`news_id`, `news_img`, `news_headline`, `news_detail`) VALUES
(1, 'app-banner.png', 'JUST IN! Binance Announces Listing of a New Altcoin on Futures! Sudden Jump in Price!!', 'GSR Announces Executive Departures In a significant development within the cryptocurrency market making sector, GSR, one of the largest cryptocurr...'),
(2, 'hero-banner.png', 'Altcoins to Watch During the Ongoing Sell-Off: Helium (HNT), Aave (AAVE), & This Popular Crypto May Bounce Back Soon', 'Microsoft suggests shareholders vote against a proposal to conduct an assessment of Bitcoin as an investment asset, due to the company already con...'),
(3, 'instruction-1.png', 'ZachXBT: U.S. Government Wallet Could Be Hacked', 'ZachXBT: U.S. Government Wallet Could Be Hacked In a concerning revelation, pseudonymous blockchain security expert ZachXBT has warned that the U....'),
(4, 'instruction-2.png', 'Altcoin Season Unlikely Until Bitcoin Surpasses $80K', 'Altcoin Season Unlikely Until Bitcoin Surpasses $80K According to a report released on October 23 by HashKey Capital, a prominent crypto investmen...'),
(5, 'instruction-3.png', 'Aptos Foundation Collaborates with FLock.io to Develop Move', 'Aptos Foundation Collaborates with FLock.io to Develop Move In a strategic initiative to bolster the Move programming language, the Aptos Foundati...'),
(6, 'hero-banner.png', 'Does The Gold Rally Really Hold Back Bitcoin?', 'Between bitcoin and gold, the war is declared. Which of the two will emerge victorious? Opinions differ. Analysts, however, highlight an interesti...'),
(7, 'instruction-4.png', 'Pennsylvania House of Representatives Passes Bill Allowing Bitcoin Payments', 'Pennsylvania House of Representatives Passes Bill Allowing Bitcoin Payments In a landmark decision for the cryptocurrency community, the Pennsylva...'),
(8, 'instruction-1.png', 'Bitcoin Price Hits New High as Whales Accumulate', 'Bitcoin (BTC) has surged past the $68,000 mark, establishing strong support at $65,500. This price spike corresponds with a notable increase in wh...'),
(9, 'instruction-2.png', 'Crypto Markets Respond to Upcoming U.S. Presidential Election', 'Crypto markets show a preference for Trump as elections approach. Investors hope for supportive crypto regulations regardless of the election outc...'),
(10, 'app-banner.png', 'GSR Announces Executive Departures', 'The bill aims to provide regulatory clarity for digital assets, including self-custody rights, bitcoin payments, and transaction taxation.');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `order_name`, `order_price`, `order_quantity`, `order_type`) VALUES
(1, 1002, 'BTCUSDT', '11427.84216', '.002', 'BUY'),
(2, 1002, 'SOLUSDT', '25784.64', '2', 'BUY'),
(3, 1002, 'TONUSDT', '15358.56', '35', 'BUY'),
(4, 1002, 'AVAXUSDT', '13900.32', '6', 'BUY'),
(5, 1002, 'MATICUSDT', '3186.96', '100', 'BUY'),
(6, 1002, 'DOTUSDT', '28405.44', '80', 'BUY'),
(7, 1002, 'DOTUSDT', '10000.44', '80', 'SELL'),
(8, 1002, 'MATICUSDT', '318.696', '10', 'BUY'),
(9, 1002, 'NEARUSDT', '4127.76', '10', 'SELL'),
(10, 1002, 'PEPEUSDT', '0.0089376', '10', 'BUY'),
(11, 1002, 'MATICUSDT', '159.348', '5', 'BUY'),
(12, 1002, 'XLMUSDT', '96.9696', '12', 'BUY'),
(13, 1002, 'MATICUSDT', '95.6088', '3', 'BUY'),
(14, 1002, 'MATICUSDT', '95.6088', '3', 'BUY'),
(15, 1002, 'MATICUSDT', '95.6088', '3', 'BUY'),
(16, 1002, 'MATICUSDT', '95.6088', '3', 'BUY'),
(17, 1002, 'MATICUSDT', '127.4784', '4', 'SELL'),
(18, 1002, 'MATICUSDT', '63.7392', '2', 'BUY'),
(19, 1002, 'MATICUSDT', '95.6088', '3', 'SELL'),
(20, 1005, 'MATICUSDT', '159.348', '5', 'BUY'),
(21, 1005, 'MATICUSDT', '63.7392', '2', 'SELL');

-- --------------------------------------------------------

--
-- Table structure for table `trade_tbl`
--

CREATE TABLE `trade_tbl` (
  `trade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trade_tbl`
--

INSERT INTO `trade_tbl` (`trade_id`, `user_id`, `order_name`, `order_price`, `order_quantity`, `order_type`) VALUES
(1, 1002, 'BTCUSDT', '11427.84216', '.002', 'BUY'),
(2, 1002, 'SOLUSDT', '25784.64', '2', 'BUY'),
(3, 1002, 'TONUSDT', '15358.56', '35', 'BUY'),
(4, 1002, 'AVAXUSDT', '13900.32', '6', 'BUY'),
(6, 1002, 'DOTUSDT', '28405.44', '80', 'BUY'),
(9, 1002, 'PEPEUSDT', '0.0089376', '10', 'BUY'),
(10, 1002, 'MATICUSDT', '-66.2608', '3', 'BUY'),
(11, 1002, 'XLMUSDT', '96.9696', '12', 'BUY'),
(12, 1005, 'MATICUSDT', '95.6088', '3', 'BUY');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `email`, `phone`, `pass`) VALUES
(1001, 'nagecykig', 'hagam@mailinator.com', 55, '$2y$10$6..Jh/xxS5EMrgtrikMlAebqKpEH1dHhQAz5k9m05TryUS6./7gIq'),
(1002, 'Aryan123', 'ap@gmail.com', 1231231231, '$2y$10$9xQGCC3Vk7cVi/ZAYtR1vOjMhk1Dq4vXNWSdXPpT5dFiTjppxdKHu'),
(1003, 'nuwemysa', 'pytac@mailinator.com', 1231231228, '$2y$10$6h7ek5wMN2lv32MRaVwc4uirxZhZb1HvjaOb7KgXva.h.YwEPe9/q'),
(1004, 'jawalunip', 'lowud@mailinator.com', 1231231225, '$2y$10$PYwWxpTDD86xhNG4381poeAl0ZtFz3HIt/0sniJe.pkrpuaLotTHy'),
(1005, 'Dev', 'dev@gmail.com', 2147483647, '$2y$10$KfdDbQl.9.sQCc6EPIqiKeEp1gsVt5RiIyPFqaCesosbDk3n0RCGC');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history_tbl`
--

CREATE TABLE `wallet_history_tbl` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_amount` int(11) NOT NULL,
  `tran_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_history_tbl`
--

INSERT INTO `wallet_history_tbl` (`history_id`, `user_id`, `wallet_amount`, `tran_type`) VALUES
(7, 1002, 1000, 'DEPOSIT'),
(8, 1002, 1000, 'WITHDRAW'),
(9, 1005, 5000, 'DEPOSIT');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_tbl`
--

CREATE TABLE `wallet_tbl` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `funds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_tbl`
--

INSERT INTO `wallet_tbl` (`wallet_id`, `user_id`, `funds`) VALUES
(1, 1002, 2743),
(2, 1005, 4605);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadband_payments`
--
ALTER TABLE `broadband_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `dth_recharges`
--
ALTER TABLE `dth_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_fees`
--
ALTER TABLE `education_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricity_payments`
--
ALTER TABLE `electricity_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gas_bookings`
--
ALTER TABLE `gas_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_recharges`
--
ALTER TABLE `mobile_recharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tbl`
--
ALTER TABLE `news_tbl`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `trade_tbl`
--
ALTER TABLE `trade_tbl`
  ADD PRIMARY KEY (`trade_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet_history_tbl`
--
ALTER TABLE `wallet_history_tbl`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `wallet_tbl`
--
ALTER TABLE `wallet_tbl`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadband_payments`
--
ALTER TABLE `broadband_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dth_recharges`
--
ALTER TABLE `dth_recharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education_fees`
--
ALTER TABLE `education_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `electricity_payments`
--
ALTER TABLE `electricity_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gas_bookings`
--
ALTER TABLE `gas_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobile_recharges`
--
ALTER TABLE `mobile_recharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_tbl`
--
ALTER TABLE `news_tbl`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trade_tbl`
--
ALTER TABLE `trade_tbl`
  MODIFY `trade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `wallet_history_tbl`
--
ALTER TABLE `wallet_history_tbl`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet_tbl`
--
ALTER TABLE `wallet_tbl`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
