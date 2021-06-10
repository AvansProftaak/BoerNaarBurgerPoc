DROP TABLE IF EXISTS `search_queries`;
CREATE TABLE `search_queries` (
  `query_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `query_moment` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `query` TEXT DEFAULT NULL,
  CONSTRAINT pk_search PRIMARY KEY (`query_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;