DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
  admin_number INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT uc_email UNIQUE (email),
  CONSTRAINT pk_admin PRIMARY KEY (admin_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;