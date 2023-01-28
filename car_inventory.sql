-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 12:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webeluti_car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_types`
--

CREATE TABLE `body_types` (
  `id` int(11) NOT NULL,
  `body_type_title` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `body_types`
--

INSERT INTO `body_types` (`id`, `body_type_title`, `status`) VALUES
(1, 'Hatchback', 1),
(2, 'Sedan', 1),
(3, 'Compact Sedan', 1),
(4, 'Mini SUV', 1),
(5, 'SUV', 1),
(6, 'Coupe', 1),
(7, 'Convertible', 1),
(8, 'Wagon', 1),
(9, 'Van', 1),
(10, 'Jeep', 1),
(11, 'Crossover', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_type_id` int(11) NOT NULL,
  `color_title` varchar(50) DEFAULT NULL,
  `color_code` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_type_id`, `color_title`, `color_code`, `status`) VALUES
(1, 1, 'Black Metallic', '#000', 1),
(2, 1, 'Blue', '#000', 1),
(3, 1, 'Gun Metallic', '#000', 1),
(4, 2, 'Black', '#000', 1),
(5, 2, 'Beige', '#000', 1),
(6, 2, 'White', '#000', 1),
(7, 2, 'Gray', '#000', 1),
(8, 2, 'Red', '#000', 1),
(9, 1, 'Grey Metallic', '#000', 1),
(10, 1, 'Yellow', '#000', 1),
(11, 1, 'Other', NULL, 1),
(12, 1, 'White', '#FFF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color_type`
--

CREATE TABLE `color_type` (
  `id` int(11) NOT NULL,
  `color_type_title` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color_type`
--

INSERT INTO `color_type` (`id`, `color_type_title`, `status`) VALUES
(1, 'Exterior', 1),
(2, 'Interior', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drives`
--

CREATE TABLE `drives` (
  `id` int(11) NOT NULL,
  `drive_title` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `drives`
--

INSERT INTO `drives` (`id`, `drive_title`, `status`) VALUES
(1, 'FWD', 1),
(2, 'RWD', 1),
(3, 'AWD', 1),
(4, '4X4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE `fuels` (
  `id` int(11) NOT NULL,
  `fuel_title` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `fuel_title`, `status`) VALUES
(1, 'Gasoline', 1),
(2, 'Diesel', 1),
(3, 'Electric', 1),
(4, 'Hybrid/Gasoline', 1),
(5, 'Plug-In Hybrid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `id` int(11) NOT NULL,
  `make_title` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`id`, `make_title`, `active`) VALUES
(1, 'Toyota', 1),
(2, 'Honda', 1),
(3, 'Suzuki', 1),
(4, 'KIA', 1),
(5, 'Mercedez Benz', 1),
(6, 'Nissan', 1),
(7, 'Mistubishi', 1),
(8, 'BMW', 1),
(9, 'Volvo', 1),
(10, 'Jeep', 1),
(11, 'Audi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_title` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `make_id`, `model_title`, `active`) VALUES
(1, 1, 'Alphard', 1),
(2, 1, 'Aqua', 1),
(4, 1, 'Auris', 1),
(6, 1, 'Belta', 1),
(7, 1, 'Corolla Axio', 1),
(8, 1, 'Corolla Fielder', 1),
(9, 1, 'Corolla Runx', 1),
(10, 1, 'Crown', 1),
(11, 1, 'Fj Cruiser', 1),
(12, 1, 'Hiace', 1),
(13, 1, 'Hiace Van', 1),
(14, 1, 'Hilux', 1),
(15, 1, 'Hilux Surf', 1),
(16, 1, 'Premio', 1),
(17, 1, 'Harrier', 1),
(18, 1, 'Isis', 1),
(19, 1, 'Ist', 1),
(20, 1, 'Land Cruiser V8', 1),
(21, 1, 'Land Cruiser Prado', 1),
(22, 1, 'Mark X', 1),
(23, 1, 'Passo', 1),
(24, 1, 'Prius', 1),
(25, 1, 'Probox', 1),
(27, 2, 'CR-Z', 1),
(28, 2, 'CR-V', 1),
(29, 7, 'Pajero Mini', 1),
(30, 4, 'Picanto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `steering`
--

CREATE TABLE `steering` (
  `id` int(11) NOT NULL,
  `steering_title` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `steering`
--

INSERT INTO `steering` (`id`, `steering_title`, `status`) VALUES
(1, 'Right Hand', 1),
(2, 'Left Hand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_basic_info`
--

CREATE TABLE `stock_basic_info` (
  `id` int(11) NOT NULL,
  `stock_list_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `trim_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `body_type_id` int(11) NOT NULL,
  `exterior_color_id` int(11) NOT NULL,
  `interior_color_id` int(11) NOT NULL,
  `transmission_id` int(11) NOT NULL,
  `drive_id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `chassis_no` varchar(50) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `doors` int(11) DEFAULT NULL,
  `steering_id` int(11) DEFAULT NULL,
  `price_usd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_basic_info`
--

INSERT INTO `stock_basic_info` (`id`, `stock_list_id`, `make_id`, `model_id`, `trim_id`, `year`, `body_type_id`, `exterior_color_id`, `interior_color_id`, `transmission_id`, `drive_id`, `fuel_id`, `engine`, `mileage`, `engine_no`, `chassis_no`, `registration_date`, `seats`, `doors`, `steering_id`, `price_usd`) VALUES
(38, 43, 1, 21, 5, 2016, 5, 1, 4, 2, 4, 1, '4000', '45000', 'CE01202100', 'CC2162120', '2023-11-01', 7, 5, 1, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `stock_features_specs`
--

CREATE TABLE `stock_features_specs` (
  `id` int(11) NOT NULL,
  `stock_list_id` int(11) NOT NULL,
  `power_doors` varchar(2) DEFAULT NULL,
  `power_windows` varchar(2) DEFAULT NULL,
  `abs` varchar(2) DEFAULT NULL,
  `airbags` varchar(2) DEFAULT NULL,
  `key_less_entry` varchar(2) DEFAULT NULL,
  `push_start` varchar(2) DEFAULT NULL,
  `leather_seats` varchar(2) DEFAULT NULL,
  `power_seats` varchar(2) DEFAULT NULL,
  `audio_player` varchar(2) DEFAULT NULL,
  `cd_player` varchar(2) DEFAULT NULL,
  `android_player` varchar(2) DEFAULT NULL,
  `fm_radio` varchar(2) DEFAULT NULL,
  `sun_roof` varchar(2) DEFAULT NULL,
  `parking_sensors` varchar(2) DEFAULT NULL,
  `auto_dimming` varchar(2) DEFAULT NULL,
  `blind_spot_monitor` varchar(2) DEFAULT NULL,
  `360_camera` varchar(2) DEFAULT NULL,
  `reverse_camera` varchar(2) DEFAULT NULL,
  `cruise_control` varchar(2) DEFAULT NULL,
  `adaptive_cruise_control` varchar(2) DEFAULT NULL,
  `traction_control` varchar(2) DEFAULT NULL,
  `drl` varchar(2) DEFAULT NULL,
  `fog_lamps` varchar(2) DEFAULT NULL,
  `alloy_rims` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_features_specs`
--

INSERT INTO `stock_features_specs` (`id`, `stock_list_id`, `power_doors`, `power_windows`, `abs`, `airbags`, `key_less_entry`, `push_start`, `leather_seats`, `power_seats`, `audio_player`, `cd_player`, `android_player`, `fm_radio`, `sun_roof`, `parking_sensors`, `auto_dimming`, `blind_spot_monitor`, `360_camera`, `reverse_camera`, `cruise_control`, `adaptive_cruise_control`, `traction_control`, `drl`, `fog_lamps`, `alloy_rims`) VALUES
(25, 43, 'on', 'on', '', '', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(11) NOT NULL,
  `stock_title` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `stock_title`, `active`) VALUES
(43, 'Toyota Land Cruiser Prado TZ-G Automatic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transmissions`
--

CREATE TABLE `transmissions` (
  `id` int(11) NOT NULL,
  `transmission_title` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transmissions`
--

INSERT INTO `transmissions` (`id`, `transmission_title`, `status`) VALUES
(1, 'Manual', 1),
(2, 'Automatic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trims`
--

CREATE TABLE `trims` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `trim_title` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `trims`
--

INSERT INTO `trims` (`id`, `model_id`, `trim_title`, `active`) VALUES
(1, 20, 'AX', 1),
(2, 20, 'AXG', 1),
(3, 20, 'ZX', 1),
(4, 21, 'TZ', 1),
(5, 21, 'TZ-G', 1),
(6, 7, 'G', 1),
(7, 7, 'F', 1),
(8, 23, 'G', 1),
(9, 23, 'L', 1),
(23, 30, 'Ex', 1),
(24, 30, 'Ex+', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_types`
--
ALTER TABLE `body_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_type`
--
ALTER TABLE `color_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drives`
--
ALTER TABLE `drives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_make_id` (`make_id`);

--
-- Indexes for table `steering`
--
ALTER TABLE `steering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_basic_info`
--
ALTER TABLE `stock_basic_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_id_fk_basic_info` (`stock_list_id`);

--
-- Indexes for table `stock_features_specs`
--
ALTER TABLE `stock_features_specs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_id_fk_feat_specs` (`stock_list_id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trims`
--
ALTER TABLE `trims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_make_id` (`model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `body_types`
--
ALTER TABLE `body_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `color_type`
--
ALTER TABLE `color_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drives`
--
ALTER TABLE `drives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `makes`
--
ALTER TABLE `makes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `steering`
--
ALTER TABLE `steering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_basic_info`
--
ALTER TABLE `stock_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `stock_features_specs`
--
ALTER TABLE `stock_features_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trims`
--
ALTER TABLE `trims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `makes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_basic_info`
--
ALTER TABLE `stock_basic_info`
  ADD CONSTRAINT `stock_id_fk_basic_info` FOREIGN KEY (`stock_list_id`) REFERENCES `stock_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_features_specs`
--
ALTER TABLE `stock_features_specs`
  ADD CONSTRAINT `stock_id_fk_feat_specs` FOREIGN KEY (`stock_list_id`) REFERENCES `stock_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trims`
--
ALTER TABLE `trims`
  ADD CONSTRAINT `trims_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
