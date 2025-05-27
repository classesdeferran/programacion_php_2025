GRANT EXECUTE, CREATE ROUTINE, ALTER ROUTINE ON colores.* TO 'tu_usuario'@'localhost';
GRANT EXECUTE ON PROCEDURE colores.actualizar_contrasena TO 'colores'@'%';

-- actualitza els privilegis:
FLUSH PRIVILEGES;

SHOW GRANTS FOR 'tu_usuario'@'localhost';

DELIMITER //

CREATE PROCEDURE actualizar_contrasena(IN p_id_usuario INT, IN p_nueva_pass VARCHAR(255))
BEGIN
    -- Actualizar usuario
    UPDATE usuarios
    SET password_usuario = p_nueva_pass
    WHERE id_usuario = p_id_usuario;

    -- Eliminar registro de reset
    DELETE FROM passreset
    WHERE id_usuario = p_id_usuario;
END;
//

DELIMITER ;

drop procedure actualizar_contrasena;
