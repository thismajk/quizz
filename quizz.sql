-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Gru 2020, 07:19
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quizz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `quizz_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer`) VALUES
(1, 1, 'Jaki jest największy salomot na świecie', 'Antonov A-225', 'Boeing 787', 'Airbus A350', 'McDonnell Douglas DC-9', 1),
(2, 1, 'Na jakiej średniej wysokości przelotowej latają pasażerskie samoloty długodystansowe?', '5000 m', '8000 m', '10000 m', '16000 m', 3),
(3, 1, 'Jaka temperatura panuje na zewnątrz samolotu na wysokości 10 km, kiedy na ziemi jest ok. 15 stopni?', '0', 'minus 50', 'minus 25', 'minus 75', 2),
(4, 1, 'Jaki najcięższy ładunek może przewieźć Antonov A-250?\r\n', '100 ton', '180 ton', '450 ton', '250 ton', 4),
(5, 2, 'W jakim języku programowania tworzy się style strony', 'css', 'js', 'php', 'mysql', 1),
(6, 2, 'Jakim znakiem definiujemy id', '!', '.', '$', '#', 4),
(7, 2, 'technologia umożliwiająca asynchroniczne przesyłanie danych między stroną a serwerem to:', 'jQuery', 'AJAX', 'Sass', 'Bootstrap', 2),
(8, 2, 'Narzędzie do uruchamiania skrypt&oacute;w php na komputerze to:', 'NotePad++', 'Microsoft Virtual Studio code', 'xampp', 'phpmyadmin', 3),
(9, 2, 'w językach programowania for jest to', 'pętla', 'funkcja', 'zapytanie ', 'znacznik', 1),
(10, 2, 'html jest to', 'język zapytań', 'język znacznikowy', 'język skryptowy', 'język obiektowy', 2),
(11, 2, 'Jaka duża firma stoi za Reakt.js', 'IBM', 'Amazon', 'Google', 'Facebook', 4),
(12, 3, 'Jakiej firmy kamery zostały użyte do filmu tp. &quot;Avengers&quot;', 'RED', 'Sony', 'Canon', 'Go PRO', 1),
(13, 3, 'Jaki komponent komputera jest najbardziej obciążony podczas renderu filmu', 'Karta graficzna', 'Procesor', 'Ram', 'Dysk', 2),
(14, 3, 'Program do edycji film&oacute;w wyprodukowany przez firmę adobe to', 'Vegas Pro', 'Camtasia studio', 'PhotoShop', 'Premiere Pro', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `secretkey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `quizz`
--

INSERT INTO `quizz` (`id`, `title`, `author`, `secretkey`) VALUES
(1, 'Quizz o samolotach', 'Michał Gombos', 'Q2020120206440114'),
(2, 'Quizz o programowaniu', 'Michał Gombos', 'Q20201202064631505'),
(3, 'Quizz o nagrywaniu ', 'Michał Gombos', 'Q20201202071033817');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quizzscore`
--

CREATE TABLE `quizzscore` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `maxScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `quizzscore`
--

INSERT INTO `quizzscore` (`id`, `user`, `quizz_id`, `score`, `maxScore`) VALUES
(1, 'Michał Gombos', 1, 4, 4),
(2, 'Michał Gombos', 2, 4, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password_hash` varchar(96) COLLATE utf8_polish_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `is_activated`, `is_admin`) VALUES
(1, 'Michał Gombos', 'michal.gombos@icloud.com', '$2y$10$sSitDYlad7.BDCOZZu5J6.J93LcnnQH1OWDOz6aomlwwEWVkHWYY.', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `quizzscore`
--
ALTER TABLE `quizzscore`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `quizzscore`
--
ALTER TABLE `quizzscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
