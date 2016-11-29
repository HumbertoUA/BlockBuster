<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Session;
use Redirect;

class pokemonController extends Controller{
    
public function home(){

	$tipos=tipo::all();
 	return view('/home', compact('tipos','tCaramelos'));

}

public function mostrarPeliculas($id){

$pokemons=DB::table('poke_tipo as pk')
->join('pokemon as p','pk.id_pokemon','=','p.id')
->join('tipos as t','pk.id_tipo','=','t.id')
->select('p.id','p.nombre','p.descripcion','p.imagen','p.caramelos','p.ataque')
//->select('*')
->where('t.id','=',$id)
->get();

$tipo=tipo::find($id);
$tipos=tipo::all();
$tCaramelos=caramelos::all();

return view('/pokemon', compact('tipo','tipos','pokemons','tCaramelos'));

}

}