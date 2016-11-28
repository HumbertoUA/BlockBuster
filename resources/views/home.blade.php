<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BLOCKBUSTER</title>
	<link href="{{asset ("css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset ("css/simple-sidebar.css")}}" rel="stylesheet">
    <link href="{{asset ("css/shop-homepage.css")}}" rel="stylesheet">
	<link rel="icon" type="image/png" href="{{asset ("/img/logo.png")}}">


</head>
<body>

     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/home')}}">Inicio</a>
                <a class="navbar-brand" href="#">Renta</a>
                <a class="navbar-brand" href="#" id="menu-toggle">Peliculas</a>
                <img class="img" src="{{asset ("/img/logo.png")}}" width="20" height="20">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                <li class="sidebar-brand">
                    <a>Categorias:</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
	 <script src="{{asset ("js/jquery.js")}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset ("js/bootstrap.min.js")}}"></script>
</body>
</html>