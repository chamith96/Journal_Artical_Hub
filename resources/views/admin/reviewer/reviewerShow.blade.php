@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li class="active"><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        </ul>
      </div>

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item"><p>Reviewer name: {{$reviewer->name}}</p></li>
        <li class="list-group-item"><p>Reviewer email: {{$reviewer->email}}</p></li>
        <li class="list-group-item"><p>Reviewer Organization: {{$reviewer->organization}}</p></li>
        <li class="list-group-item"><p>Reviewer Position: {{$reviewer->position}}</p></li>
      </ul>
      <a class="btn btn-primary" href="{{$reviewer->id}}/edit">Edit</a>

        <form class="pull-right" action="{{url('admin/reviewers', [$reviewer->id])}}" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
@endsection
