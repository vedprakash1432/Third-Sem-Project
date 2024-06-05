-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Image` varchar(60) NOT NULL,
  `Number` bigint(10) NOT NULL,
  `Password` int(20) NOT NULL,
  `Bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Image`, `Number`, `Password`, `Bio`) VALUES
(1, 'vedprakash', 'vedprakashsharma2246@gmail.com', 'ved2.jpg', 2147483647, 143256, 'software engineer'),
(2, 'raj', 'vedprakashsharma2246@gmail.com', 'raj.png', 2147483647, 14325, 'fullstack developer');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Number` bigint(10) NOT NULL,
  `Destination_Name` varchar(50) NOT NULL,
  `Traveling_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Adult` int(2) NOT NULL,
  `Child` int(4) NOT NULL,
  `Playboy` int(3) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Name`, `Email`, `Number`, `Destination_Name`, `Traveling_date`, `Adult`, `Child`, `Playboy`, `Date`) VALUES
(1, 'vedprakash', 'vedprakashsharma2246@gmail.com', 7705063770, 'mumbai', '2024-02-09 18:30:00', 1, 0, 1, '2023-12-29 18:30:47'),
(2, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'mumbai', '2024-01-29 18:30:00', 1, 1, 0, '2023-12-29 18:35:00'),
(4, 'satyaprakash', 'rahuljaiswal273158@gmail.com', 888888223, 'mumbai', '2024-01-26 18:30:00', 1, 0, 0, '2024-01-03 05:32:26'),
(5, 'Akshay ', 'rahuljaiswal273158@gmail.com', 333333333, 'dubai', '2024-01-17 18:30:00', 1, 0, 0, '2024-01-03 05:37:21'),
(6, 'Akshay ', 'rahuljaiswal273158@gmail.com', 333333333, 'dubai', '2024-01-17 18:30:00', 1, 0, 0, '2024-01-03 05:39:49'),
(8, 'Akshay ', 'vedprakashsharma2246@gmail.com', 44443332232, 'mumbai', '2024-01-02 18:30:00', 1, 0, 0, '2024-01-03 05:42:46'),
(9, 'Akshay ', 'rahuljaiswal273158@gmail.com', 555555555555, 'gujrat', '2024-01-02 18:30:00', 1, 0, 0, '2024-01-03 05:46:08'),
(11, 'Raj kumar', 'vedprakashsharma2246@gmail.com', 3456785545, 'mumbai', '2024-01-16 18:30:00', 1, 0, 0, '2024-01-03 07:23:20'),
(12, 'ved', 'vedprakashsharma2246@gmail.com', 7705063770, 'dubai', '2024-03-20 18:30:00', 1, 1, 0, '2024-03-01 18:23:04'),
(14, 'Rakesh', 'vedprakashsharma2246@gmail.com', 7705063770, 'gujrat', '2024-06-27 18:30:00', 1, 1, 0, '2024-06-03 06:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Date_Time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Subject`, `Message`, `Date_Time`) VALUES
(1, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'aaaaaaaaaaaaaaaaa', '2023-12-14 05:58:03'),
(2, 'Raj', 'sharma', 'vedprakashsharma2246@gmail.com', 5555555, 'issues', 'jjjjjjjjjjjjjjjjjjjjj', '2023-12-14 06:20:53'),
(3, 'Raj', 'sharma', 'rahuljaiswal273158@gmail.com', 2122112212, 'issues', 'aaaaaaaaaaaaaaaa', '2023-12-14 06:21:36'),
(4, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'nnnnnnnnnnnnnn', '2023-12-15 08:46:23'),
(5, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'ggggggggggggggggg', '2023-12-16 05:59:06'),
(6, 'ramesh', 'sharma', 'rahuljaiswal273158@gmail.com', 500055444, 'about tour', 'ffffffffffffff', '2024-01-02 13:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Destination_type` varchar(30) NOT NULL,
  `Culture` text NOT NULL,
  `Tourism_Tips` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `Name`, `Image`, `Price`, `Destination_type`, `Culture`, `Tourism_Tips`, `Description`) VALUES
(4, 'Dubai', 'dubai1.webp', 59999, 'international', 'The UAE culture mainly revolves around the religion of Islam and traditional Arab culture. The influence of Islamic and Arab culture on its architecture, music, attire, cuisine, and lifestyle are very prominent as well.', '1 Dubai is a city of skyscrapers, ports, and beaches, where big business takes place \r\n 2 alongside sun-seeking tourism\r\nDubai is a city of skyscrapers, ports, and beaches, where big business takes place alongside sun-seeking tourism', 'The culture of Dubai, an emirate of the United Arab Emirates. Simultaneously, increasing globalization and the settling of various immigrant groups have transformed the city into a melting pot of different nationalities and have given rise to a cosmopolitan culture that is in sync with other global cities. The UAE culture mainly revolves around the religion of Islam and traditional Arab culture. The influence of Islamic and Arab culture on its architecture, music, attire, cuisine, and lifestyle are very prominent as well. Five times every day, Muslims are called to prayer from the minarets of mosques which are scattered around the country. Since 2006, the weekend has been Friday-Saturday'),
(9, 'Kutumminar', 'kutumminar1.jpg', 59999, 'domestic', 't can be compared to the 62-metre all-brick Minaret of Jam in Afghanistan, of c. 1190, which was constructed a decade or so before the probable start of the Delhi tower.[8] The surfaces of both are elaborately decorated with inscriptions and geometric patterns. Therom the main mosque where they exis', 't can be compared to the 62-metre all-brick Minaret of Jam in Afghanistan, of c. 1190, which was constructed a decade or so before the probable start of the Delhi tower.[8] The surfaces of both are elaborately decorated with inscriptions and geometric patterns. The Qutb Minar has a shaft that i', 't can be compared to the 62-metre all-brick Minaret of Jam in Afghanistan, of c. 1190, which was constructed a decade or so before the probable start of the Delhi tower.[8] The surfaces of both are elaborately decorated with inscriptions and geometric patterns. The Qutb Minar has a shaft that is fluted with \"superb stalactite bracketing under the balconies\" at the top of each stage.[9][10][11] In general, minarets were slow to be used in India and are often detached from the main mosque where they exis'),
(11, 'Dubai tower', 'dubai_tower3.jpeg', 99999, 'international', 'The Dubai Towers Dubai, like the rest of The Lagoons, was never built. The developer, Sama Dubai, was forcibly merged into Emaar Properties in 2009 following extensive legal troubles. The masterplan of the', 'The Dubai Towers Dubai, like the rest of The Lagoons, was never built. The developer, Sama Dubai, was forcibly merged into Emaar Properties in 2009 following extensive legal troubles. The masterplan of the', 'The Dubai Towers Dubai, like the rest of The Lagoons, was never built. The developer, Sama Dubai, was forcibly merged into Emaar Properties in 2009 following extensive legal troubles. The masterplan of the\r\nThe Dubai Towers Dubai, like the rest of The Lagoons, was never built. The developer, Sama Dubai, was forcibly merged into Emaar Properties in 2009 following extensive legal troubles. The masterplan of the'),
(12, 'Newzealand', 'newzealand1.avif', 59999, 'international', 'aledonia, Fiji, and Tonga. The country\'s varied topography and sharp mountain peaks, including the Southern Alps, owe much to ', 'New Zealand (Māori: Aotearoa [aɔˈtɛaɾɔa]) is an island country in the southwestern Pacific Ocean. It consists of two main nd its most populous city is Auckland.', 'New Zealand (Māori: Aotearoa [aɔˈtɛaɾɔa]) is an island country in the southwestern Pacific Ocean. It consists of two main landmasses—the North Island (Te Ika-a-Māui) and the South Island (Te Waipounamu)—and over 700 smaller islands. It is the sixth-largest island country by area and lies east of Australia across the Tasman Sea and south of the islands of New Caledonia, Fiji, and Tonga. The country\'s varied topography and sharp mountain peaks, including the Southern Alps, owe much to tectonic uplift and volcanic eruptions. New Zealand\'s capital city is Wellington, and its most populous city is Auckland.'),
(14, 'Australia', 'aust1.jpg', 9999, 'international', 'Australia, officially the Commonwealth of Australia,[15] is a sovereign country comprising the mainland of the Australian continent, the island of Tasmania, and numerous smaller islands.[b] Australia is the largest country by area in Oceania and the world\'s sixth-largest country. Australia is the oldest,[16] flattest,north, and mountain ranges in the south-east.', '[17] and driest inhabited continent,[18][19] with the least fertile soils.[20][21] It is a megadiverse country, and its size gives it a wide variety of landscapes and climates, with deserts in the centre, tropical rainforests in the north-east, tropical savannas in the north, and mountain ranges in the south-east.', 'Australia, officially the Commonwealth of Australia,[15] is a sovereign country comprising the mainland of the Australian continent, the island of Tasmania, and numerous smaller islands.[b] Australia is the largest country by area in Oceania and the world\'s sixth-largest country. Australia is the oldest,[16] flattest,[17] and driest inhabited continent,[18][19] with the least fertile soils.[20][21] It is a megadiverse country, and its size gives it a wide variety of landscapes and climates, with deserts in the centre, tropical rainforests in the north-east, tropical savannas in the north, and mountain ranges in the south-east.'),
(16, 'Dubai Matro', 'Dubai-Metro2.jpg', 69999, 'international', 'The Dubai Metro (Arabic: مترو دبي) is a rapid transit rail network in the city of Dubai, United Arab Emirates. It is currently operated by a consortium of the French company Keolis and Japanese company MHI', 'The Dubai Metro (Arabic: مترو دبي) is a rapid transit rail network in the city of Dubai, United Arab Emirates. It is currently operated by a consortium of the French company Keolis and Japanese company MHI', 'The first section of the Red Line, covering 10 stations, was ceremonially inaugurated at 9:09:09 pm on 9 September 2009, by Mohammed bin Rashid Al Maktoum, Ruler of Dubai,[6] with the line opening to the public at 6 am (UTC 04:00) on 10 September.[7] The Dubai Metro is the first urban train network in the Arabian Peninsula[8] and either the second in the Arab World (after the Cairo Metro) or the third (if the surface-level, limited-service Baghdad Metro is counted).'),
(17, 'Aagra', 'aga.jpg', 59999, 'domestic', 'With a population of roughly 1.6 million, Agra is the fourth-most populous city in Uttar Pradesh and twenty-third most populous city in India', 'With a population of roughly 1.6 million, Agra is the fourth-most populous city in Uttar Pradesh and twenty-third most populous city in India', 'Agra  Hindustani: is a city on the banks of the Yamuna river in the Indian state of Uttar Pradesh, about 230 kilometres (140 mi) south-east of the national capital Delhi and 330 km west of the state capital Lucknow. With a population of roughly 1.6 million, Agra is the fourth-most populous city in Uttar Pradesh and twenty-third most populous city in India.'),
(18, 'China', 'china1.avif', 89999, 'international', 'China,[h] officially the People\'s Republic of China (PRC),[i] is a country in East Asia. With a population exceeding 1.4 billion, it is the world\'s second-most populous country after India. China spans the equivalent of five time zones and borders fourteen countries by land.[j] With an area of nearly 9.6 million square kilometers (3,700,000 sq mi), it is the third-largest country by total land area.[k] The country is divided into', 'China,[h] officially the People\'s Republic of China (PRC),[i] is a country in East Asia. With a population exceeding 1.4 billion, it is the world\'s second-most populous country after India. China spans the equivand area.[k] The country is divided into', 'China is a nuclear-weapon state with the world\'s largest standing army by military personnel and the second-largest defense budget. It is a great power and a regional power. China is known for its cuisine, culture and has 57 UNESCO World Heritage Sites.China,[h] officially the People\'s Republic of China (PRC),[i] is a country in East Asia. With a population exceeding 1.4 billion, it is the world\'s second-most populous country after India. China spans the equivalent of five time zones and borders fourteen countries by land.[j] With an area of nearly 9.6 million square kilometers (3,700,000 sq mi), it is the third-largest country by total land area.[k] The country is divided into'),
(19, 'Maldives', 'maldeep.avif', 45000, 'domestic', 'On average, a Maldives trip cost from India can range from Rs. 1.5 lakh to Rs. 2.5 lakh per person for a seven-day trip. While travelling to this island paradise may seem expensive, a personal loan could help with access to the funds you need to cover the travel expenses.', '', 'Many travelers spend weeks poring over which private island resort is the best for them, but you don’t have to choose one. Beach bums can split their time between resorts. You’ll need to travel back to Male airport, where a representative from your next resort will meet you and transfer you there via seaplane or speedboat. If the resorts are close together, you can charter a speedboat from one resort to another.'),
(20, 'Gorakhpur', 'gkp_temple1.avif', 12000, 'domestic', 'The Kaharwa is sung at Diwali and the Phaag is sung during Holi. Singing and dancing is also part of the daily culture of the people of Gorakhpur, who, after a long day\'s work, use this as a means of relaxing and unwinding.', '1.Admire the Street Art\r\n2.Admire the Street Art\r\n3.Admire the Street Art', 'Gorgeous murals are a surprise attraction at Gorakhpur. A local jewelry brand recently invited the team at Delhi Street Art to beautify the walls of the city with art conveying cultural and social messages under a \"Wall of Change\" initiative. The themes include cleanliness and hygiene, women\'s safety, water conservation, recycling, and yoga. You\'ll find most of the art around Police Line, and Collectorate on Kachari Road, about 10 minutes south of the railway station.'),
(22, 'Manali', 'manali.avif', 20000, 'domestic', 'The main culture that you can come across in Manali is Himachali culture. Apart from Himachali culture, one can also experience the essence of Israeli and Italian culture in Manali. Manali represents Himachal Pradesh and its culture in an embracive manner.', 'The main culture that you can come across in Manali is Himachali culture. Apart from Himachali culture, one can also experience the essence of Israeli and Italian culture in Manali. Manali represents Himachal Pradesh and its culture i', 'The main culture that you can come across in Manali is Himachali culture. Apart from Himachali culture, one can also experience the essence of Israeli and Italian culture in Manali. Manali represents Himachal Pradesh and its culture in an embracive manner.\r\nThe main culture that you can come across in Manali is Himachali culture. Apart from Himachali culture, one can also experience the essence of Israeli and Italian culture in Manali. Manali represents Himachal Pradesh and its culture in an embracive manner.');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Holiday_Type` varchar(30) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `Name`, `Email`, `Contact`, `Holiday_Type`, `Destination`, `Date_Time`) VALUES
(1, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'domestic', 'dubai', '2023-12-16 07:07:44'),
(3, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'international', 'Mumbai', '2023-12-29 16:35:09'),
(4, 'Akshay ', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', 'usa', '2024-05-24 06:34:18'),
(5, 'Raj kumar', 'rahuljaiswal273158@gmail.com', 2147483647, 'international', 'dubai', '2024-05-24 06:35:59'),
(6, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'domestic', '0', '2024-05-26 09:47:23'),
(7, 'ved', 'vedprakashsharma2246@gmail.com', 2147483647, 'domestic', '0', '2024-05-26 09:49:49'),
(8, 'Vijay', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', '0', '2024-05-26 09:55:54'),
(9, 'Vijay', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', '0', '2024-05-26 09:58:04'),
(10, 'Raj kumar', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', '0', '2024-05-26 10:01:40'),
(14, 'rahul', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', '0', '2024-06-03 05:03:54'),
(16, 'Ganesh', 'rahuljaiswal273158@gmail.com', 2147483647, 'domestic', 'China', '2024-06-03 05:08:01'),
(17, 'rajesh', 'vedprakashsharma2246@gmail.com', 2147483647, 'domestic', 'Australia', '2024-06-03 06:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(3) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Image` varchar(60) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Title`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Image`, `Address`, `Password`) VALUES
(12, 'Mr', 'vedprakash', 'sharma', 'vedprakashsharma2246@gmail.com', 7705063770, 'ved2.jpg', 'Gorakhpur', '14325'),
(17, 'Mr', 'Ramesh', 'Jaiswal', 'vedprakashsharma2246@gmail.com', 7705063770, '1669942418643.jpg', 'gorakhpur', '123456789'),
(18, 'Mr', 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 7705063770, 'gallary_2.webp', 'delhi', '123456'),
(19, 'Mr', 'chadani', '', 'vedprakashsharma2246@gmail.com', 0, '20230426_153315_017.jpg', 'gkp', '123456'),
(21, 'Mr', 'kajal', 'devi', 'rahuljaiswal273158@gmail.com', 7705063770, '1669942418993.jpg', 'delhi', '123456'),
(22, 'Mrs', 'neesha', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, '20230426_153315_017.jpg', 'gkp', '123456'),
(24, 'Mr', 'nanshi', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, '20230426_153315_017.jpg', 'ddfd', '123456'),
(25, 'Mr', 'siya', 'sharma', 'rahuljaiswal273158@gmail.com', 7705063770, '20230426_153315_017.jpg', 'dsdsad', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
