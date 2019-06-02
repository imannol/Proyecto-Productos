<div class="alert alert-primary" role="alert">
    <div class="container">
        <h2>Vendedores</h2>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Celular</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $Vendedor = new Controlador();
                $Vendedor -> vistaVendedorControlador();
                $Vendedor -> eliminarVendedorControlador();
            ?>
        </tbody>
    </table>
    </div>
</div>