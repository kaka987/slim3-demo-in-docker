CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `description` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into user(`name`,email,telephone,age,password,salt,description) values('kaka','zxf.0810@163.com','12345678','22','123456','abcdef','I am a phper');
