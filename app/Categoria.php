<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable =[
    	'titulo',
    	'descripcion',
    ];

    public function product(){
        return $this->belongsToMany('App\Producto');
    }
}
