@extends('indexAdmin')

@section('content')
<div class="col-sm-10 col-sm-offset-1 section">
	<div class="row form-default">
		<div class="col-xs-12">
			<h2 ng-if="!editar.status">Agregar un Nuevo Producto</h2>

			<form action="{{url('/guardarProducto')}}" method="POST">
               <input type="hidden" name="_token" value="{{csrf_token()}}">


				<div class="detail">
					<div class="row">
						<div class="col-sm-6">

							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control input-sm required" maxlength="100" name="nombre" required>
							</div>

							<div class="form-group">
								<label>Descripcion</label>
								<textarea class="form-control input-sm required" name="descripcion" maxlength="200" cols="20" rows="4" required></textarea>
								<div class="form-group">
								<label>Cantidad</label>
								<input type="number" min="1" class="form-control input-sm required" name="cantidad" required>
							</div>
						
							</div>

						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label>Codigo</label>
								<input type="number" min="1"class="form-control input-sm required" name="codigo" required>
							</div>

							<div class="form-group">
								<label>Precio</label>
								<input type="number" min="1" class="form-control input-sm required"
								ng-model="portafolio.vc_url" name="precio" required>

							</div>

							<div class="form-group">
								<label>Imagen </label>
								<div class="images">
									<h5 ng-show="editar.imgShow">Seleccione la imagen del producto</h5>
									<input type="file" class="form-control" name="imagen" required>

							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="buttons text-right">
							<input type="submit" class="btn btn-success" value="Registrar">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection