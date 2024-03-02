<?php
function desencriptar($textoEncriptado, $tablaDesencriptacion) {
  $textoDesencriptado = "";
  $longitud = strlen($textoEncriptado);

  for ($i = 0; $i < $longitud; $i++) {
    $caracter = $textoEncriptado[$i];

    // Verificar si el caracter es un dígito y buscar el valor en la tabla de desencriptación
    if ($caracter === '0') {
      $valorEncriptado = "";
      $j = $i + 1;

      // Construir el valor encriptado hasta encontrar el siguiente '0'
      while ($j < $longitud && $textoEncriptado[$j] !== '0') {
        $valorEncriptado .= $textoEncriptado[$j];
        $j++;
      }

      // Buscar el valor en la tabla de desencriptación
      if (isset($tablaDesencriptacion[$valorEncriptado])) {
        $textoDesencriptado .= $tablaDesencriptacion[$valorEncriptado];
      } else {
        $textoDesencriptado .= $valorEncriptado;
      }

      // Mover el índice al siguiente '0'
      $i = $j - 1;
    } else {
      // Si no es un dígito, simplemente agregar el carácter al texto desencriptado
	  
      $textoDesencriptado .= $caracter;
    }
  }

  echo $textoDesencriptado;
}