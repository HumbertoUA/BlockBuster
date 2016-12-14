<?php

namespace App\Http\Controllers;

use App\Producto;
use DB;
use App\Carro;
use App\Mail\correos;
use App\Compra_Producto;
use App\Compra;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function pedidosUsuario(){

    	//mostrar los articulos que compro cierto usuario
    	$id_user = \Auth::user()->id;

    	$mostrarPedidos = DB::select("select p.nombre, cp.cantidad,cp.importe
                        from compras_productos cp
                        inner join compras c on cp.id_compra=c.id
                        inner join users u on c.id_user = u.id
                        inner join productos p on cp.id_producto = p.id
                        where c.id_user = " . $id_user);
    		
    		return view('/pedidos',compact('mostrarPedidos'));
    }


    public function membresia(){
       return view('/membresia');
    }

    public function guardarMembresia(Request $datos){
        $id_user = \Auth::user()->id;

        $membresia=User::find($id_user);
        $membresia->membresia=$datos->input('membresia');
        $membresia->save();

         $cat=Categoria::all();

      //mostrar los articulos mas valorados
      $populares=DB::table('productos as p')
      ->join('comentarios as c','p.id','=','c.id_producto')
      ->select('p.id','p.nombre','p.imagen','p.precio','p.descripcion')
      ->where('c.estrellas','>','3')
      ->distinct()
      ->get();


      return view('/principal',compact('cat','populares'))->with('message','Se actualizo correctamente la membresia');

    }

    



}
