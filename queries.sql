-- Users table
CREATE TABLE `Users`(
	`userid` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(25) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `city` VARCHAR(50) NOT NULL,
    `state` VARCHAR(3) NOT NULL,
    
    CONSTRAINT pk_userid PRIMARY KEY(`userid`)
);

-- Matches table
CREATE TABLE `Matches`(
	`matchid` INT(11) NOT NULL AUTO_INCREMENT,
    `userid` INT(11) NOT NULL,
    `wants` TEXT NOT NULL,
    `offers` TEXT NOT NULL,
	`postDate` DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT pk_matchid PRIMARY KEY(`matchid`),
    CONSTRAINT fk_userid FOREIGN KEY(`userid`) REFERENCES `Users`(`userid`)
);