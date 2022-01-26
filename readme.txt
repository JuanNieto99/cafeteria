#JUAN GUILLERMO NIETO
CONSULTAS -----

---Producto con mas stock
SELECT id FROM `producto`   GROUP by `stock` asc LIMIT 1;

---Producto mas vendido
SELECT id_producto, sum(cantidad) cantidad FROM `ventas` GROUP by id_producto asc LIMIT 1;

INSTALACION

Es necesario instalar Xammp o wamp server y colocarla carpeta cafeteria en donde se gestionan los proyectos en mi caso htdocs luego se inicia apache y mysql y se abre usando la ruta de localhost 
"http://localhost/cafeteria/"