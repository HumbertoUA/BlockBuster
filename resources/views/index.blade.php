@extends('home')

@section('contenido')

 			 <div class="container">
                     <div class="jumbotron">
                     <h1>Proyecto Video<img src="{{asset ("img/logo.png")}}" width="90" height="100"> </h1> 
                     <p>En este proyecto se desea llevar el control de una tienda de renta de videos.
                     	Cada video posee los siguientes atributos: Id, Nombre, Precio, Tipo (Infantil,
                     	Adolecentes, Adultos). Cada cliente posee los siguientes atributos: Codigo_cliente,
                        Nombre, Membresia (Normal, Gold). Cada cliente puede alquilar 1 o mas videos 
                        por renta. Se desea una aplicacion que permita:
                    	1.- Rentar videos para un cliente.
                    	2.- Calcular el total de la renta para un cliente.
                    	3.- Calcular el total de renta de videos al dia por tipo.
                    	4.- Calcular el total de renta de videos por membresia.</p>           
               		 </div>

@stop  