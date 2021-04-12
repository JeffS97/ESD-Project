DROP DATABASE IF EXISTS ESD5;
CREATE DATABASE ESD5;
Use ESD5;

CREATE TABLE Patient(
Patient_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
Username VARCHAR(200) NOT NULL,
Email Varchar(200) NOT NULL,
P_Name Varchar(150) NOT NULL,
Age INT NOT NULL,
Allergy Varchar(200)  NULL,
Address Varchar(200) NOT NULL,
Password Varchar(255) NOT NULL,
ChatId Varchar(255) NULL,
Payment BIT NULL
);


CREATE TABLE Healthworker(
Healthworker_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Email Varchar(200) NOT NULL,
Username VARCHAR(200) NOT NULL,
Name Varchar(200) NOT NULL,
Password Varchar(200) NOT NULL,
Role Varchar(200) NOT NULL,
Gid INT NOT NULL
);

CREATE TABLE Appointment(
Appointment_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Patient_Id INT NOT NULL,
Gid INT NOT NULL,
Symptom Varchar(255) NOT NULL,
ApptDate DATE NOT NULL,
ApptTime TIME NOT NULL,
Completed Boolean NOT NULL,
Constraint fk_patient FOREIGN KEY(Patient_Id) REFERENCES Patient(Patient_Id));



CREATE TABLE Prescription(
Prescription_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Patient_Id INT NOT NULL,
Appointment_Id INT NOT NULL,
PrevDate DATE NOT NULL,
EndDate DATE NOT NULL,   
Interval_Days INT NULL, 
Name Varchar(255) NOT NULL,
Collected Varchar(10) NULL, 
Price FLOAT NULL, 
Gid INT NOT NULL,
Constraint fk_patient2 FOREIGN KEY(Patient_Id) REFERENCES Patient(Patient_Id),
Constraint fk_try FOREIGN KEY(Appointment_Id) REFERENCES Appointment(Appointment_Id)
);

CREATE TABLE Payment(
Payment_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Patient_Id INT NOT NULL,
Date DATE NOT NULL,
Price Float NULL  
);

insert into patient (patient_id,username,email,p_name,age,allergy,address,password,chatid,payment) values
(1,"limzhihao","limzh@gmail.com", "Lim Zhi Hao",23,"none","Orchard Road ","123456","567100161",0), 
(2,"hahaha","a123@hotmail.com", "numeric",19,"none","woodlands","password","zzz",0),
(3,"abcd","abcd@hotmail.com", "alphabet",20,"none","AMK","password","benben",0);

insert into appointment (appointment_id,patient_id,gid,symptom,apptdate,appttime,completed) values
(1,1,1,"COVID","2021-03-20","17:00:00",1),
(2,1,1,"Cough","2021-03-22","14:00:00",1),
(3,1,1,"Nausea","2021-03-25","15:00:00",1),
(4,1,1,"Stomach Flu", "2021-04-11", "23:00:00",0),
(5,1,1,"Conjunctivitis", "2021-04-11", "22:45:00",0),
(6,1,1,"Hypertension", "2021-04-11", "22:55:00",0);

insert into prescription (prescription_id, patient_id, appointment_id,prevdate,enddate,interval_days,name,collected, price, gid) values
(1, 1, 1, "2021-03-27", "2022-04-20", 7, "Panadol", "C", 20, 1),
(2, 1, 1, "2021-03-20", "2021-04-10", 10, "Aspirin", NULL, 5, 1),
(3, 1, 1, "2021-03-20", "2021-04-20", 14, "Paracetamol", "C", 10, 1);

Insert into healthworker (healthworker_id, email, username, name, password, role, gid) values 
(1, "alan@gmail.com", "alanhealth", "Alan Tan", "123456", "Clinical Nurse", 1);

Insert into payment (payment_id, patient_id, date, price) VALUES
(1, 1, "2021-04-11", 36.70);

