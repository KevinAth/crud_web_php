CREATE DATABASE crud_php;

use crud_php;

CREATE TABLE products(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(60) NOT NULL,
  categoria VARCHAR(60),
  descripcion VARCHAR(255),
  precio INT NOT NULL
);

DESCRIBE products;
