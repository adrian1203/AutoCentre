-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2018, 14:23
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `car`
--

CREATE TABLE `car` (
  `idcar` int(11) NOT NULL,
  `brand` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `model` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `year` year(4) NOT NULL,
  `number` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `idcustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `car`
--

INSERT INTO `car` (`idcar`, `brand`, `model`, `year`, `number`, `idcustomer`) VALUES
(1, 'Ford', 'Mondeo', 2012, 'KT3698', 2),
(2, 'Citroen', 'C5', 2013, 'KR56G7', 2),
(3, 'BMW', 'X5', 2003, 'RRS25KL', 3),
(4, 'BMW', 'M3', 2003, 'KT9635', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cod` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `street` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`idcustomer`, `login`, `password`, `email`, `name`, `surname`, `city`, `cod`, `street`) VALUES
(2, 'jakubpowolny', '$2y$10$SqVUAmuCc7EXZ2vBT.Tpeu/UArRbANx4SfYSnIEdoWYK.TenpMemO', 'wolny1@szybki.pl', 'Jakub', 'Wolny', 'KrakÃ³w', '35-369', 'Ceglarska 23/64'),
(3, 'dawid1997', '$2y$10$O7QxEXfebXpO5xkOqCTUTeMO7OOqJf3h1NqrSEskTOi7Sp9wEG4sK', 'dawid.dudziak@wp.pl', 'Dawid', 'Dudziak', 'SÄ™dziszÃ³w MÅ‚p', '25-369', 'GÅ‚Ã³wna 23/6'),
(4, 'adrian97', '$2y$10$.6kI7M59mPnJw9X5W/4dQuY1VKvOAarZQWfFM52xTVsahA97QXt4a', 'email@inetria.pl', 'Adrian', 'Opiela', 'KrakÃ³w', '36-963', 'Ceglarska 53/64');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fix`
--

CREATE TABLE `fix` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `what` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcar` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `fix`
--

INSERT INTO `fix` (`id`, `date`, `what`, `idcustomer`, `iduser`, `idcar`, `description`, `price`) VALUES
(1, '2018-01-10', 'Problem ze sprzÄ™gÅ‚em', 2, 13, 2, 'Naprawa sprzÄ™gÅ‚a i skrzyni bigÃ³w', 1256),
(2, '2018-01-10', 'ÅšwiatÅ‚a', 2, 15, 1, 'Jeszcze nie naprawiono', 0),
(3, '2018-01-10', 'Hamulce', 3, 15, 3, 'Wymiana tarcz hamulcowych', 200),
(4, '2018-01-13', 'GÅ‚owica silnika', 4, 16, 4, 'Jeszcze nie naprawiono', 0),
(5, '2018-01-13', 'Wycieraczki', 2, 16, 2, 'Wymiana czÄ™Å›ci', 369);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `idmessage` int(11) NOT NULL,
  `from` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`idmessage`, `from`, `text`) VALUES
(1, 'Waldek', 'CzeÅ›Ä‡'),
(2, 'Waldek', 'Co robisz?'),
(3, 'Artur', 'Nic nie robie'),
(4, 'Artur', 'Max wiadomoÅ›ci to 10'),
(5, 'Dawid', 'a to fajnie xd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cod` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `street` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`iduser`, `login`, `password`, `email`, `name`, `surname`, `city`, `cod`, `street`) VALUES
(11, 'admin', '$2y$10$eAFZIkHP6ruxOwnyvxLyHuz3aDV6D8gFkKNhca3rqGdgAcMOBUlD6', 'admin@admi', 'Administraor', 'Administrator', 'brakdanych', 'brakdanych', 'brakdanych'),
(13, 'arturgora', '$2y$10$qR2W1JD6/rbJOKKrB8Z2meZPxmax3uEwCXlyRBaJ9VHAbbLjs994q', 'artur@gora.onet', 'Artur', 'GÃ³ra', 'Warszawa', '01-369', 'Konstruktorska 4'),
(15, 'waldek90', '$2y$10$xy4WI9tIrNSZsKHsXTDeaO7QcG42sNaZx6hkDd7jkNZgJW..P6tra', 'waldek@gmail.com', 'Waldek', 'Nowak', 'RzeszÃ³w', '39-125', '8 marca 6'),
(16, 'dawid55', '$2y$10$usISdrkQQG6F8zbI9PJn.u6sSq6kYQhyGMRlHKgXwB9piCStxOI0q', 'dawid.bury@wp.pl', 'Dawid', 'Bury', 'SÄ™dziszÃ³w MaÅ‚opolski', '39-369', 'Handlowa 36');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `fix`
--
ALTER TABLE `fix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `fix`
--
ALTER TABLE `fix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
