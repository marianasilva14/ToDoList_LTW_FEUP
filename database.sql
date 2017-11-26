drop table if exists User;
drop table if exists Category;
drop table if exists ToDo;

create table User(
ID INT PRIMARY KEY,
name VARCHAR[50] NOT NULL,
email VARCHAR[50] NOT NULL,
age INT NOT NULL);

create table Category(
ID INT PRIMARY KEY,
name VARCHAR[50] NOT NULL);

create table ToDo(
ID INT PRIMARY KEY,
IDUser INT,
IDCategory INT,
description VARCHAR[50] NOT NULL,
maxDate VARCHAR[50] NOT NULL,
done VARCHAR[50] NOT NULL,
FOREIGN KEY (IDUser) REFERENCES User(ID),
FOREIGN KEY (IDCategory) REFERENCES Category(ID));
