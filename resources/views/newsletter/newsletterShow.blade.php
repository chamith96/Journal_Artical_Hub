@extends('layouts.app')
  @section('content')
  @include('layouts.admin')
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$newsletter->title}}</h1></li>
        <li class="list-group-item"><b>Full Name:</b> {{$newsletter->name}}</li>
        <li class="list-group-item"><b>Email:</b> {{$newsletter->email}}</li>
        <li class="list-group-item"><b>Department:</b> {{$newsletter->department}}</li>
        <li class="list-group-item"><b>Description:</b> {{$newsletter->description}}</li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShow', [$newsletter->id])}}">Download pdf file</a>
    </div>
    </div>
@endsection
