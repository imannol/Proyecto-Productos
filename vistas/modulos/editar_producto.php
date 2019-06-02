<div class="alert alert-primary pt-5" role="alert">
    <h2 class="container">Editar Producto</h2>
</div>
<div class="container">
    <form method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <?php 
            $editar = new Controlador();
            $editar -> editarProductoControlador();
        ?>
    </form>
</div>

<?php
    $editar = new Controlador();
    $editar -> actualizarProductoControlador();
?>
