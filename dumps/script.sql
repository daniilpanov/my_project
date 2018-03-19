CREATE TABLE pages
(
  id        INT(3) AUTO_INCREMENT
    PRIMARY KEY,
  menu_name VARCHAR(255) NULL,
  content   MEDIUMTEXT   NOT NULL,
  title     VARCHAR(255) NULL
)
  ENGINE = InnoDB
  CHARSET = utf8;

CREATE TABLE users
(
  id       INT(2) AUTO_INCREMENT
    PRIMARY KEY,
  login    VARCHAR(255) NULL,
  password VARCHAR(255) NULL
)
  ENGINE = InnoDB;


