CREATE TABLE `images` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'Uncategorized',
  PRIMARY KEY (`id`)
);

ALTER TABLE `images` ADD COLUMN `category` VARCHAR(100) NOT NULL DEFAULT 'Uncategorized';
