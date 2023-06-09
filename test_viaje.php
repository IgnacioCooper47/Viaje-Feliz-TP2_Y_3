<?php

include_once "viaje.php";
include_once "Persona.php";
include_once "ResponsableV.php";
include_once "Pasajero.php";
include_once "PasajeroVIP.php";
include_once "PasajeroDiferente.php";

echo "\n\n Bienvenido a Viaje Feliz!\n\n";

$viaje = null;
$colPasajeros = array();
$responsable = new ResponsableV(203, 1700, "Hernan", "Croceri");

$opcion = 0;

while ($opcion != 4){
    echo "\n MENU\n";
    echo "1- Cargar la información del viaje.\n";
    echo "2- Ver información del viaje.\n";
    echo "3- Modificar los datos del viaje.\n";
    echo "4- Salir.\n\n";
    
    echo "Porfavor selecione una opción: ";
    $opcion = trim(fgets(STDIN));
    
    if ($opcion > 4 || $opcion < 1 || !is_numeric($opcion)){
        echo "Opcion invalida, vuelva a intentarlo\n";
    }    
    
    switch ($opcion){
        case 1:
            echo "\nIngrese el codigo de viaje: ";
            $codigo = trim(fgets(STDIN));
            
            echo "\n Ingrese el Destino del viaje: ";
            $destino = trim(fgets(STDIN));

            echo "\n Ingrese la cantidad maxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            while (!is_numeric($maxPasajeros)){
                echo "\nIncorrecto, volver a ingresar el numero de pasajeros: ";
                $maxPasajeros = trim(fgets(STDIN));
            }

            echo "\nIngrese el costo del viaje: ";
            $costoViaje = trim(fgets(STDIN));

            echo "\n Ahora agregamos los pasajeros al viaje. \n";
            echo "Cuantos pasajeros: ";
            $p = trim(fgets(STDIN));
            while (!is_numeric($p) || $p > $maxPasajeros){
                echo "\nIncorrecto, volver a ingresar el numero de pasajeros: ";
                $p = trim(fgets(STDIN));
            }
            
            $viaje = new viaje($codigo, $destino, $maxPasajeros, $colPasajeros, $responsable, $costoViaje, 0);

            while ($maxPasajeros < $p || !(is_numeric($p))){
                echo "\n Porfavor volver a ingresar cuantos pasajeros van a viajar, ingreso mas de la cantidad maxima: ";
                $p = trim(fgets(STDIN));
            }

            for ($i=0; $i < $p; $i++){
                echo "\n Pasajero numero: ". $i + 1;
                
                echo "\nQue tipo de pasajero es?";
                echo "
                \n 1-Pasajero regular.
                \n 2-Pasajero Vip.
                \n 3-Pasajero Diferente.";
                echo "\nIngrese el tipo de pasajero: ";
                $tipo = trim(fgets(STDIN));
                while (($tipo > 3 || $tipo < 1) || !(is_numeric($tipo))){
                    echo "\n Porfavor volver a ingresar el tipo del pasajero, esa opcion no es valida: ";
                    $tipo = trim(fgets(STDIN));
                }

                if ($tipo == 1){
                    echo "\n -PASAJERO REGULAR-";
                    echo "\n Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "\n Ingrese el apellido del pasajero: ";
                    $apellido = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de telefono: ";
                    $telefono = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de documento del pasajero: ";
                    $documento = trim(fgets(STDIN));
                    echo "\n Tendra el numero de asiento: " . $i + 1;
                    $numeroAsiento = $i + 1;
                    echo "\n El numero de ticket es: " . $i + 1435679271231;
                    $numeroTicket = $i + 1435679271231;

                    $viaje->agregarPasajero($nombre, $apellido, $telefono, $documento, $numeroAsiento, $numeroTicket);
                }elseif ($tipo == 2){
                    echo "\n -PASAJERO VIP-";
                    echo "\n Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "\n Ingrese el apellido del pasajero: ";
                    $apellido = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de telefono: ";
                    $telefono = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de documento del pasajero: ";
                    $documento = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de viajero frecuente: ";
                    $numFrecuente = trim(fgets(STDIN));
                    echo "\n Ingrese la cantidad de millas acumuladas: ";
                    $millas = trim(fgets(STDIN));

                    $viaje->agregarPasajeroVip($nombre, $apellido, $telefono, $documento, $numFrecuente, $millas);
                }elseif ($tipo == 3){
                    echo "\n -PASAJERO DIFERENTE-";
                    echo "\n Ingrese el nombre del pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    echo "\n Ingrese el apellido del pasajero: ";
                    $apellido = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de telefono: ";
                    $telefono = trim(fgets(STDIN));
                    echo "\n Ingrese el numero de documento del pasajero: ";
                    $documento = trim(fgets(STDIN));
                    echo "\n Ahora ingrese con 0 que refiere a NO, o 1 que refiere a SI,";
                    echo "\n si el pasajero necesita las siguientes cosas: ";
                    echo "\n  El pasajero necesita silla de ruedas: ";
                    $sillaDeRuedas = trim(fgets(STDIN));
                    while (!(is_numeric($sillaDeRuedas)) || ($sillaDeRuedas > 1 || $sillaDeRuedas < 0)){
                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                        $sillaDeRuedas = trim(fgets(STDIN));
                    }
                    echo "\n  El pasajero necesita asistencia para el embarque o desembarque: ";
                    $asistenciaBarque = trim(fgets(STDIN));
                    while (!(is_numeric($asistenciaBarque)) || ($asistenciaBarque > 1 || $asistenciaBarque < 0)){
                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                        $asistenciaBarque = trim(fgets(STDIN));
                    }
                    echo "\n  El pasajero necesita comida especial: ";
                    $comidaEspecial = trim(fgets(STDIN));
                    while (!(is_numeric($comidaEspecial)) || ($comidaEspecial > 1 || $comidaEspecial < 0)){
                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                        $comidaEspecial = trim(fgets(STDIN));
                    }
                    $viaje->agregarPasajeroDiferente($nombre, $apellido, $telefono, $documento, $sillaDeRuedas, $asistenciaBarque, $comidaEspecial);
                }
            }
        break;

        case 2:
            if ($viaje == null){
                echo "\n No existe viaje registrado.";
                echo "\n Primero debe cargar un viaje.\n\n";
            } else {
                $resumen = $viaje-> __toString();
                echo $resumen;
            }
        break;

        case 3:
            $subOpcion = null;
            if ($viaje == null){
                echo "\n No existe viaje registrado.";
                echo "\n Primero debe cargar un viaje.";
            }else {
                while ($subOpcion != 8){
                    echo "\n SELECCIONE QUE QUIERE MODIFICAR \n\n";
                    echo "1- Modificar el codigo de viaje. \n";
                    echo "2- Modificar el destino del viaje. \n";
                    echo "3- Modificar la cantidad maxima de pasajeros del viaje. \n";
                    echo "4- Modificar el costo del viaje. \n";
                    echo "5- Modificar algun pasajero. \n";
                    echo "6- Eliminar un pasajero. \n";
                    echo "7- Comprar un pasaje. \n";
                    echo "8- Salir. \n";
                    
                    echo "Eliga una opción: ";
                    $subOpcion = trim(fgets(STDIN));

                    if ($subOpcion > 8 || $subOpcion < 1 || !is_numeric($subOpcion)) {
                        echo "\nOpcion invalida, vuelva a intentarlo\n";
                        continue; // Se salta el resto de la iteración y se vuelve al inicio del bucle while
                    }

                    switch ($subOpcion){
                        case 1:
                            echo "\n Ingrese el nuevo codigo de viaje: ";
                            $codigoNew = trim(fgets(STDIN));
                            $viaje->setCodigoDeViaje($codigoNew);
                        break;

                        case 2:
                            echo "\n Ingrese el nuevo destino del viaje: ";
                            $destinoNew = trim(fgets(STDIN));
                            $viaje->setDestino($destinoNew);
                        break;

                        case 3:
                            echo "\n Ingrese la nueva cantidad de pasajeros: ";
                            $maxPasajerosNew = trim(fgets(STDIN));
                            $viaje->setCantMaxPasajeros($maxPasajerosNew);
                        break;

                        case 4;
                            echo "\n Ingrese el nuevo costo del viaje: ";
                            $costoViajeNew = trim(fgets(STDIN));
                            $viaje->setCostoViaje($costoViajeNew);
                        break;

                        case 5:
                            echo "\n Ingrese que numero de pasajero quiere modificar: ";
                            $n = trim(fgets(STDIN));
                            echo "\n Que tipo de pasajero va a ser su pasajero modificado: ";
                            echo "\n  1-Pasajero regular.";
                            echo "\n  2-Pasajero VIP.";
                            echo "\n  3-Pasajero Diferente.";
                            $tipoMod = fgets(trim(STDIN));
                            while ($tipoMod > 3 || $tipoMod < 1 || !is_numeric($tipoMod)){
                                echo "Opcion invalida, porfavor selecionar 1, 2 o 3, volver a intentarlo.";
                                $tipoMod = fgets(trim(STDIN));
                            }
                            if ($tipoMod == 1){
                                echo "\n Ingrese los datos modificados del pasajero: ";
                                echo "\n Ingrese el nuevo nombre: ";
                                $nombreNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo apellido: "; 
                                $apellidoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de telefono: ";
                                $telefonoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de documento: ";
                                $dniNew = trim(fgets(STDIN));
                                
                                $viaje->modificarPasajero($n, $nombreNew, $apellidoNew, $telefonoNew, $dniNew);
                            }elseif ($tipoMod == 2){
                                echo "\n Ingrese los datos modificados del pasajero: ";
                                echo "\n Ingrese el nuevo nombre: ";
                                $nombreNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo apellido: "; 
                                $apellidoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de telefono: ";
                                $telefonoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de documento: ";
                                $dniNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de viajero frecuente: ";
                                $nroViajeroNew = trim(fgets(STDIN));
                                echo "\n Ingrese la nueva cantidad de millas: ";
                                $cantMillasNew = trim(fgets(STDIN));

                                $viaje->modificarPasajeroVIP($$n, $nombreNew, $apellidoNew, $telefonoNew, $dniNew, $nroViajeroNew, $cantMillasNew);
                            }elseif ($tipoMod == 3){
                                echo "\n Ingrese los datos modificados del pasajero: ";
                                echo "\n Ingrese el nuevo nombre: ";
                                $nombreNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo apellido: "; 
                                $apellidoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de telefono: ";
                                $telefonoNew = trim(fgets(STDIN));
                                echo "\n Ingrese el nuevo numero de documento: ";
                                $dniNew = trim(fgets(STDIN));

                                echo "\n Ahora ingrese con 0 que refiere a NO, o 1 que refiere a SI,";
                                echo "\n si el pasajero necesita las siguientes cosas: ";
                                echo "\n  El pasajero necesita silla de ruedas: ";
                                $sillaDeRuedas = trim(fgets(STDIN));
                                while (!(is_numeric($sillaDeRuedas)) || ($sillaDeRuedas > 1 || $sillaDeRuedas < 0)){
                                    echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                    $sillaDeRuedas = trim(fgets(STDIN));
                                }
                                echo "\n  El pasajero necesita asistencia para el embarque o desembarque: ";
                                $asistenciaBarque = trim(fgets(STDIN));
                                while (!(is_numeric($asistenciaBarque)) || ($asistenciaBarque > 1 || $asistenciaBarque < 0)){
                                    echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                    $asistenciaBarque = trim(fgets(STDIN));
                                }
                                echo "\n  El pasajero necesita comida especial: ";
                                $comidaEspecial = trim(fgets(STDIN));
                                while (!(is_numeric($comidaEspecial)) || ($comidaEspecial > 1 || $comidaEspecial < 0)){
                                    echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                    $comidaEspecial = trim(fgets(STDIN));
                                }

                                $viaje->modificarPasajeroDiferente($n, $nombreNew, $apellidoNew, $telefonoNew, $dniNew, $sillaDeRuedas, $asistenciaBarque, $comidaEspecial);
                            }
                            
                        break;
                        
                        case 6:
                            echo "\n Ingrese el numero del pasajero que quiere borrar.";
                            echo "\n A continuacion le vamos a mostrar los pasajeros: \n";

                            $arregloPasajeros = $viaje->getColPasajeros();
                            $in = 0;
                            foreach ($arregloPasajeros as $persona){
                                $in = $in + 1;
                                echo "\n Pasajero: ". $in;
                                echo "\n Nombre: " . $persona->getNombre();
                                echo "\n Apellido: " . $persona->getApellido();
                                echo "\n Telefono: " . $persona->getTelefono();
                                echo "\n Numero de documento: " . $persona->getNumDocumento() . "\n";
                            }
                            
                            echo "\nAhora diganos cual era el numero de pasajero para borrar: ";
                            $nBorrar = trim(fgets(STDIN));
                            
                            while ($nBorrar > count($arregloPasajeros)){
                                echo "\nNumero invalido, vuelva a ingresar el numero de pasajero...";
                                echo "\nIngresar: ";
                                $nBorrar = trim(fgets(STDIN));
                            }
                            $viaje->eliminaPasajero($nBorrar);

                        break;

                        case 7:
                            $arregloPasajeros = $viaje->getColPasajeros();

                            
                            if (!$viaje->hayPasajesDisponible()){
                                echo "\n No se puede agregar pasajeros, porque esta lleno.\n";
                                echo "\n Modificar la cantidad maxima de pasajeros para poder agregar más.\n";
                            }else {
                                echo "\nBienvenido a la compra de un nuevo pasaje.";
                                echo "\n1-Pasajero regular.";
                                echo "\n2-Pasajero VIP.";
                                echo "\n3-Pasajero Diferente.";
                                echo "\nIngrese que tipo de ticket quiere: ";
                                $tipo = trim(fgets(STDIN));
                                while (($tipo > 3 || $tipo < 1) || !(is_numeric($tipo))){
                                    echo "\n Porfavor volver a ingresar el tipo de ticket, esa opcion no es valida: ";
                                    $tipo = trim(fgets(STDIN));
                                }

                                if ($tipo == 1){
                                    echo "\n -PASAJERO REGULAR-";
                                    echo "\n Ingrese el nombre del pasajero: ";
                                    $nombre = trim(fgets(STDIN));
                                    echo "\n Ingrese el apellido del pasajero: ";
                                    $apellido = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de telefono: ";
                                    $telefono = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de documento del pasajero: ";
                                    $documento = trim(fgets(STDIN));
                                    echo "\n Tendra el numero de asiento: " . $i + 1;
                                    $numeroAsiento = $i + 1;
                                    echo "\n El numero de ticket es: " . $i + 1435679271231;
                                    $numeroTicket = $i + 1435679271231;

                                    $objPasajero = new Pasajero($nombre, $apellido, $telefono, $documento, $numeroAsiento, $numeroTicket);
                                    $precio = $viaje->venderPasaje($objPasajero);
                                    echo "\n\nEl precio final es de: $" . $precio . "\nMuchas gracias por compras su pasaje!";
                                }elseif ($tipo == 2){
                                    echo "\n -PASAJERO VIP-";
                                    echo "\n Ingrese el nombre del pasajero: ";
                                    $nombre = trim(fgets(STDIN));
                                    echo "\n Ingrese el apellido del pasajero: ";
                                    $apellido = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de telefono: ";
                                    $telefono = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de documento del pasajero: ";
                                    $documento = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de viajero frecuente: ";
                                    $numFrecuente = trim(fgets(STDIN));
                                    echo "\n Ingrese la cantidad de millas acumuladas: ";
                                    $millas = trim(fgets(STDIN));

                                    $objPasajero = new PasajeroVIP($nombre, $apellido, $telefono, $documento, $numFrecuente, $millas);
                                    $precio = $viaje->venderPasaje($objPasajero);
                                    echo "\n\nEl precio final es de: $" . $precio . "\nMuchas gracias por compras su pasaje!";
                                }elseif ($tipo == 3){
                                    echo "\n -PASAJERO DIFERENTE-";
                                    echo "\n Ingrese el nombre del pasajero: ";
                                    $nombre = trim(fgets(STDIN));
                                    echo "\n Ingrese el apellido del pasajero: ";
                                    $apellido = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de telefono: ";
                                    $telefono = trim(fgets(STDIN));
                                    echo "\n Ingrese el numero de documento del pasajero: ";
                                    $documento = trim(fgets(STDIN));
                                    echo "\n Ahora ingrese con 0 que refiere a NO, o 1 que refiere a SI,";
                                    echo "\n si el pasajero necesita las siguientes cosas: ";
                                    echo "\n  El pasajero necesita silla de ruedas: ";
                                    $sillaDeRuedas = trim(fgets(STDIN));
                                    while (!(is_numeric($sillaDeRuedas)) || ($sillaDeRuedas > 1 || $sillaDeRuedas < 0)){
                                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                        $sillaDeRuedas = trim(fgets(STDIN));
                                    }
                                    echo "\n  El pasajero necesita asistencia para el embarque o desembarque: ";
                                    $asistenciaBarque = trim(fgets(STDIN));
                                    while (!(is_numeric($asistenciaBarque)) || ($asistenciaBarque > 1 || $asistenciaBarque < 0)){
                                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                        $asistenciaBarque = trim(fgets(STDIN));
                                    }
                                    echo "\n  El pasajero necesita comida especial: ";
                                    $comidaEspecial = trim(fgets(STDIN));
                                    while (!(is_numeric($comidaEspecial)) || ($comidaEspecial > 1 || $comidaEspecial < 0)){
                                        echo "\n La opcion no es valida, solo ingresar 1 o 0: ";
                                        $comidaEspecial = trim(fgets(STDIN));

                                    $objPasajero = new PasajeroDiferente($nombre, $apellido, $telefono, $documento, $sillaDeRuedas, $asistenciaBarque, $comidaEspecial);
                                    $precio = $viaje->venderPasaje($objPasajero);
                                    echo "\n\nEl precio final es de: $" . $precio . "\nMuchas gracias por compras su pasaje!";
                                    }
                                }
                            }
                        break;
                        
                        case 8:
                            echo "\nSaliendo...\n\n";
                        break;
                    }
                }
            }
        case 4: 
            echo "\nSaliendo...\n\n";
        break;
    }
}
