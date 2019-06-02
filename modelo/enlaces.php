<?php
    class Paginas
     {
        static public function enlacesPaginasModelo($enlace)

         {
            if($enlace == "principal") 

            {
                $modulo = "vistas/modulos/principal.php";
            }

             elseif($enlace == "usuario")

             {
                $modulo = "vistas/modulos/registro_usuario.php";
             }

             else

            {
                $modulo = "vistas/modulos/principal";
            }

            return $modulo;
        }
    }
?>