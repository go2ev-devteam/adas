CREATE TABLE notice(
`idx` INT NOT NULL AUTO_INCREMENT,
`post_tit` TEXT NOT NULL,
`post_content` LONGTEXT,
`post_date` DATE,
PRIMARY KEY(`idx`)
)ENGINE=INNODB;


CREATE TABLE news(
`idx` INT NOT NULL AUTO_INCREMENT,
`news_tit` TEXT NOT NULL,
`news_content` LONGTEXT,
`news_date` DATE,
PRIMARY KEY(`idx`)
)ENGINE=INNODB;

CREATE TABLE download(
`idx` INT NOT NULL AUTO_INCREMENT,
`device` VARCHAR(32),
`file_path` VARCHAR(64),
`version` VARCHAR(12),
`reg_date` DATE,
PRIMARY KEY(`idx`)
)ENGINE=INNODB;

CREATE TABLE faq(
`idx` INT NOT NULL AUTO_INCREMENT,
`faq_tit` TEXT NOT NULL,
`faq_content` LONGTEXT,
`faq_date` DATE,
PRIMARY KEY (`idx`)
)ENGINE=INNODB;

CREATE TABLE sales(
`idx` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(4) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`company` VARCHAR(100) NOT NULL,
`nation` VARCHAR(32) NOT NULL,
`mobile_1` CHAR(3) NOT NULL,
`mobile_2` CHAR(4) NOT NULL,
`mobile_3` CHAR(4) NOT NULL,
`fax_1` VARCHAR(3),
`fax_2` VARCHAR(4),
`fax_3` CHAR(4),
`sales_content` LONGTEXT,
PRIMARY KEY(`idx`)
)ENGINE=INNODB;

