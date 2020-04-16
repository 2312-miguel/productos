Prueba Konecta
---------------
Puedes usar postman para ejecutar u otro programa para consumir servicios rest

Para crear las tablas se debe crear una base de datos con el nombre inventario y se debe ejecutar el siguiente comando: php artisan migrate 

Para ejecutar datos de prueba se deben lansar los siguientes comandos en el siguiente orden:
php artisan db:seed --class=CategoriaSeeder
php artisan db:seed --class=ProductoSeeder
----------------------
Obtener productos (GET):

api/producto/
--------------------------------
Obtener productos por (id) (GET):

api/producto/(id)
--------------------------
Agregar un producto (POST):

api/producto/

Para registrar un producto pon en el cuerpo de la solicitud en formato JSON los siguientes campos(nombre_producto, referencia, precio, peso_gramos,categoria,stock)

ejemplo:
{
	"nombre_producto":"televisor5",
	"referencia":"111118",
	"precio":"1000000",
	"peso_gramos":"50000",
	"categoria":"1",   ->tiene que ser un id en la tabla categorias
	"stock":"20"
}
-------------------------
Agregar Categoria(POST)

api/producto/addcategoria

Para registrar una Categoria pon en el cuerpo de la solicitud en formato JSON los siguientes campos(titulo,descripcion)

ejemplo:
{
	"titulo":"sencible",
	"descripcion":"" 	-->opcional
}
-------------------------
Actualizar Producto (PUT):

api/producto/(id)

Para actualizar un producto pon en el cuerpo de la solicitud en formato JSON los siguientes campos (nombre_producto, referencia, precio, peso_gramos,categorias ,stock) debemos indicar en la url el producto a actualizar, colocando el id el cual se va a actualizar

ejemplo:	
{
	"nombre_producto":"televisor5",
	"referencia":"111118",
	"precio":"1000000",
	"peso_gramos":"50000",
	"categoria":"1", ---->tiene que ser un id en la tabla categorias
	"stock":"20"
}
--------------------------
Eliminar Producto (DELETE):

api/producto/(id)

Para eliminar un producto debemos indicar en la URL el id del producto
-------------------
Realiza venta (GET):

api/producto/vender/(id)

Para registrar una venta de producto, se bede indicar el id del producto




