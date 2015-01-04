@extends('default')
@section('body')
<div class="row">
    <div class="col-md-6 col-md-offset-2">
		    @if(Session::has('messageError'))
		<div class="alert alert-danger" role="alert">
		  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		            <span class="sr-only">Error:</span>
		           {{ Session::get('messageError') }} <br />

		</div>
		@endif
{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
<div class="form-group">
{{Form::label('email','El .paštas')}}
{{Form::text('email', null,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('password','Slaptažodis')}}
{{Form::password('password',array('class' => 'form-control'))}}
</div>
<div class="checkbox">
<label>
 	<input type="checkbox" name="remember" id="remember"> Prisiminti
</label>
</div>
{{Form::submit('Prisijungti', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}
</div>
	</div>
</div>
@stop