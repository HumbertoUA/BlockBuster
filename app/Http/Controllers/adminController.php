<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use App\Categoria;
use App\Producto;
use App\Producto_Categoria;
use DB;
use Excel;

class adminController extends Controller
{
    public function mAdmin(){
      return view('/indexAdmin');
    }

    public function mComentarios(){

  
    	$comentarios=DB::table('comentarios as c')
       ->join('productos as p','c.id_producto','=','p.id')
       ->join('users as u','c.id_user','=','u.id')
       ->select('c.id','u.name','p.nombre','c.comentario')
       ->get();

      return view('/mComentarios',compact('comentarios'));
    }



    public function eliminarComentario($id){
    	Comentario::find($id)->delete();
    	return Redirect('/mComentarios');
    }

    public function mCategorias(){
      $categorias=DB::table('categorias as ca')
      ->select ('ca.id','ca.nombre_categoria')
      ->get();
      return view('/mCategorias', compact('categorias'));
    }

      public function eliminarCategoria($id){
      categoria::find($id)->delete();
      //borrar en cascada los productos de la categoria seleccinada
      Producto_Categoria::where('id_categoria',$id)->delete();
      return Redirect('/mCategorias')->with('message','Se borro correctamente la categoria');;
    }
      public function nCategoria(){
      return view('/nCategoria');
    }

      public function guardarCategoria(Request $datos){
          
          $nCategoria= new Categoria();
          $nCategoria->nombre_categoria=$datos->input('categoria');
          $nCategoria->save();
          return redirect()->back()->with('message','Se registro correctamente la categoria');

      }

      public function mostrarActCategoria($id){
        $categoria=DB::table('categorias as c')
        ->select('c.id','c.nombre_categoria')
        ->where('c.id','=',$id)
        ->get();
        return view('/actualizarCategoria',compact('categoria'));
      }

      public function actCategoria(Request $datos,$id){
          
          $nCategoria=Categoria::find($id);
          $nCategoria->nombre_categoria=$datos->input('categoria');
          $nCategoria->save();

           $categorias=Categoria::all();
           return view('/mCategorias',compact('categorias'))->with('message','Se actualizo correctamente la categoria');

      }

    public function ModificarCategoria($id){
      return Redirect('/mCategorias');
    }

    public function mProductos(){
      return view('subirProducto');
    }

    public function nProductoIndividual(){
      return view('productoNuevo');
    }

    public function nProductoCsv(){
      return view('productoCsv');
    }

    public function guardarProducto(Request $datos){

      $nuevoP= new Producto();
      $nuevoP->nombre=$datos->input('nombre');
      $nuevoP->descripcion=$datos->input('descripcion');
      $nuevoP->precio=$datos->input('precio');
      $nuevoP->cantidad=$datos->input('cantidad');
      $nuevoP->imagen=$datos->input('imagen');
      $nuevoP->codigo=$datos->input('codigo');

      $nuevoP->save();

      return redirect()->back()->with('message','Se registro correctamente la pelicula');
      
    }

    public function guardarProductoCsv(Request $datos){
      Excel::load($datos->archivoCSV, function($reader) {
          foreach ($reader->get() as $book) {
              Producto::firstOrCreate($book->toArray());
            }
      });
      return redirect()->back()->with('message','Se registraron correctamente las peliculas del archivo CSV');
    }

    public function inventario(){
      $inventario=Producto::all();
      return view('inventario',compact('inventario'));
    }

    public function mAsignarCategoriaProducto(){
      
      //lista de productos que tiene categorias
      $productosConCategoria = DB::table('productos_categorias')->pluck('id_producto');

      $productosSinCategoria=DB::table('productos as p')
      ->select('p.id','p.nombre')
      ->whereNotIn('p.id',$productosConCategoria)
      ->get();

      $categorias=Categoria::all();

      return view('asignarCategoriaProducto',compact('productosSinCategoria','categorias'));
    }

    public function asignarCategoria(Request $datos){

      $nuevoPC= new Producto_Categoria();
      $nuevoPC->id_producto=$datos->input('id_producto');
      $nuevoPC->id_categoria=$datos->input('categoria');
      $nuevoPC->save();

      return redirect()->back()->with('message','se registro la pelicula en la categoria seleccionada correctamente');

    }

    public function mPedidos(){
        
        $mostrarTodosPedidos = DB::select("select u.name,p.nombre, cp.cantidad,cp.importe
                        from compras_productos cp
                        inner join compras c on cp.id_compra=c.id
                        inner join users u on c.id_user = u.id
                        inner join productos p on cp.id_producto = p.id");

      return view('/mPedidos',compact('mostrarTodosPedidos'));
    }


     
}
