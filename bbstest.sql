set default_storage_engine = InnoDB;
set character_set_client = utf8;
set character_set_connection = utf8;
set character_set_database = utf8;
set character_set_results = utf8;
set character_set_server = utf8;

create database bbstest;

use bbstest;

create table users(
	username varchar(50) not NULL,
	password varchar(30) not NULL,
	email varchar(50) not NULL
);

insert into users(username,password,email) values ('admin1','123','123@qq.com');