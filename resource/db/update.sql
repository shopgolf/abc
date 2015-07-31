ALTER TABLE `px_category` CHANGE `seo_url` `seo_url` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `px_product` CHANGE `category` `category` INT(3) NOT NULL;

ALTER TABLE `px_product` DROP `parameters`
ALTER TABLE `px_product` CHANGE `image` `image` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;