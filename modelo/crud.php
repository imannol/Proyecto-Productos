<?php
require_once "conexion.php";
    class Datos {
        static public function vistaCategoriaModelo($tabla) {
                            
            $consulta = Conexion::conectar()->prepare("SELECT pk_categoria, nombre_categoria FROM $tabla ORDER BY nombre_categoria");
            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
            
        }

        public function registroCategoriaModelo($datosModelo, $tabla) {
            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_categoria) VALUES (:nombre)");
            $consulta->bindParam(":nombre",$datosModelo["categoria"], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

            //manda al crud a la 26
        public function registroProductoModelo($datosModelo, $tabla)
         {
            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo_producto, nombre_productos, 
            precio_compra, precio_venta, cantidad, fk_categoria, imagen) VALUES (:codigo, :producto, :precioCompra, 
            :precioVenta, :cant, :categoria, :img)");
            $consulta ->bindParam(":codigo",$datosModelo["codigo_producto"], PDO::PARAM_STR);
            $consulta ->bindParam(":producto",$datosModelo["producto"], PDO::PARAM_STR);
            $consulta ->bindParam(":precioCompra",$datosModelo["precio_compra"], PDO::PARAM_STR);
            $consulta ->bindParam(":precioVenta", $datosModelo["precio_venta"], PDO::PARAM_STR);
            $consulta ->bindParam(":cant",$datosModelo["cantidad"], PDO::PARAM_STR);
            $consulta ->bindParam(":categoria",$datosModelo["categoria"], PDO::PARAM_STR);
            $consulta ->bindParam(":img",$datosModelo['imagen'], PDO::PARAM_STR);

            
            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

        public function registroVendedorModelo($datosModelo, $tabla) {
            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_vendedor, apellidop, apellidom, celular)
            VALUES (:nombre, :ap, :am, :cel)");

            $consulta ->bindParam(":nombre",$datosModelo["vendedor"], PDO::PARAM_STR);
            $consulta ->bindParam(":ap",$datosModelo["ap"], PDO::PARAM_STR);
            $consulta ->bindParam(":am", $datosModelo['am'], PDO::PARAM_STR);
            $consulta ->bindParam(":cel",$datosModelo['celular'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

        public static function SeleccionCategoriaModelo($pk,$tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT pk_categoria, nombre_categoria FROM $tabla WHERE 
            pk_categoria= :pk");

            $consulta->bindParam(":pk",$pk, PDO::PARAM_INT);

            $consulta -> execute();
            return $consulta -> fetch();
            $consulta -> close();
        }


//A C T U A L I Z A R -------CRUD-------------- CONSULTA----------
        public function actualizarCategoriaModelo($arreglo,$tabla) {
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria = :nombre WHERE pk_categoria = :pk");
            $consulta->bindParam(":nombre",$arreglo["1"], PDO::PARAM_STR);
            $consulta->bindParam(":pk",$arreglo["0"], PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta -> close();
        }
        //AQUI FINALIZA LA CONSULTA PARA EDITA CRUD 88
//------------------------------------------------///



        public function borrarCategoriaModelo($datos, $tabla) {
            $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_categoria = :id");
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();
        }

        /////////////   VENDEDOR    /   ////////////////////

        static public function vistaVendedorModelo($tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT pk_vendedor, nombre_vendedor, apellidop, apellidom, celular FROM $tabla ORDER BY nombre_vendedor");
            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
        }

        static public function SeleccionVendedorModelo($pk, $tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE pk_vendedor = :pk");

            $consulta->bindParam(":pk",$pk,PDO::PARAM_INT);
            $consulta->execute();
            return $consulta -> fetch();
            $consulta->close();
        }

        public function actualizarVendedorModelo($arreglo,$tabla) {
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_vendedor = :nombre, apellidop = :ap,
            apellidom = :am, celular = :cel WHERE pk_vendedor = :pk");
            $consulta->bindParam(":nombre",$arreglo["1"], PDO::PARAM_STR);
            $consulta->bindParam(":ap",$arreglo["2"], PDO::PARAM_STR);
            $consulta->bindParam(":am",$arreglo["3"], PDO::PARAM_STR);
            $consulta->bindParam(":cel",$arreglo["4"], PDO::PARAM_STR);
            $consulta->bindParam(":pk",$arreglo["0"], PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();

        }

        public function borrarVendedorModelo($datos, $tabla) {
            $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_vendedor = :id");
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

        static public function vistaProductosModelo($tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT pk_productos, imagen, nombre_productos, precio_venta, cantidad, categoria.nombre_categoria FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria ORDER BY nombre_productos");
            $consulta->execute();
            return $consulta->fetchAll();
            $consulta->close();
        }

        static public function seleccionProductoModelo($pk, $tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE pk_productos=:id");

            $consulta->bindParam(":id",$pk,PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->fetch();
            $consulta->close();
        }

        public function actualizarProductoModelo($datos,$tabla) {
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET codigo_producto = :cp, nombre_productos = :nombre, precio_compra = :precio_compra, precio_venta = :precio_venta, cantidad = :cant, fk_categoria = :cate, imagen = :img WHERE pk_productos = :id");

            $consulta->bindParam(":cp",$datos['codigo_producto'], PDO::PARAM_STR);
            $consulta->bindParam(":nombre",$datos['nombre_producto'], PDO::PARAM_STR);
            $consulta->bindParam(":precio_compra",$datos['precion_compra'], PDO::PARAM_STR);
            $consulta->bindParam(":precio_venta",$datos['precio_venta'], PDO::PARAM_STR);
            $consulta->bindParam(":cant",$datos['cantidad'], PDO::PARAM_STR);
            $consulta->bindParam(":cate",$datos['categoria'], PDO::PARAM_STR);
            $consulta->bindParam(":img",$datos['imagen'],PDO::PARAM_STR);
            $consulta->bindParam(":id",$datos['pk_productos'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();

        }

        public function borrarProductoModelo($datos,$tabla) {
            $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_productos = :id");
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();
        }

        public function registroVentaModelo($datos, $tabla) {
            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha_venta, subtotal, iva, total, cantidad_productos,fk_vendedor) VALUES (:fv, :sub, :iva, :total, :cant, :fk)");
            $consulta->bindParam(":fv",$datos['fecha'], PDO::PARAM_STR);
            $consulta->bindParam(":sub",$datos['sub'],PDO::PARAM_STR);
            $consulta->bindParam(":iva",$datos["iva"],PDO::PARAM_STR);
            $consulta->bindParam(":total",$datos['total'],PDO::PARAM_STR);
            $consulta->bindParam(":cant",$datos['cantProduc'],PDO::PARAM_STR);
            $consulta->bindParam(":fk",$datos['vendedor'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();
        }

        // public function vistaVendedorModelo($tabla) {
        //     $consulta = Conexion::conectar()->prepare("SELECT pk_categoria, nombre_categoria FROM $tabla ORDER BY nombre_categoria");
        //     $consulta->execute();

        //     return $consulta->fetchAll();
        //     $consulta->close();
            
        // }
        static public function vistaVentasModelo($tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT pk_venta, fecha_venta,subtotal,iva,total,cantidad_productos, ven.nombre_vendedor FROM ventas v, vendedor ven WHERE v.fk_vendedor=ven.pk_vendedor ORDER BY ven.nombre_vendedor");
            $consulta->execute();
            return $consulta->fetchAll();
            $consulta->close();
        }

        public function borrarVentaModelo($datos, $tabla) {
            $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_venta = :id");
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();
        }

        static public function seleccionVentaModelo($datos, $tabla) {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE pk_venta=:id");
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            $consulta->execute();
            return $consulta->fetch();
            $consulta->close();
        }

        public function actualizarVentaModelo($datos,$tabla) {
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_venta=:fecha, subtotal=:sub,iva=:iva,total=:total,cantidad_productos=:cantProd,fk_vendedor=:vendedor WHERE pk_venta=:id");

            $consulta->bindParam(":fecha",$datos['fecha'], PDO::PARAM_STR);
            $consulta->bindParam(":sub",$datos['subtotal'], PDO::PARAM_STR);
            $consulta->bindParam(":iva",$datos['iva'], PDO::PARAM_STR);
            $consulta->bindParam(":total",$datos['total'], PDO::PARAM_STR);
            $consulta->bindParam(":cantProd",$datos['cantidad'], PDO::PARAM_STR);
            $consulta->bindParam(":vendedor",$datos['vendedor'], PDO::PARAM_STR);
            $consulta->bindParam(":id",$datos['pk_venta'],PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();

        }

    }
