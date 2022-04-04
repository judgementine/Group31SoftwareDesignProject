
-- Host: localhost:8889


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `gallons_requested` varchar(255) DEFAULT NULL,
  `suggested_price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `user_id`, `delivery_date`, `gallons_requested`, `suggested_price`, `total_price`) VALUES
(1, 2, '2022-04-22', '45', 2, 2),
(2, 2, '2022-04-27', '12', 2, 2),
(3, 2, '2022-04-13', '46', 1.82, 1.82),
(4, 2, '2022-04-14', '4', 1.82, 1.82),
(5, 2, '2022-04-14', '4', 1.82, 7.28),
(6, 2, '2022-04-23', '50', 1.82, 91);


-- Table structure for table `users`

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `add1` varchar(255) DEFAULT NULL,
  `add2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `psw`, `fname`, `add1`, `add2`, `city`, `state`, `zipcode`) VALUES
(1, 'joe', '8ff32489f92f33416694be8fdc2d4c22', 'Joseph Evergreen', 'Add 1 test', 'Add 2 test', 'Montgommery', 'IN', '76672'),
(2, 'yousef', '202cb962ac59075b964b07152d234b70', 'yousef ahmed', '123 address', '321 address', 'london', 'TX', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
