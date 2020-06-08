SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

CREATE TABLE Usuarios (
    id int(11) PRIMARY KEY AUTO :INCREMENT NOT NULL,
    nombre varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    apellido varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    user varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    pass varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    t_user varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO
    Usuarios (id, nombre, apellido, user, pass, t_user)
VALUES
    (
        1,
        "Emilfran",
        "Martinez",
        "Emilfran",
        "$2y$10$ngCo.qaX5RSZ.1iKP41Yc.0f6hmhIXHSFlpeId.sAInt39eC7gZne",
        "Usuario"
    ),
    (
        2,
        "Alefrank",
        "Martinez",
        "Alefrank",
        "$2y$10$QRwQ/Zw57COUxqXCyj6o8.NYeswM3w1FXP/eFmJezkVm0AHJqv5ii",
        "Administrador"
    );