@extends('indexAdmin')
@section('content')
 <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inventario de productos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Producto</th>
                                                <th>Disponibles</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	@foreach($inventario as $i)
                                            <tr>
                                                <td>{{$i->id}}</td>
                                                <td>{{$i->nombre}}</td>
                                                <td>{{$i->cantidad}}</td>
                                                
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                        
                            </div>
                        </div>
                    </div>
@endsection