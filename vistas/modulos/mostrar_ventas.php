<div class="alert alert-primary" role="alert">
    <div class="container">
        <h2>Ventas</h2>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Iva</th>
                <th scope="col">Total</th>
                <th scope="col">Cantidad de productos</th>
                <th scope="col">Vendedor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $Ventas = new Controlador();
                $Ventas -> vistaVentasControlador();
                $Ventas -> eliminarVentasControlador();
            ?>
        </tbody>
    </table>
    </div>
</div>