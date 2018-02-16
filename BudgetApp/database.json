-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 16 Lut 2018, 17:45
-- Wersja serwera: 5.6.37
-- Wersja PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `budgetapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `income_stream`
--

CREATE TABLE IF NOT EXISTS `income_stream` (
  `id` int(11) NOT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D3A8DA636ABA6B8` (`budget_id`);

--
-- Indexes for table `income_stream`
--
ALTER TABLE `income_stream`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F3AC82B36ABA6B8` (`budget_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `income_stream`
--
ALTER TABLE `income_stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `FK_2D3A8DA636ABA6B8` FOREIGN KEY (`budget_id`) REFERENCES `budget` (`id`);

--
-- Ograniczenia dla tabeli `income_stream`
--
ALTER TABLE `income_stream`
  ADD CONSTRAINT `FK_F3AC82B36ABA6B8` FOREIGN KEY (`budget_id`) REFERENCES `budget` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
