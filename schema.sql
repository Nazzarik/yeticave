drop database if exists yeticave;

create database yeticave
  default character set utf8
  default collate utf8_general_ci;

use yeticave;

create table categories (
  id tinyint unsigned auto_increment primary key,
  category char(50) not null
);

create table users (
  id int auto_increment primary key,
  name char(128),
  email char(128),
  password_hash char(255),
  avatar char(255)
);

create table lots (
  id  int auto_increment primary key,
  name char(255),
  category_id tinyint,
  image char(128),
  lot_rate int(12),
  lot_step int(12),
  close_date datetime,
  description text(1000)
);

create table bets (
  price int,
  user_id int,
  lot_id int
);

create unique index name on users(name);
create unique index email on users(email);
