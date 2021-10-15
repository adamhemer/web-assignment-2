SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS dsa;
CREATE DATABASE dsa;

USE dsa;

CREATE TABLE Product (
    product_id  CHAR(4) NOT NULL PRIMARY KEY,
    price       DECIMAL(4, 2),
    size        INT,
    name        varchar(100),
    description VARCHAR(200)
);

CREATE TABLE Cart (
    product_id  CHAR(4) NOT NULL PRIMARY KEY,
    quantity    INT
);

CREATE TABLE Invoice (
    invoice_no  INT PRIMARY KEY,
    total       DECIMAL(8, 2)
);

CREATE TABLE ProductInvoice (
    invoice_no  INT,
    product_id  CHAR(4),
    quantity    INT,
    PRIMARY KEY (invoice_no, product_id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON *.* TO dbadmin@localhost;

INSERT INTO Product VALUES ("M001", 73.56, 055, "Blue Dream", "Hybrid");
INSERT INTO Product VALUES ("M002", 40.15, 171, "OG Kush", "Hybrid");
INSERT INTO Product VALUES ("M003", 95.48, 023, "Pineapple Express", "Hybrid");
INSERT INTO Product VALUES ("M004", 07.32, 144, "White Widow", "Hybrid");
INSERT INTO Product VALUES ("M005", 19.82, 084, "AK-47", "Hybrid");
INSERT INTO Product VALUES ("M006", 52.73, 066, "Blue Diesel", "Hybrid");
INSERT INTO Product VALUES ("M007", 16.18, 086, "Black Jack", "Hybrid");
INSERT INTO Product VALUES ("M008", 29.38, 036, "Key Lime Pie", "Hybrid");
INSERT INTO Product VALUES ("M009", 61.57, 142, "Northern Lights", "Indica");
INSERT INTO Product VALUES ("M010", 59.74, 035, "Bubba Kush", "Indica");
INSERT INTO Product VALUES ("M011", 94.05, 171, "Black Mamba", "Indica");
INSERT INTO Product VALUES ("M012", 16.52, 109, "Death Star", "Indica");
INSERT INTO Product VALUES ("M013", 11.27, 180, "Purple Haze", "Sativa");
INSERT INTO Product VALUES ("M014", 44.82, 082, "Sunshine", "Sativa");
INSERT INTO Product VALUES ("M015", 97.82, 097, "Dutch Hawaiian", "Sativa");

INSERT INTO Product VALUES ("E001", 20.53, 024, "Berocca", "Description needed");
INSERT INTO Product VALUES ("E002", 69.10, 111, "Gummies", "Description needed");
INSERT INTO Product VALUES ("E003", 93.57, 026, "CBD Oil Tincture", "Description needed");
INSERT INTO Product VALUES ("E004", 73.87, 063, "Brownies", "Vegan, Gluten Free Infused Brownies");
INSERT INTO Product VALUES ("E005", 81.73, 020, "Tea Bags", "Description needed");


INSERT INTO Invoice VALUES (1001, 69.99);
INSERT INTO Invoice VALUES (1420, 32684.32);
INSERT INTO Invoice VALUES (1999, 0);

INSERT INTO ProductInvoice VALUES (1001, "E001", 5);
INSERT INTO ProductInvoice VALUES (1001, "M012", 3);
INSERT INTO ProductInvoice VALUES (1001, "M009", 7);

INSERT INTO ProductInvoice VALUES (1420, "E005", 172);
INSERT INTO ProductInvoice VALUES (1420, "M015", 23);


SELECT *
FROM Invoice i, ProductInvoice pi, Product p
WHERE i.invoiceNo = pi.invoiceNo
AND pi.id = p.id;

INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = 1999;
