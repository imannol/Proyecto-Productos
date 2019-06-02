<?php
    class Controlador {
        static public function pagina() {
            include("vistas/plantilla.php");
        }

        static public function enlacesPagina() {
            if(isset($_GET['accion'])) {
                $enlace = $_GET['accion'];
            } else {
                $enlace = "principal";
            }
            $respuesta = Paginas::enlacesPaginasModelo($enlace);
            include($respuesta);
        }

        static public function consultaCategoriaControlador(){
            $tabla = "categoria";
            $respuesta = Datos::vistaCategoriaModelo($tabla);
            return $respuesta;
        }

        static public function registroCategoriaControlador() {
            if(isset($_POST['categoria'])) 
            {
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/', $_POST["categoria"])) 
                {
                    $datosControlador = array("categoria" => $_POST["categoria"]);

                    $respuesta = Datos::registroCategoriaModelo($datosControlador, "categoria");

                    if($respuesta == 'ok') {
                        echo '<script> 
                            alert("datos guardados correctamente")
                            window.location="index.php?accion=categorias"
                        </script>';
                    } else {
                        echo '<script> 
                            alert("datos no guardados")
                            window.location="index.php?accion=categorias"
                        </script>';
                    }


                } 
            }
        }

        static public function registroProductoControlador() {
            if(isset($_POST['producto'])) {
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9\s]*$/', $_POST["producto"])) {

                    $carpeta = "foto_producto";
                    $archivo = $_FILES['imagen']['tmp_name'];
                    $nombreArchivo = $_FILES['imagen']['name'];
                    $ruta = "controlador/".$carpeta."/".$nombreArchivo;

                    $datosControlador = array("producto"=>$_POST["producto"], "codigo_producto"=>$_POST["codigo_producto"],
                    "precio_compra"=>$_POST["precio_compra"], "precio_venta"=>$_POST["precio_venta"], "cantidad"=>$_POST["cantidad"],
                    "categoria"=>$_POST["categoria"], "imagen"=>$ruta);

                    $respuesta = Datos::registroProductoModelo($datosControlador, "productos");

                    if($respuesta == "ok") {

                        if(move_uploaded_file($archivo, $ruta))
                        {
                            echo '<script>
                                    alert("archivo copiado exitosamente")
                                 </script>';
                        }
                        else
                        {
                            echo '<script>
                                    alert("archivo NO COPIADO")
                                 </script>';
                        }
                        
                        echo '<script> 
                            alert("datos guardados correctamente")
                            window.location="index.php?accion=productos"
                        </script>';
                    } else {
                        echo '<script> 
                            alert("datos no guardados")
                            window.location="index.php?accion=productos"
                        </script>';
                    }
                }
            }
        }

        static public function registroVendedorControlador() {
            if(isset($_POST['vendedor'])) {
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/', $_POST["vendedor"])) {
                    $datosControlador = array("vendedor"=>$_POST['vendedor'], "ap"=>$_POST['ap'], "am"=>$_POST['am'], 
                    "celular"=>$_POST['celular']);

                    $respuesta = Datos::registroVendedorModelo($datosControlador, "vendedor");

                    if($respuesta == "ok") {
                        echo '<script> 
                            alert("datos guardados correctamente")
                            window.location="index.php?accion=vendedores"
                        </script>';
                    } else {
                        echo '<script> 
                            alert("datos no guardados")
                            window.location="index.php?accion=vendedores"
                        </script>';
                    }
                }
            }
        }

        /////CATEGORIAS/////////
        static public function vistaCategoriaControlador() {
            $respuesta = Datos::vistaCategoriaModelo("categoria");

            foreach($respuesta as $renglon => $datos) {
                ?>
<tr>
    <td><?php echo $datos["nombre_categoria"]; ?></td>
    <td>
        <a href="index.php?accion=editar_categoria&id=<?php echo $datos["pk_categoria"]; ?>">
            <button type="button" class="btn btn-warning"><i class='fas fa-edit'></i></button>
        </a>
    </td>
    <td>
        <a href="index.php?accion=categorias&id=<?php echo $datos["pk_categoria"]; ?>">
            <button type="button" class="btn btn-danger"><i class='fas fa-trash-alt'></i></button>
        </a>
    </td>
</tr>
<?php
            }
        }

        static public function editarCategoriaControlador() {
            $datos = $_GET['id'];
            $respuesta = Datos::SeleccionCategoriaModelo($datos, "categoria");
            ?>
<div class="form-group col-6">
    <label for="categoria">Nombre de la categoria</label>
    <input type="text" class="form-control" id="categoria" aria-describedby="categoria" placeholder="Lácteos"
        name="categoria" value="<?php echo $respuesta['nombre_categoria']; ?>">
    <small id="categoria" class="form-text text-muted">Actualice el nombre de la categoria</small>
</div>
<input type="hidden" name="pk_categoria" value="<?php echo $respuesta['pk_categoria']; ?>">
<div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar</button></div>
<?php
        }



        //----------MANDA LLAMAR LA FUNCION AL CONTROLADOR actualizarCategoriaModelo DEL CRUD 83---------//
        
        static public function actualizarCategoriaControlador() {
        if(isset($_POST['categoria']))
         {
        $arreglo = array
        ("0"=>$_POST['pk_categoria'],
         "1"=>$_POST['categoria']);
        $respuesta = Datos::actualizarCategoriaModelo($arreglo,"categoria");

                if($respuesta == "ok") {
                    echo '<script>
                            alert("Datos actualizados correctamente");
                            window.location="index.php?accion=categorias"
                        </script>
                    ';
                } else {
                    echo '<script>
                            alert("Datos no actualizados");
                            window.location="index.php?accion=categorias"
                        </script>
                    ';
                }
            }
        }
//----------AQUI FINALIZA LA CONSULTA PARA ACTUALIZAR LOS DATOS------
        //








        static public function eliminarCategoriaControlador() {
            if(isset($_GET['id'])) {
                $datos = $_GET['id'];
                $respuesta = Datos::borrarCategoriaModelo($datos, "categoria");

                if($respuesta == "ok") {
                    echo '<script>
                            alert("Datos Borrados correctamente")
                            window.location="index.php?accion=categorias"
                        </script>
                    ';
                } else {
                    echo '<script>
                        alert("Los datos no se pueden borrar")
                        window.location="index.php?accion=categorias"
                    </script>
                    ';
                }
            }
        }

        ///////////////////VENDEDORES/////////////////////////
        static public function vistaVendedorControlador() {
            $respuesta = Datos::vistaVendedorModelo("vendedor");

            foreach($respuesta as $renglon => $datos) {
                ?>
<tr>
    <td><?php echo $datos["nombre_vendedor"]; ?></td>
    <td><?php echo $datos["apellidop"]; ?></td>
    <td><?php echo $datos["apellidom"]; ?></td>
    <td><?php echo $datos["celular"]; ?></td>
    <td>
        <a href="index.php?accion=editar_vendedor&id=<?php echo $datos["pk_vendedor"]; ?>">
            <button type="button" class="btn btn-warning"><i class='fas fa-edit'></i></button>
        </a>
    </td>
    <td>
        <a href="index.php?accion=vendedores&id=<?php echo $datos["pk_vendedor"]; ?>">
            <button type="button" class="btn btn-danger"><i class='fas fa-trash-alt'></i></button>
        </a>
    </td>
</tr>
<?php
            }
        }

        static public function editarVendedorControlador() {
            $datos = $_GET['id'];
            $respuesta = Datos::SeleccionVendedorModelo($datos, "vendedor");
            ?>
<div class="form-group row">
    <div class="form-group col-6">
        <label for="vendedor">Nombre del Vendedor</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="vendedor" placeholder="Fernando Jose"
            name="vendedor" value="<?php echo $respuesta['nombre_vendedor']; ?>">
        <small id="vendedor" class="form-text text-muted">Actualice el nombre del vendedor</small>
    </div>
    <div class="form-group col-6">
        <label for="vendedor">Apellido paterno</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="vendedor" placeholder="De la Cruz"
            name="ap" value="<?php echo $respuesta['apellidop'];?>">
        <small id="vendedor" class="form-text text-muted">Actualice el apellido paterno del vendedor</small>
    </div>
    <div class="form-group col-6">
        <label for="vendedor">Apellido materno</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="am" placeholder="Rivadeneira" name="am"
            value="<?php echo $respuesta['apellidom'];?>">
        <small id="vendedor" class="form-text text-muted">Actualice el Apellido materno del vendedor</small>
    </div>
    <div class="form-group col-6">
        <label for="celular">Número celular</label>
        <input type="text" class="form-control" id="celular" aria-describedby="celular" placeholder="3231241521"
            name="celular" value="<?php echo $respuesta['celular'];?>">
        <small id="celular" class="form-text text-muted">Actualice el número celular del vendedor</small>
    </div>
</div>
<input type="hidden" name="pk_vendedor" value="<?php echo $respuesta['pk_vendedor']; ?>">
<div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar</button></div>
<?php
        }

        static public function actualizarVendedorControlador() {
            if(isset($_POST['vendedor'])) {
      
                $arreglo = array("0"=>$_POST['pk_vendedor'], "1"=>$_POST['vendedor'],"2"=>$_POST['ap'],"3"=>$_POST['am'],
                "4"=>$_POST['celular']);

                $respuesta = Datos::actualizarVendedorModelo($arreglo,"vendedor");

                if($respuesta == "ok") {
                    echo "<script>
                            alert('Datos actualizados correctamente');
                            window.location='index.php?accion=vendedores'
                        </script>
                    ";
                } else {
                    echo "<script>
                            alert('Datos No actualizados');
                            window.location='index.php?accion=vendedores'
                        </script>
                    ";
                }
            }
        }

        static public function eliminarVendedorControlador() {
            if(isset($_GET['id'])) {
                $datos = $_GET['id'];
                $respuesta = Datos::borrarVendedorModelo($datos, "vendedor");

                if($respuesta == "ok") {
                    echo '<script>
                            alert("Datos Borrados correctamente")
                            window.location="index.php?accion=vendedores"
                        </script>
                    ';
                } else {
                    echo '<script>
                        alert("Los datos no se pueden borrar")
                        window.location="index.php?accion=vendedores"
                    </script>
                    ';
                }
            }
        }

        static public function vistaProductosControlador() {
            $respuesta = Datos::vistaProductosModelo("productos");

            foreach($respuesta as $renglon => $datos) {
                ?>
                <tr>
                    <td><img src="<?php echo $datos["imagen"]; ?>" alt="" width="100" hight="100"></td>
                    <td><?php echo $datos["nombre_productos"]; ?></td>
                    <td><?php echo $datos["precio_venta"]; ?></td>
                    <td><?php echo $datos["cantidad"]; ?></td>
                    <td><?php echo $datos["nombre_categoria"]; ?></td>
                    <td>
                        <a href="index.php?accion=editar_productos&id=<?php echo $datos["pk_productos"]; ?>">
                            <button type="button" class="btn btn-warning"><i class='fas fa-edit'></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?accion=productos&id=<?php echo $datos["pk_productos"]; ?>">
                            <button type="button" class="btn btn-danger"><i class='fas fa-trash-alt'></i></button>
                        </a>
                    </td>
                </tr>
                <?php
             }
        }

        static public function editarProductoControlador() {
            $datos= $_GET['id'];
            $respuesta = Datos::seleccionProductoModelo($datos, "productos");
            ?>
            <div class="form-group row">
                <div class="form-group col-md-6" >
                    <label for="producto">Nombre del producto</label>
                    <input type="text" class="form-control" id="producto" aria-describedby="producto" placeholder="Galletas" name="producto" value="<?php echo $respuesta['nombre_productos']?>">
                    <small id="producto" class="form-text text-muted">Escriba el nombre del producto</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="codigo_producto">Código del Producto</label>
                    <input type="text" class="form-control" id="codigo_producto" aria-describedby="codigo_producto" placeholder="185525158627" name="codigo_producto" value="<?php echo $respuesta['codigo_producto']?>">
                    <small id="codigo_producto" class="form-text text-muted">Escriba el código del producto</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="precio_compra">Precio de compra</label>
                    <input type="number" class="form-control" id="precio_compra" aria-describedby="precio_compra" placeholder="9" name="precio_compra" value="<?php echo $respuesta['precio_compra']?>">
                    <small id="precio_compra" class="form-text text-muted">Escriba el precio el precio de COMPRA del producto</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="precio_venta">Precio de venta</label>
                    <input type="number" class="form-control" id="precio_venta" aria-describedby="precio_venta" placeholder="12" name="precio_venta" value="<?php echo $respuesta['precio_venta']?>">
                    <small id="precio_venta" class="form-text text-muted">Escriba el precio de VENTA del producto</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" aria-describedby="cantidad" placeholder="20" name="cantidad" value="<?php echo $respuesta['cantidad']?>">
                    <small id="cantidad" class="form-text text-muted">Escriba la cantidad de productos en inventario</small>
                </div>

                <!-- categoria -->
                <div class="form-group col-md-6">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                    <option value="">Seleccione...</option>
                    <?php 
                        $respuesta2 = Controlador::consultaCategoriaControlador();
                        foreach ($respuesta2 as $dato => $valor) {
                            if($respuesta['fk_categoria'] == $valor['pk_categoria']) {
                                echo '<option value="'.$valor["pk_categoria"].'" selected="select">'.$valor["nombre_categoria"].'</option>';
                            } else {
                                echo '<option value="'.$valor["pk_categoria"].'">'.$valor["nombre_categoria"].'</option>';
                            }
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <img src="<?php echo $respuesta['imagen'];?>" width="150" hight="100" alt="" id="img" name="img" value="<?php echo $respuesta['imagen']?>">
                    <br>
                    <label for="foto">Imagen</label>
                    <input type="file" class="form-control-file" id="foto" aria-describedby="producto" placeholder="20" name="imagen">
                    <small id="foto" class="form-text text-muted">Escriba la cantidad de productos en inventario</small>
                </div>
            </div>
            <input type="hidden" name="pk_producto" value="<?php echo $respuesta['pk_productos']; ?>">
            <button type="submit" class="btn btn-primary mb-5">Guardar</button>
            <?php
        }

        static public function actualizarProductoControlador() {
            if(isset($_POST['producto'])) {

                    
                    $nombreArchivo = $_FILES['imagen']['name'];
                    $move = false;
                    if($nombreArchivo=="") {
                        $res = Datos::seleccionProductoModelo($_POST['pk_producto'], "productos");
                        $ruta = $res['imagen'];
                       
                    } else {
                        $carpeta = "foto_producto";
                        $archivo = $_FILES['imagen']['tmp_name'];
                        $ruta = "controlador/".$carpeta."/".$nombreArchivo;
                        $move = true;
                        
                    }
                    echo "<script>alert('".$ruta."')</script>";
                    $arreglo = array('pk_productos'=>$_POST['pk_producto'], 'nombre_producto'=>$_POST['producto'], "codigo_producto"=>$_POST['codigo_producto'], "precio_compra"=>$_POST['precio_compra'], 'precio_venta'=>$_POST['precio_venta'],'cantidad'=>$_POST['cantidad'], "categoria"=>$_POST['categoria'], 'imagen'=>$ruta);

                    $respuestax = Datos::actualizarProductoModelo($arreglo, "productos");

                    
                    if($respuestax == "ok") {

                        if($move==true) {
                            if(move_uploaded_file($archivo, $ruta))
                            {
                                echo '<script>
                                        alert("archivo copiado exitosamente")
                                    </script>';
                            }
                            else
                            {
                                echo '<script>
                                        alert("archivo NO COPIADO")
                                    </script>';
                            }
                        }                     
                        echo '<script> 
                            alert("datos guardados correctamente")
                            window.location="index.php?accion=productos"
                        </script>';
                    } else {
                        echo '<script> 
                            alert("datos no guardados")
                            window.location="index.php?accion=productos"
                        </script>';
                    }
            }
        }

        static public function eliminarProductosControlador() {
            if(isset($_GET['id'])) {
                $datos = $_GET['id'];
                $respuestax = Datos::borrarProductoModelo($datos, "productos");

                if($respuestax == "ok") {
                    echo '<script>
                            alert("Datos Borrados correctamente")
                            window.location="index.php?accion=productos"
                        </script>
                    ';
                } else {
                    echo '<script>
                        alert("Los datos no se pueden borrar")
                        window.location="index.php?accion=productos"
                    </script>
                    ';
                }
            }
        }

        static public function consultaVendedorControlador() {
            $tabla = "vendedor";
            $respuesta = Datos::vistaVendedorModelo($tabla);
            return $respuesta;
        }

        static public function registroVentaControlador() {
            if(isset($_POST['fecha'])) {
               
                $datosControlador = array("fecha"=>$_POST['fecha'], "sub"=>$_POST['subtotal'], "iva"=>$_POST['iva'], 
                "total"=>$_POST['total'], "cantProduc" =>$_POST['cantProductos'], "vendedor"=>$_POST['vendedor']);

                $respuesta = Datos::registroVentaModelo($datosControlador, "ventas");

                if($respuesta == "ok") {
                    echo '<script> 
                        alert("datos guardados correctamente")
                        window.location="index.php?accion=ventas"
                    </script>';
                } else {
                    echo '<script> 
                        alert("datos no guardados")
                        window.location="index.php?accion=ventas"
                    </script>';
                }
                
            }
        }

        static public function vistaVentasControlador() {
            $respuesta = Datos::vistaVentasModelo("ventas");

            foreach($respuesta as $renglon => $datos) {
                ?>
                <tr>
                    <td><?php echo $datos["fecha_venta"]; ?></td>
                    <td><?php echo $datos["subtotal"]; ?></td>
                    <td><?php echo $datos["iva"]; ?></td>
                    <td><?php echo $datos["total"]; ?></td>
                    <td><?php echo $datos["cantidad_productos"]; ?></td>
                    <td><?php echo $datos["nombre_vendedor"]; ?></td>
                    <td>
                        <a href="index.php?accion=editar_venta&id=<?php echo $datos["pk_venta"]; ?>">
                            <button type="button" class="btn btn-warning"><i class='fas fa-edit'></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?accion=ventas&id=<?php echo $datos["pk_venta"]; ?>">
                            <button type="button" class="btn btn-danger"><i class='fas fa-trash-alt'></i></button>
                        </a>
                    </td>
                </tr>
                <?php
             }
        }

        static public function eliminarVentasControlador() {
            if(isset($_GET['id'])) {
                $datos = $_GET['id'];
                $respuestax = Datos::borrarVentaModelo($datos, "ventas");

                if($respuestax == "ok") {
                    echo '<script>
                            alert("Datos Borrados correctamente")
                            window.location="index.php?accion=ventas"
                        </script>
                    ';
                } else {
                    echo '<script>
                        alert("Los datos no se pueden borrar")
                        window.location="index.php?accion=ventas"
                    </script>
                    ';
                }
            }
        }

        static public function editarVentaControlador() {
            $datos= $_GET['id'];
            $respuesta = Datos::seleccionVentaModelo($datos, "ventas");
            ?>
            <div class="row">
            <div class="form-group col-md-6">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" name="fecha"  required value="<?php echo $respuesta["fecha_venta"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="subtotal">Subtotal</label>
                <input type="number" class="form-control" name="subtotal" value="<?php echo $respuesta["subtotal"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="iva">IVA</label>
                <input type="number" class="form-control" name="iva" value="<?php echo $respuesta["iva"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="total">Total</label>
                <input type="number" class="form-control" name="total" value="<?php echo $respuesta["total"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="productos">Cantidad de productos</label>
                <input type="number" class="form-control" name="cantProductos" value="<?php echo $respuesta["cantidad_productos"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="vendedor">Vendedor</label>
                <select name="vendedor" id=""  class="form-control">
                    <option value="">Seleccione...</option>
                    <?php 
                        $respuesta2 = Controlador::consultaVendedorControlador();
                        foreach ($respuesta2 as $dato => $valor) {
                            if($respuesta['fk_vendedor'] == $valor['pk_vendedor']) {
                                echo '<option value="'.$valor["pk_vendedor"].'" selected="select">'.$valor["nombre_vendedor"].'</option>';
                            } else {
                                echo '<option value="'.$valor["pk_vendedor"].'">'.$valor["nombre_vendedor"].'</option>';
                            }
                        }
                    ?>
                </select>
                <input type="hidden" value="<?php echo $respuesta["pk_venta"];?>" name="pk_venta">
            </div>
            
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>

        <?php
        }

        static public function actualizarVentaControlador() {
            if(isset($_POST['fecha'])) {

                $arreglo = array('pk_venta'=>$_POST['pk_venta'], 'fecha'=>$_POST['fecha'], "subtotal"=>$_POST['subtotal'], "iva"=>$_POST['iva'], 'total'=>$_POST['total'],'cantidad'=>$_POST['cantProductos'], "vendedor"=>$_POST['vendedor']);

                $respuestax = Datos::actualizarVentaModelo($arreglo, "ventas");
                
                if($respuestax == "ok") {                     
                    echo '<script> 
                        alert("datos guardados correctamente")
                        window.location="index.php?accion=ventas"
                    </script>';
                } else {
                    echo '<script> 
                        alert("datos no guardados")
                        window.location="index.php?accion=ventas"
                    </script>';
                }
            }   
        }


    static public function registrousuario()
    {
?>
<div class="modal-dialog text-center">
<div class="col-sm-9 main-section">
          <div class="modal-content">

    <legend  style="font-size: 24pt"><b> <font  style="color: #FACD07;">!Registro de Usuario¡</i></font> </b>
   </legend>
  <form align="center" method="post" action="">
  <fieldset>
    <div align="center">
     <label></label><a href="index.php"><button style="font-size: 8pt;" type="button" class="btn btn-warning"><font style="color: #070707;">Iniciar Secion</font></button></a>
</div>
<br>
<br>

 <div class="form-group" id="user-group">
 <input name="realname" type="text" class="form-control" placeholder="Ingresa tu Nombre"></div>
<br>
   <div class="form-group" id="user1-group">
     <input name="nick" type="text" class="form-control" require placeholder="Ingresa tu e-mail"></div>
<br>   
<div class="form-group" id="user2-group">
  <input name="pass" type="password" class="form-control" placeholder="Ingresa tu Contraseña"></div>

    <br>
  <div class="form-group" id="user3-group">
  <input name="rpass" type="password" class="form-control" require placeholder="Repite tu Contraseña"> </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"> Registrarse </i></button>
  </fieldset>
</div>
</form>
</div>
</div>
</div>

 <?php
        if(isset($_POST['submit']))
        {
            require("registro.php");
        }   
          
          }
    }


?>

    