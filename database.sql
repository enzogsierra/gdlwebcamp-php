/* Crear database */
DROP DATABASE IF EXISTS gdlwebcamp;
CREATE DATABASE gdlwebcamp;
USE gdlwebcamp;



/* Categorias */
CREATE TABLE gdlwebcamp.categorias 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(64) NOT NULL,
    icono VARCHAR(16) DEFAULT NULL
);
INSERT INTO gdlwebcamp.categorias (titulo, icono) 
VALUES 
    ('Seminario', 'fa-university'),
    ('Conferencia', 'fa-comment'),
    ('Taller', 'fa-code')
;


/* Fechas */
CREATE TABLE gdlwebcamp.fechas
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL
);
INSERT INTO gdlwebcamp.fechas (fecha)
VALUES
    ('2021-12-09'),
    ('2021-12-10'),
    ('2021-12-11')
;


/* Invitados */
CREATE TABLE gdlwebcamp.invitados 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(32) NOT NULL,
    apellido VARCHAR(32) NOT NULL,
    descripcion VARCHAR(144),
    img VARCHAR(50) DEFAULT NULL
);
INSERT INTO gdlwebcamp.invitados (nombre, apellido, descripcion, img) 
VALUES 
    ('Rafael', 'Bautista', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis auctor quam in suscipit', 'invitado1.jpg'),
    ('Shari', 'Herrera', 'Integer porttitor sem a malesuada elementum', 'invitado2.jpg'),
    ('Gregorio', 'Sánchez', 'Maecenas eget ex eu odio facilisis placerat dignissim nec magna', 'invitado3.jpg'),
    ('Susana', 'Rivera', 'Morbi nibh velit, dictum vel est et, porttitor maximus lacus. Nulla lobortis porttitor eros, in sagittis purus volutpat vitae', 'invitado4.jpg'),
    ('Harold', 'García', 'Praesent auctor a dui non faucibus. Vestibulum nec ipsum risus. Donec ac lacinia tellus.', 'invitado5.jpg'),
    ('María', 'Córdoba', 'Pellentesque tincidunt erat suscipit auctor ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 'invitado6.jpg')
;


/* Eventos */
CREATE TABLE gdlwebcamp.eventos 
(
    id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(64) NOT NULL,
    hora DATE NOT NULL,
    fechaId TINYINT,
    categoriaId TINYINT,
    invitadoId TINYINT,
    CONSTRAINT FK_fchEvento FOREIGN KEY (fechaId) REFERENCES fechas(id),
    CONSTRAINT FK_catEvento FOREIGN KEY (categoriaId) REFERENCES categorias(id),
    CONSTRAINT FK_invEvento FOREIGN KEY (invitadoId) REFERENCES invitados(id)
);
INSERT INTO gdlwebcamp.eventos (titulo, hora, fechaId, categoriaId, invitadoId) 
VALUES 
    ('Responsive Web Design',                                       '10:00:00', '1', '3', '1'),
    ('Flexbox',                                                     '12:00:00', '1', '3', '2'),
    ('HTML5 y CSS3',                                                '14:00:00', '1', '3', '3'),
    ('Drupal',                                                      '17:00:00', '1', '3', '4'),
    ('WordPress',                                                   '19:00:00', '1', '3', '5'),
    ('Cómo ser freelancer',                                         '10:00:00', '1', '2', '6'),
    ('Tecnologías del Futuro',                                      '17:00:00', '1', '2', '1'),
    ('Seguridad en la Web',                                         '19:00:00', '1', '2', '2'),
    ('Diseño UX/UI para móviles',                                   '10:00:00', '1', '1', '6'),
    ('AngularJS',                                                   '10:00:00', '2', '3', '1'),
    ('PHP y MySQL',                                                 '12:00:00', '2', '3', '2'),
    ('JavaScript Avanzado',                                         '14:00:00', '2', '3', '3'),
    ('SEO en Google',                                               '17:00:00', '2', '3', '4'),
    ('De Photoshop a HTML5 y CSS3',                                 '19:00:00', '2', '3', '5'),
    ('PHP Intermedio y Avanzado',                                   '21:00:00', '2', '3', '6'),
    ('Cómo crear una tienda online que venda millones en días',     '10:00:00', '2', '2', '6'),
    ('Los mejores lugares para encontrar trabajo',                  '17:00:00', '2', '2', '1'),
    ('Pasos para crear un negocio rentable ',                       '19:00:00', '2', '2', '2'),
    ('Aprende a programar en una mañana',                           '10:00:00', '2', '1', '3'),
    ('Programación Orientada a Objetos',                            '17:00:00', '2', '1', '5'),
    ('Laravel',                                                     '10:00:00', '3', '3', '1'),
    ('Crea tu propia API',                                          '12:00:00', '3', '3', '2'),
    ('JavaScript y jQuery',                                         '14:00:00', '3', '3', '3'),
    ('Creando plantillas para WordPress',                           '17:00:00', '3', '3', '4'),
    ('Tiendas virtuales en Magento',                                '19:00:00', '3', '3', '5'),
    ('Cómo hacer Marketing en línea',                               '10:00:00', '3', '2', '6'),
    ('¿Con qué lenguaje debo empezar?',                             '17:00:00', '3', '2', '2'),
    ('Frameworks y libreríaas Open Source',                         '19:00:00', '3', '2', '3'),
    ('Creando una App en Android en una mañana',                    '10:00:00', '3', '1', '4'),
    ('Creando una App en iOS en una tarde',                         '17:00:00', '3', '1', '1')
;


/* Registrados */
CREATE TABLE gdlwebcamp.registrados
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(32) NOT NULL,
    apellido VARCHAR(32) NOT NULL,
    email VARCHAR(64) NOT NULL,
    pedido VARCHAR(128) NOT NULL,
    pago DECIMAL(10,2) NOT NULL
);


/* Tickets */
CREATE TABLE gdlwebcamp.tickets
(
    id TINYINT AUTO_INCREMENT PRIMARY KEY,
    precio DECIMAL(10,2) NOT NULL,
    nFechas TINYINT NOT NULL,
    beneficios VARCHAR(256)
);
INSERT INTO gdlwebcamp.tickets (precio, nFechas, beneficios)
VALUES
    ('30.0', '1', '{"1": "Bocadillos gratis", "2": "Todos los eventos"}'),
    ('50.0', '0', '{"1": "Bocadillos gratis", "2": "Todos los eventos", "3": "Te llevas un regalo!"}'),
    ('45.0', '2', '{"1": "Bocadillos gratis", "2": "Todos los eventos"}')
;