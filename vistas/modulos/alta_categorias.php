<div class="jumbotron">
  <div class="container">
  <h1 class="display-4">Alta Categorias</h1>

  </div>
</div>

<div class="container">
  <form accept-charset="utf-8" method="POST">
    <div class="form-group col-6" >
      <label for="categoria">Nombre de la categoria</label>
      <input type="text" class="form-control" id="categoria" aria-describedby="categoria" placeholder="Lácteos" name="categoria">
      <small id="categoria" class="form-text text-muted">Escriba el nombre de la categoria</small>
    </div>
    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar</button></div>
  </form>
  
</div>

<div>
  <?php include("mostrar_categorias.php"); 
  ?>
</div>
<?php
  $registro = new Controlador();
  $registro -> registroCategoriaControlador();
?>
