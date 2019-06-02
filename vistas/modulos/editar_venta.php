<div class="alert alert-primary pt-5" role="alert">
    <h2 class="container">Editar Venta</h2>
</div>
<div class="container">
    <form method="POST" accept-charset="utf-8">
        <?php 
            $editar = new Controlador();
            $editar -> editarVentaControlador();
        ?>
    </form>
</div>

<?php
    $editar = new Controlador();
    $editar -> actualizarVentaControlador();
?>
