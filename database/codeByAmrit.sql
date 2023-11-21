create database codebyamrit;
use codebyamrit;

create table user(
id int auto_increment primary key,
name varchar(255) not null,
emaiL VARCHAR(255) unique key,
password VARCHAR(255) NOT NULL,

image_data LONGBLOB ,
image_name VARCHAR(255) NOT NULL

);

