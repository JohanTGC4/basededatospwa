<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DATOSESTUDIANTE.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $edad = recuperaTexto("edad");
 $nacionalidad = recuperaTexto("nacionalidad");

 $nombre = validaNombre($nombre);
 $edad = validaNombre($edad);
 $nacionalidad = validaNombre($nacionalidad);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: DATOSESTUDIANTE, values: [DE_NOMBRE => $nombre,DE_EDAD => $edad,DE_NACIONALIDAD => $nacionalidad]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/datasestudiante.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "edad" => ["value" => $edad],
  "nacionalidad" => ["value" => $nacionalidad],

 ]);
});
