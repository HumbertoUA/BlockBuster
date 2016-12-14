    @extends('indexAdmin')
    @section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Todos los pedidos realiados</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre producto</th>
                                <th>Cantidad</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($mostrarTodosPedidos as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->importe}}</td>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
       </div>
       @endsection