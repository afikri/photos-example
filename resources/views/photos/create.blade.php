@extends('layout.master')
@section('content')
{!! Form::open(['url' => '/photos/store', 'method'=>'POST', 'files'=>'true']) !!}
  <div class="form-group">
      {!! Form::label('Title', 'Title:') !!}
      {!! Form::text('title',null,['class'=>'form-control']) !!}
  </div>

  <!--label for="userfile">Image File</label>
  <input type="file" id="userfile"-->

  <div class="form-group">
      {!! Form::label('Choose an image') !!}
      {!! Form::file('photo_0') !!}
      {!! Form::file('photo_1') !!}
  </div>



  {!! Form::submit('Create Information', ['class' => 'btn btn-primary form-control']) !!}

{!! Form::close() !!}
@stop