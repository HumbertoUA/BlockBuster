<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset ("css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset ("css/sb-admin.css")}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset ("css/plugins/morris.css")}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset ("font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    @if(Auth::guest() or !Auth::user()->admin==1))

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">¡Acceso restringido!</div>

                <div class="panel-body">
                    No tienes permiso para estar en esta seccion.
                    <a href="{{url('/home')}}" class="btn btn-danger">Salir de aqui</a>
                </div>
            </div>
        </div>
    </div>
</div>

 @else

    <div id="wrapper">

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
        @endif

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}">Inicio</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                             <li>
                                    <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout <span class="glyphicon glyphicon-log-out"></span>
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                            </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="{{url('/administrador')}}"><i class="fa fa-fw fa-dashboard"></i> Panel de control</a>
                    </li>
                    <li>
                        <a href="{{url('/mAsignarCategoriaProducto')}}"><i class="fa fa-fw fa-bar-chart-o"></i>Asignar categoria a productos</a>
                    </li>
                    <li>
                        <a href="{{url('/inventario')}}"><i class="fa fa-fw fa-bar-chart-o"></i>Inventario</a>
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading Contenido-->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Panel de control <small> <i class="fa fa-fw fa-wrench"></i>Configuracion de la tienda</small>
                        </h1>
                    </div>
                </div>
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Administrar Comentarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/mComentarios')}}">
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
                                        <div>Administrar Productos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/mProductos')}}">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right">Ir</i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Administrar Categorias</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/mCategorias')}}">
                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right">Ir</i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div>Mostrar pedidos realizados</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/mPedidos')}}">

                                <div class="panel-footer">
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right">Ir</i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            <!--Editar para que extienda de indexAdmin y poder borrar los comentarios-->
                @yield('content')
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    @endif


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>