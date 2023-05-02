CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('Guest','Operator') NOT NULL,
  `secret` varchar(255) NOT NULL DEFAULT '',
  `last_seen` datetime NOT NULL,
  `status` enum('Occupied','Waiting','Idle') NOT NULL DEFAULT 'Idle',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `email`, `password`, `full_name`, `role`, `secret`, `last_seen`, `status`) VALUES
(1, 'admin@gmail.com', '$2y$10$thE7hIJF/EJvKjmJy7hd5uH3a/BNgSUepkYoES0q80YEzi7VqWsRG', 'admin1', 'Operator', '', '2023-04-03 02:03:01', 'Idle');
(2, 'john@gmail.com','','john123','Guest','','','Idle')

CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_sender_id` int(11) NOT NULL,
  `account_receiver_id` int(11) NOT NULL,
  `submit_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `submit_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;