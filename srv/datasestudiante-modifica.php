<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DATOSESTUDIANTE.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $edad = recuperaTexto("edad");
 $nacionalidad = recuperaTexto("nacionalidad");

 $nombre = validaNombre($nombre);
 $edad = validaNombre($edad);
 $nacionalidad = validaNombre($nacionalidad);

 update(
  pdo: Bd::pdo(),
  table: DATOSESTUDIANTE,
  set: [DE_NOMBRE => $nombre,DE_EDAD => $edad,DE_NACIONALIDAD => $nacionalidad],
  where: [DE_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "edad" => ["value" => $edad],
  "nacionalidad" => ["value" => $nacionalidad],
 ]);
});
