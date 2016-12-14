@extends('indexAdmin')
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Asignar categoria a producto</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Producto</th>
                                <th>Categorias disponibles</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                                      @foreach($productosSinCategoria as $p)
                                         <tr>
                                           <td>{{$p->id}}</td>
                                           <td>{{$p->nombre}}</td>
                                           <form action="{{url('/asignarCategoria')}}" method="POST">
                                				<input type="hidden" name="_token" value="{{csrf_token()}}">
                                           <td>
                                           	<select name="categoria">
                                           		@foreach($categorias as $c)
                                           		<option value="{{$c->id}}">{{$c->nombre_categoria}}</option>
                                           		@endforeach
                                           	</select>
                                           </td>
                                           <td>
                                           	<input class="form-control" name="id_producto" type="hidden" value="{{$p->id}}" required>
                                           	<input type="submit" value="Asignar" class="btn btn-primary btn-xs">
                                           	</td>
                                         </tr>
                                         </form>
                                      @endforeach
                                            

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endsection