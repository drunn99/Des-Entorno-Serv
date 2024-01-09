DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;


CREATE TABLE familias(
    cod VARCHAR(6) PRIMARY KEY,
    nombre VARCHAR(200) not null
);

CREATE TABLE tiendas(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) not null,
    tlf VARCHAR(13) not null
);

CREATE TABLE productos(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200) not null,
    nombre_corto VARCHAR(50) UNIQUE,
    descripcion VARCHAR(300) not null,
    pvp numeric(5,2) not null,
    familia VARCHAR(6),
    FOREIGN KEY (familia) REFERENCES familias(cod)
);

CREATE TABLE stocks(
    producto int(11),
    tienda int(11),
    FOREIGN KEY (producto) REFERENCES productos(id),
    FOREIGN KEY (tienda) REFERENCES tiendas(id),
    PRIMARY KEY (producto,tienda),
    unidades int(10) unsigned not null
);

DROP USER IF EXISTS 'gestor';
CREATE USER 'gestor' IDENTIFIED BY 'secreto';
GRANT ALL PRIVILEGES ON proyecto.* TO 'gestor';