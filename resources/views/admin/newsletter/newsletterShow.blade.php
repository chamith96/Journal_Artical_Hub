@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li class="active"><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
            <li><a href="{{url('admin/users')}}"> Users</a></li>
            <li><a href="{{url('admin/emails')}}">Emsils</a></li>
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
        <li class="list-group-item"><b>Created at:</b> {{$newsletter->created_at}}</li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShowNewsletter', [$newsletter->id])}}">Download pdf file</a>
        <a class="btn btn-default" href="{{route('downloadFilesNewsletter', [$newsletter->id])}}">Download Zip</a>
    </div>
@endsection
