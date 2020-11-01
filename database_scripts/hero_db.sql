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
    FOREIGN KEY fk1 (sender) REFERENCES user(username),
    FOREIGN KEY fk2 (recipient) REFERENCES user(username)
);


/*insert into gigcategories values ("");
*/


INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('rohan','cleaning' ,'House Clean', 20,'2020-11-20','Active','yishun 81');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('glenda','food' ,'Takeaway food', 10,'2020-11-21','Active','yishun 71');
            
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('glenda','cleaning' ,'House Clean', 20,'2020-11-20','Active','yishun 61');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('glenda','food' ,'Takeaway food', 10,'2020-11-19','Completed','yishun 61');







