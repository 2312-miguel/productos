<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num = Categoria::all()->count();
        if(!$num){
            abort(400,'Agrege una categoria');
        }
        if (($validator = $this->validar($request,0,$num)) !== true) {
            return $validator;
        }
            $api = Producto::create($request->all());
            return $api;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto =Producto::find($id);
        if ($producto) {
            return $producto;    
        }else{
            abort(400,"Producto no existe");
        }
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $num = Categoria::all()->count();
        $ide =Producto::find($id)->id;
        if (($validator = $this->validar($request, $ide,$num)) !== true) {
            return $validator;
        }
        $api = Producto::find($id);
        $api->fill($request->all());
        $api->update();
        return $api;
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $api =Producto::find($id);
         if($api && $api->delete()){
            return ['message'=>'El producto se a borrado correctamente'];
         }else{
            abort(400,'Error al eliminar el registro');
         }  
    }
    public function addCategory(Request $request)
    {
        if (($validator = $this->validarCategory($request)) !== true) {
            return $validator;
        }
            $api = Categoria::create($request->all());
            return $api;
    }

    public function vender($id)
    {
        $api = Producto::find($id);
        if($api){
            if ($api->stock > 0) {
                    $api->stock = $api->stock - 1;
                    $api->fecha_ultima_venta = date('Y-m-d H:i:s');
                    $api->save();
                    return ['message'=>'Venta realizada con exito'];
            }else{
                abort(400,'No hay producto a vender');
            }
        }else{
            abort(400,'fallo al hacer la consulta');
        }
    }
    public function validar($request , $ide=0, $num=0){
        $validator = Validator::make($request->all(), [
            'nombre_producto'=>"required|max:255|min:3|unique:productos,nombre_producto,$ide",
            'referencia'=>"required|unique:productos,referencia,$ide|max:9999999|min:1111|integer",
            'precio'=>'required|max:9999999|min:1111|integer',
            'peso_gramos'=>'required|integer',
            'categoria'=>"required|integer|min:1|max:$num",
            'stock'=>'required|integer|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(),400);
        }

        return true;
    } 
    public function validarCategory($request)
    {
         $validator = Validator::make($request->all(), [
            'titulo'=>'required|unique:categorias,titulo',
         ]);
         if ($validator->fails()) {
            return response()->json($validator->errors()->all(),400);
        }

        return true;
    }
}
