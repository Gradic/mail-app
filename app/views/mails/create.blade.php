@extends('default')
@section('body')
@if($errors->all())
<div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $message)
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {{$message}} <br />
        @endforeach
</div>
@endif
{{ Form::open(array('route' => array('email.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}
  <fieldset>
    <legend>Pridėti el. pašto adresą</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">El. paštas</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="email" name="email" placeholder="El. paštas">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Vardas, Pavardė</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Vardas, Pavardė">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        {{Form::submit('Pridėti', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
      </div>
    </div>
  </fieldset>
@stop