<?php

// modulebase.php

function consultarBase($id, $accion = null, $user = null, $password = null) {
    $resultado = array();

    // Obtener la ruta completa del archivo de historial
    $historyFile = './history/history.txt';

    // Verificar si el archivo existe antes de intentar abrirlo
    if (file_exists($historyFile)) {
        // Leer el archivo de historial
        $data = file($historyFile, FILE_IGNORE_NEW_LINES);

        foreach ($data as $entry) {
            $datos = explode('&', $entry);

            if ($id !== null && isset($datos[0]) && (int)$datos[0] === $id) {
                if ($user !== null && strtolower($user) !== strtolower($datos[1])) {
                    continue; // Si el usuario no coincide, pasar a la siguiente iteración
                }

                if ($accion !== null && isset($datos[$accion])) {
                    return array($datos[$accion]); // Devolver un array con el dato correspondiente al índice especificado
                } elseif ($accion === null) {
                    return array($datos); // Devolver un array con todos los datos de la entrada
                }
            } elseif ($id === null || strtolower($id) === 'all') {
                // Verificar el nombre de usuario si se proporciona
                if ($user !== null && strtolower($user) === strtolower($datos[1])) {
                    $resultado[] = ($accion !== null && isset($datos[$accion])) ? $datos[$accion] : $datos;
                } elseif ($user === null) {
                    $resultado[] = ($accion !== null && isset($datos[$accion])) ? $datos[$accion] : $datos;
                }
            }
        }
    }

    return $resultado;
}

function editarBase($id, $accion, $nuevoValor, $usuario = null) {
    // Obtener la ruta completa del archivo de historial
    $historyFile = './history/history.txt';

    // Verificar si el archivo existe antes de intentar abrirlo
    if (file_exists($historyFile)) {
        // Leer el archivo de historial
        $data = file($historyFile, FILE_IGNORE_NEW_LINES);

        // Crear un array para almacenar los datos actualizados
        $nuevoHistorial = array();

        foreach ($data as $entry) {
            $datos = explode('&', $entry);

            // Verificar si el ID coincide
            if ((int)$datos[0] === $id) {
                // Verificar si el usuario coincide si se proporciona
                if ($usuario !== null && strtolower($usuario) !== strtolower($datos[1])) {
                    continue; // Si el usuario no coincide, pasar a la siguiente iteración
                }

                // Modificar el valor correspondiente al índice proporcionado
                $datos[$accion] = $nuevoValor;
            }

            // Agregar la entrada al nuevo historial
            $nuevoHistorial[] = implode('&', $datos);
        }

        // Escribir los datos actualizados en el archivo de historial
        file_put_contents($historyFile, implode("\n", $nuevoHistorial));
    }
}

// Ejemplo de uso:
//$idConsulta = "all"; // Puedes cambiar esto según el ID que desees consultar, o poner 'all' para obtener todos los datos
//$accionConsulta = 2; // Puedes cambiar esto según la acción que desees realizar
//$usuarioConsulta = 'user5'; // Puedes cambiar esto al nombre de usuario que deseas buscar

//$resultadoConsulta = consultarBase($idConsulta, $accionConsulta, $usuarioConsulta);

// Imprimir el resultado de la consulta
/*
foreach ($resultadoConsulta as $resultado) {
    // Verificar si el resultado es un array antes de intentar implodirlo
    if (is_array($resultado)) {
        echo implode(", ", $resultado) . "<br>";
    } else {
        echo $resultado . "<br>";
    }
}
*/

/*
Ejemplo de uso de la función editarBase:
$idEdicion = 2; // ID de la entrada que deseas editar
$accionEdicion = 2; // Índice que deseas editar
$nuevoValor = 'NuevoValor'; // Nuevo valor para la edición
$usuarioEdicion = 'Usuario'; // Usuario para la edición (puede ser null)

Llamar a la función de edición
editarBase($idEdicion, $accionEdicion, $nuevoValor, $usuarioEdicion);
*/


$idEdicion = 3; // ID de la entrada que deseas editar
$accionEdicion = 2; // Índice que deseas editar
$nuevoValor = 'passw2o9r4dwe3e3'; // Nuevo valor para la edición
//$usuarioEdicion = 'Usuario'; // Usuario para la edición (puede ser null)

editarBase($idEdicion, $accionEdicion, $nuevoValor, /*$usuarioEdicion*/);

$idConsulta = "all";

$resultadoConsulta = consultarBase($idConsulta/*, $accionConsulta, $usuarioConsulta*/);


foreach ($resultadoConsulta as $resultado) {
    // Verificar si el resultado es un array antes de intentar implodirlo
    if (is_array($resultado)) {
        echo implode(", ", $resultado) . "<br>";
    } else {
        echo $resultado . "<br>";
    }
}