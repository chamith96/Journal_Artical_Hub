@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}">Users</a></li>
        <li class="active"><a href="{{url('admin/emails')}}">Emails</a></li>
    </ul>
  </div>

<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <ul class="list-group">
      <li class="list-group-item active"><h1>{{$reviewer->subject}}</h1></li>
      <li class="list-group-item"><p>{{$reviewer->body}}</p></li>
    </ul>
</div>
</div>
  @endsection
