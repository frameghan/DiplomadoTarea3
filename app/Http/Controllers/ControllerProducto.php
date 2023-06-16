<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
;
use DB;
use Illuminate\Support\Facades\Redirect;

class ControllerProducto extends Controller
{
    public function index(){
       // echo "mi controlador"; die();
       $menu=1;
        return view('inicio.inicio_index',compact('menu'));
    }

    public function adminProductos(){
        /*SELECT categorias.cat_nombre,productos.* FROM productos
INNER join categorias on productos.categoria_id=categorias.id
WHERE productos.pro_estado<>'eliminar'
ORDER by productos.id DESC; */
        $listado=DB::table('productos')
        ->select('categorias.cat_nombre','productos.*')
        ->join('categorias','productos.categoria_id','=','categorias.id')
        ->where('productos.pro_estado','<>','eliminar')
        ->orderBy('productos.id','DESC')->get();


     //  print_r($listado);
    //   var_dump($listado); 
   // die();
        $menu=2;
        return view('productos.productos_index',compact('menu','listado'));
    }
}
