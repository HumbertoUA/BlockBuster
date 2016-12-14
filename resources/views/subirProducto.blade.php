@extends('indexAdmin')
@section('content')

  <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Subir producto individual</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/nProductoIndividual')}}">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right">Ir</i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Archivo .CSV</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/nProductoCsv')}}">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right">Ir</i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
@endsection