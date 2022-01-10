-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2022, 20:24
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `novaxs_cars`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `nr_rejestracyjny` text COLLATE utf8mb4_polish_ci NOT NULL,
  `marka` text COLLATE utf8mb4_polish_ci NOT NULL,
  `model` text COLLATE utf8mb4_polish_ci NOT NULL,
  `przebieg` bigint(20) NOT NULL,
  `stan` text COLLATE utf8mb4_polish_ci NOT NULL,
  `rodzaj` text COLLATE utf8mb4_polish_ci NOT NULL,
  `uszkodzenia` text COLLATE utf8mb4_polish_ci NOT NULL,
  `ilosc_miejsc` int(11) NOT NULL,
  `zdjecie` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`nr_rejestracyjny`, `marka`, `model`, `przebieg`, `stan`, `rodzaj`, `uszkodzenia`, `ilosc_miejsc`, `zdjecie`) VALUES
('PO6642E', 'Skoda', 'Octavia', 21000, 'zarezerwowane', 'osobowe', 'brak', 5, 'images/cars/PO6642E.jpg'),
('PO6643E', 'Skoda', 'Fabia', 250000, 'dostępny', 'osobowe', 'bark', 5, 'images/cars/PO6643E.jpg'),
('PO6645E', 'Lamborgini', 'Gallardo', 2000, 'dostępny', 'specjalne', 'brak', 2, 'images/cars/PO6645E.jpg'),
('PO6646E', 'Porshe', '911', 2000, 'dostępny', 'specjalne', 'brak', 2, 'images/cars/PO6646E.jpg'),
('PO6647E', 'Fiat', 'Ducato', 20000, 'dostępny', 'dostawcze', 'brak', 3, 'images/cars/PO6647E.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `najmy/rezerwacje`
--

CREATE TABLE `najmy/rezerwacje` (
  `id` int(11) NOT NULL,
  `nr_rejestracyjny` text COLLATE utf8mb4_polish_ci NOT NULL,
  `e-mail` text COLLATE utf8mb4_polish_ci NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `rodzaj` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `najmy/rezerwacje`
--

INSERT INTO `najmy/rezerwacje` (`id`, `nr_rejestracyjny`, `e-mail`, `od`, `do`, `rodzaj`) VALUES
(18, 'PO6642E', 'adam@adam.pl', '2021-12-29', '2022-01-27', 'zarezerwowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `najmy/rezerwacje_stare`
--

CREATE TABLE `najmy/rezerwacje_stare` (
  `id` int(11) NOT NULL,
  `nr_rejestracyjny` text COLLATE utf8mb4_polish_ci NOT NULL,
  `e-mail` text COLLATE utf8mb4_polish_ci NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `rodzaj` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `najmy/rezerwacje_stare`
--

INSERT INTO `najmy/rezerwacje_stare` (`id`, `nr_rejestracyjny`, `e-mail`, `od`, `do`, `rodzaj`) VALUES
(11, 'PO6642E', 'jan@jan.pl', '2022-01-04', '2022-01-07', 'wynajęte'),
(12, 'PO6642E', 'jan@jan.pl', '2022-01-04', '2022-01-14', 'wynajęte'),
(13, 'PO6642E', 'jan@jan.pl', '2022-01-04', '2022-01-06', 'wynajęte'),
(14, 'PO6643E', 'jan@jan.pl', '0000-00-00', '2022-01-13', 'zarezerwowane'),
(15, 'PO6642E', 'adam@adam.pl', '2022-01-12', '2022-01-14', 'zarezerwowane'),
(16, 'PO6642E', 'adam@adam.pl', '2022-01-12', '2022-01-13', 'zarezerwowane'),
(17, 'PO6643E', 'adam@adam.pl', '2022-01-12', '2022-01-12', 'zarezerwowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `type_of_cars`
--

CREATE TABLE `type_of_cars` (
  `rodzaj` text COLLATE utf8mb4_polish_ci NOT NULL,
  `cena za dzień` int(11) NOT NULL,
  `cena za kilometr` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `type_of_cars`
--

INSERT INTO `type_of_cars` (`rodzaj`, `cena za dzień`, `cena za kilometr`) VALUES
('dostawcze', 150, 0.8),
('laweta', 150, 1),
('osobowe', 100, 0.8),
('specjalne', 200, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`email`, `imie`, `haslo`) VALUES
('ada@ada.pl', 'ada', 'ada'),
('adam@adam.pl', 'Ada', 'a'),
('admin@admin.pl', 'admin', 'admin'),
('jan@jan.pl', '12345678', '12345678');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`nr_rejestracyjny`(7));

--
-- Indeksy dla tabeli `najmy/rezerwacje`
--
ALTER TABLE `najmy/rezerwacje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `najmy/rezerwacje_stare`
--
ALTER TABLE `najmy/rezerwacje_stare`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `type_of_cars`
--
ALTER TABLE `type_of_cars`
  ADD PRIMARY KEY (`rodzaj`(10));

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`(20));

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `najmy/rezerwacje`
--
ALTER TABLE `najmy/rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `najmy/rezerwacje_stare`
--
ALTER TABLE `najmy/rezerwacje_stare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
