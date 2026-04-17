CREATE DATABASE IF NOT EXISTS CasoEstudioMN
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE CasoEstudioMN;

CREATE TABLE IF NOT EXISTS CasasSistema (
    IdCasa          BIGINT          NOT NULL AUTO_INCREMENT,
    DescripcionCasa VARCHAR(30)     NOT NULL,
    PrecioCasa      DECIMAL(10,2)   NOT NULL,
    UsuarioAlquiler VARCHAR(30)     NULL,
    FechaAlquiler   DATETIME        NULL,
    PRIMARY KEY (IdCasa)
);

INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler)
VALUES ('Casa en San José', 190000, null, null);

INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler)
VALUES ('Casa en Alajuela', 145000, null, null);

INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler)
VALUES ('Casa en Cartago', 115000, null, null);

INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler)
VALUES ('Casa en Heredia', 122000, null, null);

INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler)
VALUES ('Casa en Guanacaste', 105000, null, null);

DELIMITER $$

DROP PROCEDURE IF EXISTS SP_ConsultarCasas$$
CREATE PROCEDURE SP_ConsultarCasas()
BEGIN
    SELECT
        IdCasa,
        DescripcionCasa,
        PrecioCasa,
        UsuarioAlquiler,
        CASE
            WHEN UsuarioAlquiler IS NULL THEN 'Disponible'
            ELSE 'Reservada'
        END AS Estado,
        DATE_FORMAT(FechaAlquiler, '%d/%m/%Y') AS FechaAlquiler
    FROM CasasSistema
    WHERE PrecioCasa BETWEEN 115000 AND 180000
    ORDER BY (UsuarioAlquiler IS NOT NULL) ASC;
END$$

DROP PROCEDURE IF EXISTS SP_ObtenerCasasDisponibles$$
CREATE PROCEDURE SP_ObtenerCasasDisponibles()
BEGIN
    SELECT
        IdCasa,
        DescripcionCasa,
        PrecioCasa
    FROM CasasSistema
    WHERE UsuarioAlquiler IS NULL;
END$$

DROP PROCEDURE IF EXISTS SP_ObtenerPrecioCasa$$
CREATE PROCEDURE SP_ObtenerPrecioCasa(IN p_IdCasa BIGINT)
BEGIN
    SELECT
        IdCasa,
        DescripcionCasa,
        PrecioCasa
    FROM CasasSistema
    WHERE IdCasa = p_IdCasa;
END$$

DROP PROCEDURE IF EXISTS SP_AlquilarCasa$$
CREATE PROCEDURE SP_AlquilarCasa(
    IN p_IdCasa          BIGINT,
    IN p_UsuarioAlquiler VARCHAR(30),
    IN p_FechaAlquiler   DATETIME
)
BEGIN
    UPDATE CasasSistema
    SET
        UsuarioAlquiler = p_UsuarioAlquiler,
        FechaAlquiler   = p_FechaAlquiler
    WHERE IdCasa = p_IdCasa
      AND UsuarioAlquiler IS NULL;
END$$

DELIMITER ;
