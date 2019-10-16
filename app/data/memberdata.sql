CREATE TABLE Member (
  memberId VARCHAR(64) PRIMARY KEY,
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
  Station INTEGER(1),
  isActive bool
);


CREATE TABLE Patient (
    patientGuid VARCHAR(64) PRIMARY KEY,
    firstName VARCHAR(64),
    lastName VARCHAR(64),
    dob DATE DEFAULT NULL,
    sexAtBirth CHAR(1) DEFAULT ''
);
