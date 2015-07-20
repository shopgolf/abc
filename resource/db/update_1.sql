ALTER TABLE `px_product` CHANGE `product_code` `product_code` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `px_checkout` ADD `product_code` VARCHAR(50) NOT NULL AFTER `product_id`;
INSERT INTO `golf.dev`.`role` (`id`, `title`, `code`, `description`, `created`, `updated`, `creator_id`, `editor_id`, `active`) VALUES (NULL, 'Sản phẩm dc mua nhiều', 'hotdeal', 'Sản phẩm dc mua nhiều', '2015-07-20 00:00:00', '2015-07-20 00:00:00', NULL, NULL, '1');

INSERT INTO `groupright` (`id`, `group_id`, `role_id`, `permission_id`) VALUES
(NULL, 1, 8, 1),
(NULL, 1, 8, 2),
(NULL, 1, 8, 3),
(NULL, 1, 8, 4),
(NULL, 1, 9, 1),
(NULL, 1, 9, 2),
(NULL, 1, 9, 3),
(NULL, 1, 9, 4);