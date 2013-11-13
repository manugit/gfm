ALTER TABLE `pot` ADD `url_hash` VARCHAR( 16 ) NOT NULL ;

ALTER TABLE `potposition` ADD `date` DATE NOT NULL AFTER `amount` ;

ALTER TABLE `user` ADD `nickname` VARCHAR( 128 ) NOT NULL AFTER `id`; 

ALTER TABLE `user` ADD UNIQUE (`nickname`);

ALTER TABLE `potposition` ADD `position` INT NOT NULL 