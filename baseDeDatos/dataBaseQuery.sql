-- done
DROP DATABASE IF EXISTS PM_SQL;
CREATE DATABASE IF NOT EXISTS PM_SQL;
USE PM_SQL;


create table empresa(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre_de_empresa varchar(255),
    img_logo varchar(255),
    img_banner varchar(255),
    direccion varchar(255),
    telefono varchar(255),
    tipo_de_plan int,
    erased BOOLEAN DEFAULT FALSE
);

CREATE TABLE empleado
(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    correo VARCHAR(255),
    password VARCHAR(255),
    descripcion varchar(255),
    cumple DATE,
    img VARCHAR(255),
    tipo_empleado varchar(255), -- admin, empleado, instructor
    erased BOOLEAN DEFAULT FALSE,
    id_empresa int,
    FOREIGN KEY (id_empresa) REFERENCES empresa(id)
);

create table empleado_sigue_instructor(
	id_empleado int,
    id_instructor int
);

CREATE TABLE sala
(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    ubicacion VARCHAR(255),
    image VARCHAR(255),
    erased BOOLEAN DEFAULT FALSE,
    id_empresa int,
    FOREIGN KEY (id_empresa) REFERENCES empresa(id)
);

CREATE TABLE curso
(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
   
    num_empleados int,
    
    descripcion_corta text,
    descripcion_larga text,
    dia date,
    hora_inicio time,
    hora_fin time,
    completado boolean,
    erased BOOLEAN DEFAULT FALSE,
    
    id_empresa int,
    id_instructor int,
	id_sala int,
    id_admin int
);

CREATE TABLE empleado_inscrito_a_Curso
(
	id_curso int,
    id_empleado int,
    asistio boolean,
    aprovo boolean,
    contesto_cuestionario boolean
);


create table notificacion(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_usuario int,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    visto boolean,
    mensaje varchar(255),
    id_curso int
    
);


DELIMITER //
CREATE FUNCTION empleado_existe(m_correo VARCHAR(255) ) RETURNS BOOLEAN
BEGIN
    DECLARE m_Slave INT;
	SELECT id INTO m_Slave FROM empleado WHERE correo = m_correo LIMIT 1;
    IF FOUND_ROWS() > 0 THEN
		RETURN (true);
    END IF;
    RETURN (false);
END //
DELIMITER ;


delimiter $$
create procedure registroEmpresa(IN m_nombre varchar(255), IN m_apellido varchar(255), in m_correo varchar(255), in m_password varchar(255), in m_tipo_plan int)
begin
    
	DECLARE m_id_empresa INT default -1;
    DECLARE m_id_empleado INT default -1;
	IF empleado_existe(m_correo) = FALSE THEN
    
			INSERT INTO empresa(nombre_de_empresa, img_logo, direccion, telefono, tipo_de_plan)
			VALUES (null, null, null, null, m_tipo_plan);
			
            Set m_id_empresa =  last_insert_id();
            
			INSERT INTO empleado(nombre, apellido, correo, password, descripcion, cumple, img, tipo_empleado,id_empresa)
			VALUES (m_nombre, m_apellido, m_correo, m_password,null, null, null, 'admin', m_id_empresa);
            
			Set m_id_empleado =  last_insert_id();
            
            SELECT 1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado;
    ELSE
		 SELECT -1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado;
    END IF;

	
end $$
delimiter;


DELIMITER //
CREATE PROCEDURE login(IN m_email VARCHAR(255), IN m_password VARCHAR(255))
BEGIN	
    
	SELECT id, nombre, apellido, correo, cumple, img, descripcion, tipo_empleado, id_empresa
    FROM empleado
    WHERE correo = m_email AND password = m_password AND erased = false;
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE registroEmpleado(IN m_nombre varchar(255), in m_correo varchar(255),  in m_id_empresa varchar(255) )
BEGIN


    DECLARE m_id_empleado INT default -1;
    Declare m_token varchar(255);
	IF empleado_existe(m_correo) = FALSE THEN
    
			INSERT INTO empleado(nombre, apellido, correo, password,descripcion, cumple, img, tipo_empleado,id_empresa)
			VALUES (m_nombre, null, m_correo, null, null, null, null, 'empleado', m_id_empresa);
            
			Set m_id_empleado =  last_insert_id();
			
            
            set m_token = uuid();
            INSERT INTO restaurar_password(email, token)
			values (m_correo, m_token);
            
            SELECT 1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado, m_token as token;
    ELSE
		 SELECT -1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado, '' as token;
    END IF;

END //


DELIMITER //
CREATE PROCEDURE registroInstructor(IN m_nombre VARCHAR(255), IN m_apellido VARCHAR(255), in m_correo varchar(255), in m_cumple date, IN m_descripcion VARCHAR(255), 
									IN m_img VARCHAR(255), IN id_empresa VARCHAR(255))
BEGIN


    DECLARE m_id_empleado INT default -1;
    Declare m_token varchar(255);
	IF empleado_existe(m_correo) = FALSE THEN
    
			INSERT INTO empleado(nombre, apellido, correo, password,descripcion, cumple, img, tipo_empleado, id_empresa)
			VALUES (m_nombre, m_apellido, m_correo, null, m_descripcion, m_cumple, m_img, 'instructor', m_id_empresa);
            
			Set m_id_empleado =  last_insert_id();
			
           
            set m_token = uuid();
            INSERT INTO restaurar_password(email, token)
			values (m_correo, m_token);
            
            SELECT 1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado, m_token as token;
    ELSE
		 SELECT -1 AS completado, m_id_empresa as id_empresa, m_id_empleado as id_empleado, '' as token;
    END IF;

END //


