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
	SELECT id, name, ubicacion, image FROM sala WHERE id_empresa = m_id_empresa LIMIT 1;
END //
DELIMITER ;



drop procedure if exists crear_sala;
DELIMITER &&
CREATE procedure crear_sala(m_name varchar(255), m_ubicacion varchar(255),m_cupo int, m_image varchar(255), m_id_empresa int)
BEGIN
	
    INSERT INTO sala(name, ubicacion, image, id_empresa, cupo, erased)VALUES (m_name, m_ubicacion, m_image, m_cupo, m_id_empresa, false);
	
    SELECT 1 AS completado, last_insert_id() AS id;
    
    
END &&
DELIMITER ;
