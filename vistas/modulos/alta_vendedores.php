<div class="jumbotron">
  <div class="container">
  <h1 class="display-4">Alta Vendedores</h1>

  </div>
</div>

<div class="container">
  <form class="form-group" accept-charset="utf-8" method="POST">
    <div class="form-group row">
      <div class="form-group col-6">
        <label for="vendedor">Nombre del Vendedor</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="vendedor" placeholder="Fernando Jose" name="vendedor">
        <small id="vendedor" class="form-text text-muted">Escriba el nombre del vendedor</small>
      </div>
      <div class="form-group col-6">
        <label for="vendedor">Apellido paterno</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="vendedor" placeholder="De la Cruz" name="ap">
        <small id="vendedor" class="form-text text-muted">Apellido paterno del vendedor</small>
      </div>
      <div class="form-group col-6">
        <label for="vendedor">Apellido materno</label>
        <input type="text" class="form-control" id="vendedor" aria-describedby="am" placeholder="Rivadeneira" name="am">
        <small id="vendedor" class="form-text text-muted">Apellido materno del vendedor</small>
      </div>
      <div class="form-group col-6">
        <label for="celular">Número celular</label>
        <input type="text" class="form-control" id="celular" aria-describedby="celular" placeholder="3231241521" name="celular">
        <small id="celular" class="form-text text-muted">Escriba el número celular del vendedor</small>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Guardar</button>
  </form>
</div>


<div>
  <?php include("mostrar_vendedores.php"); ?>
</div>

<?php
  $res = new Controlador();
  $res -> registroVendedorControlador();
?>