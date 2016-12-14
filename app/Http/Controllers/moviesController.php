<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
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
dd($id);/*
$video=DB::table('movie_cat as mc')
->join('movies as m','mc.id_mov','=','m.id')
->join('categoria as c','mc.id_cat','=','c.id')
->select('m.id','m.nombre','p.descripcion','p.imagen','m.precio')
//->select('*')
->where('c.id','=',$id)
->get();

$categoria=categoria::find($id);
$categorias=categoria::all();

return view('/movies', compact('categorias','categoria','video'));
*/
}


}
