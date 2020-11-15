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
    gigStartDate datetime NOT NULL ,
    gigEndDate datetime,
    gigStatus varchar(20) NOT NULL ,
    bookeraddress varchar(100)NOT NULL  ,
    accepteraddress varchar(100)  ,

    PRIMARY KEY (gigId),
    FOREIGN KEY fk1 (gigbooker) REFERENCES user(email),
    FOREIGN KEY fk2 (gigaccepter) REFERENCES user(email)
);

create table chat
(
    chatid int NOT NULL AUTO_INCREMENT,
    sender varchar(50) NOT NULL,
    message text,
    recipient varchar(50) NOT NULL,
	msgDateTime	datetime NOT NULL,
    gigId int NOT NULL,
	PRIMARY KEY (chatid),
    FOREIGN KEY fk1 (sender) REFERENCES user(email),
    FOREIGN KEY fk2 (recipient) REFERENCES user(email),
    FOREIGN KEY fk3 (gigId) REFERENCES gigdetails(gigId)
);


/*ADD USERS
*/
INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('admin','admin','admin@gmail.com','$2y$10$7aSS0yScusjM8HoOHcqSluVMui0mNH5IS7Jqx/fYWUliZR/4c5m7m');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('rohan','rohan','rohan@gmail.com','$2y$10$MzGu4CzCx1YG8j1SupWy5.sAlnICSiyHXgH0ftyqdMUZHdR9RKxDm');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('Glenda','Glenda Marco','glenda@gmail.com','$2y$10$Fs6fQnPGFL.G5072bnKcBuIXZkszRp1KRH6i69tSRuON7JaeGs/eK');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('Jeff','Jeffvinder','jeff@gmail.com','$2y$10$iRmm0Huu2PyS2HAwyESzHO6YeyKLEL56ZyyrSB6SQ08Yh/jJJ1FtK');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('amanda','Amanda','amanda@gmail.com','$2y$10$3MCmM9/QML2w1Kvptj5DU.teijwz8I3XXgyY1RPLxCktFSt6fnOde');

INSERT INTO user (`username`,`fullname`, `email`,`password` )
VALUES ('Liyin','Liyin','Liyin@gmail.com','$2y$10$W.Dn66Q00/2gKC552VljSuD7xSd9u5TegcHn.XgSW.KyY1rRnqaBK');



/*ADD USERS
*/
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('rohan@gmail.com','Food' ,'Takeaway food', 10,'Lorem Ipsum','2020-11-21 02:32:00','Active','');
            
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('glenda@gmail.com','Home Services' ,'House Clean', 20,'Lorem Ipsum','2020-11-19 17:08:00','Active','');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('amanda@gmail.com','Shopping' ,'House Clean', 20,'Lorem Ipsum','2020-11-18 23:33:00','Active','');
            
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('jeff@gmail.com','Shopping' ,'House Clean', 20,'Lorem Ipsum','2020-11-18 23:55:00','Active','');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('liyin@gmail.com','Miscellaneous' ,'HELP', 20,'Lorem Ipsum','2020-11-16 08:10:00','Active','');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('rohan@gmail.com','Food' ,'Takeaway food', 10,'Lorem Ipsum','2020-11-20 02:32:00','Active','');
            
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('glenda@gmail.com','home' ,'House Clean', 20,'Lorem Ipsum','2020-11-18 17:08:00','Active','');

INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('amanda@gmail.com','shopping' ,'House Clean', 20,'Lorem Ipsum','2020-11-17 23:33:00','Active','');
            
INSERT INTO gigDetails (`gigbooker`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigStatus`,`bookeraddress`) VALUES ('jeff@gmail.com','shopping' ,'House Clean', 20,'Lorem Ipsum','2020-11-15 23:55:00','Active','');

INSERT INTO gigDetails (`gigbooker`,`gigaccepter`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigEndDate`,`gigStatus`,`bookeraddress`,`accepteraddress`) 
            VALUES ('liyin@gmail.com','glenda@gmail.com' ,'miscellaneous' ,'HELP', 16,'Lorem Ipsum','2020-11-14 08:10:00','2020-11-14 010:10:00','Completed','768445','760717');

INSERT INTO gigDetails (`gigbooker`,`gigaccepter`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigEndDate`,`gigStatus`,`bookeraddress`,`accepteraddress`) 
            VALUES ('liyin@gmail.com','glenda@gmail.com' ,'food' ,'Dabao', 23,'Lorem Ipsum','2020-11-14 08:10:00','2020-11-14 010:10:00','Completed','768445','760717');

INSERT INTO gigDetails (`gigbooker`,`gigaccepter`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigEndDate`,`gigStatus`,`bookeraddress`,`accepteraddress`) 
            VALUES ('jeff@gmail.com','rohan@gmail.com' ,'vehicle help' ,'HELP', 16,'Lorem Ipsum','2020-11-14 08:10:00','2020-11-14 010:10:00','Completed','768445','760717');

INSERT INTO gigDetails (`gigbooker`,`gigaccepter`,`categoryName`, `gigName`,`gigPrice`,`gigDescription`
            ,`gigStartDate`,`gigEndDate`,`gigStatus`,`bookeraddress`,`accepteraddress`) 
            VALUES ('amanda@gmail.com','rohan@gmail.com' ,'vehicle help' ,'HELP', 16,'Lorem Ipsum','2020-11-14 08:10:00','2020-11-14 010:10:00','Processing','768445','760717');


