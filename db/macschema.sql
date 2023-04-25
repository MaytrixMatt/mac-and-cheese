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
  `user_fav_che` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) VISIBLE,
  UNIQUE INDEX `user_name_UNIQUE` (`user_name` ASC) VISIBLE);
