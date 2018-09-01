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
      @include('layouts.messages')
    @if(count($user) > 0)

      <table class="table table-striped">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th></th>
        </tr>
        @foreach ($user as $users)
        <tr>

            <td>
              <h3>{{$users->name}}</h3>
            </td>
            <td>
              <h3>{{$users->email}}</h3>
            </td>
            <td>
              <a href="{{url('/admin/users/email', [$users->id])}}" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-envelope"></span>
              </a>
            </td>
          @endforeach
        </tr>
      </table>
      {{$user->links()}}
</div>
</div>
    @endif

  @endsection
