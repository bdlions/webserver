SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `webserver_db`
--

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Super Administrator'),
(2, 'admin', 'Administrator'),
(3, 'agent', 'Agent'),
(4, 'subagent', 'Subagent');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `account_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;   
INSERT INTO `account_status` (`id`, `title`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Suspended'),
(4, 'Deactivated'),
(5, 'Blocked');
-- -----------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `account_status_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_laccount_status1` FOREIGN KEY (`account_status_id`) REFERENCES `account_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `account_status_id`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '\0\0', 'superadmin', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'superadmin@admin.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Super', 'Admin', '', '0'),
(2, '\0\0', 'admin', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Admin', '', '', '0'),
(3, '\0\0', 'agent1', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'agent1@agent.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Agent', '1', '', '0'),
(4, '\0\0', 'agent2', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'agent2@agent.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Agent', '2', '', '0'),
(5, '\0\0', 'subagent1', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'subagent1@subagent.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Subagent', '1', '', '0'),
(6, '\0\0', 'subagent2', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'subagent2@subagent.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Subagent', '2', '', '0'),
(7, '\0\0', 'subagent3', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'subagent3@subagent.com', '', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Subagent', '3', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 4),
(6, 6, 4),
(7, 7, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `services` (`id`, `title`) VALUES
(1, 'Bkash Send Money');

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'Create Agent'),
(2, 'Create Subagent');

CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;  

CREATE TABLE IF NOT EXISTS `users_commissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `service_id` int(11) unsigned NOT NULL,
  `commission` double,
  PRIMARY KEY (`id`),
  KEY `fk_users_commissions_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `users_commissions`
  ADD CONSTRAINT `fk_users_commissions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO `users_commissions` (`id`, `user_id`, `service_id`, `commission`) VALUES
(1, 2, 1, 4.5),
(2, 3, 1, 3),
(3, 4, 1, 3),
(4, 5, 1, 2),
(5, 6, 1, 2),
(6, 7, 1, 2);

CREATE TABLE IF NOT EXISTS `subagents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subagent_user_id` int(11) unsigned NOT NULL,
  `agent_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subagents_users1_idx` (subagent_user_id),
  KEY `fk_subagents_users2_idx` (`agent_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `subagents`
  ADD CONSTRAINT `fk_subagents_users1` FOREIGN KEY (`subagent_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subagents_users2` FOREIGN KEY (`agent_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO `subagents` (`id`, `subagent_user_id`, `agent_user_id`) VALUES
(1, 5,3),
(2, 6,3),
(3, 7,4);

CREATE TABLE IF NOT EXISTS `user_transaction_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `user_transaction_statuses` (`id`, `title`) VALUES
(1, 'Pending'),
(2, 'Success'),
(3, 'Failed'),
(4, 'Cancelled');

CREATE TABLE IF NOT EXISTS `user_transaction_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `user_transaction_types` (`id`, `title`) VALUES
(1, 'Send Credit'),
(2, 'Receive Credit'),
(3, 'Use Service'),
(4, 'Load Balance');

CREATE TABLE IF NOT EXISTS `user_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `transaction_id` varchar(20),
  `service_id` int(11) unsigned NOT NULL,
  `cell_no` varchar(20),
  `description` varchar(200),
  `balance_in` double,
  `balance_out` double,
  `type_id` int(11) unsigned NOT NULL,
  `status_id` int(11) unsigned NOT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_transactions_users1_idx` (`user_id`),
  KEY `fk_user_transactions_user_transaction_statuses1_idx` (`status_id`),
  KEY `fk_user_transactions_user_transaction_types1_idx` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
ALTER TABLE `user_transactions`
  ADD CONSTRAINT `fk_user_transactions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_transactions_uts1` FOREIGN KEY (`status_id`) REFERENCES `user_transaction_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_transactions_utt1` FOREIGN KEY (`type_id`) REFERENCES `user_transaction_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
CREATE TABLE IF NOT EXISTS `service_charges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) unsigned NOT NULL,
  `unit` float DEFAULT 1000,
  `company_charge` float DEFAULT 0,
  `user_charge` float DEFAULT 0,
  `created_on` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
INSERT INTO `service_charges` (`id`, `service_id`, `unit`, `company_charge`, `user_charge`) VALUES
(1, 1, 1000, 14, 4.5);
  
CREATE TABLE IF NOT EXISTS `users_profits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `transaction_id` varchar(20),
  `service_id` int(11) unsigned NOT NULL,
  `amount` float DEFAULT 0,
  `admin_profit` float DEFAULT 0,
  `agent_profit` float DEFAULT 0,
  `subagent_profit` float DEFAULT 0,
  `created_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_profits_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
ALTER TABLE `users_profits`
  ADD CONSTRAINT `fk_user_profits_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;