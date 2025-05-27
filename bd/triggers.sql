DELIMITER //

CREATE TRIGGER actualizar_password_usuario
AFTER UPDATE ON passreset
FOR EACH ROW
BEGIN
    IF NEW.pass IS NOT NULL AND NEW.pass != OLD.pass THEN
        UPDATE usuarios
        SET password_usuario = NEW.pass
        WHERE id_usuario = NEW.id_usuario;
    END IF;
END;
//

DELIMITER ;

drop trigger actualizar_password_usuario;

DELIMITER //

CREATE TRIGGER borrar_passreset_despues_actualizar_usuario
AFTER UPDATE ON usuarios
FOR EACH ROW
BEGIN
    IF NEW.password_usuario IS NOT NULL AND NEW.password_usuario != OLD.password_usuario THEN
        DELETE FROM passreset
        WHERE id_usuario = NEW.id_usuario;
    END IF;
END;
//

DELIMITER ;

drop trigger borrar_passreset_despues_actualizar_usuario;