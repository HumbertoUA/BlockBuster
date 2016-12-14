@extends('indexAdmin')
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Comentarios</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Comentario</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($comentarios as $c)
                       <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->nombre}}</td>
                        <td>{{$c->comentario}}</td>
                        <td><a href="{{url('/eliminarComentario')}}/{{$c->id}}" class="btn btn-danger btn-xs">Eliminar</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        
    </div>
</div>
</div>
@endsection