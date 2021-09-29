-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 01:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `postId`, `userId`, `created_at`, `updated_at`) VALUES
(48, 'test mic', 38, 26, '2021/08/02 18:41:14', '2021/08/02 18:41:14'),
(49, '😀', 39, 26, '2021/08/02 19:13:28', '2021/08/02 19:13:28'),
(50, 'lohe', 39, 27, '2021/08/02 19:31:16', '2021/08/02 19:31:16'),
(51, 'hwllo po', 39, 27, '2021/08/05 20:53:53', '2021/08/05 20:53:53'),
(52, 'low', 39, 27, '2021/08/06 16:11:26', '2021/08/06 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `friendId` int(11) DEFAULT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `userReceiverId` int(11) DEFAULT NULL,
  `userSenderId` int(11) DEFAULT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `userReceiverId`, `userSenderId`, `created_at`) VALUES
(20, 28, 29, '2021/08/05 20:36:28'),
(22, 28, 27, '2021/08/05 21:08:06'),
(26, 27, 26, '2021/08/05 21:39:39'),
(27, 26, 29, '2021/08/06 09:35:52'),
(30, 29, 27, '2021/08/06 14:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `likers`
--

CREATE TABLE `likers` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `likerId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likers`
--

INSERT INTO `likers` (`id`, `postId`, `likerId`, `created_at`) VALUES
(329, 38, 27, '2021-08-02 11:27:55'),
(332, 38, 26, '2021-08-02 11:33:33'),
(333, 39, 26, '2021-08-02 11:34:47'),
(334, 39, 27, '2021-08-05 12:53:46'),
(335, 40, 27, '2021-08-06 08:11:48'),
(336, 41, 27, '2021-08-06 08:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `privacy` varchar(20) DEFAULT 'Public',
  `likes_count` int(11) NOT NULL DEFAULT 0,
  `comments_count` int(11) NOT NULL DEFAULT 0,
  `userId` int(11) DEFAULT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `caption`, `privacy`, `likes_count`, `comments_count`, `userId`, `created_at`, `updated_at`) VALUES
(38, 'hello', 'friends', 2, 1, 26, '2021/08/02 18:40:54', '2021/08/02 19:33:33'),
(39, 'hello 😀', 'public', 2, 4, 26, '2021/08/02 19:13:17', '2021/08/06 16:11:26'),
(40, 'test', 'public', 1, 0, 27, '2021/08/02 19:25:24', '2021/08/06 16:11:48'),
(41, 'hellooooooooooooooooo', 'public', 1, 0, 27, '2021/08/06 16:23:03', '2021/08/06 16:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `profile_pic_url` varchar(255) NOT NULL DEFAULT '''default_dp.png''',
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `profile_pic_url`, `created_at`, `updated_at`, `email`, `username`, `password`) VALUES
(26, 'Kristel', 'Paranas', '\'default_dp.png\'', '2021/08/02 18:40:33', '2021/08/02 18:40:33', 'tel@gmail.com', 'KristelParanas276', '$2y$10$3ufpJft/mtjikF6es7KDKe.yvQo3mAELiTyIUP7lMM.kNF8CYPZ0m'),
(27, 'Thea', 'Thea', '\'default_dp.png\'', '2021/08/02 19:24:56', '2021/08/02 19:24:56', 'thea@gmail.com', 'TheaThea984', '$2y$10$/adL5Xj/j1dCmM7qGEX33.AMld4hhosw.imXcQWX2g.tFKEUlMfsi'),
(28, 'chan', 'chan', '\'default_dp.png\'', '2021/08/02 22:17:15', '2021/08/02 22:17:15', 'chan@gmail.com', 'chanchan379', '$2y$10$FJVTZR9wLIKb452s9NfA3O71GJJlmuHk2LxI/IQCEr/zpsFtkHccG'),
(29, 'lorem', 'lorem', '\'default_dp.png\'', '2021/08/05 18:14:11', '2021/08/05 18:14:11', 'lorem@gmail.com', 'loremlorem44', '$2y$10$Rm3blwR8F.da5lQ108Aa1e9bnSNktWZE4dn8BT6Hkx5i/q5t.RVPu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `friendId` (`friendId`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userReceiverId` (`userReceiverId`),
  ADD KEY `userSenderId` (`userSenderId`);

--
-- Indexes for table `likers`
--
ALTER TABLE `likers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `likerId` (`likerId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `likers`
--
ALTER TABLE `likers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friendId`) REFERENCES `users` (`id`);

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`userReceiverId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`userSenderId`) REFERENCES `users` (`id`);

--
-- Constraints for table `likers`
--
ALTER TABLE `likers`
  ADD CONSTRAINT `likers_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likers_ibfk_2` FOREIGN KEY (`likerId`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
