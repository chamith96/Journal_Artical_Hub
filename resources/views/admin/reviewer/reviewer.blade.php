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
        <li><a href="{{url('admin/emails')}}">Emsils</a></li>
    </ul>
  </div>

<div align="center">
<h1>Reviewers</h1>
<a href="reviewers/create" class="btn btn-default">Add Reviewers</a>
  </div>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    @include('layouts.messages')
    @if(count($reviewer) > 0)
      <br>
      <table class="table table-striped">
        <tr>
          <th>Name</th>
          <th>Email</th>
        </tr>
        @foreach ($reviewer as $reviewers)
        <tr>
            <td>
              <h3><b><a href="reviewers/{{$reviewers->id}}">{{$reviewers->name}}</a></b></h3>
            </td>
            <td>
              <h3><b><a href="reviewers/{{$reviewers->id}}">{{$reviewers->email}}</a></b></h3>
            </td>
            <td>
              <a href="/admin/reviewers/email/{{$reviewers->id}}" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-envelope"></span>
              </a>
            </td>
          @endforeach
        </tr>
      </table>
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
