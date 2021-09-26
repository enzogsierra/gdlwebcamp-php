/* Crear database */
DROP DATABASE IF EXISTS gdlwebcamp;
CREATE DATABASE gdlwebcamp;
USE DATABASE gdlwebcamp;

/* Crear tablas */
CREATE TABLE gdlwebcamp.categorias 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(64) NOT NULL,
    icono VARCHAR(16) DEFAULT NULL
);

CREATE TABLE gdlwebcamp.invitados 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(32) NOT NULL,
    apellido VARCHAR(32) NOT NULL,
    descripcion VARCHAR(144),
    img VARCHAR(50) DEFAULT NULL
);

CREATE TABLE gdlwebcamp.eventos 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(64) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    clave VARCHAR(10) NOT NULL,
    categoriaId TINYINT,
    invitadoId TINYINT,
    CONSTRAINT FK_catEvento FOREIGN KEY (categoriaId) REFERENCES categorias(id),
    CONSTRAINT FK_invEvento FOREIGN KEY (invitadoId) REFERENCES invitados(id)
);


/* Insertar datos en la tabla 'categorias' */
INSERT INTO gdlwebcamp.categorias (titulo, icono) 
VALUES 
    ('Seminario', 'fa-university'),
    ('Conferencia', 'fa-comment'),
    ('Taller', 'fa-code')
;

/* Insertar datos en la tabla 'invitados' */
INSERT INTO gdlwebcamp.invitados (nombre, apellido, descripcion, img) 
VALUES 
    ('Rafael', 'Bautista', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis auctor quam in suscipit', 'invitado1.jpg'),
    ('Shari', 'Herrera', 'Integer porttitor sem a malesuada elementum', 'invitado2.jpg'),
    ('Gregorio', 'Sánchez', 'Maecenas eget ex eu odio facilisis placerat dignissim nec magna', 'invitado3.jpg'),
    ('Susana', 'Rivera', 'Morbi nibh velit, dictum vel est et, porttitor maximus lacus. Nulla lobortis porttitor eros, in sagittis purus volutpat vitae', 'invitado4.jpg'),
    ('Harold', 'García', 'Praesent auctor a dui non faucibus. Vestibulum nec ipsum risus. Donec ac lacinia tellus.', 'invitado5.jpg'),
    ('María', 'Córdoba', 'Pellentesque tincidunt erat suscipit auctor ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 'invitado6.jpg')
;

/* Insertar datos en la tabla 'eventos' */
INSERT INTO gdlwebcamp.eventos (titulo, fecha, hora, categoriaId, invitadoId, clave) 
VALUES 
    ('Responsive Web Design', '2021-12-09', '10:00:00', '3', '1', 'taller_01'),
    ('Flexbox', '2021-12-09', '12:00:00', '3', '2', 'taller_02'),
    ('HTML5 y CSS3', '2021-12-09', '14:00:00', '3', '3', 'taller_03'),
    ('Drupal', '2021-12-09', '17:00:00', '3', '4', 'taller_04'),
    ('WordPress', '2021-12-09', '19:00:00', '3', '5', 'taller_05'),
    ('Cómo ser freelancer', '2021-12-09', '10:00:00', '2', '6', 'conf_01'),
    ('Tecnologías del Futuro', '2021-12-09', '17:00:00', '2', '1', 'conf_02'),
    ('Seguridad en la Web', '2021-12-09', '19:00:00', '2', '2', 'conf_03'),
    ('Diseño UX/UI para móviles', '2021-12-09', '10:00:00', '1', '6', 'sem_01'),
    ('AngularJS', '2021-12-10', '10:00:00', '3', '1', 'taller_06'),
    ('PHP y MySQL', '2021-12-10', '12:00:00', '3', '2', 'taller_07'),
    ('JavaScript Avanzado', '2021-12-10', '14:00:00', '3', '3', 'taller_08'),
    ('SEO en Google', '2021-12-10', '17:00:00', '3', '4', 'taller_09'),
    ('De Photoshop a HTML5 y CSS3', '2021-12-10', '19:00:00', '3', '5', 'taller_10'),
    ('PHP Intermedio y Avanzado', '2021-12-10', '21:00:00', '3', '6', 'taller_11'),
    ('Cómo crear una tienda online que venda millones en días', '2021-12-10', '10:00:00', '2', '6', 'conf_04'),
    ('Los mejores lugares para encontrar trabajo', '2021-12-10', '17:00:00', '2', '1', 'conf_05'),
    ('Pasos para crear un negocio rentable ', '2021-12-10', '19:00:00', '2', '2', 'conf_06'),
    ('Aprende a programar en una mañana', '2021-12-10', '10:00:00', '1', '3', 'sem_02'),
    ('Programación Orientada a Objetos', '2021-12-10', '17:00:00', '1', '5', 'sem_03'),
    ('Laravel', '2021-12-11', '10:00:00', '3', '1', 'taller_12'),
    ('Crea tu propia API', '2021-12-11', '12:00:00', '3', '2', 'taller_13'),
    ('JavaScript y jQuery', '2021-12-11', '14:00:00', '3', '3', 'taller_14'),
    ('Creando plantillas para WordPress', '2021-12-11', '17:00:00', '3', '4', 'taller_15'),
    ('Tiendas virtuales en Magento', '2021-12-11', '19:00:00', '3', '5', 'taller_16'),
    ('Cómo hacer Marketing en línea', '2021-12-11', '10:00:00', '2', '6', 'conf_07'),
    ('¿Con qué lenguaje debo empezar?', '2021-12-11', '17:00:00', '2', '2', 'conf_08'),
    ('Frameworks y libreríaas Open Source', '2021-12-11', '19:00:00', '2', '3', 'conf_09'),
    ('Creando una App en Android en una mañana', '2021-12-11', '10:00:00', '1', '4', 'sem_04'),
    ('Creando una App en iOS en una tarde', '2021-12-11', '17:00:00', '1', '1', 'sem_05')
;