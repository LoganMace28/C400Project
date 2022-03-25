DROP TABLE IF EXISTS cars;
CREATE TABLE cars
(
   ID  varchar(5) NOT NULL PRIMARY KEY,
   Make varchar(60),
   Model varchar(32),
   Year varchar(20),
   Price decimal(7,2) 
);
DROP TABLE IF EXISTS owners;
CREATE TABLE owners
(
   ID  varchar(5) NOT NULL PRIMARY KEY,
   Name varchar(50),
   email varchar(50),
   password varchar(32)
);

DROP TABLE IF EXISTS car_owners;
CREATE TABLE car_owners
(
   CID varchar(5) NOT NULL,
   OWID varchar(5) NOT NULL,
   PRIMARY KEY(CID, OWID),
   FOREIGN KEY (BID) REFERENCES cars(ID),
   FOREIGN KEY (OWID) REFERENCES owners(ID)
);