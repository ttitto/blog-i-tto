create database if not exists `blogitto`;
use `blogitto`;

drop table if exists `users`;
create table `users`(
	id int not null auto_increment,
	username nvarchar(100) unique not null,
	email nvarchar(100) unique not null,
	password_hash nvarchar(250) not null,
	role nvarchar(50) not null default 'user',
	is_active tinyint(1) unsigned default '1',
	reset_token nvarchar(250),
	PRImary key (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

drop table if exists `categories`;
create table `categories` (
	id int not null auto_increment,
	name nvarchar(50) unique,
	primary key (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

drop table if exists `posts`;
create table `posts`(
	id	int not null auto_increment, 
	header nvarchar(300) not null,
	content text not null,
	date_created datetime not null default current_timestamp,
	date_edited datetime not null default current_timestamp,
	user_id int not null,
	category_id int null default null,
	visits_counter int default 0,
	primary key (`id`),
	foreign key FK_Users_Posts (`user_id`) references `users` (`id`) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

drop table if exists `tags`;
create table `tags`(
	id int not null auto_increment,
	content nvarchar(50),
	usage_counter int,
	primary key (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

drop table if exists `postsTags`;
create table `postsTags`(
	post_id int not null,
	tag_id int not null,
	primary key (`post_id`, `tag_id`),
	foreign key FK_PostsTags_Posts (`post_id`) references `posts`(`id`) on delete cascade,
	foreign key FK_PostsTags_Tags (`tag_id`) references `tags`(`id`) on delete cascade
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

drop table if exists `comments`;
create table `comments`(
	id int not null auto_increment,
	post_id int not null,
	content text not null,
	user_id int not null ,
	primary key (`id`),
	foreign key FK_Comments_Posts (`post_id`) references `posts`(`id`) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

insert into `categories` (id, name) Values(1, 'PHP');
insert into `categories` (id, name) Values(2, 'ASP.NET WebForms');
insert into `categories` (id, name) Values(3, 'ASP.NET MVC');
insert into `categories` (id, name) Values(4, 'HTML');
insert into `categories` (id, name) Values(5, 'CSS');
insert into `categories` (id, name) Values(6, 'JavaScript');

INSERT INTO `blogitto`.`users`
(`id`,`username`,`email`,`password_hash`,`role`,`is_active`,`reset_token`) VALUES(1, 'admin', 'admin@blogitto.com', 'admin123', 'admin', 1, null);
INSERT INTO `blogitto`.`users`
(`id`,`username`,`email`,`password_hash`,`role`,`is_active`,`reset_token`) VALUES(2, 'pesho', 'pesho@blogitto.com', 'pesho123', 'user', 1, null);
INSERT INTO `blogitto`.`users`
(`id`,`username`,`email`,`password_hash`,`role`,`is_active`,`reset_token`) VALUES(3, 'gancho', 'gancho@blogitto.com', 'gancho123', 'guest', 1, null);

INSERT INTO `blogitto`.`posts`(`id`, `header`, `content`, `user_id`, `category_id`) VALUES(1, 'My project on PHP MVC Course', 'My project on PHP MVC Course was very fast written because there was not enough time.', 2, 1);
