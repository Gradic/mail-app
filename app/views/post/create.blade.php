@extends('default')
@section('body')
{{HTML::script('ckeditor/ckeditor.js')}}
@if($errors->all())
<div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $message)
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {{$message}} <br />
        @endforeach
</div>
@endif
{{ Form::open(array('route' => array('post.store'), 'method' => 'post', 'class' => 'form-horizontal')) }}
  <fieldset>
    <legend>Kurti naujienlaiškį</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">El. paštas iš kurio siunčiama</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="sender" name="sender" value="{{ Input::old('sender') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Tema</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="theme" name="theme" value="{{ Input::old('theme') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Tekstas</label>
      <div class="col-lg-10">
        <textarea class="form-control ckeditor rows="3" id="text" name="text">{{ Input::old('text') }}</textarea>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="send"> Siųsti
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Kurti</button>
      </div>
    </div>
  </fieldset>
</form>
@stop