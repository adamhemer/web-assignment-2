
DROP TABLE Product;
DROP TABLE Category;

CREATE TABLE Product (
    id          INT,
    content      INT,
    name        VARCHAR(20),
    description VARCHAR(200),
    category    INT,
    price       DECIMAL(4, 2),
    PRIMARY KEY (id),
    FOREIGN KEY category REFERENCES Category(id),
    FOREIGN KEY content REFERENCES Content(id)
)

CREATE TABLE Category (
    id      INT,
    name    VARCHAR(20),
    PRIMARY KEY (id)
)

CREATE TABLE Content {
    id      INT,
    name    VARCHAR(20),
    PRIMARY KEY (id)
}


INSERT INTO Category VALUES (0, "strains");
INSERT INTO Category VALUES (1, "edible");

INSERT INTO Content VALUES (0, "");
INSERT INTO Content VALUES (1, "Sativa");
INSERT INTO Content VALUES (2, "Hybrid");
INSERT INTO Content VALUES (3, "Indica");

INSERT INTO Product VALUES (0, "Blue Dream", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (1, "OG Kush", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (2, "Pineapple Express", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (3, "Northern Lights", 3, "description", 0, 12.34);
INSERT INTO Product VALUES (4, "Bubbe Kush", 3, "description", 0, 12.34);
INSERT INTO Product VALUES (5, "White Widow", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (6, "AK-47", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (7, "Purple Haze", 1, "description", 0, 12.34);
INSERT INTO Product VALUES (8, "Black Mamba", 3, "description", 0, 12.34);
INSERT INTO Product VALUES (9, "Death Star", 3, "description", 0, 12.34);
INSERT INTO Product VALUES (10, "Blue Diesel", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (11, "Black Jack", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (12, "Key Lime Pie", 2, "description", 0, 12.34);
INSERT INTO Product VALUES (13, "Sunshine", 1, "description", 0, 12.34);
INSERT INTO Product VALUES (14, "Dutch Hawaiian", 1, "description", 0, 12.34);

INSERT INTO Product VALUES (15, "Gummies", 0, "Infused gummies", 0, 12.34);
INSERT INTO Product VALUES (16, "Brownies", 0, "Vegan and Gluten Free", 0, 12.34);
INSERT INTO Product VALUES (17, "Tea Bags", 0, "Infused tea bags", 0, 12.34);
INSERT INTO Product VALUES (18, "Protein Bar", 0, "Infused protein bar", 0, 12.34);
INSERT INTO Product VALUES (19, "Soda Water", 0, "Berocca style infused water", 0, 12.34);

