DROP DATABASE IF EXISTS `mac_and_cheese`;
CREATE DATABASE `mac_and_cheese` ;
USE `mac_and_cheese`;

CREATE TABLE `mac_and_cheese`.`cheese` (
  `che_id` INT NOT NULL AUTO_INCREMENT,
  `che_name` VARCHAR(45) NOT NULL,
  `che_country` VARCHAR(45) NULL,
  PRIMARY KEY (`che_id`),
  UNIQUE INDEX `che_id_UNIQUE` (`che_id` ASC) VISIBLE);

CREATE TABLE `mac_and_cheese`.`pasta` (
  `pas_id` INT NOT NULL AUTO_INCREMENT,
  `pas_name` VARCHAR(45) NOT NULL,
  `pas_country` VARCHAR(45) NULL,
  PRIMARY KEY (`pas_id`),
  UNIQUE INDEX `pas_id_UNIQUE` (`pas_id` ASC) VISIBLE);

CREATE TABLE `mac_and_cheese`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NOT NULL,
  `user_password` VARCHAR(45) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `user_fav_che_id` INT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) VISIBLE,
  UNIQUE INDEX `user_name_UNIQUE` (`user_name` ASC) VISIBLE);

CREATE TABLE `mac_and_cheese`.`recipes` (
  `rec_id` INT NOT NULL AUTO_INCREMENT,
  `rec_pas_id` INT NOT NULL,
  `rec_user_id` INT NOT NULL,
  `rec_name` VARCHAR(45) NOT NULL,
  `rec_desc` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`rec_id`),
  UNIQUE INDEX `rec_id_UNIQUE` (`rec_id` ASC) VISIBLE);
  
CREATE TABLE `mac_and_cheese`.`recipe_cheese_join` (
  `rcj_id` INT NOT NULL AUTO_INCREMENT,
  `rcj_rec_id` INT NOT NULL,
  `rcj_che_id` INT NOT NULL,
  PRIMARY KEY (`rcj_id`),
  UNIQUE INDEX `rcj_id_UNIQUE` (`rcj_id` ASC) VISIBLE);
  
  
insert into cheese(che_name, che_country) values ('Romano', 'Italy');
insert into cheese(che_name, che_country) values ('Cheddar', 'England');
insert into cheese(che_name, che_country) values ('Swiss', 'Switzerland');
insert into cheese(che_name, che_country) values ('Feta', 'Greece');
insert into cheese(che_name, che_country) values ('Cotija', 'Mexico');
insert into cheese(che_name, che_country) values ('Asiago', 'Italy');

insert into pasta(pas_name, pas_country) values ('Cavatappi', 'Italy');
insert into pasta(pas_name, pas_country) values ('Rigatoni', 'Italy');
insert into pasta(pas_name, pas_country) values ('Farfalle', 'Italy');