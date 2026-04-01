-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2024 às 04:26
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cbw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classprogram`
--

CREATE TABLE `classprogram` (
  `id` int(11) NOT NULL,
  `class_title` varchar(255) DEFAULT NULL,
  `class_content` text DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `link_video_previous_class`
--

CREATE TABLE `link_video_previous_class` (
  `id` int(11) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `link_video_previous_class`
--

INSERT INTO `link_video_previous_class` (`id`, `video_url`, `title`) VALUES
(0, NULL, 'po\r\n'),
(1, 'video/test.mp4', 'po\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `live_link`
--

CREATE TABLE `live_link` (
  `id` int(11) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `live_link`
--

INSERT INTO `live_link` (`id`, `link_url`, `user_id`, `upload_date`) VALUES
(1, 'https://face-time.metered.live/_o_2aawygr', NULL, '2024-01-17 15:04:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paymenthistoryclasses`
--

CREATE TABLE `paymenthistoryclasses` (
  `payment_id` int(11) NOT NULL,
  `student_name` varchar(115) DEFAULT NULL,
  `class_program_name` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `card_expiry_date` date DEFAULT NULL,
  `card_cvv` varchar(4) DEFAULT NULL,
  `payment_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paymenthistoryclasses`
--

INSERT INTO `paymenthistoryclasses` (`payment_id`, `student_name`, `class_program_name`, `amount`, `payment_date`, `card_holder_name`, `card_number`, `card_expiry_date`, `card_cvv`, `payment_type`) VALUES
(1, '1', 'Math Class', '50.00', '2024-01-20', 'John Doe', '1234-5678-9012-3456', '0000-00-00', '123', 'Credit Card'),
(2, 'Helizando Neto ', 'program2', '9000.00', '2024-01-24', 'mdg ', 'nnnnnnnnnnn', '0000-00-00', '77', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_history`
--

CREATE TABLE `payment_history` (
  `payment_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_expiry_date` varchar(7) NOT NULL,
  `card_cvv` varchar(3) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment_history`
--

INSERT INTO `payment_history` (`payment_id`, `user_name`, `amount`, `cardholder_name`, `card_number`, `card_expiry_date`, `card_cvv`, `payment_date`) VALUES
(1, '', '9000.00', 'mdg ', '6666666', '55/99', '88', '2024-01-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_price`, `product_description`) VALUES
(1, 't-shirt', 'assets/landing-page.png', '50.00', 'hbbbbm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `class_program` varchar(200) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_phone` varchar(20) DEFAULT NULL,
  `student_password` varchar(20) DEFAULT NULL,
  `student_address` text DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registration`
--

INSERT INTO `registration` (`user_id`, `class_program`, `registration_date`, `student_name`, `student_email`, `student_phone`, `student_password`, `student_address`, `emergency_contact_name`, `emergency_contact_phone`) VALUES
(1, NULL, NULL, 'Neto', NULL, NULL, '12345678', NULL, NULL, NULL),
(2, '', '2024-01-17', 'Helizando Neto ', 'neto@gmail.com', '0816956542', '$2y$10$4ezmPFN.EpqSV', 'Robert Mugabe', 'Gildo  Invua', '08197789'),
(3, 'Muathay Adult', '2024-01-17', 'Helizando Neto ', 'neto@gmail.com', '0816956542', '$2y$10$OjcsN1JfoVaL3', 'Robert Mugabe', 'Gildo  Invua', '08197789'),
(4, '', '2024-01-17', 'Helizando Neto ', 'neto@gmail.com', '0816956542', '$2y$10$l.856mXV.xOvk', 'Robert Mugabe', 'Gildo  Invua', '08197789'),
(5, '', '2024-01-17', 'Helizando Neto ', 'neto@gmail.com', '0816956542', '$2y$10$afwvwgbfGE.iw', 'Robert Mugabe', 'Gildo  Invua', '08197789'),
(6, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$Mrbo5E1Kqrj5g', 'Robert Mugabe', '', '08197789'),
(7, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$cKVH9CMYMZdJk', 'Robert Mugabe', '', '08197789'),
(8, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$sj5wcDMMV7Sjk', 'Robert Mugabe', '', '08197789'),
(9, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$1UqZBoFgLJSAm', 'Robert Mugabe', '', '08197789'),
(10, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$gtmtt3//pzpX3', 'Robert Mugabe', '', '08197789'),
(11, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$ujcVAIzFsOQtc', 'Robert Mugabe', '', '08197789'),
(12, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$Xx9JlBBO4QBfy', 'Robert Mugabe', '', '08197789'),
(13, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$/orpdKc6WYEUh', 'Robert Mugabe', '', '08197789'),
(14, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$EmLFO46i2Oxxr', 'Robert Mugabe', '', '08197789'),
(15, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$BFG4NvH3ANZiZ', 'Robert Mugabe', '', '08197789'),
(16, '', '2024-01-26', 'nnn', 'nnnnn@gmail.com', '9999999999999', '$2y$10$sAzewyh5ny29h', 'nnnnnnnnn', '', 'nnnnnnnnnn'),
(17, '', '2024-01-26', 'nnn', 'nnnnn@gmail.com', '9999999999999', '$2y$10$wyblxdXJNc30g', 'nnnnnnnnn', '', 'nnnnnnnnnn'),
(18, '', '2024-01-26', 'nnn', 'nnnnn@gmail.com', '9999999999999', '$2y$10$VjNr881eBTcaT', 'nnnnnnnnn', '', 'nnnnnnnnnn'),
(19, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$s33Vxta5ITKJO', 'Robert Mugabe', '', '08197789'),
(20, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$n4n3KWWRbVYtQ', 'Robert Mugabe', '', '08197789'),
(21, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$RL62rhcQIAjUy', 'Robert Mugabe', '', '08197789'),
(22, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$WO0.jvA2LX9ZR', 'Robert Mugabe', '', '08197789'),
(23, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$RKSeC0l831VMF', 'Robert Mugabe', '', '08197789'),
(24, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$gsvRhsonQ1K/C', 'Robert Mugabe', '', '08197789'),
(25, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$ND7i55ymP.u2o', 'Robert Mugabe', '', '08197789'),
(26, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$FLKWXX1lWYpgA', 'Robert Mugabe', '', '08197789'),
(27, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$znGOHSRC/x9Z0', 'Robert Mugabe', '', '08197789'),
(28, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$Z36x/w4tXE2aR', 'Robert Mugabe', '', '08197789'),
(29, '', '2024-01-27', 'Helizando Neto ', 'mtomas@gmail.com', '0816956542', '$2y$10$Rz/uKrAKJkyCZ', 'Robert Mugabe', '', '08197789'),
(30, '', '2024-01-27', 'nn', 'nnnnng@mmm.com', '+264857797753', '$2y$10$0jZA4Jr6BFxy/', 'Robert Mugabe', '', 'mmmmmmmmmmm'),
(31, '', '2024-01-27', 'Helizando Neto ', 'Muathay@gmail.com', '0816956542', '$2y$10$8iJePI3r/H5i0', 'Robert Mugabe', '', '08197789'),
(32, '', '2024-01-27', 'Helizando Neto ', 'Muathay@gmail.com', '0816956542', '$2y$10$UnICVK1eWtOvD', 'Robert Mugabe', '', '08197789'),
(33, '', '2024-01-27', 'Helizando Neto ', 'Muathay@gmail.com', '0816956542', '$2y$10$lW8.K92LHpyzh', 'Robert Mugabe', '', '08197789'),
(34, '', '2024-01-27', 'Helizando Neto ', 'Muathay@gmail.com', '0816956542', '$2y$10$b4Oe03VJsJpXX', 'Robert Mugabe', NULL, '08197789'),
(35, 'program2', '2024-01-27', 'Helizando Neto ', 'Muathay@gmail.com', '0816956542', '$2y$10$88vKwDZULI6tb', 'Robert Mugabe', NULL, '08197789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `product_name` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `card_expiry_date` date DEFAULT NULL,
  `card_cvv` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classprogram`
--
ALTER TABLE `classprogram`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `link_video_previous_class`
--
ALTER TABLE `link_video_previous_class`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `live_link`
--
ALTER TABLE `live_link`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paymenthistoryclasses`
--
ALTER TABLE `paymenthistoryclasses`
  ADD PRIMARY KEY (`payment_id`);

--
-- Índices para tabela `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices para tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `live_link`
--
ALTER TABLE `live_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `paymenthistoryclasses`
--
ALTER TABLE `paymenthistoryclasses`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
