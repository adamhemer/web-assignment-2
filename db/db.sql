SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS dsa;
CREATE DATABASE dsa;

USE dsa;

CREATE TABLE Product (
    id          CHAR(4) NOT NULL PRIMARY KEY,
    price       DECIMAL(4, 2),
    size        INT,
    name        varchar(100),
    description VARCHAR(200)
) AUTO_INCREMENT = 1;

CREATE TABLE Cart (
    id          CHAR(4) NOT NULL PRIMARY KEY,
    quantity    INT
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON *.* TO dbadmin@localhost;

INSERT INTO Product VALUES ("M001", 73.56, 100, "Blue Dream", "Hybrid");
INSERT INTO Product VALUES ("M002", 40.15, 100, "OG Kush", "Hybrid");
INSERT INTO Product VALUES ("M003", 95.48, 100, "Pineapple Express", "Hybrid");
INSERT INTO Product VALUES ("M004", 07.32, 100, "White Widow", "Hybrid");
INSERT INTO Product VALUES ("M005", 19.82, 100, "AK-47", "Hybrid");
INSERT INTO Product VALUES ("M006", 52.73, 100, "Blue Diesel", "Hybrid");
INSERT INTO Product VALUES ("M007", 16.18, 100, "Black Jack", "Hybrid");
INSERT INTO Product VALUES ("M008", 29.38, 100, "Key Lime Pie", "Hybrid");
INSERT INTO Product VALUES ("M009", 61.57, 100, "Northern Lights", "Indica");
INSERT INTO Product VALUES ("M010", 59.74, 100, "Bubba Kush", "Indica");
INSERT INTO Product VALUES ("M011", 94.05, 100, "Black Mamba", "Indica");
INSERT INTO Product VALUES ("M012", 16.52, 100, "Death Star", "Indica");
INSERT INTO Product VALUES ("M013", 11.27, 100, "Purple Haze", "Sativa");
INSERT INTO Product VALUES ("M014", 44.82, 100, "Sunshine", "Sativa");
INSERT INTO Product VALUES ("M015", 97.82, 100, "Dutch Hawaiian", "Sativa");

INSERT INTO Product VALUES ("E001", 20.53, 100, "Berocca", "");
INSERT INTO Product VALUES ("E002", 69.10, 100, "Gummies", "");
INSERT INTO Product VALUES ("E003", 93.57, 100, "CBD Oil Tincture", "");
INSERT INTO Product VALUES ("E004", 73.87, 100, "Brownies", "Vegan, Gluten Free Infused Brownies");
INSERT INTO Product VALUES ("E005", 81.73, 100, "Tea Bags", "");
