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
    invoice_no  INT AUTO_INCREMENT PRIMARY KEY,
    holder_name VARCHAR(25),
    card_number CHAR(16),
    expiry      CHAR(5),
    cvv         CHAR(3),
    total       DECIMAL(8, 2)
) AUTO_INCREMENT = 1;

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




-- Testing code

-- INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES ("Mr John F Jenson", "4444333322221111", "11/22", "451", 3215.64);
-- INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES ("Mr Adam B Hemer", "1111222233334444", "02/25", "525", 32684.32);

-- INSERT INTO ProductInvoice VALUES (1, "E001", 5);
-- INSERT INTO ProductInvoice VALUES (1, "M012", 3);
-- INSERT INTO ProductInvoice VALUES (1, "M009", 7);

-- INSERT INTO ProductInvoice VALUES (2, "E005", 172);
-- INSERT INTO ProductInvoice VALUES (2, "M015", 23);


-- SELECT i.invoice_no, i.holder_name, i.total, i.card_number, i.expiry, i.cvv, p.product_id, p.name, pi.quantity
-- FROM Invoice i, ProductInvoice pi, Product p
-- WHERE i.invoice_no = pi.invoice_no
-- AND pi.product_id = p.product_id;



-- INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = 1999;


-- SELECT SUM(c.quantity * p.price) FROM Cart c, Product p WHERE c.product_id = p.product_id;


-- INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES ("Test man", "4567456745674567", "77/88", "420", (SELECT SUM(c.quantity * p.price) FROM Cart c, Product p WHERE c.product_id = p.product_id));

