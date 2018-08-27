@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li class="active"><a href="{{url('admin/users')}}"> Users</a></li>
    </ul>
  </div>

<h1 align="center">Users</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if(count($user) > 0)

      @foreach ($user as $users)
        <div class="well">
        <p><b>Name: {{$users->name}}</b></p>
        <p><b>Email: {{$users->email}}</b></p>
        <a href="{{url('/admin/users/email', [$users->id])}}" class="btn btn-primary">send email</a>
        </div>
      @endforeach
      {{$user->links()}}
</div>
</div>
    @endif

  @endsection
