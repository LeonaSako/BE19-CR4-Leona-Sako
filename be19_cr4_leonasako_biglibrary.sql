-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jul 2023 um 11:43
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be19_cr4_leonasako_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `type` enum('book','CD','DVD') DEFAULT NULL,
  `author_first_name` varchar(100) NOT NULL,
  `author_last_name` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `library`
--

INSERT INTO `library` (`id`, `title`, `image`, `ISBN`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES
(3, 'The Lord of the Rings: The Fellowship of the Ring liehwe', '64ba98cae487e.jpg', '9780618640157', ' The first volume of J.R.R. Tolkiens epic fantasy series.lwkejflwkjflw', 'book', 'John Ronald', 'Tolkien', 'Houghton Mifflin', ' Boston, MA, USA', '1954-07-29'),
(6, 'Inception ', 'bridge.webp', '883929188847', ' A mind-bending science fiction film ', 'DVD', 'Christoper', 'Nolan', 'Warner Bros. Pictures', 'Burbank, CA, USA', '2010-07-16'),
(8, 'Thriller hkhmh', 'michael.webp', '886972445221', 'The best-selling album by Michael Jackson. kjhkjh', 'CD', 'Michael', 'Jackson', 'Epic Records', 'New York, NY, USA', '1982-11-30'),
(11, 'The Da Vinci Code', 'code.jpg', '9780385504201', 'A mystery novel by Dan Brown that explores religious themes.', 'book', 'Dan', 'Brown', 'Doubleday', 'New York, NY, USA', '2003-03-18'),
(12, 'Pride and Prejudice', 'jane.jpg', '9780141439518', 'A classic novel by Jane Austen about love and social manners.', 'book', 'Jane', 'Austen', 'Penguin Classics', ' London, UK', '1813-01-28'),
(32, 'The Great Gatsby', '64bba02eb7645.webp', '9780743273565', 'The story of the mysteriously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan.', 'book', 'F. Scott', 'Fitzgerald', 'Penguin Books', '123 Main Street, New York', '2022-05-15'),
(33, 'The Shawshank Redemption', '64bba3613cdb1.jpg', '9780451169532', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'DVD', 'Stephen', 'King', 'Warner Bros. Pictures', '456 Hollywood Blvd, Los Angeles', '2023-02-28'),
(34, 'To Kill a Mockingbird', 'mockingbird.jpg', '9780061120084', 'Scout Finch and her brother Jem explore the irrationality of adult attitudes toward race and class in the Deep South.', 'book', 'Harper', 'Lee', 'HarperCollins Publishers', '789 Book Avenue, Chicago', '2021-11-10'),
(35, 'Inception', '64bba0bca975d.webp', '9781416550417', 'A thief who enters the dreams of others to steal their secrets finds himself in a complex, dangerous mission.', 'DVD', 'Christopher', 'Nolan', 'Warner Bros. Pictures', '456 Hollywood Blvd, Los Angeles', '2022-09-20'),
(36, '1984', '64bba0f07ad10.webp', '9780451524935', 'In a totalitarian future society, a man whose daily work is rewriting history tries to rebel by falling in love.', 'book', 'George', 'Orwell', 'Penguin Classics', '123 Main Street, London', '2020-07-05'),
(37, 'The Godfather', '64bba11c96b87.webp', '9780451205766', 'The aging patriarch of an organized crime dynasty transfers control to his reluctant son.', 'DVD', 'Mario', 'Puzo', 'Paramount Pictures', '789 Movie Lane, New York', '2023-06-12'),
(38, 'Harry Potter and the Sorcerers Stone', '64bba2bd6b6c6.jpg', '9780590353427', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself and his family.', 'book', 'J.K.', 'Rowling', 'Scholastic Inc.', '456 Magic Avenue, London', '2023-03-07'),
(40, 'Pride and Prejudice', '64bba1fa357cb.jpg', '9780486284736', 'The story of the lively Elizabeth Bennet and the snobbish Mr. Darcy.', 'book', 'Jane', 'Austen', 'Dover Publications', '123 Classic Avenue, Bath', '2021-09-22'),
(41, 'The Dark Knight', '64bba2301b813.jpg', '9781401216672', 'Batman sets out to dismantle the remaining criminal organizations that plague Gotham.', 'DVD', 'Christopher', 'Nolan', 'Warner Bros. Pictures', '456 Hollywood Blvd, Los Angeles', '2023-12-01');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
