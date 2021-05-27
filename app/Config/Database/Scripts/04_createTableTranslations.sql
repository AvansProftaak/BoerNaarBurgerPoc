DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations` (
  `translation_tag` VARCHAR(36) NOT NULL,
  `language` VARCHAR(128) NOT NULL,
  `content` TEXT DEFAULT NULL,
  CONSTRAINT pk_translations PRIMARY KEY (`translation_tag`, `language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;