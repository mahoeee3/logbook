create database projects;

use projects;

CREATE TABLE IF NOT EXISTS `projects`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `projects`.`diary` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `shift` VARCHAR(40) NOT NULL,
  `production` TEXT NULL,
  `quality` TEXT NULL,
  `maintenance` TEXT NULL,
  `security` TEXT NULL,
  PRIMARY KEY (`id`, `product_id`, `users_id`),
  INDEX `fk_diary_product1_idx` (`product_id` ASC),
  INDEX `fk_diary_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_diary_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `projects`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_diary_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `projects`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `projects`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `password` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


