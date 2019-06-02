<div class="alert alert-primary pt-5" role="alert">
    <h2 class="container">Editar Categorias</h2>
</div>
<div class="container">
    <form method="POST" accept-charset="utf-8">
        <?php 
            $editar = new Controlador();
            $editar -> editarCategoriaControlador();
        ?>
    </form>
</div>

<?php
    $editar = new Controlador();
    $editar -> actualizarCategoriaControlador();
?>
