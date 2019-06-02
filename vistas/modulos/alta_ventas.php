<div class="jumbotron">
  <div class="container">
  <h1 class="display-4">Alta Ventas</h1>

  </div>
</div>

<div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" name="fecha"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="subtotal">Subtotal</label>
                <input type="number" class="form-control" name="subtotal">
            </div>
            <div class="form-group col-md-6">
                <label for="iva">IVA</label>
                <input type="number" class="form-control" name="iva">
            </div>
            <div class="form-group col-md-6">
                <label for="total">Total</label>
                <input type="number" class="form-control" name="total">
            </div>
            <div class="form-group col-md-6">
                <label for="productos">Cantidad de productos</label>
                <input type="number" class="form-control" name="cantProductos">
            </div>
            <div class="form-group col-md-6">
                <label for="vendedor">Vendedor</label>
                <select name="vendedor" id=""  class="form-control">
                    <option value="">Seleccione...</option>
                    <?php
                        $respuesta = Controlador::consultaVendedorControlador();
                        foreach($respuesta as $dato => $valor) {
                            echo '<option value='.$valor["pk_vendedor"].'">'.$valor["nombre_vendedor"].'</option>';
                        }
                    ?>
                </select>
            </div>
            
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>

<div>
    <?php include('mostrar_ventas.php'); ?>
</div>

<?php
  $res = new Controlador();
  $res -> registroVentaControlador();
?>