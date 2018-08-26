@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li class="active"><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
    </ul>
  </div>

<h1 align="center">Newsletters</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if(count($newsletter) > 0)

      @foreach ($newsletter as $newsletters)
        <div class="well">
        <h1><a href="/admin/newsletters/{{$newsletters->id}}">{{$newsletters->id}}. {{$newsletters->title}}</a></h1>
        written on {{$newsletters->created_at}}
              </div>
      @endforeach
      {{$newsletter->links()}}
</div>
</div>
      @else
        <div class="col-md-8 col-md-offset-2">
          <div class="panel-heading"><h3>Don't have any Newsletters yet.</h3>
          </div>
        </div>
    @endif

  @endsection
