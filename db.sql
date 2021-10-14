SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS dsa;
CREATE DATABASE dsa;

USE dsa;

CREATE TABLE Product (
    id          CHAR(4) NOT NULL PRIMARY KEY,
    price       DECIMAL(4, 2),
    quantity    INT,
    name        varchar(100),
    description VARCHAR(200)
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON *.* TO dbadmin@localhost;

INSERT INTO Product VALUES ("M001", 99.99, 100, "Blue Dream", "Hybrid");
INSERT INTO Product VALUES ("M002", 99.99, 100, "OG Kush", "Hybrid");
INSERT INTO Product VALUES ("M003", 99.99, 100, "Pineapple Express", "Hybrid");
INSERT INTO Product VALUES ("M004", 99.99, 100, "White Widow", "Hybrid");
INSERT INTO Product VALUES ("M005", 99.99, 100, "AK-47", "Hybrid");
INSERT INTO Product VALUES ("M006", 99.99, 100, "Blue Diesel", "Hybrid");
INSERT INTO Product VALUES ("M007", 99.99, 100, "Black Jack", "Hybrid");
INSERT INTO Product VALUES ("M008", 99.99, 100, "Key Lime Pie", "Hybrid");
INSERT INTO Product VALUES ("M009", 99.99, 100, "Nothern Lights", "Indica");
INSERT INTO Product VALUES ("M010", 99.99, 100, "Bubba Kush", "Indica");
INSERT INTO Product VALUES ("M011", 99.99, 100, "Black Mamba", "Indica");
INSERT INTO Product VALUES ("M012", 99.99, 100, "Death Star", "Indica");
INSERT INTO Product VALUES ("M013", 99.99, 100, "Purple Haze", "Sativa");
INSERT INTO Product VALUES ("M014", 99.99, 100, "Sunshine", "Sativa");
INSERT INTO Product VALUES ("M015", 99.99, 100, "Dutch Hawaiian", "Sativa");

INSERT INTO Product VALUES ("E001", 99.99, 100, "Berocca", "");
INSERT INTO Product VALUES ("E002", 99.99, 100, "Gummis", "");
INSERT INTO Product VALUES ("E003", 99.99, 100, "CBD Oil Tincture", "");
INSERT INTO Product VALUES ("E004", 99.99, 100, "Brownies", "Vegan, Gluten Free Infused Brownies");
INSERT INTO Product VALUES ("E005", 99.99, 100, "Tea Bag", "");
