USE proyecto;

INSERT INTO familias VALUES (111,"Conservas");
INSERT INTO familias VALUES (222,"Bebidas");
INSERT INTO familias VALUES (333,"Alacena");
INSERT INTO familias VALUES (444,"Congelados");
INSERT INTO familias VALUES (555,"Higiene");



INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Pepe","932 98 91 32");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Pipo","932 82 82 13");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Papa","932 51 53 97");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Tete","932 97 47 61");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Lepa","924 78 10 18");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Vepo","993 73 61 09");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Kipo","912 75 98 12");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Qupo","912 12 21 12");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Timo","976 67 67 76");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Nino","932 71 61 93");
INSERT INTO tiendas (nombre,tlf) VALUES ("Ultramarinos Hito","932 98 91 32");

INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de conservas (albondigas)","Albondigas","Lata de aluminio con albondigas en salsa de tomate",5.99,"111");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de cerveza","Cerveza","Lata de aluminio con cerveza",0.99,"222");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de cocacola","cocacola","Lata de aluminio con cocacola",0.99,"222");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de fanta","Fanta","Lata de aluminio con fanta",0.99,"222");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Blister de queso en lonchas","Queso","Blister de plastico con queso havarti en lonchas", 3.99 ,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Blister de Jamon de York","York","Blister de plastico con jamon de york en lonchas",2.99,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Blister de bacon ahumado","Bacon","Blister de plastico con bacon ahumado en lonchas",3.99,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Docena de huevos","Huevos","Carton de huevos, una docena tamaño XL",4.99,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de conservas (anchoas)","Anchoas","Lata de aluminio con anchoas en salsa",6.99,"111");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Pizza congelada tomate","Pizza margerita","Pizza de tomate y queso mozzarella precocinada",12.99,"444");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Pizza congelada jamon","Pizza jamon","Pizza de tomate, queso mozzarella y jamon precocinada",12.99,"444");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Pizza congelada bbq","Pizza bbq","Pizza de tomate, queso mozzarella, carne y salsa bbq precocinada",13.99,"444");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Chorizo de pamplona","Chorizo","Chorizo de pamplona en lonchas",3.99,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Lata de pepsi","Pepsi","Lata de aluminio con Pepsi",0.99,"222");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Botella de vino","Vino","Botella de 750ml de vino de la ribera del duero",3.99,"222");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Chocolate","Choco","Tableta de chocolate con leche",2.99,"333");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Pañuelos suaves","Pañuelos","Pañuelos de papel suave",1.99,"555");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Gel de ducha","Gel","Gel de ducha con esencia de coco 400ml",4.99,"555");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Pasta de dientes","Dentifrico","Pasta de dientes sabor menta 200ml",2.99,"555");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Preservativos","Condones","Condones sabor cebolla",15.99,"555");
INSERT INTO productos (nombre,nombre_corto,descripcion,pvp,familia) VALUES ("Limpiador anti manchas","Limpiador","Limpiador de superficies anti manchas con quitagrasa",7.99,"555");


INSERT INTO stocks VALUES ("1", "1", 3);
INSERT INTO stocks VALUES ("1", "3", 12);
INSERT INTO stocks VALUES ("2", "2", 24);
INSERT INTO stocks VALUES ("2" , "5", 24);
INSERT INTO stocks VALUES ("3", "2" , 12);
INSERT INTO stocks VALUES ("3", "8", 1);
INSERT INTO stocks VALUES ("4", "5", 2);
INSERT INTO stocks VALUES ("4", "7", 5);
INSERT INTO stocks VALUES ("5", "1", 6);
INSERT INTO stocks VALUES ("6", "10", 17);
