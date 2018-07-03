-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 02:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP PDO'),
(2, 'Javascript'),
(3, 'Java'),
(4, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(7, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-23', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 3),
(8, 1, 'PHP CMS', 'sourish', '', '2018-06-23', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 1),
(9, 1, 'PHP CMS', 'sourish', '', '2018-06-23', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(10, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-23', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0),
(11, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-23', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0),
(12, 1, 'PHP CMS', 'sourish', '', '2018-06-23', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(13, 1, 'PHP CMS', 'sourish', '', '2018-06-23', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(14, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-23', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 1),
(15, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-24', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0),
(16, 1, 'PHP CMS', 'sourish', '', '2018-06-24', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(17, 1, 'PHP CMS', 'sourish', '', '2018-06-24', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(18, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-24', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0),
(19, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-24', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0),
(20, 1, 'PHP CMS', 'sourish', '', '2018-06-24', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(21, 1, 'PHP CMS', 'sourish', '', '2018-06-24', 'php.png', '<p>PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, but also used as a general-purpose programming language.</p>', 'php, sourish, cms', 0, 'published', 0),
(22, 1, 'JS Shopping Cart', 'sunny', '', '2018-06-24', 'javascript-900x300.jpg', '<p>JavaScript, often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.</p>', 'niraj, js, javascript, shopping, cart', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'sunny', '123', 'sourish', 'kumar', 'sourish@gmail.com', '', 'subscriber', ''),
(2, 'niraj', '$2y$10$6cq/rv4rRufvhe1ixu5WqOy/VOh5Ufcf2iItGtW/R4o5WKCMhzsxe', 'Niraj', 'Kishore', 'niraj@gmail.com1', '', 'subscriber', ''),
(3, 'sourish', '$2y$10$XLjKZ8nyRb7277775xhEge0Re7tkM430hzBW6wOKkPzixt6pGshc6', 'sourish', 'kumar', 'sourish@mail.com', '', 'subscriber', ''),
(4, 'hello', '$2y$10$8D9BYNdWx2Dlr9axdnKHhuPFfMJrpVNEim.oqSreFDmQDSOOCwN2e', 'hello', 'hello', 'hello@gmail.com', '', 'subscriber', ''),
(5, 'hello1', '$2y$12$D7EMBcngzn.P34Yj.tuCdOaT9XILV9rwmiyUZTVamxOEhgG2QgIei', '', '', 'somebody@mail.com', '', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'n3iumj30moumjtdb9s171dbqa0', 1529841134),
(2, 'p4890ogv3vo2uedc19er9l5ad4', 1529840492),
(3, '2vguu2u2tiqe3gio9joojc4h80', 1529841584);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
