<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Producto extends Model
{
    protected $fillable =[
    	'nombre_producto',
		'referencia',
		'precio',
		'categoria',
		'peso_gramos',
		'stock',
    ];
    

    public function category(){
        return $this->hasOneThrough('App\Catogoria');
    }    
}
