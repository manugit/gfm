ALTER TABLE `pot` ADD `url_hash` VARCHAR( 16 ) NOT NULL ;

ALTER TABLE `potposition` ADD `date` DATE NOT NULL AFTER `amount` ;