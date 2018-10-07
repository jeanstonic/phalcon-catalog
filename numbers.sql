CREATE TABLE products (
	id int(5) NOT NULL AUTO_INCREMENT,
    name varchar(70) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO products (name) VALUES ('one'), ('two'), ('three'), ('four'), ('five'),
('six'), ('seven'), ('eight'), ('nine'), ('ten'), ('eleven'), ('twelve'), ('thirteen'),
('fourteen'), ('fifteen'), ('sixteen'), ('seventeen'), ('eighteen'), ('nineteen'), ('twenty');

CREATE TABLE categories (
	id int(5) NOT NULL AUTO_INCREMENT,
    name varchar(70) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO categories (name, parent_category_id) VALUES ('number', NULL), ('even', 1), ('odd', 1), ('prime', 1), ('composite', 1);


CREATE TABLE category_products (
      category_id int(5) NOT NULL,
      product_id int(5) NOT NULL,
);

INSERT INTO category_products (category_id, product_id) VALUES (1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6),
(1, 7), (1, 8), (1, 9), (1, 10), (1, 11), (1, 12), (1, 13), (1, 14), (1, 15), (1, 16), (1, 17), (1, 18), (1, 19),
(1, 20), (2, 2), (2, 4), (2, 6), (2, 8), (2, 10), (2, 12), (2, 14), (2, 16), (2, 18), (2, 20), (3, 1), (3, 3), (3, 5),
(3, 7), (3, 9), (3, 11), (3, 13), (3, 15), (3, 17), (3, 19), (4, 2), (4, 3), (4, 5), (4, 7), (4, 11), (4, 13), (4, 17),
(4, 19), (5, 4), (5, 6), (5, 8), (5, 9), (5, 10), (5, 12), (5, 14), (5, 15), (5, 16), (5, 18), (5, 20);
