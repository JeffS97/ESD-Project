DROP schema IF EXISTS hirehero;

CREATE SCHEMA hirehero;
USE hirehero;



create table user
(
    username varchar(50) NOT NULL,
	fullname varchar(100) NOT NULL,
    gender char(1),
    age int,
    email varchar(100) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (email)
);



create table gigDetails
(
	gigId int NOT NULL AUTO_INCREMENT,
    gigbooker varchar(100) NOT NULL,
    gigaccepter varchar(100),
	categoryName varchar(50) NOT NULL,
    gigName varchar(50) NOT NULL,
    gigPrice int NOT NULL ,	
    gigDescription varchar(9999) NOT NULL,
    gigStartDate date NOT NULL ,
    gigEndDate date,
    gigStatus varchar(20) NOT NULL ,
    bookeraddress varchar(100)NOT NULL  ,
    accepteraddress varchar(100)  ,

    PRIMARY KEY (gigId),
    FOREIGN KEY fk1 (gigbooker) REFERENCES user(email),
    FOREIGN KEY fk2 (gigaccepter) REFERENCES user(email)
);

create table chat
(
    chatid varchar(20),
    sender varchar(50),
    message text,
    recipient varchar(50),
	msgDateTime	datetime,
	PRIMARY KEY (chatid),
    FOREIGN KEY fk1 (sender) REFERENCES user(email),
    FOREIGN KEY fk2 (recipient) REFERENCES user(email)
);


/*insert into gigcategories values ("");
*/

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('admin','admin','admin@gmail.com','$2y$10$7aSS0yScusjM8HoOHcqSluVMui0mNH5IS7Jqx/fYWUliZR/4c5m7m');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('rohan','rohan','rohan','$2y$10$7aSS0yScusjM8HoOHcqSluVMui0mNH5IS7Jqx/fYWUliZR/4c5m7m');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('rohan','cleaning' ,'House Clean', 20,'2020-11-20','Active','yishun 81');



