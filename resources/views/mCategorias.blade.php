    @extends('indexAdmin')
    @section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Categorias <a href="{{url('/nCategoria')}}" class="btn btn-warning btn-md">Agregar categoria <span class="glyphicon glyphicon-plus"></span></a></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Categoria</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($categorias as $ca)
                            <tr>
                                <td>{{$ca->id}}</td>
                                <td>{{$ca->nombre_categoria}}</td>
                                
                                <td><a href="{{url('/eliminarCategoria')}}/{{$ca->id}}" class="btn btn-danger btn-xs">Eliminar</a>
                                   <a href="{{url('/mostrarActCategoria')}}/{{$ca->id}}" class="btn btn-primary btn-xs">Modificar</a></td>
                               </tr>
                               @endforeach

                               

                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
       </div>
       @endsection