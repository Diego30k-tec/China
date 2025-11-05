use restaurante;
create table clientes(
 id_cliente int auto_increment primary key,
 nombre varchar(100) not null,
 correo varchar(100) unique not null,
 pass varchar(100) not null,
 roles enum("cocinero","cajero","mesero","cliente") not null default "cliente"
 )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
 create table mesas(
 id_mesa int,
 nombre varchar(100) not null,
 correo varchar(100) unique not null
 );
 
 create table pedidos_tipos(
id_pedido int auto_increment primary key,
id_cliente int,
descripcion varchar(100) not null
);

 create table tipos(
 id_tipo int primary key,
 id_pedido int not null,
 nombre_plato varchar(100) not null,
 precio decimal(10,2) not null
 );
 SELECT * FROM clientes;
 