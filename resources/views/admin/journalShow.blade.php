@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        </ul>
      </div>

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$journal->title}}</h1></li>
        <li class="list-group-item"><b>ID:</b> {{$journal->id}}</li>
        <li class="list-group-item"><b>Full Name:</b> {{$journal->name}}</li>
        <li class="list-group-item"><b>Email:</b> {{$journal->email}}</li>
        <li class="list-group-item"><b>Department:</b> {{$journal->department}}</li>
        <li class="list-group-item"><b>Description:</b> {{$journal->description}}</li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShow', [$journal->id])}}">Download pdf file</a>
          <a class="btn btn-default" href="{{route('downloadFiles', [$journal->id])}}">Download Zip</a>
    </div>
@endsection
