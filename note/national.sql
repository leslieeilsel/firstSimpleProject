删除表内数据id重排 : truncate table 表名

增加字段:alter table 表名 add 字段名 类型

删除字段:alter table 表名 drop column 字段名

修改字段类型:ALTER TABLE 表名 ALTER COLUMN 字段类型 

修改字段的值:update 表名 set 字段='要修改后的值' where 定位字段='值' 

create database national default character set'utf8';

use national;

--管理员表
create table adminuser(
	id int key auto_increment,
	username varchar(20) unique,
	password varchar(20),
	name varchar(15),
	deleted tinyint(1) default 0
);

--添加后台管理员
insert into adminuser(username,password,name) 
values('admin','admin','leslie');

--栏目表
create table category(
	id int key auto_increment,
	cname varchar(10) not null,
	fid int default 0,
	isshow tinyint(1) default 0,
	ordernum smallint(3) default 50,
	deleted tinyint(1) default 0
);

--图文表	recommend = 推荐
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
	recommend tinyint(1) default 0,
	dayphoto tinyint(1) default 0
);

-- 文章点击表：
create table picsclick(
	id int key auto_increment,
	clicktime int,
	ip varchar(20) default '0.0.0.0',
	newsid int
);

--权职表
create table power(
	id int key auto_increment,
	coname varchar(20)
);