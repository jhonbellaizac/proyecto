create database bd_proyecto;

use bd_proyecto;


CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE marca (
    id_marca INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proveedor (
    id_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,

    id_marca INT,
    id_categoria INT,
    id_proveedor INT,

    nombre VARCHAR(100),
    codigo INT UNIQUE,
    precio INT,
    fecha_ingreso DATE,
    stock INT,
    descripcion TEXT,

    FOREIGN KEY (id_marca) REFERENCES marca(id_marca),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
    FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
);



 

CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100),
    nombre VARCHAR(100),
    codigo INT UNIQUE,
    precio INT,
    fecha_ingreso DATE,
    stock INT,
    descripcion TEXT,
    categoria_id INT
);




INSERT INTO marcas
(nombre, descripcion) 
VALUES

('Hikvision', 'Equipos de videovigilancia y seguridad'),

('Dahua', 'Soluciones de cámaras y monitoreo'),

('Ezviz', 'Cámaras inteligentes para hogares'),

('Honeywell', 'Alarmas y automatización'),

('Bosch', 'Sensores y equipos de seguridad');



INSERT INTO producto (
    marca_id, categoria_id, nombre, codigo, precio, stock, descripcion, created_at, updated_at)

VALUES

(1,1,'Cámara IP 1080p','1001',250000,15,'Cámara de seguridad Full HD',NOW(),NOW()),

(2,1,'Cámara CCTV HD','1002',180000,20,'Cámara CCTV para exteriores',NOW(),NOW()),

(3,1,'Cámara WiFi Inteligente','1003',300000,10,'Cámara inteligente con conexión WiFi',NOW(),NOW()),

(4,2,'Alarma Residencial','1004',450000,8,'Sistema de alarma para hogar',NOW(),NOW()),

(5,3,'Sensor de Movimiento','1005',120000,25,'Sensor infrarrojo de movimiento',NOW(),NOW());

 

 

INSERT INTO proveedor (nombre, telefono, email) VALUES

('Seguridad Colombia SAS', '3001234567', 'ventas@seguridadcol.com'),

('Alarmas del Valle', '3019876543', 'contacto@alarmasvalle.com'),

('Tech Security Ltda', '3024567890', 'info@techsecurity.com'),

('Distribuciones CCTV', '3041122334', 'ventas@cctvdistribuciones.com');

 

INSERT INTO categorias (nombre, descripcion, activo, created_at, updated_at) VALUES

('Cámaras de Seguridad', 'Cámaras IP, CCTV, vigilancia', 1, NOW(), NOW()),

('Alarmas', 'Sistemas de alarma para hogares y empresas', 1, NOW(), NOW()),

('Sensores', 'Sensores de movimiento, humo, apertura', 1, NOW(), NOW()),

('Control de Acceso', 'Lectores biométricos, tarjetas RFID', 1, NOW(), NOW()),

('Videovigilancia', 'Equipos DVR, NVR y monitoreo', 1, NOW(), NOW());