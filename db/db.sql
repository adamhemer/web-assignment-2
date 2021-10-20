SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS dsa;
CREATE DATABASE dsa;

USE dsa;

CREATE TABLE Product (
    product_id  CHAR(4) NOT NULL PRIMARY KEY,
    price       DECIMAL(4, 2),
    size        INT,
    name        varchar(100),
    description VARCHAR(300)
);

CREATE TABLE Cart (
    product_id  CHAR(4) NOT NULL PRIMARY KEY,
    quantity    INT,
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
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
    FOREIGN KEY (invoice_no) REFERENCES Invoice(invoice_no),
    FOREIGN KEY (product_id) REFERENCES Product(product_id),
    PRIMARY KEY (invoice_no, product_id)
);

CREATE TABLE SubscriberEmails (
    email	VARCHAR(50),
    PRIMARY KEY (email)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON *.* TO dbadmin@localhost;

INSERT INTO Product VALUES ("M001", 73.56, 055, "Blue Dream", "Blue Dream is a sativa-dominant hybrid marijuana strain made by crossing Blueberry with Haze. This strain produces a balanced high, along with effects such as cerebral stimulation and full-body relaxation.");
INSERT INTO Product VALUES ("M002", 40.15, 171, "OG Kush", "OG Kush a hybrid, also known as 'Premium OG Kush,' was first cultivated in Florida in the early ‘90s when a strain from Northern California was supposedly crossed with Chemdawg, Lemon Thai and a Hindu Kush plant from Amsterdam.");
INSERT INTO Product VALUES ("M003", 95.48, 023, "Pineapple Express", "Pineapple Express is a hybrid marijuana strain made by crossing Trainwreck with Hawaiian. While this strain rose to fame on the silver screen in 2008 amidst the release of Pineapple Express, it is a real strain that you can find on the shelves of dispensaries across the country.");
INSERT INTO Product VALUES ("M004", 07.32, 144, "White Widow", "Among the most famous strains worldwide is White Widow, a balanced hybrid first bred in the Netherlands by Green House Seeds.");
INSERT INTO Product VALUES ("M005", 19.82, 084, "AK-47", "AK-47, also known as 'AK,' is a hybrid marijuana strain that mixes Colombian, Mexican, Thai, and Afghani varieties.");
INSERT INTO Product VALUES ("M006", 52.73, 066, "Blue Diesel", "Blue Diesel, also known as 'Blue City Diesel' and 'New Blue Diesel,' is a hybrid marijuana strain made by crossing Blueberry and NYC Diesel.");
INSERT INTO Product VALUES ("M007", 16.18, 086, "Black Jack", "Bred by Sweet Seeds, Black Jack is a cross of Black Domina and Jack Herer.");
INSERT INTO Product VALUES ("M008", 29.38, 036, "Key Lime Pie", "Key Lime Pie, also known as 'Key Lime Cookies' and 'Key Lime GSC,' is a hybrid marijuana strain and a phenotype of Girl Scout Cookies.");
INSERT INTO Product VALUES ("M009", 61.57, 142, "Northern Lights", "Northern Lights, also known as 'NL,' is an indica marijuana strain made by crossing Afghani with Thai.");
INSERT INTO Product VALUES ("M010", 59.74, 035, "Bubba Kush", "Bubba Kush, also known as 'BK,' 'Bubba,' and 'Bubba OG Kush' is an indica marijuana strain that has gained notoriety in the US and beyond for its heavy tranquilizing effects.");
INSERT INTO Product VALUES ("M011", 94.05, 171, "Black Mamba", "Black Mamba, also known as 'Black Mamba #6,' is an indica marijuana strain thought to be a cross of Granddaddy Purple and Black Domina.");
INSERT INTO Product VALUES ("M012", 16.52, 109, "Death Star", "Death Star, also known as 'Deathstar,' is a popular indica marijuana strain bred from a potent cross of Sensi Star and Sour Diesel.");
INSERT INTO Product VALUES ("M013", 11.27, 180, "Purple Haze", "Purple Haze is a sativa marijuana strain popularized by Jimi Hendrix’s 1967 classic song, Purple Haze.");
INSERT INTO Product VALUES ("M014", 44.82, 082, "Sunshine", "Sunshine, also known as 'Sunshine OG,' is a sativa marijuana strain made by crossing Chemdawg and Sunshine Daydream.");
INSERT INTO Product VALUES ("M015", 97.82, 097, "Dutch Hawaiian", "Dutch Hawaiian is a smooth sativa created by crossing Dutch Treat and Hawaiian Sativa.");

INSERT INTO Product VALUES ("E001", 20.53, 024, "Berocca", "When you need a quick boost of energy, try Berocca Boost! Get a fast-acting boost with Guarana, Caffeine and 12 essential beans and minerals to support your day.");
INSERT INTO Product VALUES ("E002", 69.10, 111, "Gummies", "Edible gummy lollies packed with THC. A safe and healthy way to get high.");
INSERT INTO Product VALUES ("E003", 93.57, 026, "CBD Oil Tincture", "Bean oil");
INSERT INTO Product VALUES ("E004", 73.87, 063, "Brownies", "Vegan, Gluten Free Infused Brownies");
INSERT INTO Product VALUES ("E005", 81.73, 020, "Tea Bags", "Tea bags made from food-grade nylon, packed with cannabis.");
