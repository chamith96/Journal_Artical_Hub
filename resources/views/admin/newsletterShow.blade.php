@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li class="active"><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        </ul>
      </div>

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$newsletter->title}}</h1></li>
        <li class="list-group-item"><b>ID:</b> {{$newsletter->id}}</li>
        <li class="list-group-item"><b>Full Name:</b> {{$newsletter->name}}</li>
        <li class="list-group-item"><b>Email:</b> {{$newsletter->email}}</li>
        <li class="list-group-item"><b>Department:</b> {{$newsletter->department}}</li>
        <li class="list-group-item"><b>Description:</b> {{$newsletter->description}}</li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShow', [$newsletter->id])}}">Download pdf file</a>
          <a class="btn btn-default" href="{{route('downloadFiles', [$newsletter->id])}}">Download Zip</a>
    </div>
@endsection
