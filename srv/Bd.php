<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {
   self::$pdo = new PDO(
    // Cadena de conexión para MySQL
    "mysql:host=localhost;dbname=pwaConexion;charset=utf8mb4",
    // Usuario de la base de datos
    "root",
    // Contraseña de la base de datos
    "",
    // Opciones: conexiones no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   
   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS DATOSESTUDIANTE (
      DE_ID INT AUTO_INCREMENT,
      DE_NOMBRE VARCHAR(255) NOT NULL,
      DE_EDAD TINYINT NOT NULL,
      DE_NACIONALIDAD VARCHAR(255) NOT NULL,
      PRIMARY KEY (DE_ID),
      CHECK (CHAR_LENGTH(DE_NOMBRE) > 0)
     ) ENGINE=InnoDB"
   );

  //  self::$pdo->exec(
  //   "CREATE TABLE IF NOT EXISTS PASATIEMPO (
  //     PAS_ID INT AUTO_INCREMENT,
  //     PAS_NOMBRE VARCHAR(255) NOT NULL,
  //     PRIMARY KEY (PAS_ID),
  //     UNIQUE (PAS_NOMBRE),
  //     CHECK (CHAR_LENGTH(PAS_NOMBRE) > 0)
  //    ) ENGINE=InnoDB"
  //  );
  }

  return self::$pdo;
 }
}
