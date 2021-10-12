SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS dsa;
CREATE DATABASE dsa;

USE dsa;

CREATE TABLE Product (
    id          CHAR(4) NOT NULL PRIMARY KEY,
    name        varchar(100),
    description VARCHAR(200)
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON *.* TO dbadmin@localhost;

INSERT INTO Product VALUES ("M001", "Blue Dream", "Hybrid");
INSERT INTO Product VALUES ("M002", "OG Kush", "Hybrid");
INSERT INTO Product VALUES ("M003", "Pineapple Express", "Hybrid");
INSERT INTO Product VALUES ("M004", "White Widow", "Hybrid");
INSERT INTO Product VALUES ("M005", "AK-47", "Hybrid");
INSERT INTO Product VALUES ("M006", "Blue Diesel", "Hybrid");
INSERT INTO Product VALUES ("M007", "Black Jack", "Hybrid");
INSERT INTO Product VALUES ("M008", "Key Lime Pie", "Hybrid");
INSERT INTO Product VALUES ("M009", "Nothern Lights", "Indica");
INSERT INTO Product VALUES ("M010", "Bubba Kush", "Indica");
INSERT INTO Product VALUES ("M011", "Black Mamba", "Indica");
INSERT INTO Product VALUES ("M012", "Death Star", "Indica");
INSERT INTO Product VALUES ("M013", "Purple Haze", "Sativa");
INSERT INTO Product VALUES ("M014", "Sunshine", "Sativa");
INSERT INTO Product VALUES ("M015", "Dutch Hawaiian", "Sativa");

INSERT INTO Product VALUES ("E001", "Berocca", "");
INSERT INTO Product VALUES ("E002", "Gummis", "");
INSERT INTO Product VALUES ("E003", "CBD Oil Tincture", "");
INSERT INTO Product VALUES ("E004", "Brownies", "Vegan, Gluten Free Infused Brownies");
INSERT INTO Product VALUES ("E005", "Tea Bad", "");
