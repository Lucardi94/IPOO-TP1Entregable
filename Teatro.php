<?php
    class Teatro{
        /***
         * Representacion de la clase teatro.
         *  - Atributos:
         *      + string nombre
         *      + string dirección
         *      + array funciones al día (4) 
         *  - Funciones:
         *      + cambiarNombre($nuevoNombre)
         *      + cambiarDirección($nuevaDireccion)
         *      + CambiarNombreFunción($nuevoNombre, $i)
         *      + cambiarPrecioFuncion($nuevoPrecio, $i)
         *      + seleccionFuncion()
         *          -  mostrarFunciones()
         *      + mostrarFunciones()
         *      + toString()
         *          -  mostrarFunciones()
         */

        private $nombre;
        private $direccion;
        private $listaFunciones;

        public function __construct($nom, $dir, $lisFun)
        {
            $this->nombre = $nom;
            $this->direccion = $dir;
            $this->listaFunciones = $lisFun;
        }

        public function getNombre(){
             return $this->nombre;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getListaFunciones(){
            return $this->listaFunciones;
        }

        public function setNombre($nom){
            $this->nombre = $nom;
        }
        public function setDireccion($dir){
            $this->direccion = $dir;
        }
        public function setListaFunciones($lisFun){
            $this->listaFunciones = $lisFun;
        }

        public function cambiarNombre($nuevoNombre){
            /* Setea nombre con el valor ingraso en por parametro */
            if ($this->getNombre() != $nuevoNombre){
                $this->setNombre($nuevoNombre);
                return TRUE;
            } else return FALSE;
        }

        public function cambiarDireccion($nuevaDireccion){
            /* Setea direccion con el valor ingraso en por parametro */
            if ($this->getDireccion() != $nuevaDireccion){
                $this->setDireccion($nuevaDireccion);
                return TRUE;
            } else return FALSE;
        }

        public function mostrarFunciones(){
            /* Retorna un string con los datos del atributo ListaFunciones */
            $txt = "\n";
            foreach ($this->getListaFunciones() as $indice => $funcion){
                $numero = $indice + 1;
                $txt = $txt.$numero." $ ".$funcion["precio"]." - - - ".$funcion["nombre"]."\n";
            }
            return $txt;
        }

        public function seleccionFuncion(){
            /* Muestra las funciones y retorna el indice de la funcion deseada */
            $txt = $this->mostrarFunciones();
            echo $txt."\nIngrese el numero de funcion a cambiar";
            return  trim(fgets(STDIN)) - 1;

        }

        public function cambiarNombreFuncion($nuevoNombre, $i){
            /* Setea la lista con la mosificacion deseada */
            $lisFun = $this->getListaFunciones();
            if ($lisFun[$i]["nombre"] != $nuevoNombre){
                $lisFun[$i] = array ("nombre" => $nuevoNombre, "precio" => $lisFun[$i]["precio"]); //crea en lista[indice] la nueva matriz del espacio en la lista.           
                $this->setListaFunciones($lisFun);
                return TRUE;
            } else return FALSE;
        }

        public function cambiarPrecioFuncion($nuevoPrecio, $i){
            /* Setea la lista con la mosificacion deseada */
            $lisFun = $this->getListaFunciones();
            if ($lisFun[$i] != $nuevoPrecio){
                $lisFun[$i] = array ("nombre" => $lisFun[$i]["nombre"], "precio" => $nuevoPrecio); //crea en lista[indice] la nueva matriz del espacio en la lista.
                $this->setListaFunciones($lisFun);
                return TRUE;
            } else return FALSE;
        }

        public function __toString()
        {
            return "Teatro: ".$this->getNombre().
            "\nDireccion: ".$this->getDireccion().
            "\n[Funciones]".$this->mostrarFunciones();
        }

    }