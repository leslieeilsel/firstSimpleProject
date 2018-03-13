create database national default character set'utf8';

use national;

create table adminuser(
	id int key auto_increment,
	username varchar(20) unique,
	password varchar(20),
	name varchar(15)
);

insert into adminuser(username,password,name) 
values('admin','admin','leslie');

create table category(
	id int key auto_increment,
	cname varchar(10) not null,
	fid int default 0,
	deleted tinyint(1) default 0
);

create table photography(
	id int key auto_increment,
	title varchar(30) not null,
	content text,
	imagename varchar(40),
	pubtime TIMESTAMP,
	deleted tinyint(1) default 0,
	clicknum int default 0,
	adminid int,
	fcid int not null,
	cateid int,
	recommend tinyint(1) default 0
);