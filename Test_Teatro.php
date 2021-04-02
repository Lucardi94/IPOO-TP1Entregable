<?php 
    include 'Teatro.php';

    /***
     * menuTexto...()
     * Funciones para mostrar menu de opciones en el menu principal.
     * Cada una es usada en cada opcion del menu.
     * Retornan la opcion solicitada o el atributo.
     */

    function menuTextoUno(){
        echo "1. Cambiar nombre del teatro\n".
        "2. Cambiar direccion del teatro\n".
        "3. Cambiar nombre de una funcion\n".
        "4. Cambiar precio de una funcion\n".
        "5. Imprimir todo\n".
        "Seleccione una opcion\n";
        return trim(fgets(STDIN));
    }

    function menuTextoDos(){
        echo "[CAMBIAR NOMBRE] Ingrese nuevo nombre\n";
        return trim(fgets(STDIN));
    }

    function menuTextoTres(){
        echo "[CAMBIAR DIRECCION] Ingrese nueva direccion\n";
        return trim(fgets(STDIN));
    }

    function menuTextoCuatro(){
        echo "[CAMBIAR NOMBRE FUNCION] Ingrese nuevo nombre de funcion\n";
        return trim(fgets(STDIN));
    }

    function menuTextoCinco(){
        echo "[CAMBIAR PRECIO FUNCION] Ingrese nuevo precio de funcion\n";
        return trim(fgets(STDIN));
    }

    function menuTextoContinuar(){
        echo ">>>s<<< para salir\n";
        return trim(fgets(STDIN));
    }

    /***
     * PRINCIPAL
     */

    $funcion1 = array ("nombre" => "Matrix en HD", "precio" => 100);
    $funcion2 = array ("nombre" => "La Sirenita", "precio" => 150);
    $funcion3 = array ("nombre" => "IT con Dani de Vitto", "precio" => 200);
    $funcion4 = array ("nombre" => "Los Sims", "precio" => 250);
    $listFunciones = [$funcion1, $funcion2, $funcion3, $funcion4];
    $t = new Teatro("Villaspeople","Amaranto Suarez 1114",$listFunciones);

    //Creamos la clase teatro con todos los atributos necesarios.

    echo "Bienvenido al teatro ".$t->getNombre()."\n";
    do { //mune interactivo
        $respuesta = menuTextoUno();
        switch ($respuesta){            
            case 1:
                $nuevoNombre = menuTextoDos();
                if ($t->cambiarNombre($nuevoNombre)){
                    echo "Exitoso nuevo nombre ".$t->getNombre()."\n";
                } else {
                    echo "Mismo nombre...\n";
                }
                break;
            case 2:
                $nuevaDireccion = menuTextoTres();
                if ($t->cambiarNombre($nuevaDireccion)){
                    echo "Nos mudamos a ".$t->getNombre()."\n";
                } else {
                    echo "Mismo direccion...\n";
                }
                break;
            case 3:
                $indice = $t->seleccionFuncion();
                $nuevoNombreF = menuTextoCuatro();
                if ($t->cambiarNombreFuncion($nuevoNombreF, $indice)){
                    echo "Exitoso\n";
                } else {
                    echo "Mismo nombre...\n";
                }
                break;
            case 4:            
                $indice = $t->seleccionFuncion();
                $nuevoPrecioF = menuTextoCinco();
                if ($t->cambiarPrecioFuncion($nuevoPrecioF, $indice)){
                    echo "Exitoso\n";
                } else {
                    echo "Mismo precio...\n";
                }
                break;
            case 5: 
                echo $t."\n";
            default: 
            echo "Caracter invalido\n";
        }
        $seguir = menuTextoContinuar();
     } while ($seguir != "s");