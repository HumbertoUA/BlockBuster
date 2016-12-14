@extends('home')

@section('encabezado')
    <h2>Peliculas categoria: {{$categoria->categoria}}</h2>
@stop

@section('contenido')

    <div class="row well">
    @foreach($movies as $v)
        <div class="col-md-5">
            <div class="thumbnail">
                <img src="data:image/png;base64,<?php echo base64_encode($v->imagen); ?>">
                    <div class="caption">

                                <h4 class="text-center">{{$v->nombre}}</h4>
                                <p>{{$v->descripcion}}</p>
                                <p align="center">
                                    <a href="{{url('/rentar')}}/{{$v->id}}" class="btn btn-danger" role="button"> Rentar <span class="badge">{{$v->precio}} 
        
                                </p>
                    </div>
            </div>
        </div>
          @endforeach
    </div>



@stop