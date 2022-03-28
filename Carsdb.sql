/*
If you want to test this on your own, you will need to include:       (If ran on touring leave out Create Database and swap USE "Project" to USE "your username")

Create DATABASE Project;
*/
USE Project;
DROP TABLE IF EXISTS cars;
CREATE TABLE cars
(
   id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Make varchar(60),
   Model varchar(32),
   Year varchar(20),
   Price int(7)
);
Insert into cars (Make, Model, year, Price) VALUES ("Chevrolet", "Equinox","2022","50000");
Insert into cars (Make, Model, year, Price) VALUES ("Chevrolet", "Equinox","2021","45000");
Insert into cars (Make, Model, year, Price) VALUES ("Chevrolet", "Cruze","2022","30000");
Insert into cars (Make, Model, year, Price) VALUES ("Chevrolet", "Cruze","2021","25000");

Insert into cars (Make, Model, year, Price) VALUES ("Dodge", "Drango","2022","55000");
Insert into cars (Make, Model, year, Price) VALUES ("Dodge", "Drango","2021","45000");
Insert into cars (Make, Model, year, Price) VALUES ("Dodge", "Dart","2022","28000");
Insert into cars (Make, Model, year, Price) VALUES ("Dodge", "Dart","2021","22000");

Insert into cars (Make, Model, year, Price) VALUES ("Ford", "Escape","2022","60000");
Insert into cars (Make, Model, year, Price) VALUES ("Ford", "Escape","2021","50000");
Insert into cars (Make, Model, year, Price) VALUES ("Ford", "Focus","2022","30000");
Insert into cars (Make, Model, year, Price) VALUES ("Ford", "Focus","2021","25000");

Insert into cars (Make, Model, year, Price) VALUES ("Honda", "CRV","2022","45000");
Insert into cars (Make, Model, year, Price) VALUES ("Honda", "CRV","2021","40000");
Insert into cars (Make, Model, year, Price) VALUES ("Honda", "Civic","2022","27000");
Insert into cars (Make, Model, year, Price) VALUES ("Honda", "Civic","2021","24000");

Insert into cars (Make, Model, year, Price) VALUES ("Tesla", "Model X","2022","50000");
Insert into cars (Make, Model, year, Price) VALUES ("Tesla", "Model X","2021","47000");
Insert into cars (Make, Model, year, Price) VALUES ("Tesla", "Model 3","2022","37000");
Insert into cars (Make, Model, year, Price) VALUES ("Tesla", "Model 3","2021","35000");


DROP TABLE IF EXISTS owners;
CREATE TABLE owners
(
   id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   firstname varchar(50),
   lastname varchar(50),
   email varchar(50),
   password varchar(70)
);

DROP TABLE IF EXISTS car_owners;
CREATE TABLE car_owners
(
   CID int NOT NULL,
   OWID int NOT NULL,
   BasePrice int(7),
   PrivatePrice int(7),
   dealer int(7),
   cpo int(7),
   PRIMARY KEY(CID, OWID),
   FOREIGN KEY (CID) REFERENCES cars(ID),
   FOREIGN KEY (OWID) REFERENCES owners(ID)
);
