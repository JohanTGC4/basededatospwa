<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DATOSESTUDIANTE.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: DATOSESTUDIANTE,  orderBy: DE_NOMBRE);

 $render =  '';
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[DE_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[DE_NOMBRE]);
  $edad = htmlentities($modelo[DE_EDAD]);
  $nacionalidad = htmlentities($modelo[DE_NACIONALIDAD]);
  $render .=
   " <li class='md-two-line'>
     <span class='headline'>
      <a href='modificaciones.html?id=$id'>Nombre: $nombre, Edad: $edad, Nacionalidad: $nacionalidad</a>
     </span>
    </li>";
    
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
