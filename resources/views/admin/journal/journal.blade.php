@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li class="active"><a href="{{url('admin/journals')}}">Journals</a></li>
        <li><a href="{{url('admin/assigns')}}">Assigns</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}"> Users</a></li>
        <li><a href="{{url('admin/emails')}}">Emsils</a></li>
    </ul>
  </div>

<h1 align="center">Journals</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
      @include('layouts.messages')
    @if(count($journal) > 0)

      @foreach ($journal as $journals)
        <div class="well">
        <h1><a href="journals/{{$journals->id}}">{{$journals->id}}. {{$journals->title}}</a></h1>
        written on {{$journals->created_at}}
              </div>
      @endforeach
      {{$journal->links()}}
</div>
</div>
      @else
        <div class="col-md-8 col-md-offset-2">
          <div class="panel-heading"><h3>Don't have any Journals yet.</h3>
          </div>
        </div>
    @endif

  @endsection
