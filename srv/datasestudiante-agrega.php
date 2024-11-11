<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_DATOSESTUDIANTE.php";

ejecutaServicio(function () {
    try {
        $nombre = recuperaTexto("nombre");
        $edad = recuperaTexto("edad");
        $nacionalidad = recuperaTexto("nacionalidad");

        $nombre = validaNombre($nombre);
        $edad = validaNombre($edad);
        $nacionalidad = validaNombre($nacionalidad);

        $pdo = Bd::pdo();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        insert(pdo: $pdo, into: DATOSESTUDIANTE, values: [DE_NOMBRE => $nombre, DE_EDAD => $edad, DE_NACIONALIDAD => $nacionalidad]);

        $id = $pdo->lastInsertId();

        $encodeId = urlencode($id);
        devuelveCreated("/srv/datasestudiante.php?id=$encodeId", [
            "id" => ["value" => $id],
            "nombre" => ["value" => $nombre],
            "edad" => ["value" => $edad],
            "nacionalidad" => ["value" => $nacionalidad]
        ]);
    } catch (Exception $e) {
        // Maneja y muestra el error
        echo "Error: " . $e->getMessage();
        http_response_code(500);
    }
});

