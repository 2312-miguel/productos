<?php

use Illuminate\Database\Seeder;
use App\Producto;
use App\Categoria;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			Producto::create([
	            'nombre_producto'=>'celular',
	            'referencia'=>'111111',
	            'precio'=>'100000',
	            'peso_gramos'=>'500',
	            'categoria'=>1,
	            'stock'=>'100',
			]);

			Producto::create([
	            'nombre_producto'=>'computador',
	            'referencia'=>'11114',
	            'precio'=>'1000000',
	            'peso_gramos'=>'5000',
	            'categoria'=>2,
	            'stock'=>'50',
			]);        
    }
}
