<div class="jumbotron">
  <div class="container">
  <h1 class="display-4">Alta Productos</h1>
  </div>
</div>

<div class="container">
  <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
      <div class="form-group col-md-6" >
        <label for="producto">Nombre del producto</label>
        <input type="text" class="form-control" id="producto" aria-describedby="producto" placeholder="Galletas" name="producto">
        <small id="producto" class="form-text text-muted">Escriba el nombre del producto</small>
      </div>
      <div class="form-group col-md-6">
        <label for="codigo_producto">Código del Producto</label>
        <input type="text" class="form-control" id="codigo_producto" aria-describedby="codigo_producto" placeholder="185525158627" name="codigo_producto">
        <small id="codigo_producto" class="form-text text-muted">Escriba el código del producto</small>
      </div>
      <div class="form-group col-md-6">
        <label for="precio_compra">Precio de compra</label>
        <input type="number" class="form-control" id="precio_compra" aria-describedby="precio_compra" placeholder="9" name="precio_compra">
        <small id="precio_compra" class="form-text text-muted">Escriba el precio el precio de COMPRA del producto</small>
      </div>
      <div class="form-group col-md-6">
        <label for="precio_venta">Precio de venta</label>
        <input type="number" class="form-control" id="precio_venta" aria-describedby="precio_venta" placeholder="12" name="precio_venta">
        <small id="precio_venta" class="form-text text-muted">Escriba el precio de VENTA del producto</small>
      </div>
      <div class="form-group col-md-6">
        <label for="cantidad">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" aria-describedby="cantidad" placeholder="20" name="cantidad">
        <small id="cantidad" class="form-text text-muted">Escriba la cantidad de productos en inventario</small>
      </div>

      <!-- categoria -->
      <div class="form-group col-md-6">
        <label for="categoria">Categoria</label>
        <select class="form-control" id="categoria" name="categoria">
          <option value="">Seleccione...</option>
          <?php 
            $respuesta = Controlador::consultaCategoriaControlador();
            foreach ($respuesta as $dato => $valor) {
              echo '<option value="'.$valor["pk_categoria"].'">'.$valor["nombre_categoria"].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="foto">Imagen</label>
        <input type="file" class="form-control-file" id="foto" aria-describedby="producto" placeholder="20" name="imagen">
        <small id="foto" class="form-text text-muted">Escriba la cantidad de productos en inventario</small>
      </div>
    </div>

    <button type="submit" class="btn btn-primary mb-5">Guardar</button>
  </form>
</div>

<div>
  <?php include('mostrar_productos.php'); ?>
</div>

<?php
  $registro = new Controlador();
  $registro -> registroProductoControlador();
?>