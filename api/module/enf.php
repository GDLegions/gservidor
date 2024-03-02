<?php
function encriptar($texto, $tablaEncriptacion) {
  $textoEncriptado = "";
  $caracterAnteriorDesconocido = false;

  for ($i = 0; $i < strlen($texto); $i++) {
    $caracter = $texto[$i];

    if (isset($tablaEncriptacion[$caracter])) {
      if ($caracterAnteriorDesconocido) {
        // Agregar cero antes de un carácter reconocido después de un desconocido
        //$textoEncriptado .= '0';
        $caracterAnteriorDesconocido = false;
      }
      $textoEncriptado .= $tablaEncriptacion[$caracter];
    } else {
      if (!$caracterAnteriorDesconocido) {
        // Agregar cero antes del primer caracter desconocido
        $textoEncriptado .= '0';
        $caracterAnteriorDesconocido = true;
      }
      // Agregar el caracter actual
      $textoEncriptado .= $caracter;
	  
    }
  }

  return $textoEncriptado;
}
