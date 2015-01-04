@extends('default')
@section('body')
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Tema</th>
      <th>Statusas</th>
      <th>Redaguoti</th>
    </tr>
  </thead>
  <tbody>
@foreach ($posts as $post)

    <tr class=" @if($post->status == 2) success @endif @if($post->status == 0) active @endif @if($post->status == 1) info @endif">
      <td>{{ $post->theme }}</td>
      <th>@if($post->status == 2) Siuntimas baigtas @endif @if($post->status == 0) Siunčiama @endif @if($post->status == 1) Nesiunčiama @endif</th>
      <td><a href="{{ url('post/'.$post->id.'/edit') }}" class="btn btn-primary btn-sm">Redaguoti</a>
            <form style="display:inline" 
        action="{{ url('post/' . $post->id) }}" method="post" 
        onsubmit="return confirm('Ar tikrai?')">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Trinti" class="btn btn-danger btn-sm"/>
      </form></td>
    </tr>

@endforeach

  </tbody>
</table>


@stop
