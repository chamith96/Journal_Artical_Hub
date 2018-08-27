@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li class="active"><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}"> Users</a></li>
    </ul>
  </div>

<h1 align="center">Reviewers</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <a href="reviewers/create" class="btn btn-primary">Add Reviewers</a> <hr>
    @include('layouts.messages')
    @if(count($reviewer) > 0)

      @foreach ($reviewer as $reviewers)
        <div class="well">
          <h1><a href="reviewers/{{$reviewers->id}}">{{$reviewers->name}}</a></h1>
        </div>
      @endforeach
      {{$reviewer->links()}}
</div>
</div>
      @else
        <div class="col-md-8 col-md-offset-2">
          <div class="panel-heading"><h3>Don't have registered any Reviewer yet.</h3>
          </div>
        </div>
    @endif

  @endsection
