@extends('default')
@section('body')
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#ID</th>
      <th>El. paštas</th>
      <th>Vardas, Pavardė</th>
      <th>Redaguoti</th>
    </tr>
  </thead>
  <tbody>
@foreach ($all_mails as $mails)

    <tr>
      <td>{{ $mails->id }}</td>
      <td>{{ $mails->email }}</td>
      <td>{{ $mails->name }}</td>
      <td><a href="{{ url('email/'.$mails->id.'/edit') }}" class="btn btn-primary btn-sm">Redaguoti</a>
            <form style="display:inline" 
        action="{{ url('email/' . $mails->id) }}" method="post" 
        onsubmit="return confirm('Ar tikrai?')">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Trinti" class="btn btn-danger btn-sm"/>
      </form></td>
    </tr>

@endforeach

  </tbody>
</table>
<?php echo $all_mails->links(); ?>
@stop