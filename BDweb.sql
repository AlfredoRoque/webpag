/*creacion de la dase de datos*/

drop database if exists gdlwebcamp;
create database gdlwebcamp CHARACTER SET utf8 COLLATE utf8_spanish_ci;
use gdlwebcamp;

/*tablas para los registros e invitados*/

create table categoria_evento(id_categoria int(11) not null auto_increment, cat_evento varchar(50) not null, icono varchar(20) not null, 
editado datetime not null, primary key(id_categoria))ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table invitados(invitado_id int(11) not null auto_increment, nombre_invitado varchar(30) not null, apellido_invitado varchar(30) not null, 
descripcion text not null, url_imagen varchar(50) not null, testimonial text not null, twiter varchar(20) not null,
editado datetime not null, primary key(invitado_id))ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table eventos(evento_id int(11) not null auto_increment, nombre_evento varchar(60) not null, fecha_evento Date, hora_evento Time, id_cat_evento int(11) not null,
id_inv int(11) not null, clave varchar(10),editado datetime not null, primary key (evento_id), foreign key (id_cat_evento) references categoria_evento (id_categoria), 
foreign key (id_inv) references invitados (invitado_id) ON DELETE CASCADE)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table regalos(id_regalo int(11) not null auto_increment, nombre_regalo varchar(50) not null, 
primary key(id_regalo))ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table registrados(id_registrado bigint(20) unsigned not null auto_increment, nombre_registrado varchar(50) not null, apellido_registrado varchar(50) not null, 
email_registrado varchar(100) not null, fecha_registro datetime, pases_articulos longtext not null, talleres_registrados longtext not null, 
regalo int(11) not null, total_pagado varchar(50) not null, pagado int(1) default 0 not null, primary key(id_registrado), 
foreign key (regalo) references regalos (id_regalo) ON DELETE CASCADE)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*tablas para administradores*/
create table admins(id_admin int(11) not null auto_increment, usuario varchar(50) not null, nombre varchar(100) not null, password varchar(60) not null, 
editado datetime not null, nivel int(1) not null, unique(usuario), primary key(id_admin))ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO categoria_evento(cat_evento, icono) VALUES('Seminario', 'fa-university');
INSERT INTO categoria_evento(cat_evento, icono) VALUES('Conferencias', 'fa-comment');
INSERT INTO categoria_evento(cat_evento, icono) VALUES('Talleres', 'fa-code');

                                                                                                        /*admin*/
INSERT INTO admins(usuario, nombre, password, editado, nivel) VALUES('admin', 'Alfredo', '$2y$12$MAAFtCKj0eQEy8RNZqjUQOT.ar7KSszqjTdmcchb1ASLXwheNyugq', NOW(), '1');

INSERT INTO regalos(nombre_regalo) VALUES('Pulseras');
INSERT INTO regalos(nombre_regalo) VALUES('Etiquetas');
INSERT INTO regalos(nombre_regalo) VALUES('Plumas');

INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Rafael','Bautista','Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas.','invitado1.jpg', 'este es mi testimonial', '@Rbautista');
INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Shari','Herrera','organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.','invitado2.jpg', 'este es mi testimonial', '@Sherrera');
INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Gregorio','Sanchez','especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.','invitado3.jpg', 'este es mi testimonial', '@Gsanchez');
INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Susana','Rivera','sintácticas y textuales que permiten transmitir de forma óptima la información.','invitado4.jpg', 'este es mi testimonial', '@Srivera');
INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Harold','Garcia','Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.','invitado5.jpg', 'este es mi testimonial', '@Hgarcia');
INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen, testimonial, twiter) VALUES ('Susan','Sanchez','Entre los distintos tipos se encuentra el párrafo científico que se caracteriza por contar con procedimientos especiales en la selección, organización y uso de las unidades morfológicas, léxicas, sintácticas y textuales que permiten transmitir de forma óptima la información.','invitado6.jpg', 'este es mi testimonial', '@Ssanchez');


 
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Flexbox', '2021-12-09', '12:00:00', '3', '2', 'taller_02');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'HTML5 y CSS3', '2021-12-09', '14:00:00', '3', '3', 'taller_03');

INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Drupal', '2021-12-09', '17:00:00', '3', '4', 'taller_04');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'WordPress', '2021-12-09', '19:00:00', '3', '5', 'taller_05');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Como ser freelancer', '2021-12-09', '10:00:00', '2', '6', 'conf_01');

INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Tecnologías del Futuro', '2021-12-09', '17:00:00', '2', '1', 'conf_02');

INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Seguridad en la Web', '2021-12-09', '19:00:00', '2', '2', 'conf_03');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Diseño UI y UX para móviles', '2021-12-09', '10:00:00', '1', '6', 'sem_01');




INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'AngularJS', '2021-12-10', '10:00:00', '3', '1', 'taller_06');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'PHP y MySQL', '2021-12-10', '12:00:00', '3', '2', 'taller_07');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'JavaScript Avanzado', '2021-12-10', '14:00:00', '3', '3', 'taller_08');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'SEO en Google', '2021-12-10', '17:00:00', '3', '4', 'taller_09');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'De Photoshop a HTML5 y CSS3', '2021-12-10', '19:00:00', '3', '5', 'taller_10');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'PHP Intermedio y Avanzado', '2021-12-10', '21:00:00', '3', '6', 'taller_11');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Como crear una tienda online que venda millones en pocos días', '2021-12-10', '10:00:00', '2', '6', 'conf_04');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Los mejores lugares para encontrar trabajo', '2021-12-10', '17:00:00', '2', '1', 'conf_05');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Pasos para crear un negocio rentable ', '2021-12-10', '19:00:00', '2', '2', 'conf_06');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Aprende a Programar en una mañana', '2021-12-10', '10:00:00', '1', '3', 'sem_02');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Diseño UI y UX para móviles', '2021-12-10', '17:00:00', '1', '5', 'sem_03');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Laravel', '2021-12-11', '10:00:00', '3', '1', 'taller_12');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Crea tu propia API', '2021-12-11', '12:00:00', '3', '2', 'taller_13');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'JavaScript y jQuery', '2021-12-11', '14:00:00', '3', '3', 'taller_14');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Creando Plantillas para WordPress', '2021-12-11', '17:00:00', '3', '4', 'taller_15');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Tiendas Virtuales en Magento', '2021-12-11', '19:00:00', '3', '5', 'taller_16');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Como hacer Marketing en línea', '2021-12-11', '10:00:00', '2', '6', 'conf_07');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Con que lenguaje debo empezar?', '2021-12-11', '17:00:00', '2', '2', 'conf_08');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Frameworks y librerias Open Source', '2021-12-11', '19:00:00', '2', '3', 'conf_09');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Creando una App en Android en una mñana', '2021-12-11', '10:00:00', '1', '4', 'sem_04');
INSERT INTO `gdlwebcamp`.`eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES (NULL, 'Creando una App en iOS en una tarde', '2021-12-11', '17:00:00', '1', '1', 'sem_05');