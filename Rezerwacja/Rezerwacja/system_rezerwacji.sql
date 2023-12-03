-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Paź 2022, 15:53
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `system_rezerwacji`
--

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Pklient` ()   BEGIN
SELECT * FROM klient;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Pobiekt` ()   BEGIN
SELECT * FROM obiekt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Pzajecia` ()   BEGIN
select * from zajecia;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Numer_tel` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Miasto` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Emial` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`Id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Numer_tel`, `Miasto`, `Emial`) VALUES
(1, 'Monka', 'Kopernik', 'Mateusz', 'Mońka', '790866588', 'Wrocław', 'monkamateusz@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id` int(11) UNSIGNED NOT NULL,
  `Login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Email`) VALUES
(1, 'Halina', 'Halina', 'Martyna', 'Mońka', 'martynaglab@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obiekt`
--

CREATE TABLE `obiekt` (
  `IdObiektu` int(11) NOT NULL,
  `Rodzaj obiektu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `Nazwa obiektu` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Adres obiektu` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `obiekt`
--

INSERT INTO `obiekt` (`IdObiektu`, `Rodzaj obiektu`, `Nazwa obiektu`, `Adres obiektu`) VALUES
(1, 'Orlik', 'Boisko szkolne', 'Plac Legionow 1'),
(2, 'Basen', 'Aquapark', 'Kolejowa 2/3'),
(3, 'Siłownia', 'CityFit', 'Kazimierza Wielkiego 45'),
(4, 'Hala_Sportowa', 'Balon', 'Ślężna 21'),
(5, 'Boisko_kosz', 'Sala_sportowa', 'Sportowa 2'),
(6, 'Hala_tenisowa', 'Balon', 'Ślężna 22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `płatność`
--

CREATE TABLE `płatność` (
  `id` int(11) NOT NULL,
  `Sposob płatności` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Miejsce płatności` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `płatność`
--

INSERT INTO `płatność` (`id`, `Sposob płatności`, `Miejsce płatności`) VALUES
(1, 'Karta kredytowa', 'Online'),
(2, 'Blik', 'Online'),
(3, 'Karta Kredytowa', 'Na miejscu'),
(4, 'Gotówka', 'Na miejscu'),
(5, 'Przelew ', 'Online');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id` int(11) NOT NULL,
  `Nr rezerwacji` int(50) NOT NULL,
  `Data rezerwacji` date NOT NULL,
  `Godzina rezerwacji` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `id` int(11) NOT NULL,
  `Nazwa sportu` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Rodzaj sportu` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Godzina zajec` datetime NOT NULL,
  `Czas trwania` time NOT NULL,
  `Obiekt` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`id`, `Nazwa sportu`, `Rodzaj sportu`, `Godzina zajec`, `Czas trwania`, `Obiekt`) VALUES
(1, 'Płaski brzuch', 'Fitness', '2022-06-01 17:00:00', '01:00:00', 'Siłownia'),
(2, 'Yoga', 'Fitness', '2022-06-01 18:00:00', '01:00:00', 'Siłownia'),
(3, 'Trening Obwodowy', 'Fitness', '2022-06-01 19:00:00', '01:00:00', 'Siłownia'),
(4, 'Piłka nożna', 'Zespołowy', '2022-06-01 16:00:00', '02:00:00', 'Orlik'),
(5, 'Tenis ziemny', '1 na 1 ', '2022-06-01 17:30:00', '01:30:00', 'Hala_tenisowa'),
(6, 'Koszykówka', 'Zespołowy', '2022-06-01 20:00:00', '02:30:00', 'Hala_sportowa'),
(7, 'Koszykówka', 'Zespołowy', '0000-00-00 00:00:00', '00:00:00', 'Boisko_kosz'),
(8, 'Piłka nożna', 'Zespołowy', '0000-00-00 00:00:00', '00:00:00', 'Hala_sportowa'),
(9, 'Spinning', 'Fitness', '0000-00-00 00:00:00', '00:00:00', 'Siłownia'),
(10, 'Trening całego ciała', 'Fitness', '0000-00-00 00:00:00', '00:00:00', 'Siłownia'),
(11, 'Siłownia', 'Fitness', '0000-00-00 00:00:00', '00:00:00', 'Siłownia');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Login` (`Login`,`Email`);

--
-- Indeksy dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  ADD PRIMARY KEY (`IdObiektu`);

--
-- Indeksy dla tabeli `płatność`
--
ALTER TABLE `płatność`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  MODIFY `IdObiektu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
