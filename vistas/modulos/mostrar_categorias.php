<div class="alert alert-primary" role="alert">
    <div class="container">
        <h2>Categorías</h2>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $Categoria = new Controlador();
                $Categoria -> vistaCategoriaControlador();
                $Categoria -> eliminarCategoriaControlador();
            ?>
        </tbody>
    </table>
    </div>
</div>