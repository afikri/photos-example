@extends('layout.master')
@section('content')
<h1>Photo Information</h1>
  <a href="{{url('/photos/create')}}" class="btn btn-success">Create Information</a>
  <hr>

  <table class="table table-striped table-bordered table-hover">
    <thead>
       <tr class="bg-info">
        <th>ID</th>
        <th>Title</th>
        <th>Photo 1</th>
        <th>Photo 2</th>
		<th>Action</th>
       </tr>
    </thead>

    <tbody>
      @foreach($photos as $photo)
       <tr>
        <td>{{ $photo->id }}</td>
        <td>{{ $photo->title }}</td>
        <td><img alt="photo" height="80" width="80" src="{{asset($photo->photo_0)}}" /></td>
        <td><img alt="photo" height="80" width="80" src="{{asset($photo->photo_1)}}" /></td>
		    <td><a href="{{url('photos/show',$photo->id)}}" class="btn btn-primary">Detail</a></td>
       </tr>
       @endforeach
    </tbody>
  </table>
@stop