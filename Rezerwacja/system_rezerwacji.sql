-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Gru 2022, 08:27
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klienta` int(11) NOT NULL,
  `Login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obiekt`
--

CREATE TABLE `obiekt` (
  `IdObiekt` int(11) NOT NULL,
  `Rodzaj obiektu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `Nazwa obiektu` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Adres obiektu` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `obiekt`
--

INSERT INTO `obiekt` (`IdObiekt`, `Rodzaj obiektu`, `Nazwa obiektu`, `Adres obiektu`) VALUES
(1, 'Orlik', 'Boisko szkolne', 'Plac Legionow 1'),
(3, 'Siłownia', 'CityFit', 'Kazimierza Wielkiego 45'),
(4, 'Hala_Sportowa', 'Balon', 'Ślężna 21'),
(5, 'Boisko_kosz', 'Sala_sportowa', 'Sportowa 2'),
(6, 'Kort 1', 'Balon', 'Ślężna 22'),
(7, 'Kort 2', 'Balon', 'Ślężna 22'),
(8, 'Kort 3', 'Balon', 'Ślężna 22'),
(9, 'Boisko_kosz 2', 'Sala_sportowa', 'Sportowa 2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_zajec` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynajmujacy`
--

CREATE TABLE `wynajmujacy` (
  `id` int(11) NOT NULL,
  `Imie` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Nazwisko` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `id_zajec` int(11) NOT NULL,
  `Nazwa` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `Czas_trwania` time NOT NULL,
  `IdObiekt` int(11) NOT NULL,
  `Cena` float NOT NULL,
  `Dostepne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`id_zajec`, `Nazwa`, `Czas_trwania`, `IdObiekt`, `Cena`, `Dostepne`) VALUES
(1, 'Piłka Nożna', '01:00:00', 1, 150, 1),
(2, 'Piłka Nożna', '01:00:00', 4, 150, 1),
(3, 'Koszykówka', '01:00:00', 9, 100, 1),
(4, 'Koszykówka', '01:00:00', 4, 100, 1),
(5, 'Tenis ziemny', '01:00:00', 7, 50, 1),
(6, 'Tenis ziemny', '01:00:00', 6, 50, 1),
(7, 'Tenis ziemny', '01:00:00', 8, 50, 1),
(8, 'Yoga', '01:00:00', 3, 30, 1),
(9, 'Trening obwodowy', '01:00:00', 3, 40, 1),
(10, 'Spinning', '01:00:00', 3, 25, 1),
(11, 'Trening całego ciała', '01:00:00', 3, 35, 1),
(12, 'Siłownia', '01:00:00', 3, 40, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  ADD PRIMARY KEY (`IdObiekt`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zajec` (`id_zajec`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `wynajmujacy`
--
ALTER TABLE `wynajmujacy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`id_zajec`),
  ADD KEY `IdObiekt` (`IdObiekt`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  MODIFY `IdObiekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wynajmujacy`
--
ALTER TABLE `wynajmujacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `id_zajec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`id_zajec`) REFERENCES `zajecia` (`id_zajec`),
  ADD CONSTRAINT `rezerwacja_ibfk_3` FOREIGN KEY (`id_klienta`) REFERENCES `wynajmujacy` (`id`);

--
-- Ograniczenia dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD CONSTRAINT `zajecia_ibfk_1` FOREIGN KEY (`IdObiekt`) REFERENCES `obiekt` (`IdObiekt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
