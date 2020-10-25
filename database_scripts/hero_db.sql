DROP schema IF EXISTS hirehero;

CREATE SCHEMA hirehero;
USE hirehero;

create table login
(
	username varchar(50),
    password varchar(50),
    session_token varchar(100)
);



create table user
(
    username varchar(50),
	displayname varchar(100),
    gender char(1),
    age int
);

create table gigCategories
(
    categoryName varchar(50)
);

create table gigDetails
(
	gigId int,
    username varchar(50),
	categoryName varchar(50),
    gigName varchar(50),
    gigPrice int,
    gigStartDate date,
    gigEndDate date
);

create table chat
(
    sender varchar(50),
    message text,
    recipient varchar(50),
	msgDateTime	datetime
);


/*insert into gigcategories values ("");
*/

insert into gigcategories values ("Food");
insert into gigcategories values ("Car wash");



