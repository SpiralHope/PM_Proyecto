use workclas_PM;


drop table if exists imgTotales;
create table imgTotales(
	id int,
    total int
);

insert into imgTotales(id, total) values(1,0);


drop procedure if exists actualizarImg;
DELIMITER //
CREATE procedure actualizarImg()
BEGIN
    update imgTotales set total = total+1 where id = 1;
    
END //
DELIMITER ;

drop procedure if exists obtenerImg;
DELIMITER //
CREATE procedure obtenerImg()
BEGIN
    select total from imgTotales where id = 1 limit 1;
    
END //
DELIMITER ;


drop procedure if exists obtener_un_empleado;
DELIMITER //
CREATE procedure obtener_un_empleado(m_id int)
BEGIN
	SELECT id, nombre, apellido, correo, descripcion, img, tipo_empleado, id_empresa FROM empleado WHERE id = m_id LIMIT 1;
END //
DELIMITER ;


drop procedure if exists obtener_instructores;
DELIMITER //
CREATE procedure obtener_instructores(m_id_empresa int)
BEGIN
	SELECT id, nombre, apellido, correo, descripcion, img, tipo_empleado, id_empresa FROM empleado WHERE id_empresa = m_id_empresa AND tipo_empleado = 'instructor';
END //
DELIMITER ;


drop procedure if exists obtener_empleados;
DELIMITER //
CREATE procedure obtener_empleados(m_id_empresa int)
BEGIN
	SELECT id, nombre, apellido, correo, descripcion, img, tipo_empleado, id_empresa FROM empleado WHERE id_empresa = m_id_empresa AND tipo_empleado = 'empleado';
END //
DELIMITER ;


drop procedure if exists obtener_empleados_curso;
DELIMITER //
CREATE procedure obtener_empleados_curso(m_id_curso int)
BEGIN
	SELECT 	eic.id_curso as id_curso, eic.id_empleado as id_empleado, 
			eic.asistio as asistio, eic.aprovo as aprovo, eic.contesto_cuestionario as contesto_cuestionario,
            emp.nombre, emp.apellido, emp.correo, emp.descripcion, emp.img, emp.id_empresa
    FROM curso as c 
    join empleado_inscrito_a_Curso as eic on c.id = eic.id_curso 
    join empleado as emp on eic.id_empleado = emp.id  
    
    WHERE c.id = m_id_curso;
    
END //
DELIMITER ;


drop procedure if exists obtener_un_empleado_curso;
DELIMITER //
CREATE procedure obtener_un_empleado_curso(m_id_curso int, m_id_emp int)
BEGIN
	SELECT 	eic.id_curso as id_curso, eic.id_empleado as id_empleado, 
			eic.asistio as asistio, eic.aprovo as aprovo, eic.contesto_cuestionario as contesto_cuestionario,
            emp.nombre, emp.apellido, emp.correo, emp.descripcion, emp.img, emp.id_empresa
    FROM empleado_inscrito_a_Curso as eic 
    join empleado as emp on eic.id_empleado = emp.id  
    
    WHERE eic.id_curso = m_id_curso AND eic.id_empleado = m_id_emp
    limit 1;
    
END //
DELIMITER ;



drop procedure if exists obtener_curso;
DELIMITER //
CREATE procedure obtener_curso(m_id int)
BEGIN
	SELECT id, nombre, num_empleados, descripcion_larga, dia, hora_inicio, hora_fin, completado, id_instructor, id_sala FROM curso WHERE id = m_id LIMIT 1;
END //
DELIMITER ;


drop procedure if exists obtener_sala;
DELIMITER //
CREATE procedure obtener_sala(m_id int)
BEGIN
	SELECT id, name, ubicacion, image FROM sala WHERE id = m_id LIMIT 1;
END //
DELIMITER ;


drop procedure if exists obtener_todas_salas;
DELIMITER //
CREATE procedure obtener_todas_salas(m_id_empresa int)
BEGIN
	SELECT id, name, ubicacion, image, cupo FROM sala WHERE id_empresa = m_id_empresa;
END //
DELIMITER ;

call obtener_todas_salas(1);


drop procedure if exists crear_sala;
DELIMITER &&
CREATE procedure crear_sala(m_name varchar(255), m_ubicacion varchar(255),m_cupo int, m_image varchar(255), m_id_empresa int)
BEGIN
	
    INSERT INTO sala(name, ubicacion, image, id_empresa, cupo, erased)VALUES (m_name, m_ubicacion, m_image,  m_id_empresa, m_cupo, false);
	
    SELECT 1 AS completado, last_insert_id() AS id;
    
    
END &&
DELIMITER ;

drop procedure if exists crear_curso;
DELIMITER &&
CREATE procedure crear_curso(m_nombre varchar(255), m_fecha date, m_descripcion varchar(255), m_hora_inicio time,  m_hora_fin time,  m_id_sala int, m_id_inst int, m_id_admin int, m_id_empresa int)
BEGIN

	INSERT INTO curso(	nombre, num_empleados, descripcion_corta, descripcion_larga, dia, hora_inicio, 
                        hora_fin, completado, id_empresa, id_instructor, id_sala, id_admin)
			VALUES (	m_nombre, 0, m_descripcion, m_descripcion, m_fecha, m_hora_inicio, 
						m_hora_fin, false, m_id_empresa, m_id_inst, m_id_sala, m_id_admin);
    SELECT 1 AS completado, last_insert_id() AS id;
    
END &&
DELIMITER ;

drop procedure if exists eventos_admin;
DELIMITER //
CREATE procedure eventos_admin(m_id_empresa int)
BEGIN
	SELECT 	curso.nombre as title, curso.num_empleados as numero_empleados, curso.descripcion_corta , curso.dia, curso.hora_inicio, 
			curso.hora_fin, curso.completado,
			
            sala.name as sala_nombre,  sala.ubicacion as sala_ubicacion,  sala.image as sala_imagen,  sala.cupo as sala_cupo,
            
            concat(empleado.nombre,' ', empleado.apellido) as instructor_nombre, 
            empleado.descripcion as instructor_desc, empleado.img as instructor_img
            
            FROM curso join sala on sala.id = curso.id_sala join empleado on empleado.id = curso.id_instructor
            
            WHERE curso.id_empresa = m_id_empresa;
END //
DELIMITER ;



