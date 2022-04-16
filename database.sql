-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
);


--
-- Table structure for table `pwdReset`
--

create table pwdReset (
  id int not null primary key,
  email varchar(255) not null,
  token text not null,
  expire text not null
);