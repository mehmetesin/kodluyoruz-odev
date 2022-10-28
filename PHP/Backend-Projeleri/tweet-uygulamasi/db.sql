create table tweet_users(
	id int not null auto_increment primary key,
	first_name varchar(100),
	last_name varchar(100),
	username varchar(200),
	password varchar(200)
);

create table tweet_posts(
	id int not null auto_increment primary key,
	user_id int,
	post varchar(180)
)