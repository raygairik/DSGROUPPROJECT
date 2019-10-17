hi
CREATE DATABASE OCFR;

USE OCFR;

DROP TABLE Member;
DROP TABLE Certification;
DROP TABLE CertDetail;

CREATE TABLE Member (
  memberID VARCHAR(5) PRIMARY KEY,
  firstName VARCHAR(64),
  lastName VARCHAR(64),
  dob DATE DEFAULT NULL,
  Gender CHAR(1) DEFAULT '',
  Email VARCHAR(64),
  address VARCHAR(64),
  City VARCHAR(64),
  State TEXT(2),
  ZIPCode VARCHAR(20),
  workPhoneNumber VARCHAR (20),
  mobilePhoneNumber VARCHAR (20),
  departmentPosition VARCHAR (64),
  Radio VARCHAR(4),
  Station VARCHAR(3),
  isActive bool
);

CREATE TABLE Certification (
  certificationID VARCHAR(5) PRIMARY KEY,
  certifyingAgency VARCHAR(64),
  certificationName VARCHAR(64),
  expirationPeriod integer
);

CREATE TABLE CertDetail (
  certificationID VARCHAR(5),
  memberID VARCHAR(5),
  renewalDate DATE DEFAULT NULL,
  expirationDate DATE DEFAULT NULL,
  PRIMARY KEY (certificationID, memberID)
);

INSERT INTO Member
VALUES ('10000','Kathryn','Pride','1967-12-12','F','kpride@gmail.com','1123 Xavier School Drive', 'Watkinsville','GA','30677','707-555-1234','707-555-2345','Chief','A-1','all',TRUE);

INSERT INTO Member
VALUES ('10001','Piotr','Rasputin','1972-08-08','M','prasputin@gmail.com','A31 Mother Russia Road',
'Seattle','WA','98133','','206-555-9876',
'Fire Marshall','841',8,TRUE);

INSERT INTO Member
VALUES ('10002','Warren','Worthington','1985-11-11','M','wworthington@gmail.com','1140 Experiment Station Rd',
'Watkinsville','GA','30677','707-555-1234','',
'Fire Fighter','122',1,TRUE);

INSERT INTO Certification
VALUES ('90001','American Heart Association','CPR for Healthcare Providers',2);

INSERT INTO Certification
VALUES ('90002','American Red Cross','CPR for Professional Rescuer',2);

INSERT INTO Certification
VALUES ('90003','Athens Technical College','Firefighter 1',3);

INSERT INTO Certification
VALUES ('90004','Ivy Technical College','Firefighter 1',3);

INSERT INTO Certification
VALUES ('90005','Georgia Post Academy','POST',5);
