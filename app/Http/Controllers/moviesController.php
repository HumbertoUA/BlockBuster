<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\movies;
use App\categoria;
use App\movie_cat;

class moviesController extends Controller
{
    public function home(){

    $movies=movies::all();
    $categorias=categoria::all();
 	return view('home', compact('categorias','movies'));
}

public function mPeliculas($id){

$video=DB::table('movie_cat as mc')
->join('movies as m','mc.id_mov','=','m.id_movies')
->join('categoria as c','mc.id_cat','=','c.id_categoria')
->select('m.id_movies','m.nombre','m.precio')
//->select('*')
->where('c.id_categoria','=',$id)
->get();

$categoria=categoria::find($id);
$categorias=categoria::all();

return view('/home', compact('categoria','categorias','movies'));

}


}
