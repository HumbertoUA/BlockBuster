@extends('layouts.app')
@section('content') 
<div class="container">

    <div class="row">

        <div class="col-md-3">
                <p class="lead">Renta de peliculas</p>
            <div class="list-group"> 

                 @foreach($cat as $c)
                <li>
                    <a href="{{url('/mProductosPorCategoria')}}/{{$c->id}}" class="list-group-item">{{$c->nombre_categoria}}</a>
                </li>
                @endforeach

            </div>
        </div>

            @forelse($producto as $p)

                    <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="image-responsive" src="{{ asset("/img/$p->imagen")}}">
                            <div class="caption">
                                <h4 class="pull-right">MXN {{$p->precio}}</h4>
                                <h4><a href="{{url('/mProductoIndividual')}}/{{$p->id}}">{{$p->nombre}}</a>

                                </h4>
                                <p>{{$p->descripcion}}</p>
                                <p class="pull-right">Stock {{$p->cantidad}}</p>
                            </div>
                        </div>

                        <!--verifica el que este logueado para poder agregar al carrito y que haya stock de producto-->
                        @if(Auth::guest())
                            <h4>Necesitas estar logueado para agregar al carrito</h4>
                             @else
                                 @if($p->cantidad==0)
                                    <h4>No hay stock de este producto por el momento</h4>
                                        @else
                                    <a class="btn btn-warning" href="{{url('/addCar')}}/{{$p->id}}">Rentar<span class="glyphicon glyphicon-heart"></span></a>
                                 @endif
                         @endif
                    </div>
                </div>

                    <!--Seccion de comentarios y agregar al carrito-->
                      
                    <div class="container">

                            <h2>Comentarios</h2>
                            <hr>

                        @forelse($comenta as $c)

                        <div class="ratings">
                            <p>{{$c->name}} <span class="glyphicon glyphicon-user"></span> {{$c->created_at}}</p>
                            <p>{{$c->comentario}}</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>x{{$c->estrellas}}
                            </p>

                        </div>

                            <hr>

                        @empty

                            <center>
                                <p><h2>No se encontraron comentarios en esta pelicula<span class="glyphicon glyphicon-remove-circle"></span></h2></p>
                            </center>

                        @endforelse

                    </div>

                    <div class="container">
                        @if (!Auth::guest())
                            <p><h4>Deja tu comentario y calificacion en esta pelicula :)</h4></p>
                                <br>
                            <form action="{{url('/nComentario')}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                             
                                @foreach($producto as $p)
                                <input class="form-control" name="id_producto" type="hidden" value="{{$p->id}}" required>
                                @endforeach

                                <input class="form-control" name="id_user" type="hidden" value="{{Auth::user()->id}}" required>

                                <div class="form-group">
                                    <input class="form-control" name="comentario" placeholder="Escribe tu comentario aqui..." type="text-area" size="245" required>
                                </div>

                               <!--Seccion de estrellas-->
                                    <div class="stars">
                                        <p>
                                            <input class="star star-5" id="star-5" type="radio" value="5" name="star" required>
                                            <label class="star star-5" for="star-5"></label>

                                            <input class="star star-4" id="star-4" type="radio" value="4" name="star">
                                            <label class="star star-4" for="star-4"></label>

                                            <input class="star star-3" id="star-3" type="radio" value="3" name="star">
                                            <label class="star star-3" for="star-3"></label>

                                            <input class="star star-2" id="star-2" type="radio" value="2" name="star">
                                            <label class="star star-2" for="star-2"></label>

                                            <input class="star star-1" id="star-1" type="radio" value="1" name="star">
                                            <label class="star star-1" for="star-1"></label>
                                        </p>
                                    </div>

                                 <p>
                                <input type="submit" value="Comentar" class="btn btn-warning">
                                </p>

                            </form>
                        @endif
                    </div>

           @empty

                    <center>
                    <p><h2>Esta pelicula no existe <span class="glyphicon glyphicon-remove-circle"></span></h2></p>
                    </center>
                    
            @endforelse

                </div>

            </div>

@endsection