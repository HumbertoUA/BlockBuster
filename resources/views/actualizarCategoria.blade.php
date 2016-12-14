@extends('indexAdmin')
@section('content')
<div class="col-sm-10 col-sm-offset-1 section">
	<div class="row form-default">
		<div class="col-xs-12">
			<h2 ng-if="!editar.status">Actualizar categoria</h2>
			@foreach($categoria as $c)
			<form action="{{url('/actCategoria')}}/{{$c->id}}" method="POST">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="detail">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nombre nuevo de la categoria: </label>
								<input type="text" class="form-control input-sm required" maxlength="100" name="categoria" value="{{$c->nombre_categoria}}" required>
								<hr>
								<input type="submit" class="btn btn-warning" value="Actualizar">
							</div>
					</div>
				</div>
			</div>
		</form>
		@endforeach
	</div>

@endsection