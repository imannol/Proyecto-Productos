CREATE TABLE categoria(
    pk_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria VARCHAR(50) COMMENT 'Nombre de la categoria'
)

CREATE TABLE productos(
    pk_productos INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codigo_producto VARCHAR(15) NULL COMMENT 'Codigo de barras del producto',
    nombre_productos VARCHAR(50) COMMENT 'nombre del producto',
    precio_compra FLOAT(8,2) COMMENT 'Precio de compra del producto',
    precio_venta FLOAT(8,2) COMMENT 'Precio de venta del producto',
    cantidad INT COMMENT 'Cantidad del producto en existencia',
    fk_categoria INT COMMENT 'Categoria a la que pertenece el producto',
    imagen VARCHAR(100) COMMENT 'Imagen del producto',
    FOREIGN KEY (fk_categoria) REFERENCES categoria (pk_categoria)
) 

CREATE TABLE vendedor(
    pk_vendedor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_vendedor VARCHAR(20),
    apellidop VARCHAR(20),
    apellidom VARCHAR(20),
    celular VARCHAR(10)
)

CREATE TABLE ventas(
    pk_venta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fecha_venta DATE NULL COMMENT 'fecha de la venta',
    subtotal FLOAT(8,2) NULL,
    iva FLOAT(8,2) NULL,
    total FLOAT(8,2) NULL,
    fk_vendedor INT NOT NULL COMMENT 'codigo del vendedor'.
    FOREIGN KEY (fk_vendedor) REFERENCES vendedor (pk_vendedor) 
)

CREATE TABLE productos_venta(
    pk_productos_venta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fk_ventas INT NOT NULL,
    fk_productos INT NOT NULL,
    FOREIGN KEY (fk_ventas) REFERENCES ventas(pk_venta),
    FOREIGN KEY (fk_productos) REFERENCES productos (pk_productos)
)

/*Consulta para obtener el subtotal, iva, total y numero de productos*/
SELECT SUM(productos.precio_venta) AS 'Subtotal', SUM(productos.precio_venta)*0.16 as 'IVA', SUM(productos.precio_venta)*1.16 as 'Total', COUNT(productos.pk_productos) 'cantidad productos vendidos'
FROM productos, productos_venta
WHERE productos_venta.fk_ventas = 1
AND productos.pk_productos=productos_venta.fk_productos