<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Comentario;
use App\Producto_Categoria;
use DB;
use Redirect;

class productosController extends Controller
{
    public function mCategorias(){
        //muestra todas las categorias registradas
      $cat=Categoria::all();

      //mostrar los articulos mas valorados
      $populares=DB::table('productos as p')
      ->join('comentarios as c','p.id','=','c.id_producto')
      ->select('p.id','p.nombre','p.imagen','p.precio','p.descripcion')
      ->where('c.estrellas','>','3')
      ->distinct()
      ->get();


      return view('/principal',compact('cat','populares'));

    }

     public function mProductosPorCategoria($id){

        //se consulta los productos por categoria por su id
    	$productos=DB::table('productos_categorias as pc')
	   ->join('productos as p','pc.id_producto','=','p.id')
	   ->join('categorias as c','pc.id_categoria','=','c.id')
       ->select('p.id','p.nombre','p.descripcion','p.precio','p.cantidad','p.imagen')
       ->where('c.id','=',$id)
       ->get();
  
       //muestra todas las categorias registradas
        $cat = Categoria::all();

        $catName=DB::table('categorias as c')
        ->select('c.nombre_categoria')
        ->where('c.id','=',$id)
        ->first();

    	return view('/categoria',compact('cat','productos','catName'));
    
    
    }

    public function mProductoIndividual($id){

        //informacion del producto por su id
    	$producto=DB::table('productos as p')
		->select('p.id','p.nombre','p.descripcion','p.precio','p.cantidad','p.imagen')
		->where('p.id','=',$id)
		->get();

        //consulta los comentarios que tiene un X producto y quien lo escribio y las esstrellas 
        $comenta=DB::table('comentarios as c')
       ->join('productos as p','c.id_producto','=','p.id')
       ->join('users as u','c.id_user','=','u.id')
       ->select('c.comentario','u.name','c.created_at','c.estrellas')
       ->where('p.id','=',$id)
       ->get();

       //muestra todas las categorias registradas
       $cat=Categoria::all();
      return view('/producto',compact('comenta','cat','producto'));

    }

    public function nComentario(Request $datos){

      $nuevoC= new Comentario();
      $nuevoC->id_producto=$datos->input('id_producto');
      $nuevoC->id_user=$datos->input('id_user');
      $nuevoC->comentario=$datos->input('comentario');
      $nuevoC->estrellas=$datos->input('star');
      $nuevoC->save();

      return Redirect::back();

    }

}
