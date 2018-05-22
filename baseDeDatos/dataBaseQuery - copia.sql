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






drop function if exists is_search_by_date;
DELIMITER //
CREATE FUNCTION is_search_by_date(date date) RETURNS BOOLEAN
BEGIN
	IF date is null or ltrim(rtrim( date )) = '' or date < '2000-01-01' THEN
		RETURN (FALSE);
    ELSE
		RETURN (TRUE);
    END IF;
END //
DELIMITER ;

drop function if exists is_search_by_title;
DELIMITER //
CREATE FUNCTION is_search_by_title(title VARCHAR(255)) RETURNS BOOLEAN
BEGIN
	IF title is null or ltrim(rtrim( title )) = '' or title = 'null' THEN
		RETURN (FALSE);
    ELSE
		RETURN (TRUE);
    END IF;
END //
DELIMITER ;

drop function if exists is_search_by_name;
DELIMITER //
CREATE FUNCTION is_search_by_name(name VARCHAR(255)) RETURNS BOOLEAN
BEGIN
	IF name is null or ltrim(rtrim( name )) = '' or name = 'null' THEN
		RETURN (FALSE);
    ELSE
		RETURN (TRUE);
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE signup(IN name VARCHAR(255), IN father_surname VARCHAR(255), IN mother_surname VARCHAR(255),
IN email VARCHAR(255), IN password VARCHAR(255), IN birthday DATE, IN phone VARCHAR(20), IN image LONGBLOB,
IN is_reporter BOOLEAN)
BEGIN
	DECLARE newuser INT;
	IF is_this_user_signed_up(email) = FALSE THEN
		IF is_this_admin_signed_up(email) = FALSE THEN
			INSERT INTO user(name, father_surname, mother_surname, email, password, birthday, phone, image, is_reporter)
			VALUES (name, father_surname, mother_surname, email, password, birthday, phone, image, is_reporter);
            SELECT 1 AS RESPONSE;
		ELSE
			SELECT -1 AS RESPONSE;
		END IF;
	ELSE
		SELECT -1 AS RESPONSE;
    END IF;
END //

DELIMITER //
CREATE PROCEDURE signupAdmin(IN email VARCHAR(255), IN password VARCHAR(255))
BEGIN
	IF is_this_user_signed_up(email) = FALSE THEN
		IF is_this_admin_signed_up(email) = FALSE THEN
			INSERT INTO admin (email, password) VALUES (email, password);
		END IF;
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE login(IN mEmail VARCHAR(255), IN mPassword VARCHAR(255))
BEGIN	
	SELECT id, name, father_surname, mother_surname, email, password, birthday, phone, image, signup_date, is_reporter
    FROM user
    WHERE email = mEmail AND password = mPassword AND erased = FALSE;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginAdmin(IN mEmail VARCHAR(255), IN mPassword VARCHAR(255))
BEGIN	
	SELECT id, email, password, signup_date
    FROM admin
    WHERE email = mEmail AND password = mPassword AND erased = FALSE;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE updateProfile(IN myId INT, IN name VARCHAR(255), IN father_surname VARCHAR(255), IN mother_surname VARCHAR(255),
IN email VARCHAR(255), IN password VARCHAR(255), IN birthday DATE, IN phone VARCHAR(20))
BEGIN
	UPDATE user SET name=name, father_surname=father_surname, mother_surname=mother_surname, email=email,
    password=password, birthday=birthday, phone=phone WHERE id = myId;
END //
DELIMITER ;


Drop PROCEDURE if exists updateProfileJson;
DELIMITER //
CREATE PROCEDURE updateProfileJson(IN myId INT, IN name VARCHAR(255), IN father_surname VARCHAR(255), IN mother_surname VARCHAR(255),
IN email VARCHAR(255), IN password VARCHAR(255), IN birthday DATE, IN phone VARCHAR(20))
BEGIN
Declare changes int default 0;

if myId is not null AND myId > 0 
then
    if name is not null And ltrim(rtrim(name)) != ''
    then
		UPDATE user SET name=name WHERE id = myId;
        set changes := changes+1;
    end if;
    
    if father_surname is not null And ltrim(rtrim(father_surname)) != ''
    then
		UPDATE user SET father_surname=father_surname WHERE id = myId;
        set changes := changes+1;
    end if;
    
    if mother_surname is not null And ltrim(rtrim(mother_surname)) != ''
    then
		UPDATE user SET mother_surname=mother_surname WHERE id = myId;
        set changes := changes+1;
    end if;
    
    if email is not null And ltrim(rtrim(email)) != ''
    then
		UPDATE user SET email=email WHERE id = myId;
        set changes := changes+1;
    end if;
    
	if password is not null And ltrim(rtrim(password)) != ''
    then
		UPDATE user SET password=password WHERE id = myId;
        set changes := changes+1;
    end if;
    
	if birthday is not null
    then
		UPDATE user SET birthday = birthday WHERE id = myId;
        set changes := changes+1;
    end if;
    
    if phone is not null And ltrim(rtrim(phone)) != ''
    then
		UPDATE user SET phone=phone WHERE id = myId;
        set changes := changes+1;
    end if;
end if;
	select changes as updates;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE updateProfileImage(IN myId INT, IN image LONGBLOB)
BEGIN
	UPDATE user SET image=image WHERE id = myId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginProfileImage(IN myId INT)
BEGIN
	select image from user WHERE id = myId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE signupSection(IN admin_id INT, IN name VARCHAR(255), IN sequence INT)
BEGIN
	INSERT INTO section(admin_id, name, sequence) VALUES (admin_id, name, sequence);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginSections()
BEGIN
	SELECT id, admin_id, name, sequence, signup_date, erased
    FROM section
    WHERE erased = false
    ORDER BY sequence;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE updateSection(IN myId INT, IN name VARCHAR(255), IN sequence INT)
BEGIN
	UPDATE section SET name=name, sequence=sequence WHERE id=myId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE loginReporters()
BEGIN	
	SELECT id, name, father_surname, mother_surname, email, password, birthday, phone, image, signup_date, is_reporter
    FROM user
    WHERE erased = FALSE AND is_reporter = TRUE;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE erase(IN myId INT)
BEGIN
	DECLARE is_reporter BOOLEAN;
	SELECT is_reporter INTO is_reporter FROM user WHERE id = myId;
	UPDATE user SET erased=true WHERE id=myId;
    IF is_reporter = TRUE THEN
		UPDATE news SET erased=TRUE WHERE reporter_id=myId AND validated = FALSE;
	END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE eraseSection(IN myId INT)
BEGIN
	UPDATE section SET erased=true WHERE id=myId;
	
    Update news set erased = true where section_id = myId;
    
END //
DELIMITER ;


drop procedure if exists loginNewsToValidate;
DELIMITER //
CREATE PROCEDURE loginNewsToValidate()
BEGIN


	SELECT id, reporter_id, section_id, image_id_thumbnail, title AS name
    FROM news WHERE erased=false AND validated=false;
    
    
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE updateNewsValidate(IN myId INT)
BEGIN
	UPDATE news SET validated=TRUE WHERE id=myId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE updateNewsEdit(IN newsId INT, IN reporter_idParam INT, IN titleParam varchar(255), IN descParam varchar(255), IN newSectionId INT)
BEGIN

	UPDATE news SET title = titleParam , description = descParam, section_id = newSectionId WHERE id=newsId AND reporter_id = reporter_idParam AND validated = false;
    
END //
DELIMITER ;

DELIMITER //
Create Procedure deleteNewsEdit(IN newsId INT, IN reporter_idParam INT)
BEGIN

	UPDATE news SET erased = true WHERE id = newsId AND reporter_id = reporter_idParam AND validated = false;
    
END //
DELIMITER ;

-- Querys added/modified for news editor

drop function IF exists getMaxSequence;
Delimiter //
create function getMaxSequence(news_idParam INT)
Returns INT
Not Deterministic
Begin

	Declare numSeg INT;
	Set numSeg := 0;
	Select max(u.sequence) into numSeg from
		(
			Select sequence , news_id from video where news_id = news_idParam And erased = false
			union 
			Select sequence , news_id from image where news_id = news_idParam And erased = false
			union 
			Select sequence , news_id from text_content where news_id = news_idParam And erased = false
		) as u;
	
     
    if numSeg is null
    then
     Set numSeg := 0;
	else
	 Set numSeg := numSeg + 1;
    end if;
    
	return numSeg;
        
End //
Delimiter ;


drop procedure IF exists signupVideo;
DELIMITER //
CREATE PROCEDURE signupVideo(IN news_idParam INT, IN url VARCHAR(255))
BEGIN
	Declare s Int;
    set s := getMaxSequence(news_idParam);
	INSERT INTO video(news_id, url,sequence, erased) VALUES (news_idParam, url, s ,false);
	SELECT last_insert_id() AS ID, s as sequence;
END //
DELIMITER ;

drop procedure IF exists signupImage;
DELIMITER //
CREATE PROCEDURE signupImage(IN news_idParam INT, IN url VARCHAR(255))
BEGIN     
	Declare s Int;
    set s := getMaxSequence(news_idParam);
	INSERT INTO image(news_id, url, sequence, erased) VALUES (news_idParam, url, s, false);
    SELECT last_insert_id() AS ID, s as sequence;
END //
DELIMITER ;

drop procedure IF exists signupText_Content;
DELIMITER //
CREATE PROCEDURE signupText_Content(IN news_idParam INT, IN contentParam Text)
BEGIN     
	Declare s Int;
    set s := getMaxSequence(news_idParam);
	INSERT INTO text_content(news_id, content, sequence, erased) VALUES (news_idParam, contentParam, s, false);
    SELECT last_insert_id() AS ID, s as sequence;
END //
DELIMITER ;

drop procedure IF exists updateSegmentSequence;
DELIMITER //
CREATE PROCEDURE updateSegmentSequence(IN segmentId INT, IN segmentType INT,IN newSequence INT)
BEGIN     

	/*
		0 for image;
        1 for video;
        2 for text;
    */
	IF segmentType = 0 THEN -- case for image sequence Update
        Update image Set sequence = newSequence where id = segmentId;
    ElseIF segmentType = 1 THEN -- case for video sequence Update
		Update video Set sequence = newSequence where id = segmentId;
	ElseIF segmentType = 2 THEN -- case for text_content sequence Update
		Update text_content Set sequence = newSequence where id = segmentId;
    END IF;
    
END //
DELIMITER ;

drop procedure IF exists updateSegmentMedia;
DELIMITER //
CREATE PROCEDURE updateSegmentMedia(IN segmentId INT, IN segmentType INT,IN urlParam Text)
BEGIN     

	
	IF segmentType = 0 THEN -- case for image sequence Update
        Update image Set url = urlParam where id = segmentId;
    ElseIF segmentType = 1 THEN -- case for video sequence Update
		Update video Set url = urlParam where id = segmentId;
    END IF;
    
END //
DELIMITER ;

drop procedure IF exists updateSegmentContent;
DELIMITER //
CREATE PROCEDURE updateSegmentContent(IN segmentId INT, IN contentParam Text)
BEGIN     
		Update text_content Set content = contentParam where id = segmentId;
END //
DELIMITER ;

drop procedure IF exists eraseSegment;
DELIMITER //
CREATE PROCEDURE eraseSegment(IN segmentId INT, IN segmentType INT)
BEGIN     
	
    Declare statusQuery int default 0;
    Declare total int default 0;
	Declare newsId int default 0;
	
	IF segmentType = 0 THEN -- case for image sequence Update
		
        select count(id) into total from fullNews where image_id_thumbnail = segmentId;
        
        if total = 0 then
            select news_id into newsId from image where id = segmentId;
             select count(news_id) into total from image where id != segmentId and news_id = newsId and erased = false and ltrim(rtrim(url)) != '';
             if total > 0
             then
				Update image Set erased = true where id = segmentId;
				set statusQuery = 1;
             End If;
        End If;
        
    ElseIF segmentType = 1 THEN -- case for video sequence Update
    
		 select news_id into newsId from video where id = segmentId;
		 select count(news_id) into total from video where id != segmentId and news_id = newsId and erased = false and ltrim(rtrim(url)) != '';
		 if total > 0
		 then
			Update video Set erased = true where id = segmentId;
			set statusQuery = 1;
		 End If;
	else
		 select news_id into newsId from text_content where id = segmentId;
		 select count(news_id) into total from text_content where id != segmentId and news_id = newsId and erased = false and ltrim(rtrim(content)) != '';
		 if total > 0
		 then
			 Update text_content Set erased = true where id = segmentId;
			set statusQuery = 1;
		 End If;
    
    END IF;
    
    
    select statusQuery as result;
    
END //
DELIMITER ;


drop procedure IF exists signupNews;
DELIMITER //
CREATE PROCEDURE signupNews(IN reporter_id INT, IN section_id INT,
IN title VARCHAR(255), IN description VARCHAR(255), IN content TEXT, IN breaking_news BOOLEAN)
BEGIN
	
    declare news_id INT;
    set news_id := null;
    
    
    
	INSERT INTO news(reporter_id, section_id, title, description, breaking_news)
    VALUES (reporter_id, section_id, title, description, breaking_news);
    
    set news_id := last_insert_id();
    IF content is not null OR ltrim(rtrim(content)) != '' then
		INSERT INTO text_content(news_id, content, sequence, erased) VALUES (news_id, content, getMaxSequence(news_id), false);
    end if;
    
    select news_id As RESPONSE, 'test' as Test;
    
END //
DELIMITER ;




-- end of newer/modified querys


drop procedure IF exists updateNewsThumbnail;
DELIMITER //
CREATE PROCEDURE updateNewsThumbnail(IN news_id INT, IN image_thumbnail_id INT)
BEGIN
	
    if (select count(id) from image where id = image_thumbnail_id And news_id = news_id AND erased = false) > 0
    Then
		UPDATE news SET image_id_thumbnail = image_thumbnail_id WHERE id = news_id;
        select 1 as result;
    else
		select 0 as result;
    End If;
	
END //
DELIMITER ;


drop view if exists editNews;
CREATE VIEW editNews AS
SELECT n.id, n.reporter_id, n.section_id, n.image_id_thumbnail, n.title AS name, n.description, 
n.breaking_news, n.date, i.url, s.name AS section_name, n.validated, n.erased,
 CONCAT(r.name, ' ', r.father_surname, ' ', r.mother_surname) AS reporter_name
FROM news AS n
INNER JOIN image AS i
ON n.image_id_thumbnail = i.id
INNER JOIN section AS s
ON n.section_id = s.id
INNER JOIN user AS r
ON n.reporter_id = r.id
WHERE n.erased=false AND n.validated=false;

drop view if exists fullNews;
CREATE VIEW fullNews AS
SELECT n.id, n.reporter_id, n.section_id, n.image_id_thumbnail, n.title AS name, n.description, 
n.breaking_news, n.date, n.likes, n.visits, n.comments, n.validated, n.erased, i.url,
s.name AS section_name, CONCAT(r.name, ' ', r.father_surname, ' ', r.mother_surname) AS reporter_name
FROM news AS n
INNER JOIN image AS i
ON n.image_id_thumbnail = i.id
INNER JOIN section AS s
ON n.section_id = s.id
INNER JOIN user AS r
ON n.reporter_id = r.id
WHERE n.erased=false AND n.validated=true AND s.erased = false;


drop view if exists fullImage;
CREATE VIEW fullImage AS
SELECT n.id AS news_id, i.id AS image_id, i.url, i.sequence
FROM image AS i
INNER JOIN news AS n
ON i.news_id = n.id
WHERE i.erased = false
AND n.erased = false ; -- and ltrim(rtrim(i.url)) != ''


drop view if exists fullVideo;
CREATE VIEW fullVideo AS
SELECT n.id AS news_id, v.id AS video_id, v.url, v.sequence
FROM video AS v
INNER JOIN news AS n
ON v.news_id = n.id
WHERE v.erased = false
AND n.erased = false; -- and ltrim(rtrim(v.url)) != '';


drop view if exists fullText_content;
CREATE VIEW fullText_content AS
SELECT n.id AS news_id, t.id AS text_id, t.content, t.sequence
FROM text_content AS t
INNER JOIN news AS n
ON t.news_id = n.id
WHERE t.erased = false
AND n.erased = false; -- and ltrim(rtrim(t.content)) != '';


CREATE VIEW fullUserComment AS
SELECT c.id, u.id AS user_id, u.image,
CONCAT(u.name, ' ', u.father_surname, ' ', u.mother_surname) AS user_name,
c.date, c.content, c.news_id
FROM user_comment_news AS c
INNER JOIN user AS u
ON c.user_id = u.id
WHERE c.erased = false;

CREATE VIEW fullAnonymousComment AS
SELECT c.id, a.id AS anonymous_id, "" AS image,
a.name AS user_name,
c.date, c.content, c.news_id
FROM user_comment_news AS c
INNER JOIN anonymous AS a
ON c.anonymous_id = a.id
WHERE c.erased = false;


-- used to obtain reporters in edition news
drop procedure if exists loginEditNews;
DELIMITER //
CREATE PROCEDURE loginEditNews(IN reporter_idParam INT)
BEGIN
	SELECT f.id, f.reporter_id, f.reporter_name, f.section_id, f.image_id_thumbnail, f.url,  
    f.name, f.description, f.date, f.section_name
	FROM editNews f
    WHERE (reporter_id = reporter_idParam  OR reporter_idParam < 0) AND validated = false;
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE loginNews(IN m_section_id INT, IN orderType INT)
BEGIN
	/*Para que sea el default, m_section_id debe ser negativo y orderType 0*/
    /*
		Nomenglatura de orderType
        0 = De la mas reciente a la mas antigua
        1 = De la mas visitada a la menos
        2 = De la que tenga mas comentarios a la de menos
        3 = Con mas me gusta a la de menos
    */
    IF m_section_id < 0 THEN
		IF orderType = 0 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
			ORDER BY date DESC;
        END IF;
        IF orderType = 1 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
			ORDER BY visits DESC;
        END IF;
        IF orderType = 2 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
			ORDER BY comments DESC;
        END IF;
        IF orderType = 3 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
			ORDER BY likes DESC;
        END IF;
		
	ELSE
		IF orderType = 0 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
            WHERE section_id=m_section_id
			ORDER BY date DESC;
        END IF;
        IF orderType = 1 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
            WHERE section_id=m_section_id
			ORDER BY visits DESC;
        END IF;
        IF orderType = 2 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
            WHERE section_id=m_section_id
			ORDER BY comments DESC;
        END IF;
        IF orderType = 3 THEN
			SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
			breaking_news, date, likes, visits, comments, validated, erased, url,
            section_name, reporter_name
			FROM fullNews
            WHERE section_id=m_section_id
			ORDER BY likes DESC;
        END IF;
    END IF;
END //
DELIMITER ;


drop procedure if exists loginNewsSearch;
DELIMITER //
CREATE PROCEDURE loginNewsSearch(IN mBefore DATE, IN mAfter DATE, IN mTitle VARCHAR(255), IN mName VARCHAR(255))
BEGIN
	DECLARE which INT DEFAULT 0;
    IF is_search_by_date(mBefore) THEN
		SET which = 1;
    END IF;
    IF is_search_by_title(mTitle) THEN
		SET which = 2;
    END IF;
    IF is_search_by_name(mName) THEN
		SET which = 3;
    END IF;
    IF is_search_by_date(mBefore) AND is_search_by_title(mTitle) THEN
		SET which = 4;
    END IF;
    IF is_search_by_date(mBefore) AND is_search_by_name(mName) THEN
		SET which = 5;
    END IF;
    IF is_search_by_title(mTitle) AND is_search_by_name(mName) THEN
		SET which = 6;
    END IF;
    IF is_search_by_date(mBefore) AND is_search_by_title(mTitle) AND is_search_by_name(mName) THEN
		SET which = 7;
    END IF;
    
    IF which = 1 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
        breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE date BETWEEN mBefore AND mAfter;
    END IF;
    IF which = 2 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE name LIKE CONCAT('%', mTitle,'%') ;
    END IF;
    IF which = 3 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE dreporter_name LIKE CONCAT('%', mName,'%');
    END IF;
    IF which = 4 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE date BETWEEN mBefore AND mAfter AND name LIKE CONCAT('%', mTitle,'%');
    END IF;
    IF which = 5 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE date BETWEEN mBefore AND mAfter AND reporter_name LIKE CONCAT('%', mName,'%');
    END IF;
    IF which = 6 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE name LIKE CONCAT('%', mTitle,'%') AND reporter_name LIKE CONCAT('%', mName,'%');
    END IF;
    IF which = 7 THEN
		SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
		breaking_news, date, likes, visits, comments, validated, erased, url,
		section_name, reporter_name
		FROM fullNews
        WHERE date BETWEEN mBefore AND mAfter
        AND name LIKE CONCAT('%', mTitle,'%')
        AND reporter_name LIKE CONCAT('%', mName,'%');
    END IF;
    
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginNewsOne(IN myId INT)
BEGIN
	SELECT id, reporter_id, section_id, image_id_thumbnail, name, description,
	breaking_news, date, likes, visits, comments, validated, erased, url,
	section_name, reporter_name
	FROM fullNews
    WHERE id = myId;
END //
DELIMITER ;



drop procedure if EXISTS loginNewsOneEdit;

DELIMITER //
CREATE PROCEDURE loginNewsOneEdit(IN myId INT, IN reporter_idParam INT)
BEGIN
	SELECT id, reporter_id, section_id, name, description, url, section_name,breaking_news, reporter_name, date
	FROM editNews
    WHERE id = myId AND (reporter_idParam = reporter_id OR reporter_idParam < 0); 
END //
DELIMITER ;


Drop Procedure if Exists loginImageEdit;
DELIMITER //
CREATE PROCEDURE loginImageEdit(IN myId INT)
BEGIN
	SELECT image_id, url, sequence
	FROM fullImage
    WHERE news_id = myId;
END //
DELIMITER ;

Drop Procedure if Exists loginVideoEdit;
DELIMITER //
CREATE PROCEDURE loginVideoEdit(IN myId INT)
BEGIN
	SELECT video_id, url, sequence
	FROM fullVideo
    WHERE news_id = myId;
END //
DELIMITER ;

Drop Procedure if Exists loginTextEdit;
DELIMITER //
CREATE PROCEDURE loginTextEdit(IN myId INT)
BEGIN
	SELECT text_id, content, sequence
	FROM fullText_content
    WHERE news_id = myId;
END //
DELIMITER ;

Drop Procedure if Exists loginImage;
DELIMITER //
CREATE PROCEDURE loginImage(IN myId INT)
BEGIN
	SELECT image_id, url, sequence
	FROM fullImage
    WHERE news_id = myId and ltrim(rtrim(url)) != '';
END //
DELIMITER ;

Drop Procedure if Exists loginVideo;
DELIMITER //
CREATE PROCEDURE loginVideo(IN myId INT)
BEGIN
	SELECT video_id, url, sequence
	FROM fullVideo
    WHERE news_id = myId and ltrim(rtrim(url)) != '';
END //
DELIMITER ;

Drop Procedure if Exists loginText;
DELIMITER //
CREATE PROCEDURE loginText(IN myId INT)
BEGIN
	SELECT text_id, content, sequence
	FROM fullText_content
    WHERE news_id = myId and ltrim(rtrim(content)) != '';
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE signupComment(IN user_id INT, IN news_id INT, IN anonymous_id INT, IN content VARCHAR(255),
IN name VARCHAR(255), IN email VARCHAR(255))
BEGIN
	DECLARE m_anonymous_id INT DEFAULT 0;
	IF anonymous_id > 0 THEN
		INSERT INTO anonymous(name, email) VALUES (name, email);
        SET m_anonymous_id = last_insert_id();
        INSERT INTO user_comment_news(news_id, anonymous_id, content)
		VALUES (news_id, m_anonymous_id, content);
	ELSE
		INSERT INTO user_comment_news(user_id, news_id, content)
		VALUES (user_id, news_id, content);
    END IF;
	
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginUserComments(IN myId INT)
BEGIN
	SELECT id, user_id, image,
	user_name, date, content, news_id
    FROM fullUserComment
    WHERE news_id = myId
    ORDER BY date DESC;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE loginAnonymousComments(IN myId INT)
BEGIN
	SELECT id, anonymous_id, image,
	user_name, date, content, news_id
    FROM fullAnonymousComment
    WHERE news_id = myId
    ORDER BY date DESC;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE eraseComment(IN myId INT)
BEGIN
	UPDATE user_comment_news SET erased = true WHERE id = myId;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER onVisits AFTER INSERT ON user_visit_news
FOR EACH ROW
BEGIN
    UPDATE news SET visits=visits+1 WHERE id = NEW.news_id;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER onLikes AFTER INSERT ON user_like_news
FOR EACH ROW
BEGIN
    UPDATE news SET likes=likes+1 WHERE id = NEW.news_id;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER onComment AFTER INSERT ON user_comment_news
FOR EACH ROW
BEGIN
    UPDATE news SET comments=comments+1 WHERE id = NEW.news_id;
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE signupVisit(IN user_id INT, IN news_id INT)
BEGIN
	IF user_id > 0 THEN
		INSERT INTO user_visit_news(user_id, news_id) VALUES (user_id, news_id);
	ELSE
		INSERT INTO user_visit_news(news_id) VALUES (news_id);
    END IF;
END //
DELIMITER ;

drop procedure if exists signupLike;
DELIMITER //
CREATE PROCEDURE signupLike(IN user_id INT, IN news_id INT)
BEGIN
	if (select count(user_id) from user_like_news where user_id = user_id AND news_id = news_id limit 1) = 0
    then
		INSERT INTO user_like_news(user_id, news_id) VALUES (user_id, news_id);
	end if;
END //
DELIMITER ;



/*Comment removal*/
drop procedure if exists removeCommentReporter;
Delimiter //
Create Procedure removeCommentReporter(IN commentID int, IN reporterID int)
Begin
	declare newsId int default null;
    
	if commentID is not null and reporterID is not null
    then
		select uc.news_id into newsId from user_comment_news uc 
        inner join news n on n.id = uc.news_id 
        inner join user u on n.reporter_id = u.id
        where uc.id = commentID
        and u.id = reporterID
        and u.erased <> true;
        
        if newsId is not null
        then 
			update user_comment_news set erased = true where id = commentID;
        end if;
    end if;

END //
Delimiter ;

drop procedure if exists removeCommentAdmin;
Delimiter //
Create Procedure removeCommentAdmin(IN commentID int, IN adminID int)
Begin
	if commentID is not null and adminID is not null and (select count(id) from admin where id = adminID and erased = false limit 1)>0
    then
		update user_comment_news set erased = true where id = commentID;
    end if;

END //
Delimiter ;

/*Pin and Unpin of News*/
drop procedure if exists pinNews;
Delimiter //
create procedure pinNews(IN news_id INT, IN admin_id INT)
Begin
	if news_id is not null and admin_id is not null and (select count(id) from admin where id = admin_id and erased = false limit 1)>0
	then
		update news set breaking_news = true where id = news_id;
	end if;
End//
Delimiter ;

drop procedure if exists unpinNews;
Delimiter //
create procedure unpinNews(IN news_id INT , IN admin_id INT)
Begin
	if news_id is not null and admin_id is not null and (select count(id) from admin where id = admin_id and erased = false limit 1)>0
	then
		update news set breaking_news = false where id = news_id;
	end if;
End//
Delimiter ;

drop procedure if exists getVideoUrl;
Delimiter // 
Create PROCEDURE getVideoUrl(IN video_id INT)
BEGIN
	select url from video WHERE id = video_id;
END //
Delimiter ;

drop procedure if exists getImageUrl;
Delimiter // 
Create PROCEDURE getImageUrl(IN video_id INT)
BEGIN
	select url from image WHERE id = video_id;
END //
Delimiter ;